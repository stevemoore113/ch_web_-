<?php

	header("Content-Type: text/html; charset=utf-8");
	require_once("connMysql.php");

	$q = "SELECT count(*) AS Count FROM  `memberdata`";
    $result = mysql_query($q);
    $result = mysql_fetch_assoc($result);
    $count = $result['Count'];

	$count+=1;

	$school = 40503525;
	echo (string)$school."<br>";
	echo $count;
    $thing = "INSERT INTO `memberdata` (`ID` ,`ShNum` ,`Score`) VALUES ('".$count."',".$school.",0)";
	//mysql_query($thing);


?>