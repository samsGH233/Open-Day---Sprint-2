<?php

$email = $_POST["email"];

// Random bytes function returns a random string
// bin2hex converts random string into hexidecimal
// This is for the password reset url link
$token = bin2hex(random_bytes(16));

// Converts $token into hash for extra security
$token_hash = hash("sha256", $token);

// Sets expiry date for password reset
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database2.php";

// Update query to set the token to the values above
$sql = "UPDATE Signup_staff
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

// Avoids sql injection attack
// uses mysqli prepared statements

// Combine the values to the placeholders using bind
// param function
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

// if email is found in the mysql database

if ($mysqli->affected_rows) {
    // Assigning require request to a variable
    $mail = require __DIR__ . "/mailer2.php";

    // Sending a message to send to the user
    $mail->setFrom("opendayappemail@gmail.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    Click <a href="http://example.com/reset-password.php?token=$token">here</a>
    
    END;

    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Message was unable to send. Mailer error: {$mail->ErrorInfo}";
    }
}

echo "Message sent, check your inbox.";

        
