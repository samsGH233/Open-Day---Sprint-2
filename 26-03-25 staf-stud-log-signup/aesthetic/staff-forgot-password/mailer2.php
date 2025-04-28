<?php

/* Using PHPMailer package */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

// object set to true to enable exceptions
$mail = new PHPMailer(true);

// SMTP Server with Authentication
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "opendayappemail@gmail.com";
$mail->Password = "ofydairuxyiikgle";

$mail->isHtml(true);

return $mail;