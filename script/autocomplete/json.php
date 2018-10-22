<?php 
	include "../../config/config.php";
    include '../../script/THSplitLib/segment.php';
	$keyword = $_GET["keyword"];
	//$row_num="a";
    $segment = new Segment();
    
    $rs = $segment->get_segment_array($keyword);
	$sql = "select DISTINCT id,name,nameServer,path,description,type,is_delete from (
			SELECT * from manual where type='HCI' and is_delete='N' and name like '%".$keyword."%'
			UNION ALL ";
	$sql.= "SELECT * FROM manual where type='HCI' and is_delete='N' and ( name like '%".$keyword."%'";
	foreach ($rs as $value) {
		$sql.= " or name like '%".$value."%' ";
	}
	$sql .= " ) ) as a ";

	$result = $conn->query($sql);
    $resultData = array();
    if ($result !== false)
    {
        while($row = $result->fetch())
        {
            array_push($resultData,$row);
        }
    }
    echo json_encode($resultData);

?>

