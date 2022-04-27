<?php

require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$grade_id = 0;
$grade_name = '';
$grade_cat = '';

if (isset($_POST['save'])) {
    
    $grade_name = $mysqli->real_escape_string($_POST['grade_name']);
    $grade_cat = $mysqli->real_escape_string($_POST['grade_cat']);
   

    $mysqli->query("INSERT INTO grade(grade_name,category) VALUES('$grade_name','$grade_cat')") or
        die($mysqli->error);

    $_SESSION['message'] = "Grade has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location:../admin_cruds/grade_crud.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['error_up'] = "";

    $grade_id = $mysqli->real_escape_string($_GET['delete']);
    

    $mysqli->query("DELETE FROM grade WHERE id = $grade_id ") or die($mysqli->error);

    $_SESSION['message'] = "Grade has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/grade_crud.php");
}

    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
