<?
$result = $conn->query("SELECT * FROM user ");
// $_SESSION["admin"] = "admin";
?>
 <ul class="list-group">
	    
   
 <!-- <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="ค้นหาข้อมูลที่ต้องการ..." style="width:100%;height: 40px"> -->

<br>
<table>
    <tr>
        <td>ชื่อผู้ใช้งาน</td>
        <td></td>
    </tr>
    <?
    if ($result !== false)
    {
        while($row = $result->fetch())
        {
            ?>
            <tr>
                <td><? echo $row['username'] ?></td>
                <td>
                <span class="badge badge-warning" style="margin-top: 5px;">
  		<a href="?addadmin&id=<?php echo $row['id'];?>" style="color: white"><i class="fa fa-edit"></i></a>
  	</span>
                <span class="badge badge-danger" style="margin-top: 5px;">
  		            <a href="./include/deleteUser.php?id=<?php echo $row['id'];?>" style="color: white">	<i class="fa fa-trash"></i></a>
            	</span>
                </td>
            </tr>
            <?
        }
    }
    ?>
</table>
<a href="?addadmin"><li class="list-group-item bg-success text-white">
    <center>เพิ่ม Admin</center>
  </li></a>
