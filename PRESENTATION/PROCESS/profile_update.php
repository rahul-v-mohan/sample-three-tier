<?php

include 'process_common.php';
include '/../../HELPERS/GMAIL/mail_function.php';
$table_name = 'user';
$where['id'] = trim($_POST['id']);
$field_values['name'] = trim($_POST['name']);
$field_values['mobile'] = trim($_POST['mobile']);
$field_values['gender'] = trim($_POST['gender']);
// Update
if ($method == 'update') {

    $result = $query->update($table_name, $field_values, $where);
    if (!empty($result)) {
        $_SESSION['MSG'] = 'Successfully Updated';
    } else {
        $_SESSION['MSG'] = 'Somethng went wrong!!! Please try again';
    }
    header("location:../user_registration.php");
}
