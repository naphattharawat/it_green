<?php 
require_once "../config/config.php";
$id = $_GET['id'];
	$update="delete from user where id=".$id;
	$conn->query($update) or die($update);
	header('Location: ../?admin');
?>