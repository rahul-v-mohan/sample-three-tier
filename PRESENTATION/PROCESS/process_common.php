<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
($_SERVER['REQUEST_METHOD'] =='POST') or die('Wrong access');

include_once '../../config.php';

$query = new query();