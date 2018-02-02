<?php
session_start();
if(empty($_SESSION['userlogin'])){
    header("location:../index.php");
}
include_once '/../../config.php';
