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

require_once 'vacancycat_process.php';

if (isset($_POST['save'])) {

    $title = $mysqli->real_escape_string($_POST['title']);
    $content = $mysqli->real_escape_string($_POST['content']);
    $cat = $mysqli->real_escape_string($_POST['category']);
    $sys_date = date("Y/m/d - h:i:sa");
    


    $mysqli->query("INSERT INTO vacancy(title,content,category,date) VALUES('$title','$content','$cat','$sys_date')");

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Vacancy: <strong>".$title."</strong> has been Added!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Vacancy: <strong>" . $title . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: address has not been updated!".$mysqli->errno;
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/vacancy_crud.php");
}

if (isset($_GET['delete'])) {


    $del_id = $mysqli->real_escape_string($_GET['delete']);

    $mysqli->query("DELETE FROM vacancy WHERE id = $del_id");

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Vacancy: <strong>".$del_id."</strong> has been deleted!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: vacancy has not been deleted!".$mysqli->errno;
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/vacancy_crud.php");
}

if (isset($_GET['edit'])) {
    $u_id = $_GET['edit'];
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM vacancy WHERE id = $u_id") or die($mysqli->error);
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
    $sys_date = date("Y/m/d - h:i:sa") . '<i>&nbsp;(Updated)</i>';
    $cat = $mysqli->real_escape_string($_POST['category']);



    $qu = "UPDATE vacancy SET title='$title',content='$content',category = '$cat', date = '$sys_date' WHERE id = $id";

    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Vacancy: <strong>".$title."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Vacancy: <strong>" . $title . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: vacancy has not been updated!".$mysqli->errno;
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/vacancy_crud.php");
}
    

