<?php 
	require_once("php/connMysql.php");
	session_start();
	$i = 1;
	//刪除會員
	if(isset($_GET["action"])&&($_GET["action"]=="delete")){
		$query_delMember = "DELETE FROM memberdata WHERE m_id=?";
		$stmt=$db_link->prepare($query_delMember);
		$stmt->bind_param("i", $_GET["id"]);
		$stmt->execute();
		$stmt->close();
		//重新導向回到主畫面
		header("Location: member_list.php");
	}

	//選取所有一般會員資料

	$query_RecMember = "SELECT * FROM upper_throw ORDER BY date DESC";

	$RecMember = $db_link->query($query_RecMember);

?>
<script type="text/javascript">
	function deletesure(){
    if (confirm('\n您確定要刪除這個會員嗎?\n刪除後無法恢復!\n')) return true;
    return false;
}
</script>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>資料總攬</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			ul li {
			    float:left;
			    list-style-type:none;
			    border: 1px;
			    width: 120px;
			}
		</style>
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
		        <p class="title">資料總攬</p>
          		<hr size="1" />
          		<br>
					<ul>
					  <li><a href="">上肢拋球</a></li>
					  <li><a href="">上肢拿球</a></li>
					  <li><a href="">上肢斜坡滾球</a></li>
					  <li><a href="">上肢踢球</a></li>
					  <li><a href="">上肢射門</a></li>
					</ul>	
				</td>

				<table id="datatable">
					<thead>
						<tr>
							<th></th>
                            <th>id</th>
                            <th>次數</th>
                            <th>反應時間</th>
                            <th>滯空時間</th>
                            <th>上拋高度</th>
                            <th>接住狀態</th>
                            <th>測驗時間</th>
							<td>修改/刪除</td>
						</tr>
					</thead>
					<tbody>
					<?php while($row_RecMember=$RecMember->fetch_assoc()){ ?>
						<tr>
							<th><?php echo $i; $i++;?></th>
							<td><?php echo $row_RecMember["id"];?></td>
							<td><?php echo $row_RecMember["number"];?></td>
							<td><?php echo $row_RecMember["reflection"];?></td>
							<td><?php echo $row_RecMember["time"];?></td>
							<td><?php echo $row_RecMember["distance"];?></td>
							<td><?php echo $row_RecMember["catch"];?></td>
							<td><?php echo $row_RecMember["date"];?></td>
							<td><a href="member_adminupdate.php?id=<?php echo $row_RecMember["m_id"];?>">修改</a>
								<a href="?action=delete&id=<?php echo $row_RecMember["m_id"];?>" onClick="return deletesure();">刪除</a>
							</td>
						</tr>
					<?php }?>
					</tbody>
				</table>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
	$db_link->close();
?>