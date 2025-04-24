<?php
include "connecttodatabaseinfo.php";

header('Content-Type: application/json');

if (!isset($_GET['Event_ID']) || empty($_GET['Event_ID'])) {
    echo json_encode(["error" => "Missing Event ID"]);
    exit;
}

$mysqli = connectToDatabase();
if ($mysqli->connect_error) {
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

$eventId = $_GET['Event_ID'];

$query = "SELECT Event_ID, Course, Time, Infomation FROM app_events WHERE Event_ID = ?";
$stmt = $mysqli->prepare($query);

if ($stmt) {
    $stmt->bind_param("i", $eventId); // Bind the Event_ID as an integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
        echo json_encode($event);
    } else {
        echo json_encode(["error" => "Event not found"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Query preparation failed"]);
}

$mysqli->close();
?>
