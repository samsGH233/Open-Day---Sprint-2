<?php

// Checking if the reset password hash matches the hash
// in the database
$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database2.php";

$sql = "SELECT * FROM Staff_signup
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

echo "token is valid";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset-password.php</title>

    <!-- Linking to stylesheet. -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class = "input-box">
        <div class="login-header">
            <header>Reset Password</header>
        </div>
        <form method="post">

            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <div class = "input-box">
                <input type = "password" class = "input-field" placeholder = "New Password" name = "password" id = "password" autocomplete = "off" required>
            </div>

            <div class = "input-box">
                <input type = "password" class = "input-field" placeholder = "Repeat Password" name = "password" id = "password" autocomplete = "off" required>
            </div>

            <div class = "input-submit">
                <button class = "submit-btn" id="submit">Submit</button>
            </div>
        </form>
    </div>
    
</body>
</html>