<?php

include 'process_common.php';

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = trim($_POST['password']);

if (!empty($email) && !empty($password)) {

    $where = array('email' => $email, 'password' => $password);
    $result = $query->select('user', '*', $where);

    if ($result->num_rows == '1') {
        $result_row = mysqli_fetch_array($result);
        $_SESSION['USER'] = $result_row;
        if ($_SESSION['USER']['role'] == 'admin') {
            header("location:../admin_home.php");
        }elseif ($_SESSION['USER']['role'] == 'staff') {
            header("location:../staff_home.php");
        }elseif ($_SESSION['USER']['role'] == 'user') {
            header("location:../user_home.php");
        } else {
            unset( $_SESSION['USER']);
            $_SESSION['MSG']='Something Went Wrong';
            header("location:../login.php");
        }
    }
} else {
    $_SESSION['msg'] = 'Invalid Username or Password';
}

