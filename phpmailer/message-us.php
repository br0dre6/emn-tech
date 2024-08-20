<?php
// ---------------------------------------------- FOR LOCALHOST ----------------------------------------------
##########Script Information#########
# Purpose: Send mail Using PHPMailer#
#          & Gmail SMTP Server 	  #
# Created: 24-11-2019 			  #
#	Author : Hafiz Haider			  #
# Version: 1.0					  #
# Website: www.BroExperts.com 	  #
#####################################

//Include required PHPMailer files
// require 'includes/PHPMailer.php';
// require 'includes/SMTP.php';
// require 'includes/Exception.php';
// //Define name spaces
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Create instance of PHPMailer
// $mail = new PHPMailer();
// //Set mailer to use smtp
// $mail->isSMTP();
// //Define smtp host
// $mail->Host = "smtp.gmail.com";
// //Enable smtp authentication
// $mail->SMTPAuth = true;
// //Set smtp encryption type (ssl/tls)
// $mail->SMTPSecure = "tls";
// //Port to connect smtp
// $mail->Port = "587";
// //Set gmail username
// $mail->Username = "wherearetheyare@gmail.com";
// //Set gmail password
// $mail->Password = "esxvaxbjikgqexro";
// //Email subject
// $mail->Subject = "contact us review";
// //Set sender email
// $mail->setFrom($toSendEmail);
// //Enable HTML
// $mail->isHTML(true);
// //Attachment
// // $mail->addAttachment('img/video.3gp');
// //Add recipient
// $mail->addAddress($toSendEmail);
// //Email body
// // $mail->Body = "Hello $clientEmail Your account in gnance has been successfully activated you may visit the 
// // website <a href='www.thegnance.com'>click here</a> to visit or download our android application <a href=''>click here</a> to download";

// $mail->Body = "<b>Sender email: </b> $email<br><b>Message: </b>$message";

// //Finally send email
// if ($mail->send()) {
//     //echo "Email Sent..!";
// } else {
//     //echo "Message could not be sent";
//     //echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
// }
// //Closing smtp connection
// $mail->smtpClose();

// ----------------------------------------------- FOR WEBHOSTING ------------------------------------------------
// ini_set("thegnance.com",1);
// error_reporting(E_ALL);
// $from = "wherearetheyare@gmail.com";
// $to = "wherearetheyare@gmail.com";
// $subject="PHP MAIL SENDING Checking";
// $message = "yahoo";
// $headers = "From:".$from;
// mail($to,$subject,$message,$headers);
// echo "The email message was successfully sent.";
/*
https://stackoverflow.com/questions/11238953/send-html-in-email-via-php
https://www.tutorialrepublic.com/php-tutorial/php-send-email.php
*/
ini_set("emn-tech.online",1);
error_reporting(E_ALL);
$to = $toSendEmail;
$subject = 'contact us review';
$from = 'emn-tech.online';

//To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//Create email headers
$headers .= 'From: '.$from."\r\n".
	'Reply-To: '.$from."\r\n" .
	'X-Mailer: PHP/' . phpversion();

//Compose a simple HTML email message
$message = '<html><body>';
$message .= "
    <b>Sender email: </b> $email<br><b>Message: </b>$message
";
$message .= '</body></html>';

//Sending email
if(mail($to, $subject, $message, $headers)){
	// echo 'Your mail has been sent successfully.';
} else{
	// echo 'Unable to send email. Please try again.';
}