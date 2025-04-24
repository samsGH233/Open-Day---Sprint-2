<?php
session_start();
include "connecttodatabaseinfo.php"; // Database connection file

$mysqli = connectToDatabase(); // Establish connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_rate = $_POST['num_rate']; // Rating
    $comment1 = $_POST['comment1']; // What they enjoyed
    $comment2 = $_POST['comment2']; // What can be improved

    // Validate input
    if (empty($num_rate) || empty($comment1) || empty($comment2)) {
        header("Location: feedbackpage.php?error=Please fill in all fields");
        exit();
    }

    // Check if rating is between 1-10
    if ($num_rate < 1 || $num_rate > 10) {
        header("Location: feedbackpage.php?error=Rating must be between 1 and 10");
        exit();
    }

    // Insert feedback into the database
    $sql = "INSERT INTO rating (num_rate, comment1, comment2) VALUES ('$num_rate', '$comment1', '$comment2')";
    $result = $mysqli->query($sql);

    if ($result) {
        // Feedback submitted successfully
        header("Location: finalpage.php?success");
        exit();
    } else {
        header("Location: feedbackpage.php?error=Failed to submit feedback");
        exit();
    }
}

$mysqli->close(); // Close connection
?>
