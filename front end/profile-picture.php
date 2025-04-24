<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Profile Picture</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<h1>Select Your Profile Picture</h1>

<form action="upload-profile.php" method="post" enctype="multipart/form-data">
    <input type="file" name="profile_image" accept="image/*" required>
    <button type="submit">Upload & Continue</button>
</form>









</body>
</html>


