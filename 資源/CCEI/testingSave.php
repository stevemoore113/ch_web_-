<?php
	header("Content-Type: text/html; charset=utf-8");
  	include("php/connMysql.php");
  	$base[1] = "upper_throw";
  	$sql_query = "INSERT INTO studentId (id) VALUES (?)";
  	$stmt = $db_link -> prepare($sql_query);
  	$data = explode(",",$_GET['data']);
	$count = count($data);
	echo $count;
	$controller = 0;
	
	for ($i=0;$i<$count;$i+=1){
		$stmt -> bind_param("s",$data[$i]);
		if ($data[$i] != '')
			$stmt -> execute();
	}
			
		
	/**/
	
	$stmt -> close();
	$db_link -> close();
	if ($controller == 0)
		echo "成功上傳";
?>