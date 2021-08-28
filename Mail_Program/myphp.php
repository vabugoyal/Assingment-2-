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
$email_address = $_POST["email_address"];
$telephone = $_POST["telephone"];
$comments = $_POST["comments"];


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

    $mail->Username = 'b20140@students.iitmandi.ac.in'; // YOUR gmail email
    $mail->Password = '2#aAbBzvk'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('b20140@students.iitmandi.ac.in', 'Vaibhav');
    $mail->addAddress("vaibhavgoyalop@gmail.com", 'Name');
    

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
    $mail->Body = 'HTML message body. <b>Gmail</b> SMTP email body.';
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();
    echo "Email message sent.";
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>
