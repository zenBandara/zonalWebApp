<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();

$id = 0;
$p_branch_name = '';
$p_function = '';
$p_description = '';
$update = false;




if (isset($_POST['save_desc'])) {

    $p_description = $mysqli->escape_string($_POST['description']);
    $b_name = $mysqli->escape_string($_POST['b_name']);

    $qu = "UPDATE branch_description SET description = '$p_description' WHERE branch_name = '$b_name'";
    $mysqli->query($qu);

    if (!($mysqli->errno)) {
        $_SESSION['message'] = "Record has been updated!($b_name)";
        $_SESSION['msg_type'] = "success";
    } else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Record already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Record has not been updated!" . $mysqli->errno;
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/branchInfo_crud.php#$b_name");
}

if (isset($_POST['save'])) {

    $b_name = $mysqli->escape_string($_POST['b_name']);
    $p_function = $mysqli->escape_string($_POST['function']);

    $mysqli->query("INSERT INTO branch_function(function,branch_name) VALUES('$p_function','$b_name')") or
        die($mysqli->error);

    $_SESSION['message'] = "Fuction has been saved! ($b_name)";
    $_SESSION['msg_type'] = "success";


    header("location:../admin_cruds/branchInfo_crud.php#$b_name");
}

if (isset($_GET['delete'])) {

    $del_id = $mysqli->escape_string($_GET['delete']);
    $b_name  = $mysqli->escape_string($_GET['br_name']);

    $mysqli->query("DELETE FROM branch_function WHERE id = $del_id") or die($mysqli->error);

    $_SESSION['message'] = "Function has been deleted! ($b_name)";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/branchInfo_crud.php#$b_name");
}

if (isset($_GET['edit'])) {

    //$b_name = $_POST['b_name'];
    $u_id = $mysqli->escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM branch_function WHERE id = '$u_id'") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $id = $row['id'];
        $_SESSION['txtdes'] =  htmlspecialchars($row['function']);
    }
}

if (isset($_POST['update'])) {
    $id = $mysqli->escape_string($_POST['id']);
    $b_name = '';
    $p_function = $mysqli->escape_string($_POST['function']);

    $br_qu = $mysqli->query("SELECT * FROM branch_function WHERE id = '$id'") or die($mysqli->error);
    while ($row = $br_qu->fetch_assoc()) {
        $b_name = $row['branch_name'];
    }

    $qu = "UPDATE branch_function SET function = '$p_function', branch_name = '$b_name' WHERE id = '$id'";

    $mysqli->query($qu)
        or die($mysqli->error);

    $_SESSION['message'] = "Function has been Updated!($b_name)";
    $_SESSION['msg_type'] = "warning";

    header("location:../admin_cruds/branchInfo_crud.php#$b_name");
}
