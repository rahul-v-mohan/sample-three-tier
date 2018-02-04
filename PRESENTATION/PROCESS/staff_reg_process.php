<?php

include 'process_common.php';
include '/../../HELPERS/GMAIL/mail_function.php';
$table_name = 'user';
$where['id'] = trim($_POST['id']);
$field_values['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$field_values['name'] = trim($_POST['name']);
$field_values['mobile'] = trim($_POST['mobile']);
$field_values['gender'] = trim($_POST['gender']);
$field_values['status'] = (isset($_POST['status'])) ? $_POST['status'] : 0;
$field_values['role'] = 'staff';

$method = $_POST['method'];



// INSERT
if ($method == 'insert') {

//password creation
    $field_values['password'] = '';
    $alphabets = range('A', 'Z');
    for ($inc = 1; $inc <= 8; $inc++) {
        $temp = rand(0, 25);
        $field_values['password'] .= $alphabets[$temp];
    }
///////////////////////////////

    $result = $query->insert($table_name, $field_values);
    if (!empty($result)) {
        //////////////////// Sending Mail/////////////////////////
        $subject = 'ACCOUNT CREATION';
        $content = <<<rahul
            <h1>LOGIN DETAILS</h1>
            <p>Username: {$field_values['email']} </p>
            <p>Username: {$field_values['password']} </p>
rahul;
        $mail_result = mailsend($field_values['email'], $subject, $content);
        ////////////////////////////////////////////

        if ($mail_result == 1) {
            $_SESSION['MSG'] = 'Successfully inserted check mail for login details';
            header("location:../profile.php");
        } else {
            $_SESSION['MSG'] = 'Account has been created';
            header("location:../profile.php");
        }
    } else {
        $_SESSION['MSG'] = 'Not Inserted!!! Please try again';
        header("location:../staff_registration.php");
    }
}



// Update
if ($method == 'update') {

    $result = $query->update($table_name, $field_values, $where);
    if (!empty($result)) {
        $_SESSION['MSG'] = 'Successfully Updated';
    } else {
        $_SESSION['MSG'] = 'Somethng went wrong!!! Please try again';
    }
    header("location:../staff_registration.php");
}

//Delete
if ($method == 'delete') {

    $result = $query->delete($table_name,$where);
    if (!empty($result)) {
        $_SESSION['MSG'] = 'Successfully Record Deleted';
    } else {
        $_SESSION['MSG'] = 'Somethng went wrong!!! Please try again';
    }
    header("location:../staff_registration.php");
}