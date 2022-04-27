<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');

$id = 0;
$category = '';





if (isset($_POST['save_cat'])) {

    $category = $mysqli->real_escape_string($_POST['category']);



    $mysqli->query("INSERT INTO notice_cat(category) VALUES('$category')");

    if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Catagory: <strong>" . $category . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Catagory: <strong>" . $category . "</strong> has been saved!";
        $_SESSION['msg_type'] = "success";
    }

    header("location:../admin_cruds/notice_crud.php");
}

if (isset($_GET['delete_cat'])) {
    $_SESSION['error_up'] = "";

    $del_id = $mysqli->real_escape_string($_GET['delete_cat']);


    $mysqli->query("DELETE FROM notice_cat WHERE id = $del_id ") or die($mysqli->error);

    $_SESSION['message'] = "Category has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/notice_crud.php");
}
