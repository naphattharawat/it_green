<?php 
require_once "../config/config.php";
$id = $_GET['id'];
	$update="update manual set is_delete='Y' where id=".$id;
	$conn->query($update);
	header('Location: ../?manualhci');
?>