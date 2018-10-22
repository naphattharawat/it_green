<?
$id = $_GET['id'];
$btn = "เพิ่มผู้ใช้งาน";
if($id != null){
	$result = $conn->query("SELECT * FROM user where id = ".$id);
	if ($result !== false)
		{
			$row = $result->fetch();
			$username = $row['username'];
			$password = $row['password'];
		}
	$btn = "แก้ไขผู้ใช้งาน";
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
	    <form action="saveuser.php" method="post" enctype="multipart/form-data">
<table style="width:100%;">
	<tr>
		<td>ชื่อผู้ใช้งาน</td>
		<td><input type="text" name="username" required style="width: 100%;" value="<?php echo $username?>"></td>
	</tr>
	<tr>
		<td>รหัสผ่าน</td>
		<td><input type="password" name="password" required style="width: 100%;" value="<?php echo $password?>"></td>
	</tr>
</table>
<input type="hidden" name="id" value="<?php echo $id?>">
	<input type="submit" name="submit" value="<?php echo $btn;?>" style="background-color: #28a745;width: 100%;border-radius:4px 4px 4px 4px;">

	 </form>   

</ul>
