<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$census_no  = 0;
$sch_name = '';
$sch_div = '';
$sch_principal = '';
$principal_title = '';
$sch_grades = '';
$sch_email = '';
$sch_address = '';
$sch_tel = '';
$sch_type = '';
$sin_st = '';
$tam_st = '';
$eng_st = '';
$sin_tea = '';
$tam_tea = '';
$eng_tea = '';

$img_loc = null;
$folderName = '../Uploads/';
$update = false;


if (isset($_POST['save'])) {
    //file upload************
    if (file_exists("Uploads/" . $_FILES['sch_img']['name'])) {
        $_SESSION['error_up'] = "Image has not been uploaded!";
        //redirect to index.html
        //echo "<script>window.location.replace('./index.html')</script>";
        //$img_loc = $folderName . '/' . 'default.png';
    } elseif ($_FILES['sch_img']['error'] > 0) {
        $_SESSION['error_up'] = "Image has not been uploaded!";
        //Error on uploaded file
        echo 'Error Code: ' . $_FILES['sch_img']['error'] . '<br />';
    } else {
        $file_type = $_FILES['sch_img']['type'];
        $file = $_FILES['sch_img']['tmp_name'];



        $image_name_pre = "image_school_";
        

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
            $file = $_FILES['sch_img']['tmp_name'];
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

            $file = $_FILES['sch_img']['tmp_name'];
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

    $census_no  = $mysqli->real_escape_string($_POST['census_no']);
    $sch_name = $mysqli->real_escape_string($_POST['sch_name']);

    //img
    $sch_div = $mysqli->real_escape_string($_POST['sch_div']);
    $sch_principal = $mysqli->real_escape_string($_POST['sch_principal']);
    $principal_title = $mysqli->real_escape_string($_POST['principal_title']);
    $sch_grades = $mysqli->real_escape_string($_POST['sch_grades']);
    $sch_email = $mysqli->real_escape_string($_POST['sch_email']);
    $sch_address = $mysqli->real_escape_string($_POST['sch_address']);
    $sch_tel = $mysqli->real_escape_string($_POST['sch_tel']);
    $sch_type = $mysqli->real_escape_string($_POST['sch_type']);
    $sin_st = $mysqli->real_escape_string($_POST['sin_st']);
    $tam_st = $mysqli->real_escape_string($_POST['tam_st']);
    $eng_st = $mysqli->real_escape_string($_POST['eng_st']);
    $sin_tea = $mysqli->real_escape_string($_POST['sin_tea']);
    $tam_tea = $mysqli->real_escape_string($_POST['tam_tea']);
    $eng_tea = $mysqli->real_escape_string($_POST['eng_tea']);


    //echo '<script>alert(hello' . $_FILES['acstaff_img']['name'] . ')</script>';
    $created_time = time();

    $mysqli->query("INSERT INTO school(census_no, sch_name, sch_img, sch_div, sch_principal, principal_title, sch_grades, sch_email,sch_address,sch_tel,sch_type,sin_st,tam_st,eng_st,sin_tea,tam_tea,eng_tea,created_time) VALUES('$census_no','$sch_name','$img_loc','$sch_div','$sch_principal','$principal_title','$sch_grades','$sch_email','$sch_address','$sch_tel','$sch_type','$sin_st','$tam_st','$eng_st','$sin_tea','$tam_tea','$eng_tea','$created_time')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";




    header("location:../admin_cruds/school_crud.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['error_up'] = "";

    $census_no = $mysqli->real_escape_string($_GET['delete']);
    $del_img = $mysqli->query("SELECT sch_img from school WHERE census_no  = $census_no") or die($mysqli->error);


    if (count(array($del_img)) == 1) {
        $row = $del_img->fetch_array();
        $img_path = $row['sch_img'];
        unlink($img_path);
    }


    $mysqli->query("DELETE FROM school WHERE census_no = $census_no ") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location:../admin_cruds/school_crud.php");
}

if (isset($_GET['edit'])) {
    $census_no_get = $mysqli->real_escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM school WHERE census_no = $census_no_get") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();


        $census_no  = $row['census_no'];
        $sch_name = $row['sch_name'];

        //img
        $sch_div = $row['sch_div'];
        $sch_principal = $row['sch_principal'];
        $principal_title = $row['principal_title'];
        $sch_grades = $row['sch_grades'];
        $sch_email = $row['sch_email'];
        $sch_address = $row['sch_address'];
        $sch_tel = $row['sch_tel'];
        $sch_type = $row['sch_type'];
        $sin_st = $row['sin_st'];
        $tam_st = $row['tam_st'];
        $eng_st = $row['eng_st'];
        $sin_tea = $row['sin_tea'];
        $tam_tea = $row['tam_tea'];
        $eng_tea = $row['eng_tea'];
    }
    $_SESSION['ed_no'] = $census_no;
}

if (isset($_POST['update'])) {
    $census_no_get = $_SESSION['ed_no'];
    $census_no = $mysqli->real_escape_string($_POST['census_no']);
  
    //delete section
    if ($_FILES['sch_img']['name']) {
        $del_img = $mysqli->query("SELECT sch_img from school WHERE census_no = $census_no") or die($mysqli->error);


        if (count(array($del_img)) == 1) {
            $row = $del_img->fetch_array();
            $img_path = $row['sch_img'];
            unlink($img_path);
        }
    }

    //end delete

    //file upload************
    if ($_FILES['sch_img']['error'] > 0) {
        //Error on uploaded file
        $_SESSION['error_up'] = "Image has not been uploaded! ";
        echo 'Error Code: ' . $_FILES['sch_img']['error'] . '<br />';
    } else {
        $file_type = $_FILES['sch_img']['type'];
        $file = $_FILES['sch_img']['tmp_name'];



        $image_name_pre = "image_school_";
        

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
            $file = $_FILES['sch_img']['tmp_name'];
            
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
            $file = $_FILES['sch_img']['tmp_name'];

            
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




    $census_no_u  = $mysqli->real_escape_string($_POST['census_no']);

    $sch_name = $mysqli->real_escape_string($_POST['sch_name']);

    $sch_div = $mysqli->real_escape_string($_POST['sch_div']);
    $sch_principal = $mysqli->real_escape_string($_POST['sch_principal']);
    $principal_title = $mysqli->real_escape_string($_POST['principal_title']);
    $sch_grades = $mysqli->real_escape_string($_POST['sch_grades']);
    $sch_email = $mysqli->real_escape_string($_POST['sch_email']);
    $sch_address = $mysqli->real_escape_string($_POST['sch_address']);
    $sch_tel = $mysqli->real_escape_string($_POST['sch_tel']);
    $sch_type = $mysqli->real_escape_string($_POST['sch_type']);
    $sin_st = $mysqli->real_escape_string($_POST['sin_st']);
    $tam_st = $mysqli->real_escape_string($_POST['tam_st']);
    $eng_st = $mysqli->real_escape_string($_POST['eng_st']);
    $sin_tea = $mysqli->real_escape_string($_POST['sin_tea']);
    $tam_tea = $mysqli->real_escape_string($_POST['tam_tea']);
    $eng_tea = $mysqli->real_escape_string($_POST['eng_tea']);



    $qu = $img_loc ? "UPDATE school SET sch_img='$img_loc',census_no='$census_no',sch_name = '$sch_name',sch_div='$sch_div',sch_principal='$sch_principal',principal_title='$principal_title',sch_grades='$sch_grades',sch_email='$sch_email',sch_address='$sch_address',sch_tel='$sch_tel',sch_type='$sch_type',sin_st='$sin_st',tam_st='$tam_st',eng_st='$eng_st',sin_tea='$sin_tea',tam_tea='$tam_tea',eng_tea='$eng_tea' WHERE census_no = $census_no_get"
        : "UPDATE school SET census_no='$census_no',sch_name = '$sch_name',sch_div='$sch_div',sch_principal='$sch_principal',principal_title='$principal_title',sch_grades='$sch_grades',sch_email='$sch_email',sch_address='$sch_address',sch_tel='$sch_tel',sch_type='$sch_type',sin_st='$sin_st',tam_st='$tam_st',eng_st='$eng_st',sin_tea='$sin_tea',tam_tea='$tam_tea',eng_tea='$eng_tea' WHERE census_no = $census_no_get";
    $mysqli->query($qu);
    if (!$mysqli->errno) {
        $_SESSION['message'] = "Record has been Updated!";
        $_SESSION['msg_type'] = "warning";
    } elseif ($mysqli->errno == 1062) {
        print 'no way!';
        $_SESSION['message'] = "Duplicate entry for Census no. has been detected! Try another one!";
        $_SESSION['msg_type'] = "warning";
    }else{

        $_SESSION['message'] = "Database has not been updated!";
        $_SESSION['msg_type'] = "danger";
        
    }




    unset($_SESSION['ed_no']);
    header("location:../admin_cruds/school_crud.php");
}
