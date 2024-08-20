<?php
// ini_set("emn-tech-opti.000webhostapp.com",1);
// error_reporting(E_ALL);
// Recipient email address
$to = 'wherearetheyare@gmail.com';

// Subject and message
$subject = 'Test Email Notification';
$message = 'This is a test email notification without PHPMailer.';

// Additional headers for setting up SMTP
$headers = 'From: wherearetheyare@gmail.com' . "\r\n" .
    'Reply-To: wherearetheyare@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// SMTP server configuration
ini_set('SMTP', 'smtp.gmail.com'); // Replace with your SMTP server
ini_set('smtp_port', 587); // Replace with your SMTP server port

// Send the email and check for success
if (mail($to, $subject, $message, $headers)) {
    echo 'Email has been sent successfully!';
} else {
    echo 'Error sending email.';
}
?>