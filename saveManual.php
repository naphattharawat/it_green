<? require_once "config/config.php";  ?>
<?php
	$id=$_POST['id'];
	$manualName = $_POST['manualName'];
	$desc = $_POST['desc'];
	$typeMamual = $_POST['type'];
	$targetfolder = "./upload/";
	date_default_timezone_set("Asia/Bangkok");
	$date = date_create();
	$name = date_timestamp_get($date);
	if($_FILES["file"]["name"]!=null){
		if($id){
			$update="update  manual set name='".$manualName."',description='".$desc."',type='".$type."' where id=".$id;
		      $conn->query($update) or die($update);
		      echo "update success";
		}
		$type = pathinfo(basename($_FILES['file']['name']),PATHINFO_EXTENSION);
		$targetfolder = $targetfolder . $name.".".$type;
		$file_type=$_FILES['file']['type'];
		if ($file_type=="application/pdf") {

		 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
		 {
			$insert="insert into manual values (null,
				'".$manualName."','".$name.".".$type."','".$targetfolder."','".$desc."','".$typeMamual."','N')";
		      $conn->query($insert) or die($insert);
		 echo "The file ". $_FILES['file']['name']." is uploaded";
		 }
		 else {
		 echo "Problem uploading file";
		 }
		}
		else {
		 echo "You may only upload PDFs.<br>";
		}
	} else {
		if($id){
			$update="update  manual set name='".$manualName."',description='".$desc."',type='".$typeMamual."' where id=".$id;
		      $conn->query($update) or die($update);
		      echo "<meta http-equiv=refresh content=0;URL=index.php?manualhci>";
		}
	}
?>