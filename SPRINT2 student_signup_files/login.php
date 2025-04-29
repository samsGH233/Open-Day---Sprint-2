<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Connects to the Josh's database

    $mysqli = require __DIR__ . "/database.php";

    //Makes sure that the email used to login matches the details in
    //Josh's signup database where the attendees signup credentials
    //is stored.
    $sql = sprintf("SELECT * FROM signup WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            //Redirects users to the homepage
            header("Location: profile-picture.php");
            exit;
        }

        
    }

    //If the attendee has not put in the correct credentials this
    //would make the login invalid
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.html</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Student Login</h1>

<!-- This makes sure the user receives a message if the user has invalid credentials. -->
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>


    <!-- This form is an input for the user to type in their 
     credentials to login. -->
     
    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button>Log in</button>
    </form>
</body>
</html>