<?php

include 'process_common.php';

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = trim($_POST['password']);
unset( $_SESSION['USER']);
if (!empty($email) && !empty($password)) {

    $where = array('email' => $email, 'password' => $password,'status' =>'1');
    $result = $query->select('user', '*', $where);

    if ($result->num_rows == '1') {
        $result_row = mysqli_fetch_array($result);
        $_SESSION['USER'] = $result_row;
        if ($_SESSION['USER']['role'] == 'admin') {
            $_SESSION['privilage'] = '1';
            header("location:../profile.php");
        }elseif ($_SESSION['USER']['role'] == 'staff') {
            $_SESSION['privilage'] = '1';
            header("location:../profile.php");
        }elseif ($_SESSION['USER']['role'] == 'user') {
            header("location:../profile.php");
        } else {
            unset( $_SESSION['USER']);
            $_SESSION['MSG']='Something Went Wrong';
            header("location:../login.php");
        }
    }else{
             $_SESSION['MSG'] = 'Invalid Username or Password';
             header("location:../login.php");
    }
} else {
     $_SESSION['MSG'] = 'Fill Username and Password';
    header("location:../login.php");
}

