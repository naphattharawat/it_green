<? require_once "config/config.php";  ?>
<?php

if($_POST['submit']!=null){
	$username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
	if($id){
		$update="update  user set username='".$username."',password='".$password."' where id=".$id;
		  $conn->query($update) or die($update);
          echo "<meta http-equiv=refresh content=0;URL=index.php?admin>";
	} else {
		$insert = "insert into user values (null,'".$username."','".$password."')";
		$conn->query($insert) or die($insert);
        echo "<meta http-equiv=refresh content=0;URL=index.php?admin>";
	}
}	
?>