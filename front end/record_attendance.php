<?php
header('Content-Type: application/json');
error_reporting(0);
ini_set('display_errors', 0);
session_start();

include "connecttodatabaseinfo.php";

// Ensure student is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in.']);
    exit;
}

$user_id = $_SESSION['user_id']; // From signup table: "id"
$data = json_decode(file_get_contents("php://input"), true);
$courseName = $data['course'] ?? null;
$attendanceValue = $data['attendance'] ?? null;

if (!$courseName || !in_array($attendanceValue, ['yes', 'no'])) {
    echo json_encode(['success' => false, 'error' => 'Invalid course or attendance value.']);
    exit;
}

$mysqli = connectToDatabase();

// Get event_id based on course name
$stmt = $mysqli->prepare("SELECT Event_ID FROM app_events WHERE Course = ? LIMIT 1");
$stmt->bind_param("s", $courseName);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $event_id = $row['Event_ID'];

    // Check if attendance already recorded for this student and event
    $check = $mysqli->prepare("SELECT attendance_id FROM attendance WHERE id = ? AND event_id = ?");
    $check->bind_param("ii", $user_id, $event_id);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult && $checkResult->num_rows > 0) {
        // Update existing attendance record
        $update = $mysqli->prepare("UPDATE attendance SET attended = ? WHERE id = ? AND event_id = ?");
        $update->bind_param("sii", $attendanceValue, $user_id, $event_id);
        $success = $update->execute();
        $update->close();
    } else {
        // Insert new attendance record
        $insert = $mysqli->prepare("INSERT INTO attendance (id, event_id, attended) VALUES (?, ?, ?)");
        $insert->bind_param("iis", $user_id, $event_id, $attendanceValue);
        $success = $insert->execute();
        $insert->close();
    }

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['success' => false, 'error' => 'Event not found.']);
}

$stmt->close();
$mysqli->close();
?>