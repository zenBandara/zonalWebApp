<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$img_title = '';
$category = '';
$img_loc = null;
$folderName = '../Uploads/';
$update = false;





if (isset($_POST['save'])) {
    
    //file upload
    if ($_FILES['gal_img']['error'] > 0) {
        $_SESSION['error_up'] = "Image has not been uploaded!";
        //Error on uploaded file
        echo 'Error Code: ' . $_FILES['gal_img']['error'] . '<br />';
    } else {
        $file_type = $_FILES['gal_img']['type'];
        $file = $_FILES['gal_img']['tmp_name'];



        $image_name_pre = "image_gallery_";
        

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
            $file = $_FILES['gal_img']['tmp_name'];
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

            $file = $_FILES['gal_img']['tmp_name'];
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


    $img_title = $mysqli->real_escape_string($_POST['img_title']);
    $category = $_POST['category'];
    



    $mysqli->query("INSERT INTO img_gallery(img_title,img_path,category) VALUES('$img_title','$img_loc','$category')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    


    header("location:../admin_cruds/image_crud.php");
}

if (isset($_GET['delete'])) {
    $_SESSION['error_up'] = "";

    $id = $mysqli->real_escape_string($_GET['delete']);
    $del_img = $mysqli->query("SELECT img_path from img_gallery WHERE id = $id") or die($mysqli->error);


    if (count(array($del_img)) == 1) {
        $row = $del_img->fetch_array();
        $img_path = $row['img_path'];
        unlink($img_path);
    }


    $mysqli->query("DELETE FROM img_gallery WHERE id = $id ") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location:../admin_cruds/image_crud.php");
}

if (isset($_GET['edit'])) {
    $idU = $mysqli->real_escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $resultU = $mysqli->query("SELECT * FROM img_gallery WHERE id = $idU") or die($mysqli->error);
    if (count(array($resultU)) == 1) {
        $row = $resultU->fetch_array();
        $id = $row['id'];
        $img_title = $row['img_title'];
        $category = $row['category'];
        //echo $img_title.'---image title---';
    }
}

if (isset($_POST['update'])) {
    $id = $mysqli->real_escape_string($_POST['id']);
    //delete section
    if ($_FILES['gal_img']['name']) {
        $del_img = $mysqli->query("SELECT img_title from img_gallery WHERE id = $id") or die($mysqli->error);


        if (count(array($del_img)) == 1) {
            $row = $del_img->fetch_array();
            $img_path = $row['img_path'];
            unlink($img_path);
        }
    }

    //end delete

    //file upload************
    if ($_FILES['gal_img']['error'] > 0) {
        $_SESSION['error_up'] = "Image has not been uploaded!";
        //Error on uploaded file
        echo 'Error Code: ' . $_FILES['gal_img']['error'] . '<br />';
    } else {
        $file_type = $_FILES['gal_img']['type'];
        $file = $_FILES['gal_img']['tmp_name'];



        $image_name_pre = "image_gallery_";
        

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
            $file = $_FILES['gal_img']['tmp_name'];
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

            $file = $_FILES['gal_img']['tmp_name'];
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


  
    $img_title = $mysqli->real_escape_string($_POST['img_title']);
    $category = $mysqli->real_escape_string($_POST['category']);
    

    $qu = $img_loc ? "UPDATE img_gallery SET img_title='$img_title',category='$category',img_path='$img_loc' WHERE id = $id"
        : "UPDATE img_gallery SET img_title='$img_title',category='$category' WHERE id = $id";
    $mysqli->query($qu)
        or die($mysqli->error);


        //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    
    header("location:../admin_cruds/image_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }
