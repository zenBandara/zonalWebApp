<?php 

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$webStatus = $_POST['webStatus'];

	$sql = "UPDATE web_status SET status = '$webStatus' WHERE status_id = 1";
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Status successfully updated";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating info";
	}

	$connect->close();

	echo json_encode($valid);

}

?>