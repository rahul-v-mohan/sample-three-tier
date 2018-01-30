<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Load PHPMailer dependencies
require_once '../../config.php';
require_once 'PHPMailerAutoload.php';
require_once 'class.phpmailer.php';
require_once 'class.smtp.php';

if(empty(GMAIL_USERNAME)||empty(GMAIL_PASSWORD)){
    die("Please set gmail login credentials!!!");
}
//////////// Message and Receipt ///////
/* TO, SUBJECT, CONTENT */
$to         = (!empty($_REQUEST['mail_to']))?filter_var($_REQUEST['mail_to'], FILTER_SANITIZE_EMAIL):"";
$subject    = (!empty($_REQUEST['mail_subject']))?$_REQUEST['mail_subject']:"";
$content    = (!empty($_REQUEST['mail_content']))?$_REQUEST['mail_content']:"";
if(empty($to)||empty($subject)||empty($content)){
    die("Mail info missing");
}
///////////////////////////////////////

/* CONFIGURATION */
$crendentials = array(
    'email'     => GMAIL_USERNAME,    //Your GMail adress
    'password'  => GMAIL_PASSWORD,              //Your GMail password
    );

/* SPECIFIC TO GMAIL SMTP */
$smtp = array(

'host' => 'smtp.gmail.com',
'port' => 587,
'username' => $crendentials['email'],
'password' => $crendentials['password'],
'secure' => 'tls' //SSL or TLS

);





$mailer = new PHPMailer();

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
$mailer->From       = $crendentials['email'];
$mailer->FromName   = 'PROJECT'; //Optional
$mailer->addAddress($to);  // Add a recipient

//Subject - Body :
$mailer->Subject        = $subject;
$mailer->Body           = $content;
$mailer->isHTML(true); //Mail body contains HTML tags

//Check if mail is sent :
if(!$mailer->send()) {
    echo 'Error sending mail : ' . $mailer->ErrorInfo;
} else {
    echo 'Message sent !';
}