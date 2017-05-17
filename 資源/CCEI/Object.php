<?php 
	header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
	$sql_query = "SELECT * FROM memberdata";
	$result = $db_link->query($sql_query);
	
	while($row_result = $result->fetch_row()){
		foreach($row_result as $item=>$value){
			echo $item."=".$value."<br>";
		}
		echo "<hr>";
	}
	
	$db_link->close();
?>