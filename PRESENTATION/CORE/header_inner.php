<?php
session_start();
if(empty($_SESSION['USER'])){
    header("location:../index.php");
}
include_once '/../../config.php';
$query = new query();
