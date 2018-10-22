<?
$id = $_GET['id'];
$btn = "เพิ่ม pdf";
if($id != null){
	$result = $conn->query("SELECT * FROM manual where id = ".$id);
	if ($result !== false)
		{
			$row = $result->fetch();
			$manualName = $row['name'];
			$desc = $row['desc'];
			$type = $row['type'];
		}
	$btn = "แก้ไข pdf";
}

?>

    <ul class="list-group">
	    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    <style type="text/css">
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
</style>


        

	    <br>
	    <form action="saveManual.php" method="post" enctype="multipart/form-data">
<table style="width:100%;">
	<tr>
		<td>ชื่อคู่มือ</td>
		<td><input type="text" name="manualName" required style="width: 100%;" value="<?php echo $manualName?>"></td>
	</tr>
	<tr>
		<td>คำอธิบาย</td>
		<td><input type="text" name="desc" style="width: 100%;" value="<?php echo $desc?>"></td>
	</tr>
	<tr>
		<td>หมวดหมู่</td>
		<td>
			<select name="type"  style="width: 100%;">
				<option value="HCI" <?php if($type=='HCI'){echo "selected";}?> >HCI</option>
				<option value="ARUBA" <?php if($type=='ARUBA'){echo "selected";}?> >ARUBA</option>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="file" name="file" size="50" /></td>
	</tr>
</table>
<input type="hidden" name="id" value="<?php echo $id?>">
	<input type="submit" name="submit" value="<?php echo $btn;?>" style="background-color: #28a745;width: 100%;border-radius:4px 4px 4px 4px;">

	 </form>   

</ul>
<?php
if($_POST['submit']!=null){
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
			$update="update  manual set name='".$manualName."',description='".$desc."',type='".$type."' where id=".$id;
		      $conn->query($update) or die($update);
		      echo "<meta http-equiv=refresh content=0;URL=index.php?manualhci>";
		}
	}
}
?>