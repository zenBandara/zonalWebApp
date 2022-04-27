<?php 	
require_once ($_SERVER['DOCUMENT_ROOT'] .'/config_mains/main.php');

// db connection
$mysqli = new mysqli($local_host, $db_username, $db_password, $db_name);

// check connection
if($mysqli->connect_error) {
  die("Connection Failed : " . $mysqli->connect_error);
  header("location:".$db_err_page);

} else {
// echo "Successfully connected";
}
