<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// Getting the input value from the form 
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$sender_email_address = $_POST["sender_email_address"];
$sender_password = $_POST["sender_password"];
$reciever_email_address = $_POST["reciever_email_address"];
$reciever_name = $_POST["reciever_name"];
$telephone = $_POST["telephone"];
$comments = $_POST["comments"];
$title = $_POST["title"];


// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = sender_email_address; // YOUR gmail email
    $mail->Password = sender_password; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom(sender_email_address, first_name + " " + last_name);
    $mail->addAddress(reciever_email_address, reciever_name);
    

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = title;
    $mail->Body = comments;
    $mail->AltBody = comments;

    $mail->send();
    echo "Email message sent.";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>
