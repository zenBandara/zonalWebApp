<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] .'/config_mains/main.php');
    // // Declare DB Variables
    // $servername  = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "blog";

    // // Create connection
    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $GLOBALS['conn'] = $conn;

    // } catch(PDOException $e) {
    //     $GLOBALS['e'] = $e;
    //     echo "Connection failed: " . $e->getMessage();
    // }


    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */


    define('DB_SERVER', $local_host);
    define('DB_USERNAME', $db_username);
    define('DB_PASSWORD', $db_password);
    define('DB_NAME', $db_name);

    // define('DB_SERVER', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'crud');

    /* Attempt to connect to MySQL database */
    try{
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $GLOBALS['conn'] = $pdo;

    } catch(PDOException $e){
        $GLOBALS['e'] = $e;
        die("ERROR: Could not connect. " . $e->getMessage());
    }

