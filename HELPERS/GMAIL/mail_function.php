<?php
//Load PHPMailer dependencies
require_once 'PHPMailerAutoload.php';
require_once 'class.phpmailer.php';
require_once 'class.smtp.php';

$mailer = new PHPMailer();
function mailsend($to,$subject,$content){

/* SPECIFIC TO GMAIL SMTP */
$smtp = array(

'host' => 'smtp.gmail.com',
'port' => 587,
'username' => GMAIL_USERNAME,
'password' => GMAIL_PASSWORD,
'secure' => 'tls' //SSL or TLS

);
global  $mailer;


//SMTP Configuration
$mailer->isSMTP();
$mailer->SMTPAuth   = true; //We need to authenticate
$mailer->Host       = $smtp['host'];
$mailer->Port       = $smtp['port'];
$mailer->Username   = $smtp['username'];
$mailer->Password   = $smtp['password'];
$mailer->SMTPSecure = $smtp['secure']; 

//Now, send mail :
//From - To :
$mailer->From       = GMAIL_USERNAME;
$mailer->FromName   = 'ACADEMIC PROJECT'; //Optional
$mailer->addAddress($to);  // Add a recipient

//Subject - Body :
$mailer->Subject        = $subject;
$mailer->Body           = $content;
$mailer->isHTML(true); //Mail body contains HTML tags

//Check if mail is sent :
if($mailer->send()) {
    return 1;
} else {
     return 0;
}
}