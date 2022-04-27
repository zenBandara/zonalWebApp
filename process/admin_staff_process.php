<?php

require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();

$acstaff_id = 0;
$acstaff_name = '';
$acstaff_title = '';
$acstaff_role = '';
$acstaff_contact = '';
$acstaff_email = '';
$acstaff_ava = '';
$acstaff_des = '';
$acstaff_subject = '';
$acstaff_grade = '';

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
    if (file_exists("Uploads/" . $_FILES['acstaff_img']['name'])) {
        $_SESSION['error_up'] = "Image has not been uploaded!";
        //redirect to index.html
        //echo "<script>window.location.replace('./index.html')</script>";
        //$img_loc = $folderName . '/' . 'default.png';
    } elseif ($_FILES['acstaff_img']['error'] > 0) {
        $_SESSION['error_up'] = "Image has not been uploaded!";
        //Error on uploaded file
        echo 'Error Code: ' . $_FILES['acstaff_img']['error'] . '<br />';
    } else {
        $_SESSION['error_up'] = "";
        //create a directory for store uploads


        //mkdir($folderName);

        //rename
        $path = $_FILES['acstaff_img']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $date = new DateTime();
        $new_name =  "image_" . $date->format('Y-m-d-H-i-s-ms') . "." . $ext;


        //save the uploaded file inside created folder
        move_uploaded_file(
            $_FILES['acstaff_img']['tmp_name'],
            $folderName . '/' . $new_name
        );




        echo '<script>';
        echo 'console.log("File added successfully!")';
        echo '</script>';

        //redirect to index.html
        //echo "<script>window.location.replace('./index.html')</script>";


        $img_loc = $folderName . '/' . $new_name;
        //echo "<script>console.log(".$img_loc .")</script>";

    }
    //end

    $acstaff_name = $mysqli->escape_string($_POST['acstaff_name']);
    $acstaff_title = $mysqli->escape_string($_POST['acstaff_title']);

    $acstaff_grade = $mysqli->escape_string($_POST['acstaff_grade']);
    $acstaff_role = $mysqli->escape_string($_POST['acstaff_role']);
    $acstaff_contact = $mysqli->escape_string($_POST['acstaff_contact']);
    $acstaff_email = $mysqli->escape_string($_POST['acstaff_email']);
    $acstaff_ava = $mysqli->escape_string($_POST['acstaff_ava']);
    $acstaff_des = $mysqli->escape_string($_POST['acstaff_des']);
    $acstaff_subject = $mysqli->escape_string($_POST['acstaff_subject']);

    //echo '<script>alert(hello' . $_FILES['acstaff_img']['name'] . ')</script>';

    $mysqli->query("INSERT INTO admin_staff(staff_name, staff_grade, staff_email, staff_contact, staff_des, staff_role, staff_img, staff_ava,staff_title,staff_subject) VALUES('$acstaff_name','$acstaff_grade','$acstaff_email','$acstaff_contact','$acstaff_des','$acstaff_role','$img_loc','$acstaff_ava','$acstaff_title','$acstaff_subject')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";




    header("location:../admin_staff_crud.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['error_up'] = "";

    $acstaff_id = $mysqli->escape_string($_GET['delete']);
    $del_img = $mysqli->query("SELECT staff_img from admin_staff WHERE staff_id = $acstaff_id") or die($mysqli->error);


    if (count(array($result)) == 1) {
        $row = $del_img->fetch_array();
        $img_path = $row['staff_img'];
        unlink($img_path);
    }


    $mysqli->query("DELETE FROM admin_staff WHERE staff_id = $acstaff_id ") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_staff_crud.php");
}

if (isset($_GET['edit'])) {
    $acstaff_id = $_GET['edit'];
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM admin_staff WHERE staff_id = $acstaff_id") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $acstaff_id = $row['staff_id'];
        $acstaff_name = $row['staff_name'];
        $acstaff_grade = $row['staff_grade'];
        $acstaff_role = $row['staff_role'];
        $acstaff_contact = $row['staff_contact'];
        $acstaff_email = $row['staff_email'];
        $acstaff_subject = $row['staff_subject'];
        $acstaff_title = $row['staff_title'];
        $acstaff_ava = $row['staff_ava'];
        //$acstaff_dec = $row['staff_des'];

        $_SESSION['txtdes']=  htmlspecialchars($row['staff_des']);
    }
}

if (isset($_POST['update'])) {
    $acstaff_id = $_POST['acstaff_id'];
    //delete section
    if ($_FILES['acstaff_img']['name']) {
        $del_img = $mysqli->query("SELECT staff_img from admin_staff WHERE staff_id = $acstaff_id") or die($mysqli->error);


        if (count(array($result)) == 1) {
            $row = $del_img->fetch_array();
            $img_path = $row['staff_img'];
            unlink($img_path);
        }
    }

    //end delete

    //file upload************
    if (file_exists("Uploads/" . $_FILES['acstaff_img']['name'])) {
        $_SESSION['error_up'] = " Image has not been uploaded!";
        //echo '<script>alert("File exists! Try again!")</script>';

        //redirect to index.html
        //echo "<script>window.location.replace('./index.html')</script>";
    } elseif ($_FILES['acstaff_img']['error'] > 0) {
        //Error on uploaded file
        $_SESSION['error_up'] = "Image has not been uploaded! ";
        echo 'Error Code: ' . $_FILES['acstaff_img']['error'] . '<br />';
    } else {
        $_SESSION['error_up'] = "";
        //create a directory for store uploads
        $folderName = '../Uploads';

        //mkdir($folderName);

        $path = $_FILES['acstaff_img']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $date = new DateTime();
        $new_name =  "image_up_" . $date->format('Y-m-d-H-i-s-ms') . "." . $ext;

        //save the uploaded file inside created folder
        move_uploaded_file(
            $_FILES['acstaff_img']['tmp_name'],
            $folderName . '/' . $new_name
        );


        echo '<script>';
        echo 'console.log("File added successfully!")';
        echo '</script>';

        //redirect to index.html
        //echo "<script>window.location.replace('./index.html')</script>";
        $img_loc = $folderName . '/' . $new_name;
        //echo "<script>console.log(".$img_loc .")</script>";

    }
    //end


    $acstaff_name = $mysqli->escape_string($_POST['acstaff_name']);
    $acstaff_title = $mysqli->escape_string($_POST['acstaff_title']);
    //$ac_name = $staff_title . $acstaff_name;

    $acstaff_grade = $mysqli->escape_string($_POST['acstaff_grade']);
    $acstaff_role = $mysqli->escape_string($_POST['acstaff_role']);
    $acstaff_contact = $mysqli->escape_string($_POST['acstaff_contact']);
    $acstaff_email = $mysqli->escape_string($_POST['acstaff_email']);
    $acstaff_ava = $mysqli->escape_string($_POST['acstaff_ava']);
    $acstaff_des = $mysqli->escape_string($_POST['acstaff_des']);
    $acstaff_subject = $mysqli->escape_string($_POST['acstaff_subject']);


    
    $qu = $img_loc ? "UPDATE admin_staff SET staff_name='$acstaff_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava',staff_subject = '$acstaff_subject',staff_title = '$acstaff_title' WHERE staff_id = $acstaff_id"
        : "UPDATE admin_staff SET staff_name='$acstaff_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_ava='$acstaff_ava',staff_subject = '$acstaff_subject',staff_title = '$acstaff_title' WHERE staff_id = $acstaff_id";
    $mysqli->query($qu)
        or die($mysqli->error);


        //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("location:../admin_staff_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
