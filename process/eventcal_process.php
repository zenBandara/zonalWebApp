<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$title = '';
$s_date = '';
$s_time = '';
$e_date = '';
$e_time = '';
$url = '';

$update = false;



if (isset($_POST['save'])) {

    $title = $mysqli->escape_string($_POST['title']);
    $s_date = $mysqli->escape_string($_POST['s_date']);
    $s_time = $mysqli->escape_string($_POST['s_time']);
    $e_date = $mysqli->escape_string($_POST['e_date']);
    $e_time = $mysqli->escape_string($_POST['e_time']);
    $url = $mysqli->escape_string($_POST['url']);

    // $s_date = strval($_POST['s_date']);
    // $s_time = strval($_POST['s_time']);
    // $e_date = strval($_POST['e_date']);
    // $e_time = strval($_POST['e_time']);
    
    echo 'S DATE-'.$s_date,'<br>';
    echo $s_time.'<br>';
    echo 'E DATE-'.$e_date.'<br>';
    echo 'E Time-'.$e_time.'<br>';
    
   

    $start_date = str_replace("|","T",strval(date('Y-m-d|H:i:s', strtotime("$s_date $s_time"))));
    $end_date = str_replace("|","T",strval(date('Y-m-d|H:i:s', strtotime("$e_date $e_time"))));

    echo $s_date;

    $mysqli->query("INSERT INTO eventcal(title,start_date,end_date,url) VALUES('$title','$start_date','$end_date','$url')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";


    header("location:../admin_cruds/eventcal_crud.php");
}

if (isset($_GET['delete'])) {


    $del_id = $mysqli->escape_string($_GET['delete']);

    $mysqli->query("DELETE FROM eventcal WHERE id = $del_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/eventcal_crud.php");
}

if (isset($_GET['edit'])) {
    $u_id = $mysqli->real_escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM eventcal WHERE id = $u_id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $id = $row['id'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $url = $row['url'];
        $s_date = substr($start_date, 0, 10);
        $s_time = substr($start_date, 11);
        $e_date = substr($end_date, 0, 10);
        $e_time = substr($end_date, 11);

        $_SESSION['txtdes'] =  htmlspecialchars($row['title']);
    }
}

if (isset($_POST['update'])) {
    $id = $mysqli->real_escape_string($_POST['id']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $s_date = $mysqli->real_escape_string($_POST['s_date']);
    $s_time = $mysqli->real_escape_string($_POST['s_time']);
    $e_date = $mysqli->real_escape_string($_POST['e_date']);
    $e_time = $mysqli->real_escape_string($_POST['e_time']);
    $url = $mysqli->real_escape_string($_POST['url']);

    $start_date = str_replace("|","T",strval(date('Y-m-d|H:i:s', strtotime("$s_date $s_time"))));
    $end_date = str_replace("|","T",strval(date('Y-m-d|H:i:s', strtotime("$e_date $e_time"))));



    $qu = "UPDATE eventcal SET title='$title',start_date='$start_date',end_date='$end_date',url='$url' WHERE id = $id";

    $mysqli->query($qu)
        or die($mysqli->error);


    //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("location:../admin_cruds/eventcal_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
