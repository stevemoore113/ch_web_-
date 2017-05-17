<?php 
require_once("php/connMysql.php");
session_start();
$i = 1;

if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	header("Location: index.php");
}

if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["loginMember"]);
	unset($_SESSION["memberLevel"]);
	header("Location: index.php");
}
//繫結登入會員資料
$query_RecMember = "SELECT * FROM memberdata WHERE m_username = '{$_SESSION["loginMember"]}'";
$RecMember = $db_link->query($query_RecMember);	
$row_RecMember=$RecMember->fetch_assoc();

//刪除學生
if(isset($_GET["action"])&&($_GET["action"]=="delete")){
	$query_delMember = "UPDATE `student` SET `s_statue` = 'out', `del_member`=? WHERE s_id=?";
	$stmt=$db_link->prepare($query_delMember);
	$stmt->bind_param("si", $row_RecMember["m_name"], $_GET["id"]);
	$stmt->execute();
	$stmt->close();
	//重新導向回到主畫面
	header("Location: student_list.php");
}
//選取所有一般會員資料

$query_RecMember = "SELECT * FROM student WHERE s_statue = 'in' ORDER BY s_jointime DESC";
$RecMember = $db_link->query($query_RecMember);

?>

<script type="text/javascript">
	function deletesure(){
    if (confirm('\n您確定要刪除這個會員嗎?\n刪除後無法恢復!\n')) return true;
    return false;
}
</script>
<!doctype html>
<html class="no-js" lang="ja">
	<head>
		<meta charset="utf-8">
		<title>學生資料總攬</title>
        <meta name="description" content="支援排序及篩選的表格">
		<meta name="author"      content="Toshiya TSURU @ SunBusiness, Inc.">
		<meta name="viewport"    content="width=device-width, initial-scale=1, maximum-scale=1">
		<style>
			* {
				font-family:      'Lucida Grande', 'Hiragino Kaku Gothic ProN', 'ヒラギノ角ゴ ProN W3', Meiryo, 'メイリオ', sans-serif;
				font-size:        98.5%;
			}
			h1 {
				font-size:        46px;
				margin-bottom:    12px;
			}
			.container {
				width:            940px;
				margin:           auto;
			}
			iframe {
				border: solid 1px #000;
			}
		</style>
		<link rel="stylesheet"   href="./DataTables-1.9.4/media/css/jquery.dataTables.css">
		<link rel="stylesheet"   href="./DataTables-1.9.4/media/css/jquery.dataTables_themeroller.css">
		<script type="text/javascript" src="./DataTables-1.9.4/media/js/jquery.js"></script>
		<script type="text/javascript" src="./DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
		<script>
			(function() {
				$(function() {
					$('#datatable').dataTable({
						"oLanguage": {
						    "sSearch": "搜尋:",
						    "sLengthMenu": "顯示件數 ：_MENU_",
						    "sInfo": "_TOTAL_件中，從第_START_件顯示到第_END_件",
						    "sInfoFiltered": " ( _MAX_件中搜尋 )",
						    "sZeroRecords": "找無資料。",
						    "sInfoEmpty": "0 件",
						    "oPaginate": {
						        "sFirst": "最初",
						        "sLast": "最後",
						        "sPrevious": "上一頁",
						        "sNext": "下一頁"
						    }
						},
						"iDisplayLength" : 20,
					});
				});
			})();
		</script>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
		  <tr>
		    <td class="tdbline"><img src="images/mlogo.jpg" alt="會員系統"  height="67"></td>
		  </tr>
		  <tr>
		    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
		      <tr valign="top">
		        <td class="tdrline" >
		        <p class="title">學生資料總攬</p>
          			<hr size="1" />
          			<br>
				<table id="datatable">
					<thead>
						<tr>
							<th></th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>身高</th>
                            <th>體重</th>
                            <th>手長</th>
                            <th>腳長</th>
                            <th>BMI</th>
                            <th>老師</th>
                            <th>班級</th>
                            <th>障礙類別</th>
                            <th>修改/刪除</th>
						</tr>
					</thead>
					<tbody>
					<?php while($row_RecMember=$RecMember->fetch_assoc()){ ?>
						<tr>
							<th><?php echo $i; $i++;?></th>
							<td><?php echo $row_RecMember["s_name"];?></td>
							<td><?php echo $row_RecMember["s_sex"];?></td>
							<td><?php echo $row_RecMember["s_birthday"];?></td>
							<td><?php echo $row_RecMember["s_high"];?></td>
							<td><?php echo $row_RecMember["s_weight"];?></td>
							<td><?php echo $row_RecMember["s_hand"];?></td>
							<td><?php echo $row_RecMember["s_foot"];?></td>
							<td><?php echo $row_RecMember["s_bmi"];?></td>
							<td><?php echo $row_RecMember["s_teacher"];?></td>
							<td><?php echo $row_RecMember["s_class"];?></td>
							<td><?php echo $row_RecMember["s_obstacle"];?></td>
							<td><a href="student_update.php?s_id=<?php echo $row_RecMember["s_id"];?>">修改</a><br>
								<a href="?action=delete&id=<?php echo $row_RecMember["s_id"];?>" onClick="return deletesure();">刪除</a>
							</td>
						</tr>
					<?php }?>
					</tbody>
				</table>
			 </td>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
	$db_link->close();
?>