<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM signup WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Student Home</h1>

    <?php if (isset($user)): ?>

        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>

        <p><a href="logout.php">Log out</a></p>

    <?php else: ?>

    <!-- Here is code to redirect the user back to the login or signup page. -->
        <p><a href="login.php">Log in</a> or <a href="signupPage.html">sign up</a></p>

    <?php endif; ?>


</body>
</html>