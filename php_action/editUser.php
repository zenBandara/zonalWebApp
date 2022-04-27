<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
	$edituserName = $_POST['edituserName'];
	$editPassword = password_hash($_POST['editPassword'], PASSWORD_DEFAULT);
	$editEmail = $_POST['editEmail'];
	$userid = $_POST['userid'];
	$authVal = 0;


	$username_value = $connect->query("SELECT * FROM users WHERE username='$edituserName'");
	$email_value = $connect->query("SELECT * FROM users WHERE email='$editEmail'");

	if ($username_value->num_rows >= 1) {
		$authVal = $authVal + 1;
		$valid['success'] = false;
		$valid['messages'] = "Username already exists";
	}

	if ($email_value->num_rows >= 1) {
		$authVal = $authVal + 1;
		$valid['success'] = false;
		$valid['messages'] = "Email already exists";
	}



	if ($authVal == 0) {
		$sql = "UPDATE users SET username = '$edituserName', password = '$editPassword', email ='$editEmail'  WHERE user_id = $userid ";

		if ($connect->query($sql) === TRUE) {
			$valid['success'] = true;
			$valid['messages'] = "Successfully Update";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error while updating moderator's infomation";
		}
	}
} // /$_POST

$connect->close();

echo json_encode($valid);
