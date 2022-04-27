<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$userName = $_POST['userName'];
	$upassword = password_hash($_POST['upassword'], PASSWORD_DEFAULT);
	$uemail = $_POST['uemail'];
	$authVal = 0;

	$username_value = $connect->query("SELECT * FROM users WHERE username='$userName'");
	$email_value = $connect->query("SELECT * FROM users WHERE email='$uemail'");

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
		$sql = "INSERT INTO users (username, password,email) 
				VALUES ('$userName', '$upassword' , '$uemail')";
		if ($connect->query($sql) === TRUE) {
			$valid['success'] = true;
			$valid['messages'] = "Moderator has been successfully added";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error while adding the members";
		}
	} elseif ($authVal == 2) {
		$valid['success'] = false;
		$valid['messages'] = "Username and Email already exist";
	}





	// /else	

} // if in_array 		

$connect->close();

echo json_encode($valid);
