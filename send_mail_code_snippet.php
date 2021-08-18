<?php
$email_to = "receiver_name@gmail.com";
$email_subject = "My subject";
$email_message = "Hello world!";
$email_from = "sender_name@gmail.com"

$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
