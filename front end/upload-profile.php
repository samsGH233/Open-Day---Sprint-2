<?php
session_start();  //strarts the session

if (!isset($_SESSION["user_id"])) { //this checks if the user is logged in (if user_id is set)
    header("Location: login.php"); // if not, they are redirected back to the login page
    exit;
}

$targetDir = "uploads/"; // determines where to store the uploaded file
// basenmae() gets the file name, not the full path
//$targetFile becomes something like uploads/profilepic.jpg
$targetFile = $targetDir . basename($_FILES["profile_image"]["name"]);


// moves the file from its temporary location (in $_FILES) to desired uploads folder
if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile)) {
    // Save image path to the database for this user

    $mysqli = require __DIR__ . "/database.php"; // connects to db using php file
    // prepares SQL statement to update the profile image field for the logged in user
    $sql = "UPDATE signup SET profile_image = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $targetFile, $_SESSION["user_id"]);
    $stmt->execute();

     // Redirect to homepage after successful upload
     header("Location: homepage.php");
     exit;
 } else {
     echo "Error uploading file.";
 }