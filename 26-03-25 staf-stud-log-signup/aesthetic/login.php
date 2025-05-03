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
            header("Location: homepage.php");
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
    <title>loginPage</title>

    <!-- Linking to stylesheet. -->
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>


    <!-- This makes sure the user receives a message if the user has invalid credentials. -->



    


    <div class = "input-box">
        <div class="login-header">
            <header>Attendees: Login</header>
        </div>
        <form method="post">

            <?php if ($is_invalid): ?>

                <div class="error-message">
                    <em>Invalid login</em>
                </div>

            <?php endif; ?>

            <div class = "input-box">
                <input type = "text" class = "input-field" placeholder = "Email" name = "email" id = "email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" autocomplete = "off" required>
            </div>

            <div class = "input-box">
                <input type = "password" class = "input-field" placeholder = "Password" name = "password" id = "password" autocomplete = "off" required>
            </div>

            <div class = "forgot">
                <section>
                    <input type = "checkbox" id = "check">
                    <label for = "check">Remember me</label>
                </section>
                
                <section>
                    <a href = "forgot-password.php">Forgot password</a>
                </section>
            </div>

            <div class = "input-submit">
                <button class = "submit-btn" id="submit">Login</button>
            </div>

            <div class = "sign-up-link">
                <p>Don't have an account? <a href = "signupPage.html">Sign Up</a></p>
            </div>

        </form>
    </div>
</body>
</html>