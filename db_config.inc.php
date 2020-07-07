<?php

$servername = "127.0.0.1";
$username = "root";
$password = "wiedlsql";
$dbname = "results";

try {
  $conn = new PDO("mysql:host=$servername;dbname=results", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
echo '<br><br><br><br>';

// $con = mysqli_connect($servername, $username, $password,$dbname);
// echo "Connected successfully";
// echo '<br><br><br><br><br><br><br><br>';
// if (!$con) {
//   die("Connection failed: " . mysqli_connect_error());
// }
