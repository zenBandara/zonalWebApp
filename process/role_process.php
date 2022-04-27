<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$role_id = 0;
$role_name = '';
$role_cat = '';
$update = false;




if (isset($_POST['save'])) {
    
    $role_name = $mysqli->real_escape_string($_POST['role_name']);
    $role_cat = $mysqli->real_escape_string($_POST['role_cat']);
   
   

    $mysqli->query("INSERT INTO role(role_name,category) VALUES('$role_name','$role_cat')") or
        die($mysqli->error);

    $_SESSION['message'] = "Role has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location:../admin_cruds/role_crud.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['error_up'] = "";

    $role_id = $mysqli->real_escape_string($_GET['delete']);
    

    $mysqli->query("DELETE FROM role WHERE id = $role_id ") or die($mysqli->error);

    $_SESSION['message'] = "Role has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/role_crud.php");
}

    