<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$v_name = '';
$v_des = '';
$v_path = '';
$res_cat = '';

$img_loc = null;
$folderName = '../Uploads';
$update = false;


if (isset($_POST['save'])) {

    $v_name = $mysqli->real_escape_string($_POST['v_name']);
    $v_des = $mysqli->real_escape_string($_POST['v_des']);
    $v_path = $mysqli->real_escape_string($_POST['v_path']);
    $res_cat = $mysqli->real_escape_string($_POST['res_cat']);


    $mysqli->query("INSERT INTO video_gallery(v_name,v_des,v_path,res_cat) VALUES('$v_name','$v_des','$v_path','$res_cat')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";


    header("location:../admin_cruds/video_crud.php");
}

if (isset($_GET['delete'])) {
    

    $del_id = $mysqli->real_escape_string($_GET['delete']);

    $mysqli->query("DELETE FROM video_gallery WHERE id = $del_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/video_crud.php");
}

if (isset($_GET['edit'])) {
    $u_id = $mysqli->real_escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM video_gallery WHERE id = $u_id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array() or die($mysqli->error);
        $id = $row['id'];
        $v_name = $row['v_name'];
        $v_path = $row['v_path'];
        $res_cat = $row['res_cat'];
        $_SESSION['txtdes'] =  htmlspecialchars($row['v_des']);
    }
}

if (isset($_POST['update'])) {
    $id = $mysqli->real_escape_string($_POST['id']);
    $v_name = $mysqli->real_escape_string($_POST['v_name']);
    $v_des = $mysqli->real_escape_string($_POST['v_des']);
    $v_path = $mysqli->real_escape_string($_POST['v_path']);
    $res_cat = $mysqli->real_escape_string($_POST['res_cat']);



    $qu = "UPDATE video_gallery SET v_name='$v_name',v_des='$v_des',v_path='$v_path',res_cat='$res_cat' WHERE id = $id";
       
    $mysqli->query($qu)
        or die($mysqli->error);


    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("location:../admin_cruds/video_crud.php");
}
    
    