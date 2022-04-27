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
$division = '';
$as_head = '';
$div_head = 'no';

$img_loc = null;
$folderName = '../Uploads/';
$update = false;



if (isset($_POST['save'])) {
    //file upload************
    if ($_FILES['acstaff_img']['error'] > 0) {
        $_SESSION['error_up'] = "Image has not been uploaded!";
        //Error on uploaded file
        echo 'Error Code: ' . $_FILES['acstaff_img']['error'] . '<br />';
    }else {
        $file_type = $_FILES['acstaff_img']['type'];
        $file = $_FILES['acstaff_img']['tmp_name'];



        $image_name_pre = "image_acstaff_";
        

        //disable image optimization
        if ($_POST['optimization'] == 'disable_opt') {

            
            list($width, $height) = getimagesize($file);

            $nwidth = $width;
            $nheight = $height;


            $newimage = imagecreatetruecolor($nwidth, $nheight);
            if ($file_type == 'image/jpeg') {
                $source = imagecreatefromjpeg($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc);
            } elseif ($file_type == 'image/png') {
                $source = imagecreatefrompng($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc);
            } elseif ($file_type == 'image/gif') {
                $source = imagecreatefromgif($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc);
            } elseif ($file_type == 'image/bmp') {
                $source = imagecreatefrombmp($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc);
            } elseif ($file_type == 'image/webp') {
                $source = imagecreatefrombmp($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc);
            }
        }
        //Low image optimization
        if ($_POST['optimization']  == 'low_opt') {
            $file = $_FILES['acstaff_img']['tmp_name'];
            list($width, $height) = getimagesize($file);

            $nwidth = $width;
            $nheight = $height;

            $newimage = imagecreatetruecolor($nwidth, $nheight);
            if ($file_type == 'image/jpeg') {
                $source = imagecreatefromjpeg($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            } elseif ($file_type == 'image/png') {
                $source = imagecreatefrompng($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            } elseif ($file_type == 'image/gif') {
                $source = imagecreatefromgif($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            } elseif ($file_type == 'image/bmp') {
                $source = imagecreatefrombmp($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            } elseif ($file_type == 'image/webp') {
                $source = imagecreatefrombmp($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            }
        }
        //High image optimization
        if ($_POST['optimization'] == 'high_opt') {

            $file = $_FILES['acstaff_img']['tmp_name'];
            list($width, $height) = getimagesize($file);

            $nwidth = $width;
            $nheight = $height;
            if ($width < 700 || $height < 500 || $height < 700 || $width < 500) {
                $nwidth = $width / 1;
                $nheight = $height / 1;
            } else if (($width < 1300 && $height < 800) || ($height < 1300 && $width < 800)) {
                $nwidth = $width / 2;
                $nheight = $height / 2;
            } else if (($width < 2000 && $height < 1100) || ($height < 2000 && $width < 1100)) {
                $nwidth = $width / 3;
                $nheight = $height / 3;
            } else if (($width < 2500 && $height < 1500) || ($height < 2500 && $width < 1500)) {
                $nwidth = $width / 4;
                $nheight = $height / 4;
            } else if (($width < 3000 && $height < 2000) || ($height < 3000 && $width < 2000)) {
                $nwidth = $width / 5;
                $nheight = $height / 5;
            } else if (($width < 3500 && $height < 2500) || ($height < 3500 && $width < 2500)) {
                $nwidth = $width / 6;
                $nheight = $height / 6;
            } else if (($width < 4500 && $height < 3000) || ($height < 4500 && $width < 3000)) {
                $nwidth = $width / 7;
                $nheight = $height / 7;
            } else if (($width < 5500 && $height < 3500) || ($height < 5500 && $width < 3500)) {
                $nwidth = $width / 8;
                $nheight = $height / 8;
            } else if (($width < 6500 && $height < 4000) || ($height < 6500 && $width < 4000)) {
                $nwidth = $width / 9;
                $nheight = $height / 9;
            } else if (($width < 7500 && $height < 4500) || ($height < 7500 && $width < 4500)) {
                $nwidth = $width / 10;
                $nheight = $height / 10;
            } else if (($width < 8500 && $height < 5000) || ($height < 8500 && $width < 5000)) {
                $nwidth = $width / 11;
                $nheight = $height / 11;
            } else {
                $nwidth = $width / 12;
                $nheight = $height / 12;
            }




            $newimage = imagecreatetruecolor($nwidth, $nheight);
            if ($file_type == 'image/jpeg') {
                $source = imagecreatefromjpeg($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            } elseif ($file_type == 'image/png') {
                $source = imagecreatefrompng($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            } elseif ($file_type == 'image/gif') {
                $source = imagecreatefromgif($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            } elseif ($file_type == 'image/bmp') {
                $source = imagecreatefrombmp($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            } elseif ($file_type == 'image/webp') {
                $source = imagecreatefrombmp($file);
                imagecopyresized($newimage, $source, 0, 0, 0, 0, $nwidth, $nheight, $width, $height);
                $file_name = $image_name_pre  . time() . '.webp';
                $img_loc = $folderName . $file_name;
                imagewebp($newimage, $img_loc, 30);
            }
        }
        
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
    $division = $mysqli->escape_string($_POST['division']);
    foreach ($_POST['as_head_arr'] as $head){
        $as_head = $head; 
        $as_head = $as_head == "t"? "1" : "0" ;
    }

    if (isset($_POST['div_head'])){
        $div_head = $mysqli->escape_string($_POST['div_head']);
    }
    

    //echo '<script>alert(hello' . $_FILES['acstaff_img']['name'] . ')</script>';

    $mysqli->query("INSERT INTO div_staff(staff_name, staff_grade, staff_email, staff_contact, staff_des, staff_role, staff_img, staff_ava,staff_title,staff_subject,division,as_head,div_head) VALUES('$acstaff_name','$acstaff_grade','$acstaff_email','$acstaff_contact','$acstaff_des','$acstaff_role','$img_loc','$acstaff_ava','$acstaff_title','$acstaff_subject','$division','$as_head','$div_head')");
    if (!($mysqli->errno)){
        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Record has not been saved! Head of the division <strong>" . $div_head. "</strong> already has been saved!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Record has not been saved!";
        $_SESSION['msg_type'] = "danger";
    }





    header("location:../admin_cruds/div_staff_crud.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['error_up'] = "";

    $acstaff_id = $mysqli->escape_string($_GET['delete']);
    $del_img = $mysqli->query("SELECT staff_img from div_staff WHERE staff_id = $acstaff_id") or die($mysqli->error);


    if (count(array($del_img)) == 1) {
        $row = $del_img->fetch_array();
        $img_path = $row['staff_img'];
        unlink($img_path);
    }


    $mysqli->query("DELETE FROM div_staff WHERE staff_id = $acstaff_id ") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/div_staff_crud.php");
}

if (isset($_GET['edit'])) {
    $acstaff_id = $_GET['edit'];
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM div_staff WHERE staff_id = $acstaff_id") or die($mysqli->error);
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
        $division = $row['division'];
        $as_head = $row['as_head'];
        $div_head = $row['div_head'];
        
        


        $_SESSION['txtdes'] =  htmlspecialchars($row['staff_des']);
    }
}

if (isset($_POST['update'])) {
    $acstaff_id = $_POST['acstaff_id'];
    //delete section
    if ($_FILES['acstaff_img']['name']) {
        $del_img = $mysqli->query("SELECT staff_img from div_staff WHERE staff_id = $acstaff_id") or die($mysqli->error);


        if (count(array($del_img)) == 1) {
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

    //division
    $division = $mysqli->escape_string($_POST['division']);
    
    foreach ($_POST['as_head_arr'] as $head){
        $as_head = $head; 
        $as_head = $as_head == "t"? "1" : "0" ;
    }

    if (isset($_POST['div_head'])){
        $div_head = $mysqli->escape_string($_POST['div_head']);
    }
    
    
    



    $qu = $img_loc ? "UPDATE div_staff SET staff_name='$acstaff_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava',staff_subject = '$acstaff_subject',staff_title = '$acstaff_title', division = '$division',as_head = '$as_head', div_head = '$div_head' WHERE staff_id = $acstaff_id"
        : "UPDATE div_staff SET staff_name='$acstaff_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_ava='$acstaff_ava',staff_subject = '$acstaff_subject',staff_title = '$acstaff_title',division = '$division',as_head = '$as_head', div_head = '$div_head' WHERE staff_id = $acstaff_id";
    $mysqli->query($qu);
    if (!($mysqli->errno)){
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Record has not been updated! Head of the division <strong>" . $div_head. "</strong> already has been saved!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Record has not been updated!";
        $_SESSION['msg_type'] = "danger";
    }


    //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'
    header("location:../admin_cruds/div_staff_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
