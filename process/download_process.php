<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$d_name = '';
$d_des = '';
//$d_path = '';
$res_cat = '';


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
    //file upload************
    if (file_exists("Uploads/" . $_FILES['d_path']['name'])) {
        $_SESSION['error_up'] = "File has not been uploaded!";
        //redirect to index.html
        //echo "<script>window.location.replace('./index.html')</script>";
        //$img_loc = $folderName . '/' . 'default.png';
    } elseif ($_FILES['d_path']['error'] > 0) {
        $_SESSION['error_up'] = "File has not been uploaded!";
        //Error on uploaded file
        echo 'Error Code: ' . $_FILES['d_path']['error'] . '<br />';
    } else {
        $_SESSION['error_up'] = "";
        //create a directory for store uploads


        //mkdir($folderName);

        //rename
        $path = $_FILES['d_path']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $date = new DateTime();
        $new_name =  "download_res_" . $date->format('Y-m-d-H-i-s-ms') . "." . $ext;


        //save the uploaded file inside created folder
        move_uploaded_file(
            $_FILES['d_path']['tmp_name'],
            $folderName . '/' . $new_name
        );



        $img_loc = $folderName . '/' . $new_name;
        //echo "<script>console.log(".$img_loc .")</script>";

    }
    //end



    $d_name = $mysqli->escape_string($_POST['d_name']);
    $d_des = $mysqli->escape_string($_POST['d_des']);
    //$d_path = _POST[];
    $res_cat = $mysqli->escape_string($_POST['res_cat']);

    //echo '<script>alert(hello' . $_FILES['acstaff_img']['name'] . ')</script>';

    $mysqli->query("INSERT INTO downloads(d_name,d_des,d_path,res_cat) VALUES('$d_name','$d_des','$img_loc','$res_cat')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";




    header("location:../admin_cruds/download_crud.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['error_up'] = "";

    $del_id = $mysqli->escape_string($_GET['delete']);
    $del_file = $mysqli->query("SELECT d_path from downloads WHERE id = $del_id") or die($mysqli->error);


    if (count(array($del_file)) == 1) {
        $row = $del_file->fetch_array();
        $file_path = $row['d_path'];
        unlink($file_path);
    }


    $mysqli->query("DELETE FROM downloads WHERE id = $del_id ") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/download_crud.php");
}

if (isset($_GET['edit'])) {
    $id = $mysqli->escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM downloads WHERE id = $id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $id = $row['id'];
        $d_name = $row['d_name']; 
        $res_cat = $row['res_cat'];
        $_SESSION['txtdes'] =  htmlspecialchars($row['d_des']);
    }
}

if (isset($_POST['update'])) {
    $u_id = $mysqli->escape_string($_POST['id']);
    //echo $u_id.'-----id----------';
    //delete section
    if ($_FILES['d_path']['name']) {
        $del_file = $mysqli->query("SELECT d_path from downloads WHERE id = $u_id") or die($mysqli->error);


        if (count(array($del_file)) == 1) {
            $row = $del_file->fetch_array();
            $file_path = $row['d_path'];
            unlink($file_path);
        }
    }

    //end delete

    //file upload************
    if (file_exists("Uploads/" . $_FILES['d_path']['name'])) {
        $_SESSION['error_up'] = " File has not been uploaded!";
        //echo '<script>alert("File exists! Try again!")</script>';

        //redirect to index.html
        //echo "<script>window.location.replace('./index.html')</script>";
    } elseif ($_FILES['d_path']['error'] > 0) {
        //Error on uploaded file
        $_SESSION['error_up'] = "File has not been uploaded! ";
        echo 'Error Code: ' . $_FILES['d_path']['error'] . '<br />';
    } else {
        $_SESSION['error_up'] = "";
        //create a directory for store uploads
        $folderName = '../Uploads';

        //mkdir($folderName);

        $path = $_FILES['d_path']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $date = new DateTime();
        $new_name =  "download_res_up_" . $date->format('Y-m-d-H-i-s-ms') . "." . $ext;

        //save the uploaded file inside created folder
        move_uploaded_file(
            $_FILES['d_path']['tmp_name'],
            $folderName . '/' . $new_name
        );

        //redirect to index.html
        //echo "<script>window.location.replace('./index.html')</script>";
        $img_loc = $folderName . '/' . $new_name;
        //echo "<script>console.log(".$img_loc .")</script>";

    }
    //end


    $d_name = $mysqli->escape_string($_POST['d_name']);
    $d_des = $mysqli->escape_string($_POST['d_des']);
    $res_cat = $mysqli->escape_string($_POST['res_cat']);

    $qu = $img_loc ? "UPDATE downloads SET d_name='$d_name',d_des='$d_des',res_cat='$res_cat',d_path='$img_loc' WHERE id = $u_id"
        : "UPDATE downloads SET d_name='$d_name',d_des='$d_des',res_cat='$res_cat' WHERE id = $u_id";
    $mysqli->query($qu)
        or die($mysqli->error);


    //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("location:../admin_cruds/download_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
