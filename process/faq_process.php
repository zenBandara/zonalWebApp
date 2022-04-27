<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/php_action/db_connect_client.php');
session_start();
$id = 0;
$question = '';
$answer = '';
$cat = '';

$update = false;

require_once 'faqcat_process.php';

if (isset($_POST['save'])) {

    $question = $mysqli -> real_escape_string($_POST['question']);
    $answer = $mysqli -> real_escape_string($_POST['answer']);
    $cat = $mysqli -> real_escape_string($_POST['cat']);
    

    //echo '<script>alert(hello' . $_FILES['acstaff_img']['name'] . ')</script>';

    $mysqli->query("INSERT INTO faq (question,answer,cat) VALUES('$question','$answer','$cat')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";


    header("location:../admin_cruds/faq_crud.php");
}

if (isset($_GET['delete'])) {
    

    $del_id = $_GET['delete'];

    $mysqli->query("DELETE FROM faq WHERE id = '$del_id'") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:../admin_cruds/faq_crud.php");
}

if (isset($_GET['edit'])) {
    $u_id = $mysqli->real_escape_string($_GET['edit']);
    $update = true;

    // if session error occurs, use ==>  $_SESSION['error_up'] ="";

    $result = $mysqli->query("SELECT * FROM faq WHERE id = '$u_id'") or die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $id = $row['id'];
        $_SESSION['txtq'] =  htmlspecialchars($row['question']);
        $_SESSION['txta'] =  htmlspecialchars($row['answer']);
        $cat = $row['cat'];
    }
}

if (isset($_POST['update'])) {
    $id = $mysqli -> real_escape_string($_POST['id']);
    $question = $mysqli -> real_escape_string($_POST['question']);
    $answer = $mysqli -> real_escape_string($_POST['answer']);
    $cat = $mysqli -> real_escape_string($_POST['cat']);



    $qu = "UPDATE faq SET question='$question',answer='$answer',cat = '$cat' WHERE id = $id";
       
    $mysqli->query($qu)
        or die($mysqli->error);


    //,staff_name='$ac_name',staff_grade='$acstaff_grade',staff_email='$acstaff_email',staff_contact='$acstaff_contact',staff_des='$acstaff_des',staff_role='$acstaff_role',staff_img='$img_loc',staff_ava='$acstaff_ava'

    $_SESSION['message'] = "Record has been Updated!";
    $_SESSION['msg_type'] = "warning";
    header("location:../admin_cruds/faq_crud.php");
}
    
    // if(isset($_POST['close'])){
    //     header("location:../staff_crud.php");

    // }

    ?>