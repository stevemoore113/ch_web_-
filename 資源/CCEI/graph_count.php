<?php
	include("php/type.php");
	require_once("php/connMysql.php");

	$query_RecMember = "SELECT * FROM student WHERE `s_id` = {$_GET['id']}";
	$studentInfo = $db_link->query($query_RecMember);

	$studentInfo=$studentInfo->fetch_assoc();

	/*
	echo "upper_take: ".$_GET["upper_take"]."<br>";
	echo "<br>"."upper_throw: ".$_GET["upper_throw"]."<br>";
	echo "<br>"."scrollball: ".$_GET["scrollball"]."<br>";
	echo "<br>"."lower_kick: ".$_GET["lower_kick"]."<br>";
	echo "<br>"."lower_shot: ".$_GET["lower_shot"]."<br>";
	*/
	$personThrow["number"] = [];
	$personThrow["reflection"] = [];
	$personThrow["time"] = [];
	$personThrow["distance"] = [];
	$personThrow["catch"] = [];
	$personTake["type"] = [];
	$personTake["number"] = [];
	$personTake["reflection"] = [];
	$personScroll["type"] = [];
	$personScroll["number"] = [];
	$personScroll["time"] = [];
	$personScroll["distance"] = [];
	$personScroll["catch"] = [];
	$personScroll["reflection"] = [];
	$personShot["number"] = [];
	$personShot["reflection"] = [];
	$personShot["angle"] = [];
	$personKick["type"] = [];
	$personKick["number"] = [];
	$personKick["reflection"] = [];
	$personKick["distance"] = [];
	$personKick["outs"] = [];
	$personKick["time"] = [];
	$Data_up = [];
    $Data_low = [];
    $count = 0;
    $F = 'F';
    $T = 'T';

	//把拿到的data整理成陣列
	$str = explode(",",$_GET["upper_throw"]);
	for ($i =0; $i<sizeof($str); $i+=7){
		array_push($personThrow["number"],(float)$str[$i+1]);
		array_push($personThrow["reflection"],(float)$str[$i+2]);
		array_push($personThrow["time"],(float)$str[$i+3]);
		array_push($personThrow["distance"],(float)$str[$i+4]);
		array_push($personThrow["catch"],$str[$i+5]);
	}

	$str = explode(",",$_GET["upper_take"]);
	for ($i =0; $i<sizeof($str); $i+=5){
		array_push($personTake["type"],(float)$str[$i+1]);
		array_push($personTake["number"],(float)$str[$i+2]);
		array_push($personTake["reflection"],(float)$str[$i+3]);
	}

	$str = explode(",",$_GET["scrollball"]);
	for ($i =0; $i<sizeof($str); $i+=8){
		array_push($personScroll["type"],$str[$i+1]);
		array_push($personScroll["number"],(float)$str[$i+2]);
		array_push($personScroll["time"],(float)$str[$i+3]);
		array_push($personScroll["distance"],(float)$str[$i+4]);
		array_push($personScroll["catch"],$str[$i+5]);
		array_push($personScroll["reflection"],(float)$str[$i+6]);
	}

	$str = explode(",",$_GET["lower_shot"]);
	for ($i =0; $i<sizeof($str); $i+=5){
		array_push($personShot["number"],(float)$str[$i+1]);
		array_push($personShot["reflection"],(float)$str[$i+2]);
		array_push($personShot["angle"],(float)$str[$i+3]);
	}

	$str = explode(",",$_GET["lower_kick"]);
	for ($i =0; $i<sizeof($str); $i+=8){
		array_push($personKick["type"],$str[$i+1]);
		array_push($personKick["number"],(float)$str[$i+2]);
		array_push($personKick["reflection"],(float)$str[$i+3]);
		array_push($personKick["distance"],(float)$str[$i+4]);
		array_push($personKick["outs"],(float)$str[$i+5]);
		array_push($personKick["time"],(float)$str[$i+6]);
	}
	/*
	print_r($personKick);
	print_r($personThrow);
	print_r($personScroll);
	print_r($personTake);
	print_r($personShot);
	echo "<br><br>";
	*/

	//個人上肢
	$Data_up["reactionTime"] = (array_sum($personThrow["reflection"])/sizeof($personThrow["reflection"])+array_sum($personTake["reflection"])/sizeof($personTake["reflection"]))/2;
	$Data_up["coordination"] = (array_sum($personThrow["time"])/sizeof($personThrow["time"])+array_sum($personScroll["time"])/sizeof($personScroll["time"]))/2;
	foreach ($personThrow["distance"] as $value) {
		if ($value > 1.5)
			$count++;
	}
	$Data_up["Accuracy"] = $count/sizeof($personThrow["distance"]);

	$successThrow = array_count_values($personThrow["catch"]);
	$successScroll = array_count_values($personScroll["catch"]);
	$Data_up["successfulRate"] = ($successThrow["F"]+$successScroll["F"])/2;
	$Data_up["BMI"] = $studentInfo["s_bmi"];
	
	//處理個人下肢
	$Data_low["reactionTime"] = (array_sum($personKick["reflection"])/sizeof($personKick["reflection"])+array_sum($personShot["reflection"])/sizeof($personShot["reflection"]))/2;

	$stright = 0;
	$z = 0;
	for ($i=0; $i < sizeof($personKick["type"]); $i++) { 
		if ($personKick["type"][$i]=='1') {
			$stright += $personKick["time"][$i];
		}else
			$z += $personKick["time"][$i];
	}
	$wordcount = array_count_values($personKick["type"]);
	$Data_low["coordination"] = ($stright/$wordcount["1"]+$z/$wordcount["2"])/2;
	$sum = 0;
	foreach ($personShot["angle"] as $value) 
		$sum += abs($value);
	$Data_low["Accuracy"] = $sum/sizeof($personShot["angle"]);
	$stright = 0;
	$z = 0;
	for ($i=0; $i < sizeof($personKick["type"]); $i++) { 
		if ($personKick["type"][$i]=='1') {
			$stright += $personKick["outs"][$i];
		}else
			$z += $personKick["outs"][$i];
	}
	$wordcount = array_count_values($personKick["type"]);
	$Data_low["successfulRate"] = ($stright/$wordcount["1"]+$z/$wordcount["2"])/2;
	$Data_low["BMI"] = $studentInfo["s_bmi"];
	/*
	print_r($Data_up);
	echo "<br>";
	print_r($Data_low);
	echo "<br>";
	*/

	//testingURL: http://localhost/ccei/graph_count.php?id=1003&upper_take=1003,1,1,1.241,2016-11-14,1003,1,2,1.063,2016-11-14,1003,1,2,1.167,2016-11-14,1003,1,1,1.252,2016-11-14,1003,1,1,1.176,2016-11-14,1003,1,1,1.199,2016-11-14,1003,1,3,1.35,2016-11-14,1003,1,3,0.995,2016-11-14,1003,1,3,0.95,2016-11-14&upper_throw=1003,1,0.881,0.477,0.279,F,2016-11-14,1003,2,0.888,0.663,0.538,F,2016-11-14,1003,3,0.896,0.741,0.673,T,2016-11-14,1003,4,1.019,0.698,0.597,F,2016-11-14&scrollball=1003,1,1,2.306,1.805,T,0,2016-11-14,1003,1,2,2.661,1.718,T,0,2016-11-14,1003,3,2,2.063,1.706,T,0,2016-11-14,1003,2,3,1.753,1.525,T,0,2016-11-14,1003,1,2,0.44,0.014,T,0,2016-11-14,1003,1,3,2.146,1.726,T,0,2016-11-14,1003,2,2,1.732,1.591,T,0,2016-11-14,1003,2,3,1.668,1.535,T,0,2016-11-14,1003,3,2,2.081,1.757,T,0,2016-11-14,1003,3,3,1.985,1.75,T,0,2016-11-14&lower_kick=1003,2,3,1.226,16.009,0,22.143,2016-11-22,1003,1,2,1.178,12.762,0,12.688,2016-11-22&lower_shot=1003,2,2.195,13,2016-11-22
?>
<!DOCTYPE>
<html>
<head>
	<title>graphCount</title>
</head>
<script type="text/javascript">
	var jasonUp = <?php echo json_encode($Data_up); ?>,
	jsonLow = <?php echo json_encode($Data_low); ?>;

	location.replace('graph_display.php?dataUp=<?php echo json_encode($Data_up); ?>&dataLow=<?php echo json_encode($Data_low);?>&s_id=<?php echo $_GET['id'];?>');
</script>
<body>
	資料處理中！ 畫面會自動轉跳，請耐心等待～
</body>
</html>
