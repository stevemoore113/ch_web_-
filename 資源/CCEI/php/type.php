<?php

	function struct($type){
		$baseStructure['upper_throw']['struct'] = 'id,number,reflection,time,distance,catch,date';
		$baseStructure['upper_take']['struct'] = 'id,type,number,reflection,date';
		$baseStructure['scrollball']['struct'] = 'id,type,number,time,distance,catch,reflection,date';
		$baseStructure['lower_shot']['struct'] = 'id,number,reflection,angle,date';
		$baseStructure['lower_kick']['struct'] = 'id,type,number,reflection,distance,outs,time,date';
		return $baseStructure[$type]['struct'];
	}
	function StructValue($type){
		$baseStructure['upper_throw']['value'] = '?,?,?,?,?,?,?';
		$baseStructure['upper_take']['value'] = '?,?,?,?,?';
		$baseStructure['scrollball']['value'] = '?,?,?,?,?,?,?,?';
		$baseStructure['lower_shot']['value'] = '?,?,?,?,?';
		$baseStructure['lower_kick']['value'] = '?,?,?,?,?,?,?,?';
		return $baseStructure[$type]['value'];
	}
	function StructName($type){
		$headName['upper_throw'] = ['編號','次數','反應時間s','滯空時間s','上拋高度m','接住狀態','測驗日期'];
    	$headName['lower_kick'] = ['編號','測驗項目','次數','反應時間s','總距離m','出界次數','總時間s','測驗日期'];
   		$headName['lower_shot'] = ['編號','次數','反應時間','左偏-/右偏+','測驗日期'];
    	$headName['scrollball'] = ['編號','測驗項目','次數','滾球時間','滾球離m','接住狀態','反應時間s','測驗日期'];
    	$headName['upper_take'] = ['編號','測驗項目','次數','反應時間s','測驗日期'];
		return $headName[$type];
	}
	function StructLength($type){
		$structNum['upper_throw'] = 7;
		$structNum['upper_take'] = 5;
		$structNum['scrollball'] = 8;
		$structNum['lower_shot'] = 5;
		$structNum['lower_kick'] = 8;

		return $structNum[$type];
	}
	function AllStructure(){
		return 5;
	}
	function TypeName($i){
		$type[] = 'upper_throw';
		$type[] = 'upper_take';
		$type[] = 'scrollball';
		$type[] = 'lower_shot';
		$type[] = 'lower_kick';
	}


	/*


//if (row == structNum['type']){
//}
//else{
//    
alert('輸入的資料格式有誤，請先確選擇了正確的資料型態，並以正確的格式上傳，行情請//看使用說明');
 //   controller = 0;
//}

$baseStructure['upper_throw']
$baseStructure['upper_take']
$baseStructure['scrollball']
$baseStructure['lower_shot']
$baseStructure['lower_kick']
	*/

?>