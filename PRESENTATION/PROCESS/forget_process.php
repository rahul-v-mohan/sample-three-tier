<?php

include 'process_common.php';
include '/../../HELPERS/GMAIL/mail_function.php';

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

if (!empty($email)) {

    $where = array('email' => $email);
    $result = $query->select('user', 'id', $where);

    if ($result->num_rows == '1') {

        //password creation
        $field_values['password'] = '';
        $alphabets = range('A', 'Z');
        for ($inc = 1; $inc <= 8; $inc++) {
            $temp = rand(0, 25);
            $field_values['password'] .= $alphabets[$temp];
        }
        ///////////////////////////////
        $result_row = mysqli_fetch_array($result);

        $update = $query->update('user', $field_values, $where);
    }
    //////////////////// Sending Mail/////////////////////////
    if (!empty($update)) {
        $subject = 'PASSWORD RESET';
        $content = <<<rahul
            <h2>PASSWORD RESET</h2>
            <p>New Password {$field_values['password']} </p>
rahul;
        $mail_result = mailsend($email, $subject, $content);
        ////////////////////////////////////////////
        if ($mail_result == 1) {
            $_SESSION['MSG'] = 'Please Check Your Mail';
            header("location:../forget_password.php");
        } else {
            $_SESSION['MSG'] = 'Something Went Wrong!!! Please try again';
            header("location:../forget_password.php");
        }
    }
} else {
    $_SESSION['MSG'] = 'Enter Valid Email';
    header("location:../forget_password.php");
}