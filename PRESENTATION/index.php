<?php
session_start();
    if(!empty($_SESSION['USER'])){
    header("location:profile.php");
    }else{
      header("location:login.php");   
    }
