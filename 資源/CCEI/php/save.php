<?php
	header("Content-Type: text/html; charset=utf-8");
  	include("connMysql.php");
  	include("type.php"); 
  	$base[1] = "upper_throw";
  	$sql_query = "INSERT INTO ".$_GET['type']." (".struct($_GET['type']).") VALUES (".StructValue($_GET['type']).")";
  	$stmt = $db_link -> prepare($sql_query);
  	$data = explode(",",$_GET['data']);
	$count = count($data);
	$controller = 0;
	
	switch ($_GET['type']) {
		case 'upper_throw':
			for ($i=0;$i<$count;$i+=StructLength($_GET['type'])){
				$stmt -> bind_param("sssssss",$data[$i],$data[$i+1],$data[$i+2],$data[$i+3],$data[$i+4],$data[$i+5],$data[$i+6]);
				if ($data[$i] != '')
					$stmt -> execute();
			}
			break;
			
		case 'lower_shot':
			for ($i=0;$i<$count;$i+=StructLength($_GET['type'])){
				$stmt -> bind_param("sssss",$data[$i],$data[$i+1],$data[$i+2],$data[$i+3],$data[$i+4]);
				if ($data[$i] != '')
					$stmt -> execute();
			}
			break;
		case 'lower_kick':
			for ($i=0;$i<$count;$i+=StructLength($_GET['type'])){
				$stmt -> bind_param("ssssssss",$data[$i],$data[$i+1],$data[$i+2],$data[$i+3],$data[$i+4],$data[$i+5],$data[$i+6],$data[$i+7]);
				if ($data[$i] != '')
					$stmt -> execute();
			}
			break;
		case 'scrollball':
			for ($i=0;$i<$count;$i+=StructLength($_GET['type'])){
				$stmt -> bind_param("ssssssss",$data[$i],$data[$i+1],$data[$i+2],$data[$i+3],$data[$i+4],$data[$i+5],$data[$i+6],$data[$i+7]);
				if ($data[$i] != '')
					$stmt -> execute();
			}
			break;
		case 'upper_take':
			for ($i=0;$i<$count;$i+=StructLength($_GET['type'])){
				$stmt -> bind_param("sssss",$data[$i],$data[$i+1],$data[$i+2],$data[$i+3],$data[$i+4]);
				if ($data[$i] != '')
					$stmt -> execute();
			}
			break;	
		default:
			echo "上傳時發生問題";
			$controller = 1;
			break;
		}
	/**/
	
	$stmt -> close();
	$db_link -> close();
	if ($controller == 0)
		echo "成功上傳";
?>