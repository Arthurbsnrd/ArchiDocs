<?php
//connection locale
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "archidocs";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
  // set the PDO error mode to
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("SET NAMES utf8");
//  echo "successfully connected";
} catch(PDOException $e) {
  echo  "<br>" . $e->getMessage();
}

?>

