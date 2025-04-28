<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot-password.php</title>

    <!-- Linking to stylesheet. -->
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class = "input-box">
        <div class="login-header">
            <header>Forgot Password</header>
        </div>
        <form method="post" action="send-password-reset.php">

            <div class = "input-box">
                <input type = "email" class = "input-field" placeholder = "Email" name = "email" id = "email" autocomplete = "off" required>
            </div>

            <div class = "input-submit">
                <button class = "submit-btn" id="submit">Send</button>
            </div>

        </form>
    </div>
</body>
</html>