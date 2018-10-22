    
	    
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="typeahead.min.js"></script> -->


	<ul class="list-group">

	    <br>
	    <form action="login.php" method="post">
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
	<input type="submit" name="submit" value="เข้าสู่ระบบ" style="background-color: #28a745;width: 100%;border-radius:4px 4px 4px 4px;">

	 </form>   

</ul>
