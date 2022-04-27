<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$subject_id = 0;
$subject_name = '';
$subject_cat = '';
$update = false;




if (isset($_POST['save'])) {
    
    $subject_name = $mysqli->real_escape_string($_POST['subject_name']);
    $subject_cat = $mysqli->real_escape_string($_POST['subject_cat']);
   
    
    

    //echo '<script>alert(hello' . $_FILES['acstaff_img']['name'] . ')</script>';

    $mysqli->query("INSERT INTO subject(sub_name,category) VALUES('$subject_name','$subject_cat')") or
        die($mysqli->error);

    $_SESSION['message'] = "Subject has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location:../admin_cruds/subject_crud.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['error_up'] = "";

    $subject_id = $mysqli->real_escape_string($_GET['delete']);
    

    $mysqli->query("DELETE FROM subject WHERE id = $subject_id ") or die($mysqli->error);

    $_SESSION['message'] = "Subject has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/subject_crud.php");
}

    