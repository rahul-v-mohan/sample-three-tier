<?php
include 'process_common.php';

$email =filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password =trim($_POST['password']);

if(!empty($email) && !empty($password)){
   
//    $query->select('user')
    
    
}else{
    $_SESSION['msg'] = 'Invalid Username or Password';
}

