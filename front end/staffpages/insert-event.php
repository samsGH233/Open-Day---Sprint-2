<?php
session_start();
include "connecttodatabaseinfo.php"; // Ensure this file connects properly


$mysqli = connectToDatabase(); // Establish connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and escape form data
    $Course = $_POST['Course'];
    $Time = $_POST['Time'];
    $Information = $_POST['Information'];
    $Room_Number = $_POST['Room_Number'];

    // Debug: Print the SQL query
    $sql = "INSERT INTO app_events (Course, Time, Information, Room_Number) 
            VALUES ('$Course', '$Time', '$Information', '$Room_Number')";

    echo "Executing SQL: $sql <br>"; // Show the query

    if ($mysqli->query($sql)) {
        echo "Event added successfully!";
        header("Location: staff-finalpage.php?success");
        exit();
    } else {
        echo "Database error: " . $mysqli->error; // Show SQL error
    }
}

$mysqli->close();
?>
