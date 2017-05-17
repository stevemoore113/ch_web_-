<?php

	header("Content-Type: text/html; charset=utf-8");
	require_once("connMysql.php");


	$query_RecMember = "SELECT * FROM `memberdata`";
	$RecMember = mysql_query($query_RecMember);

?>
<!doctype html>
<html class="no-js" lang="zh">
	<head>
		<meta charset="utf-8">
		<title></title>
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
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- 載入樣式 -->
		<link rel="stylesheet"   href="./DataTables-1.9.4/media/css/jquery.dataTables.css">
		<!-- Themeroller的主題 -->
		<link rel="stylesheet"   href="./DataTables-1.9.4/media/css/jquery.dataTables_themeroller.css">
		<!-- 載入jQuery  -->
		<script type="text/javascript" src="./DataTables-1.9.4/media/js/jquery.js"></script>
		<!-- 載入DataTables  -->
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
		<div class="container">
		<a href="index.php" style="float: right;color: blue;text-decoration: none;">回首頁</a>
			<div>
				<h1 style="margin-top: 40px; color: red;">Score</h1>				
			</div>
			<hr />
			<div>
				<table id="datatable">
					<thead>
						<tr>
							<th>Picture</th>
                            <th>ID</th>
                            <th>Student num</th>
                            <th>Score</th>
						</tr>
					</thead>
					<tbody>
					<?php	while($row_RecMember=mysql_fetch_assoc($RecMember)){ ?>
					<tr>
						<th><img style=" width: 25px; height: 25px;" src="pic/pic<?php echo $row_RecMember["ID"];?>.jpg"></th>
						<th><?php echo $row_RecMember["ID"];?></th>
						<th><?php echo $row_RecMember["ShNum"];?></th>
						<th><?php echo $row_RecMember["Score"];?></th>
					</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
			<div class="sixteen columns">
				<hr />
			</div>
		</div>
	</body>
</html>