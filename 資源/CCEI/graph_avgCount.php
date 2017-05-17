<?php

	require_once("php/connMysql.php");

	$studentId = [];
	$query_RecMember = "SELECT * FROM `studentId` ";
	$Id = $db_link->query($query_RecMember);
	while($row_RecMember=$Id->fetch_assoc()){
		array_push($studentId,(int)$row_RecMember["id"]);
	}
	$allData['Data_up'] = [];
	$allData["Data_low"] = [];
	print_r($studentId);
	

	foreach ($studentId as $sID) {
	#echo $sID."<br>";
	$query_RecMember = "SELECT * FROM student WHERE `s_id` = $sID";
	$studentInfo = $db_link->query($query_RecMember);
	$studentInfo=$studentInfo->fetch_assoc();

	$query_RecMember = "SELECT * FROM `upper_throw` WHERE id = $sID";
	$upper_throw = $db_link->query($query_RecMember);

	$query_RecMember = "SELECT * FROM `upper_take` WHERE id = $sID";
	$upper_take = $db_link->query($query_RecMember);

	$query_RecMember = "SELECT * FROM `scrollball` WHERE id = $sID";
	$scrollball = $db_link->query($query_RecMember);

	$query_RecMember = "SELECT * FROM `lower_shot` WHERE id = $sID";
	$lower_shot = $db_link->query($query_RecMember);

	$query_RecMember = "SELECT * FROM `lower_kick` WHERE id = $sID";
	$lower_kick = $db_link->query($query_RecMember);

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

	while($row_RecMember=$upper_throw->fetch_assoc()){
		array_push($personThrow["number"],(float)$row_RecMember["number"]);
		array_push($personThrow["reflection"],(float)$row_RecMember["reflection"]);
		array_push($personThrow["time"],(float)$row_RecMember["time"]);
		array_push($personThrow["distance"],(float)$row_RecMember["distance"]);
		array_push($personThrow["catch"],$row_RecMember["catch"]);
	}
	while($row_RecMember=$upper_take->fetch_assoc()){
		array_push($personTake["type"],$row_RecMember["type"]);
		array_push($personTake["number"],(float)$row_RecMember["number"]);
		array_push($personTake["reflection"],(float)$row_RecMember["reflection"]);
	}
	while($row_RecMember=$scrollball->fetch_assoc()){
		array_push($personScroll["type"],$row_RecMember["type"]);
		array_push($personScroll["number"],(float)$row_RecMember["number"]);
		array_push($personScroll["time"],(float)$row_RecMember["time"]);
		array_push($personScroll["distance"],(float)$row_RecMember["distance"]);
		array_push($personScroll["catch"],$row_RecMember["catch"]);
		array_push($personScroll["reflection"],(float)$row_RecMember["reflection"]);
	}
	while($row_RecMember=$lower_shot->fetch_assoc()){
		array_push($personShot["number"],(float)$row_RecMember["number"]);
		array_push($personShot["reflection"],(float)$row_RecMember["reflection"]);
		array_push($personShot["angle"],(float)$row_RecMember["angle"]);
	}
	while($row_RecMember=$lower_kick->fetch_assoc()){
		array_push($personKick["type"],$row_RecMember["type"]);
		array_push($personKick["number"],(float)$row_RecMember["number"]);
		array_push($personKick["reflection"],(float)$row_RecMember["reflection"]);
		array_push($personKick["distance"],(float)$row_RecMember["distance"]);
		array_push($personKick["outs"],(float)$row_RecMember["outs"]);
		array_push($personKick["time"],(float)$row_RecMember["time"]);
	}

	if (!empty($personThrow["number"]) && !empty($personTake["number"]) && !empty($personScroll["number"]) && !empty($personShot["number"]) && !empty($personKick["number"])){

		//整體上肢
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
		
		//整體下肢
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
		echo $Data_low['Accuracy'];
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
		
		array_push($allData["Data_up"], $Data_up);
		array_push($allData["Data_low"], $Data_low);
	}

	}

	echo "____________________________________________________<br>";


	//運算標準差
	//運算上肢標準差
	$stu_bmi=0;
	$up_reaction=0;
	$up_coordinate=0;
	$up_successful=0;
	$up_accuracy=0;
	$low_reaction=0;
	$low_coordinate=0;
	$low_coordination=0;
	$low_successful=0;
	$low_accuracy=0;
	$sd_up_reaction=0;
	$sd_up_accuracy=0;
	$sd_up_successful=0;
	$sd_up_coordinate=0;
	$sd_low_reaction=0;
	$sd_low_accuracy=0;
	$sd_low_successful=0;
	$sd_low_coordinate=0;
	$avg_bmi=0;
	$sd_bmi=0;


	foreach ($allData['Data_up'] as $value) {
		#echo "key: ".$key."<br>value:".$value['reactionTime']."<br>";
		if (!is_nan($value['reactionTime'])&&!is_nan($value['Accuracy'])&&!is_nan($value['successfulRate'])&&!is_nan($value['coordination'])){
			$up_reaction+=$value['reactionTime'];
			$up_accuracy+=$value['Accuracy'];
			$up_successful+=$value['successfulRate'];
			$up_coordinate+=$value['coordination'];
			$avg_bmi+=$value['BMI'];
		}
	}
	$count = sizeof($allData['Data_up']);
	$avg_up_reaction = $up_reaction/$count;
	$avg_up_accuracy = $up_accuracy/$count;
	$avg_up_successful = $up_successful/$count;
	$avg_up_coordinate = $up_coordinate/$count;
	$avg_bmi = $avg_bmi/$count;


	foreach ($allData['Data_up'] as $value) {
		#echo "key: ".$key."<br>value:".$value['reactionTime']."<br>";
		if (!is_nan($value['reactionTime'])&&!is_nan($value['Accuracy'])&&!is_nan($value['successfulRate'])&&!is_nan($value['coordination'])){
			$sd_up_reaction+=pow($value['reactionTime']-$avg_up_reaction,2);
			$sd_up_accuracy+=pow($value['Accuracy']-$avg_up_accuracy,2);
			$sd_up_successful+=pow($value['successfulRate']-$avg_up_successful,2);
			$sd_up_coordinate+=pow($value['coordination']-$avg_up_coordinate,2);
			$sd_bmi+=pow($value['BMI']-$avg_bmi, 2);
		}
	}
	$sd_up_reaction = sqrt($sd_up_reaction/($count-1));
	$sd_up_accuracy = sqrt($sd_up_accuracy/($count-1));
	$sd_up_successful = sqrt($sd_up_successful/($count-1));
	$sd_up_coordinate = sqrt($sd_up_coordinate/($count-1));
	$sd_bmi = sqrt($sd_bmi/($count-1));

	echo $sd_up_reaction."<br>";
	echo $sd_up_accuracy."<br>";
	echo $sd_up_successful."<br>";
	echo $sd_up_coordinate."<br>";

	//運算下肢標準差
	foreach ($allData['Data_low'] as $value) {
		if (!is_nan($value['reactionTime'])&&!is_nan($value['Accuracy'])&&!is_nan($value['successfulRate'])&&!is_nan($value['coordination'])){
			$low_reaction+=$value['reactionTime'];
			$low_accuracy+=$value['Accuracy'];
			$low_successful+=$value['successfulRate'];
			$low_coordinate+=$value['coordination'];
		}
	}
	echo "low_successful: ".$low_successful."<br>";
	echo "low_coordinate: ".$low_coordinate."<br>";
	$count = sizeof($allData['Data_low']);
	$avg_low_reaction = $low_reaction/$count;
	$avg_low_accuracy = $low_accuracy/$count;
	$avg_low_successful = $low_successful/$count;
	$avg_low_coordinate = $low_coordinate/$count;
	echo $count.'<br>';
	echo $low_reaction.'<br>';
	echo $avg_low_reaction.'<br>';

	foreach ($allData['Data_low'] as $value) {
		#echo "key: ".$key."<br>value:".$value['reactionTime']."<br>";
		if (!is_nan($value['reactionTime'])&&!is_nan($value['Accuracy'])&&!is_nan($value['successfulRate'])&&!is_nan($value['coordination'])){
			$sd_low_reaction+=pow($value['reactionTime']-$avg_low_reaction,2);
			$sd_low_accuracy+=pow($value['Accuracy']-$avg_low_accuracy,2);
			$sd_low_successful+=pow($value['successfulRate']-$avg_low_successful,2);
			$sd_low_coordinate+=pow($value['coordination']-$avg_low_coordinate,2);
		}
	}
	echo 'sd:'.$sd_low_reaction.'<br>';
	$sd_low_reaction = sqrt($sd_low_reaction/($count-1));
	$sd_low_accuracy = sqrt($sd_low_accuracy/($count-1));
	$sd_low_successful = sqrt($sd_low_successful/($count-1));
	$sd_low_coordinate = sqrt($sd_low_coordinate/($count-1));

	echo $sd_low_reaction."<br>";
	echo $sd_low_accuracy."<br>";
	echo $sd_low_successful."<br>";
	echo $sd_low_coordinate."<br>";
	echo $sd_bmi."<br>";
	/*
	$query_insert = "INSERT INTO graph_avg (up_reaction, up_accuracy, up_successful, up_coordination, low_reaction, low_accuracy, low_successful, low_coordination, sd_up_reaction, sd_up_accuracy,sd_up_successful,sd_up_coordination,sd_low_reaction,sd_low_accuracy,sd_low_successful,sd_low_coordination,avg_bmi,sd_bmi,now_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
		$stmt = $db_link->prepare($query_insert);
		$stmt->bind_param("ssssssssssssssssss",$avg_up_reaction,$avg_low_accuracy,$avg_up_successful,$avg_up_coordinate,$avg_low_reaction,$avg_low_accuracy,$avg_low_successful,$avg_low_coordinate,$sd_up_reaction,$sd_up_accuracy,$sd_up_successful,$sd_up_coordinate,$sd_low_reaction,$sd_low_accuracy,$sd_low_successful,$sd_low_coordinate,$avg_bmi,$sd_bmi);
		$stmt->execute();
		$stmt->close();
		*/
	$db_link->close();


	/*
	CREATE TABLE `graph_avg` (
  `d_id` int(11) NOT NULL,
  `up_reaction` float NOT NULL,
  `up_accuracy` float NOT NULL,
  `up_successful` float NOT NULL,
  `up_coordination` float NOT NULL,
  `low_reaction` float NOT NULL,
  `low_accuracy` float NOT NULL,
  `low_successful` float NOT NULL,
  `low_coordination` float NOT NULL,
  `avg_bmi` float NOT NULL,
  `sd_bmi` float NOT NULL,
  `sd_up_reaction` float NOT NULL,
  `sd_up_accuracy` float NOT NULL,
  `sd_up_successful` float NOT NULL,
  `sd_up_coordination` float NOT NULL,
  `sd_low_reaction` float NOT NULL,
  `sd_low_accuracy` float NOT NULL,
  `sd_low_successful` float NOT NULL,
  `sd_low_coordination` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



	*/



	/*
		$structNum['upper_throw'] = 7;
		$structNum['upper_take'] = 5;
		$structNum['scrollball'] = 8;
		$structNum['lower_shot'] = 5;
		$structNum['lower_kick'] = 7;

		$headName['upper_throw'] = ['編號','次數','反應時間s','滯空時間s','上拋高度m','接住狀態','測驗日期'];
    	$headName['lower_kick'] = ['編號','測驗項目','次數','反應時間s','總距離m','總時間s','測驗日期'];
   		$headName['lower_shot'] = ['編號','次數','反應時間','左偏-/右偏+','測驗日期'];
    $headName['scrollball']= ['編號','測驗項目','次數','滾球時間','滾球離m','接住狀態','按鍵反應','測驗日期'];
    	$headName['upper_take'] = ['編號','測驗項目','次數','反應時間s','測驗日期'];

		$baseStructure['upper_throw']['struct'] = 'id,number,reflection,time,distance,catch,date';
		$baseStructure['upper_take']['struct'] = 'id,type,number,reflection,date';
	$baseStructure['scrollball']['struct'] = 'id,type,number,time,distance,catch,reflection,date';
		$baseStructure['lower_shot']['struct'] = 'id,number,reflection,angle,date';
		$baseStructure['lower_kick']['struct'] = 'id,type,number,reflection,distance,time,date';
	*/


?>