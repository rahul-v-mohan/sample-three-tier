<?php

include 'process_common.php';

$current_password = trim($_POST['current_password']);
$new_password = trim($_POST['new_password']);
$confirm_password = trim($_POST['confirm_password']);

$id = $_SESSION['USER']['id'];

if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {

    if ($new_password == $confirm_password) {

        $where = array('password' => $current_password, 'id' => $id);
        $result = $query->select('user', 'id', $where);
        if ($result->num_rows == '1') {
            $field_values['password'] = $new_password;
            $where = array('id' => $id);
            $update = $query->update('user', $field_values, $where);
        }
        if (!empty($update)) {
            $_SESSION['MSG'] = 'Your Password Has Been Updated';
            header("location:../change_password.php");
        } else {
            $_SESSION['MSG'] = 'Something Went Wrong!!! Please try again';
            header("location:../change_password.php");
        }
    } else {
        $_SESSION['MSG'] = 'New Password and Confirm Password Must be same';
        header("location:../change_password.php");
    }
} else {
    $_SESSION['MSG'] = 'All Fields are mandatory';
    header("location:../change_password.php");
}