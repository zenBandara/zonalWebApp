<?php 

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$uemail = $_POST['uemail'];
	$userId = $_POST['user_id'];

	$sql = "UPDATE users SET email = '$uemail' WHERE user_id = {$userId}";
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating info";
	}

	$connect->close();

	echo json_encode($valid);

}

?>