<?php 

	$db_host = "localhost";
	$db_table = "ContestAn";
	$db_username = "root";
	//設定資料連線
	if (!@mysql_connect($db_host, $db_username)) die("資料連結失敗！");
	//連接資料庫
	if (!@mysql_select_db($db_table)) die("資料庫選擇失敗！");
	//設定字元集與連線校對
	mysql_query("SET NAMES 'utf8'");
?>
