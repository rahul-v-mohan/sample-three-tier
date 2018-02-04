<?php

include 'process_common.php';
include '/../../HELPERS/GMAIL/mail_function.php';

$field_values['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$field_values['name'] = trim($_POST['name']);
$field_values['mobile'] = trim($_POST['mobile']);
$field_values['message'] = trim($_POST['message']);



        //////////////////// Sending Mail/////////////////////////
        $subject = 'CONTACT MAIL';
        echo $content = <<<rahul
            <h2>CONTACT MAIL</h2>
            <p>Name: {$field_values['name']} </p>
            <p>Email: {$field_values['email']} </p>
            <p>Mobile: {$field_values['mobile']} </p>
            <p>Message: <br> {$field_values['message']} </p>
rahul;
        $mail_result = mailsend(GMAIL_USERNAME, $subject, $content);
        ////////////////////////////////////////////
        if ($mail_result == 1) {
            $_SESSION['MSG'] = 'Successfully send the mail';
            header("location:../contact.php");
        } else {
            $_SESSION['MSG'] = 'Something Went Wrong!!! Please try again';
            header("location:../contact.php");
        }
    