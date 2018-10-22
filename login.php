<? session_start(); 
require_once "config/config.php";  ?>
<?php

if($_POST['submit']!=null){
	$username = $_POST['username'];
    $password = $_POST['password'];
		$sql="select  * from user where username='".$username."'and password='".$password."'";
		$result = $conn->query($sql) or die($sql);
		if ($result !== false){
			if($row = $result->fetch()){
				$_SESSION["admin"] = "admin";
				echo "<meta http-equiv=refresh content=0;URL=index.php?admin>";
			} else {
				echo "<meta http-equiv=refresh content=0;URL=index.php?admin>";
			}
		} else {
			echo "<meta http-equiv=refresh content=0;URL=index.php?admin>";
		}

}	
?>