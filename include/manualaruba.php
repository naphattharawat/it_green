<?
$result = $conn->query("SELECT * FROM manual where type='ARUBA' and is_delete='N'");
include('script/THSplitLib/segment.php');
$admin = $_SESSION["admin"];
$segment = new Segment();
if(isset($_POST['btnSearch'])){
	$search = $_POST['search'];
	$rs = $segment->get_segment_array($search);
	$sql = "select DISTINCT id,name,nameServer,path,description,type,is_delete from (
			SELECT * from manual where type='ARUBA' and is_delete='N'and name like '%".$search."%'
			UNION ALL ";
	$sql.= "SELECT * FROM manual where type='ARUBA' and is_delete='N' and ( name like '%".$search."%'";
	foreach ($rs as $value) {
		$sql.= " or name like '%".$value."%' ";
	}
	$sql .= " ) ) as a ";
	$result = $conn->query($sql);
}	
?>

    <ul class="list-group">
    
<form method="post" style="width: 100%;">
<?php if ($admin == 'admin'){
   ?>
    <input type="text" name="search" class=" tt-query" autocomplete="off" spellcheck="false" placeholder="ค้นหาข้อมูลที่ต้องการ..." style="width:85%;height: 40px;">
    
      <input type="submit" name="btnSearch" value="ค้นหา" style="background-color: #28a745;border-radius:4px 4px 4px 4px;height: 40px;">
  
<?
}
?>

     </form>   

	    <br>
<?
		if ($result !== false)
		{
			while($row = $result->fetch())
			{
		
	
?>
	    
 <li class="list-group-item">
  	
  	<?php if($admin == 'admin'){ ?>
  	<span class="badge badge-danger" style="margin-top: 5px;">
  		<a href="./include/delete.php?id=<?php echo $row['id'];?>" style="color: white">	<i class="fa fa-trash"></i></a>
  	</span>
  	<span class="badge badge-warning" style="margin-top: 5px;">
  		<a href="?addmanual&id=<?php echo $row['id'];?>" style="color: white"><i class="fa fa-edit"></i></a>
  	</span>
		<?php } ?>
    <span class="badge badge-success" style="margin-top: 5px;">
    	<a href="<?php echo $row['path']?>" target="_blank" style="color: white"><i class="fa fa-eye"></i></a>
    </span>
    <? echo $row['name'] ?>
  </li>
  
 <?
		}
	}
	if($admin == 'admin'){ ?>
?>

  <a href="?addmanual"><li class="list-group-item bg-success text-white">
    <center>เพิ่ม PDF</center>
  </li></a>
	<?php } ?>
</ul>
