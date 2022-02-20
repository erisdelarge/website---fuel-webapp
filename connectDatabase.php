<?php

// $databaseHost = '127.0.0.1';//or localhost
// $databaseName = 'project'; // your db_name
// $databaseUsername = 'root'; // root by default for localhost 
// $databasePassword = '';  // by defualt empty for localhost
$servername = "localhost";
$username = 'federicapietrolungo';
$password = '';
$dbname = 'my_federicapietrolungo';
// $servername = "localhost";
// $username = 'pzstqwxs_wp406';
// $password = '!j@0M5)860H]p7(S';
// $dbname = 'pzstqwxs_wp406';

// $mysqli = mysqli_connect($servername, $username, $password, $dbname);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
?>