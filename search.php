<? require_once "script/pdocrud.php";  
	$pdocrud = new PDOCrud();
	$data =  $pdocrud->getPDOModelObj()->select("manual");
?>

<?php
	foreach($data as $value) {
		$array[] = $value['name'];
	}
    echo json_encode($array);
?>
