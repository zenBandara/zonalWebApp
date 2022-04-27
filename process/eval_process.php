<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$sch_name = '';
$year = '';
$ol_pass = '';
$ol_fail = '';
$al_pass = '';
$al_fail = '';
$gq_pass = '';
$gq_fail = '';

$update = false;


if (isset($_POST['save'])) {


    $sch_name = $mysqli->escape_string($_POST['sch_name']);
    $year = $mysqli->escape_string($_POST['year']);
    $ol_pass = $mysqli->escape_string($_POST['ol_pass']);
    $ol_fail = $mysqli->escape_string($_POST['ol_fail']);
    $al_pass = $mysqli->escape_string($_POST['al_pass']);
    $al_fail = $mysqli->escape_string($_POST['al_fail']);
    $gq_pass = $mysqli->escape_string($_POST['gq_pass']);
    $gq_fail = $mysqli->escape_string($_POST['gq_fail']);

    $sql_check = "SELECT * FROM evaluation WHERE sch_name='$sch_name' AND year = '$year'";
    $row_count = mysqli_num_rows($mysqli->query($sql_check));
    if ($row_count > 0) {
        $_SESSION['message'] = "Duplicate value has been detected for year and school name!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $mysqli->query("INSERT INTO evaluation(sch_name, year, ol_pass, ol_fail, al_pass, al_fail, gq_pass, gq_fail) VALUES('$sch_name','$year','$ol_pass','$ol_fail','$al_pass','$al_fail','$gq_pass','$gq_fail')");
        if (!$mysqli->error) {
            $_SESSION['message'] = "Record has been saved!";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Record has not saved! error";
            $_SESSION['msg_type'] = "danger";
            die($mysqli->error);
        }
    }



    header("location:../admin_cruds/eval_crud.php");
}

if (isset($_GET['delete'])) {

    $id_del = $mysqli->escape_string($_GET['delete']);

    $mysqli->query("DELETE FROM evaluation WHERE id = $id_del");

    if (!$mysqli->error) {
        $_SESSION['message'] = "Record has been deleted!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Record has not deleted! error!";
        $_SESSION['msg_type'] = "danger";
    }
    header("location:../admin_cruds/eval_crud.php");
}

if (isset($_GET['edit'])) {
    $id_up = $mysqli->escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM evaluation WHERE id = $id_up") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $id = $row['id'];
        $sch_name = $row['sch_name'];
        $year = $row['year'];
        $ol_pass = $row['ol_pass'];
        $ol_fail = $row['ol_fail'];
        $al_pass = $row['al_pass'];
        $al_fail = $row['al_fail'];
        $gq_pass = $row['gq_pass'];
        $gq_fail = $row['gq_fail'];
    }
}

if (isset($_POST['update'])) {

    $id = $mysqli->escape_string($_POST['id']);
    $sch_name = $mysqli->escape_string($_POST['sch_name']);
    $year = $mysqli->escape_string($_POST['year']);
    $ol_pass = $mysqli->escape_string($_POST['ol_pass']);
    $ol_fail = $mysqli->escape_string($_POST['ol_fail']);
    $al_pass = $mysqli->escape_string($_POST['al_pass']);
    $al_fail = $mysqli->escape_string($_POST['al_fail']);
    $gq_pass = $mysqli->escape_string($_POST['gq_pass']);
    $gq_fail = $mysqli->escape_string($_POST['gq_fail']);
    $id_check = 0;

    $sql_check = "SELECT * FROM evaluation WHERE sch_name='$sch_name' AND year = '$year'";
    $sql_ex = $mysqli->query($sql_check);
    $row_count = mysqli_num_rows($sql_ex);

    while ($row = $sql_ex->fetch_assoc()) {
        $id_check = $row['id'];
    }


    if ($row_count > 0 && $id_check != $id) {

        $_SESSION['message'] = "Duplicate value has been detected for year and school name!";
        $_SESSION['msg_type'] = "danger";
    }else if ($row_count > 0 && $id_check == $id){
        $qu = "UPDATE evaluation SET sch_name='$sch_name',year='$year',ol_pass='$ol_pass',ol_fail='$ol_fail',al_pass='$al_pass',al_fail='$al_fail',gq_pass='$gq_pass',gq_fail='$gq_fail' WHERE id = $id";
        $mysqli->query($qu)
            or die($mysqli->error);
        $_SESSION['message'] = "Record has been Updated!";
        $_SESSION['msg_type'] = "warning";
    } else {
        $qu = "UPDATE evaluation SET sch_name='$sch_name',year='$year',ol_pass='$ol_pass',ol_fail='$ol_fail',al_pass='$al_pass',al_fail='$al_fail',gq_pass='$gq_pass',gq_fail='$gq_fail' WHERE id = $id";
        $mysqli->query($qu)
            or die($mysqli->error);
        $_SESSION['message'] = "Record has been Updated!";
        $_SESSION['msg_type'] = "warning";
    }


    header("location:../admin_cruds/eval_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
