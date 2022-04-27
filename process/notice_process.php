<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$title = '';
$content = '';
$cat = '';
$s_date = '';
$s_time = '';
$e_date = '';
$e_time = '';
$add = '';

$update = false;

require_once 'noticecat_process.php';

if (isset($_POST['save'])) {

    $title = $mysqli->real_escape_string($_POST['title']);
    $content = $mysqli->real_escape_string($_POST['content']);
    $cat = $mysqli->real_escape_string($_POST['category']);
    $sys_date = date("Y/m/d - h:i:sa");
    $msg_event = '';

    if ($_POST['add_event'] == 'e') {
        $s_date = $mysqli->real_escape_string($_POST['s_date']);
        $s_time = $mysqli->real_escape_string($_POST['s_time']);
        $e_date = $mysqli->real_escape_string($_POST['e_date']);
        $e_time = $mysqli->real_escape_string($_POST['e_time']);
        $start_date = str_replace("|", "T", strval(date('Y-m-d|H:i:s', strtotime("$s_date $s_time"))));
        $end_date = str_replace("|", "T", strval(date('Y-m-d|H:i:s', strtotime("$e_date $e_time"))));

        $mysqli->query("INSERT INTO eventcal(title,start_date,end_date) VALUES('$title','$start_date','$end_date')") or
            die($mysqli->error);
        $msg_event = 'to both event calender and notices';
    }


    $mysqli->query("INSERT INTO notices(title,content,category,date) VALUES('$title','$content','$cat','$sys_date')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved " . $msg_event . "!";
    $_SESSION['msg_type'] = "success";


    header("location:../admin_cruds/notice_crud.php");
}

if (isset($_GET['delete'])) {


    $del_id = $mysqli->real_escape_string($_GET['delete']);

    $mysqli->query("DELETE FROM notices WHERE id = $del_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/notice_crud.php");
}

if (isset($_GET['edit'])) {
    $u_id = $mysqli->real_escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM notices WHERE id = $u_id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $id = $row['id'];
        $title = $row['title'];
        $cat = $row['category'];
        $_SESSION['txtq'] =  htmlspecialchars($row['content']);
    }
}

if (isset($_POST['update'])) {
    $id = $mysqli->real_escape_string($_POST['id']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $content = $mysqli->real_escape_string($_POST['content']);
    $sys_date = date("Y/m/d - h:i:sa").'<i>&nbsp;(Updated)</i>';
    $cat = $mysqli->real_escape_string($_POST['category']);



    $qu = "UPDATE notices SET title='$title',content='$content',category = '$cat', date = '$sys_date' WHERE id = $id";

    $mysqli->query($qu)
        or die($mysqli->error);


    //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("location:../admin_cruds/notice_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
