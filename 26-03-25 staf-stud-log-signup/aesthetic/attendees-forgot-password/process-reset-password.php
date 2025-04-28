<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM signup
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$signup = $result->fetch_assoc();

if (($signup) === null) {
    die("token not found");
}

if (strtotime($signup["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

// V Password Requirements --------------------

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


// makes sure that new token can be generated after
// one token expires or is used
$sql = "UPDATE signup
        SET password_hash = ?,
        reset_token_hash = NULL,
        reset_token_expires_at = NULL
        WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password_hash, $signup["id"]);

$stmt->execute();

echo "Password updated. You can now login";
?>