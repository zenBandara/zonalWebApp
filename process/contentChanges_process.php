<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$name = '';
$address = '';
$email = '';
$tel = '';
$dir_word = '';
$title = '';
$img_loc = null;
$ava ='';
$description = '';
$grade = '';
$folderName = '../Uploads/';




if (isset($_POST['save'])) {
    
    //delete section
    if ($_FILES['img']['name']) {
        $del_img = $mysqli->query("SELECT img_path from zone_dir WHERE id = 1") or die($mysqli->error);


        if (count(array($result)) == 1) {
            $row = $del_img->fetch_array();
            $img_path = $row['img_path'];
            unlink($img_path);
        }
    }

    //end delete

    //file upload
    if ($_FILES['img']['error'] > 0) {
        //Error on uploaded file
        $_SESSION['error_up'] = "Image has not been uploaded! ";
        echo 'Error Code: ' . $_FILES['img']['error'] . '<br />';
    } else {
        $file_type = $_FILES['img']['type'];
        $file = $_FILES['img']['tmp_name'];



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
            $file = $_FILES['img']['tmp_name'];
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

            $file = $_FILES['img']['tmp_name'];
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

    $address = $mysqli->escape_string($_POST['address']);
    $name = $mysqli->escape_string($_POST['name']);
    $email = $mysqli->escape_string($_POST['email']);
    $tel = $mysqli->escape_string($_POST['tel']);
    $dir_word = $mysqli->escape_string($_POST['dir_word']);
    $title = $mysqli->escape_string($_POST['title']);
    $img = $mysqli->escape_string($_POST['img']);
    $ava = $mysqli->escape_string($_POST['ava']);
    $grade = $mysqli->escape_string($_POST['grade']);
    $description = $mysqli->escape_string($_POST['desc']);


    $qu = $img_loc? "UPDATE zone_dir SET name='$name',address='$address',email='$email',tel='$tel',dir_word='$dir_word',title='$title', img_path='$img_loc', descrip = '$description', ava='$ava', grade = '$grade' WHERE id = 1":
        "UPDATE zone_dir SET name='$name',address='$address',email='$email',tel='$tel',dir_word='$dir_word',title='$title',descrip = '$description', ava='$ava', grade = '$grade' WHERE id = 1";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Zonal Director info. has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Zonal Director info. already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Zonal Director info. has not been updated!".$mysqli->errno;
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/contentChanges_crud.php");
}

?>