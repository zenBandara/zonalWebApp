<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$res_cat = '';
$section = '';
$update = false;


if (isset($_POST['save'])) {
    
    $res_cat = $mysqli->escape_string($_POST['res_cat']);
    $section = $mysqli->escape_string($_POST['section']);
   

    $mysqli->query("INSERT INTO  res_category(res_cat,section) VALUES('$res_cat','$section')") or
        die($mysqli->error);

    $_SESSION['message'] = "Categorye has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location:../admin_cruds/category_crud.php");
}

if (isset($_GET['delete'])) {
    

    $id = $mysqli->escape_string($_GET['delete']);
    

    $mysqli->query("DELETE FROM res_category WHERE id = $id ") or die($mysqli->error);

    $_SESSION['message'] = "Role has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/category_crud.php");
}

