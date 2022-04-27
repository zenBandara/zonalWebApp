<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$mission = '';
$vision = '';





if (isset($_POST['save'])) {
    
    

    $mission = $mysqli->escape_string($_POST['mission']);
    $vision = $mysqli->escape_string($_POST['vision']);
    

    $qu_vision = "UPDATE contacts SET content='$vision' WHERE name = 'vision'";
    $mysqli->query($qu_vision);

    $qu_mission = "UPDATE contacts SET content='$mission' WHERE name = 'mission'";
    $mysqli->query($qu_mission);

    if (!($mysqli->errno)){
        $_SESSION['message'] = "Web Content info. has been updated!";
        $_SESSION['msg_type'] = "success";
    }else if ($mysqli->errno == 1062) {
        $_SESSION['message'] = "Web content info. already has been saved!";
        $_SESSION['msg_type'] = "danger";
    } else {
        $_SESSION['message'] = "Web content info. has not been updated! - ".$mysqli->errno;
        $_SESSION['msg_type'] = "danger";
    }

    header("location:../admin_cruds/additional_crud.php");
}

?>