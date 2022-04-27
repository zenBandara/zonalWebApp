<?php


require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
$general = '';
$institutes = '';
$staff = '';
$news = '';
$resources = '';


if (isset($_POST['save'])) {
   
    $general = $mysqli->real_escape_string($_POST['general']);
    $institutes = $mysqli->real_escape_string($_POST['institutes']);
    $staff = $mysqli->real_escape_string($_POST['staff']);
    $news = $mysqli->real_escape_string($_POST['news']);
    $resources = $mysqli->real_escape_string($_POST['resources']);
    

    $mysqli->query("UPDATE permission SET genaral='$general',institutes='$institutes',staff='$staff',news='$news',resources='$resources' WHERE id = 1") or
        die($mysqli->error);

    $_SESSION['msg'] = "Moderator-permissions have been updated!";
    //echo '<script>alert("Permissions have changed sucssesfully!");</script>';
    
   
    header("location:../user.php#permission");
    
}

?>
