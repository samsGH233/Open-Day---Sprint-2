<?php

// Here is code for the conditions the user must meet in order for
// the attendees to create their account


if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

// password hash converts the users password in to a hash to implement
// security procedures

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO signup (name, email, password_hash, profile_image) VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

// changes made : placeholder image V

$default_profile_image = "default.jpg";

// changes made : now includes profile image in bind param V

$stmt->bind_param("ssss", $_POST["name"], $_POST["email"], $password_hash, $default_profile_image);

if ($stmt->execute()) {

    session_start();

    $_SESSION["user_id"] = $mysqli->insert_id;
    
    header("Location: profile-picture.php");

    exit;
    
} else {
    if ($mysqli->errno === 1062) {
        die("email already taken");
    }
    die($mysqli->error . " " . $mysqli->errno);
}



print_r($_POST);
var_dump($password_hash);