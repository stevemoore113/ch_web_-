<?php 

	header("Content-Type: text/html; charset=utf-8");
  	include("connMysql.php");
  	include("type.php"); 
  	$base[1] = "upper_throw";
  	$sql_query = "INSERT INTO student ((s_key, s_id, s_name, s_sex, s_birthday, s_email, s_phone, s_address, s_high, s_weight, s_hand, s_foot, s_bmi, s_teacher, s_school, s_grade, s_class, s_obstacle, s_text, s_jointime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW()))";
  	$stmt = $db_link -> prepare($sql_query);
  	$data = explode(",",$_GET['data']);
	$count = count($data);
	$controller = 0;
	for ($i=0;$i<$count;$i+=20){
		$query_RecFindUser = "SELECT s_name FROM student WHERE s_name='{$data[$i+1]}' && s_birthday='{$data[$i+3]}";
		$RecFindUser=$db_link->query($query_RecFindUser);
		if ($RecFindUser->num_rows=0){
			echo "新增學生：".$data[$i+1]."時，帳號中已有重複的帳號在資料庫中，請先排除或聯絡相關人員處理";
			exit();
		}
	}
	for ($i=0;$i<$count;$i+=20){
		$query_RecFindUser = "SELECT s_name FROM student WHERE s_name='{$data[$i+1]}' && s_birthday='{$data[$i+3]}";
		$RecFindUser=$db_link->query($query_RecFindUser);
		$unikey = date("Ym").hexdec(uniqid());
		$stmt -> bind_param("sssssssssssssssssss",$unikey,$data[$i],$data[$i+1],$data[$i+2],$data[$i+3],$data[$i+4],$data[$i+5],$data[$i+6],$data[$i+7],$data[$i+8],$data[$i+9],$data[$i+10],$data[$i+11],$data[$i+12],$data[$i+13],$data[$i+14],$data[$i+15],$data[$i+16],$data[$i+17]);
		$stmt -> execute();
	}
	$stmt -> close();
	$db_link -> close();
	exit();

?>
