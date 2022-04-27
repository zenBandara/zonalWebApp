<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$category_name = '';
$category_color = '';


$update = false;



if (isset($_POST['save'])) {

    $category_name  = $mysqli->escape_string($_POST['category_name']);
    $category_color = $mysqli->escape_string($_POST['category_color']);


    $mysqli->query("INSERT INTO category(category_name,category_color) VALUES('$category_name','$category_color')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";


    header("location:../admin_cruds/article_cat_crud.php");
}

if (isset($_GET['delete'])) {


    $del_id = $mysqli->escape_string($_GET['delete']);

    $mysqli->query("DELETE FROM category WHERE category_id = $del_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/article_cat_crud.php");
}

if (isset($_GET['edit'])) {
    $update = true;
    $u_id = $_GET['edit'];


    $result = $mysqli->query("SELECT * FROM category WHERE category_id = $u_id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $id = $row['category_id'];
        $category_name  = $row['category_name'];
        $category_color = $row['category_color'];
    }
}

if (isset($_POST['update'])) {

    $id = $mysqli->real_escape_string($_POST['id']);
    $category_name  = $mysqli->escape_string($_POST['category_name']);
    $category_color = $mysqli->escape_string($_POST['category_color']);




    $qu = "UPDATE category SET category_name='$category_name',category_color='$category_color' WHERE category_id = $id";

    $mysqli->query($qu)
        or die($mysqli->error);


    //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("location:../admin_cruds/article_cat_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
