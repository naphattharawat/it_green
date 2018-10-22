<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "12345678";
$db_name = "admin_itgreen";

// connect
try {
  $conn = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
	$conn->exec("set names utf8");
//   echo "Connected to database";
}
catch (PDOException $e) {
  echo $e->getMessage();
}
?>
