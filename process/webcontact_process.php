<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();

$address = '';
$pno = '';
$fax = '';
$email = '';
$facebook = '';
$linkedin = '';
$youtube = '';
$twitter = '';




if (isset($_POST['address_save'])) {
    
    $address = $mysqli->real_escape_string($_POST['address']);
    $qu = "UPDATE contacts SET content='$address' WHERE name ='address'";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Address: <strong>".$address."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Address: <strong>" . $address . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: address has not been updated!".$mysqli->errno;
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/webcontact_crud.php");
}

if (isset($_POST['pno_save'])) {
    
    $pno = $mysqli->real_escape_string($_POST['pno']);
    $qu = "UPDATE contacts SET content='$pno' WHERE name ='pno'";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Phone Number: <strong>".$pno."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Phone Number: <strong>" . $pno . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Phone Number has not been updated!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/webcontact_crud.php");
}

if (isset($_POST['fax_save'])) {
    
    $fax = $mysqli->real_escape_string($_POST['fax']);
    $qu = "UPDATE contacts SET content='$fax' WHERE name ='fax'";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Fax Number: <strong>".$fax."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Fax Number: <strong>" . $fax . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Fax Number has not been updated!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/webcontact_crud.php");
}

if (isset($_POST['email_save'])) {
    
    $email = $mysqli->real_escape_string($_POST['email']);
    $qu = "UPDATE contacts SET content='$email' WHERE name ='email'";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Email: <strong>".$email."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Email: <strong>" . $email . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Email has not been updated!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/webcontact_crud.php");
}

if (isset($_POST['facebook_save'])) {
    
    $facebook = $mysqli->real_escape_string($_POST['facebook']);
    $qu = "UPDATE contacts SET content='$facebook' WHERE name ='facebook'";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Facebook Address: <strong>".$facebook."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Facebook Address: <strong>" . $facebook . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Facebook address has not been updated!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/webcontact_crud.php");
}
if (isset($_POST['linkedin_save'])) {
    
    $linkedin = $mysqli->real_escape_string($_POST['linkedin']);
    $qu = "UPDATE contacts SET content='$linkedin' WHERE name ='linkedin'";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Linkedin Address: <strong>".$linkedin."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Linkedin Address: <strong>" . $linkedin . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Linkedin address has not been updated!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/webcontact_crud.php");
}

if (isset($_POST['youtube_save'])) {
    
    $youtube = $mysqli->real_escape_string($_POST['youtube']);
    $qu = "UPDATE contacts SET content='$youtube' WHERE name ='youtube'";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Youtube Address: <strong>".$youtube."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Youtube Address: <strong>" . $youtube . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Youtube address has not been updated!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/webcontact_crud.php");
}

if (isset($_POST['twitter_save'])) {
    
    $twitter = $mysqli->real_escape_string($_POST['twitter']);
    $qu = "UPDATE contacts SET content='$twitter' WHERE name ='twitter'";
    $mysqli->query($qu);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Twitter Address: <strong>".$twitter."</strong> has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Twitter Address: <strong>" . $twitter . "</strong> already has been saved! Try another!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Error: Twitter address has not been updated!";
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/webcontact_crud.php");
}

?>
    