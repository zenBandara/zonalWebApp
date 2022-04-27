<?php

require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$a_title = '';
$a_body = '';
$a_date = '';
$a_level = '';

$img_loc = null;
$folderName = '../Uploads';
$update = false;


function existing_alart()
{
    echo '<script language="javascript">';
    echo 'alert("File exists! Try again!")';
    echo '</script>';
}


if (isset($_POST['save'])) {

    $a_title = $mysqli->escape_string($_POST['a_title']);
    $a_body = $mysqli->escape_string($_POST['a_body']);
    $a_date = date("Y/m/d - h:i:sa");
    $a_level = $mysqli->escape_string($_POST['a_level']);

    //echo '<script>alert(hello' . $_FILES['acstaff_img']['name'] . ')</script>';

    $mysqli->query("INSERT INTO announcement(a_title,a_body,a_date,a_level) VALUES('$a_title','$a_body','$a_date','$a_level')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";


    header("location:../admin_cruds/announcement_crud.php");
}

if (isset($_GET['delete'])) {
    

    $del_id = $mysqli->escape_string($_GET['delete']);

    $mysqli->query("DELETE FROM announcement WHERE id = $del_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/announcement_crud.php");
}

if (isset($_GET['edit'])) {
    $u_id = $_GET['edit'];
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM announcement WHERE id = $u_id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $id = $row['id'];
        $a_title = $row['a_title'];
        $a_level = $row['a_level'];
        $_SESSION['txtdes'] =  htmlspecialchars($row['a_body']);
    }
}

if (isset($_POST['update'])) {
    $id = $mysqli->escape_string($_POST['id']);
    $a_title = $mysqli->escape_string($_POST['a_title']);
    $a_body = $mysqli->escape_string($_POST['a_body']);
    $a_date = date("Y/m/d - h:i:sa").'(Updated)';
    $a_level = $mysqli->escape_string($_POST['a_level']);



    $qu = "UPDATE announcement SET a_title='$a_title',a_body='$a_body',a_date='$a_date',a_level='$a_level' WHERE id = $id";
       
    $mysqli->query($qu)
        or die($mysqli->error);


    //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("location:../admin_cruds/announcement_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
