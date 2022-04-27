<?php 	

require_once ($_SERVER['DOCUMENT_ROOT'] .'/config_mains/main.php');
// db connection
$connect = new mysqli($local_host, $db_username, $db_password, $db_name);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>