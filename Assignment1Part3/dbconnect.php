<?php

error_reporting(0);
//parameters for database connection
$user = "testuser";
$password = "testuser";
$database = "assignment";
$host = "localhost";

$mysqli = mysqli_connect($host, $user, $password, $database);//connecting to database

if ($mysqli == false){
  header("location: sitedown.php");//redirecting if connection not established
}

error_reporting(E_ALL);

?>