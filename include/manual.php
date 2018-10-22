<? require_once "config/config.php";  ?>
<?php
$file_pdf="";
if(isset($_GET['id']) && $_GET['id']!=""){
    $myb = $_GET['id'];
     $sql = "SELECT * FROM manual WHERE id='".$myb."'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $file_pdf = $row['path'];
}
?>
<embed width="500" height="500" name="plugin" src="<?=$file_pdf?>" type="application/pdf">
<a href="<?=$file_pdf?>">คลิกที่นี้เพื่อดาวน์โหลดไฟล์ PDF</a></div>
 
