<?php
session_start();
if(empty($_SESSION['userlogin'])){
    header("location:../index.php");
}
include_once '/../../BUSINESS_LAYER/business_layer.php';
