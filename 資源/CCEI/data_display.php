<?php
    //test: http://localhost/ccei/data_display.php?action=select&id=11108
    include("php/type.php"); 
        include("php/connMysql.php");

        $query_Member = "SELECT * FROM `upper_take` WHERE `id` = {$_GET['id']}";
        $upperTake = $db_link->query($query_Member);

        $query_Member = "SELECT * FROM `upper_throw` WHERE `id` = {$_GET['id']}";
        $upperThrow = $db_link->query($query_Member);
        $query_Member = "SELECT * FROM `scrollball` WHERE `id` = {$_GET['id']}";
        $Scroll = $db_link->query($query_Member);
        $query_Member = "SELECT * FROM `lower_kick` WHERE `id` = {$_GET['id']}";
        $lowerKick = $db_link->query($query_Member);
        $query_Member = "SELECT * FROM `lower_shot` WHERE `id` = {$_GET['id']}";
        $lowerShot = $db_link->query($query_Member);

        $upperTakeArray = array();
        $upperThrowArray = array();
        $ScrollArray = array();
        $lowerKickArray = array();
        $lowerShotArray = array();
        while($row_result = $upperTake->fetch_row()){
            $upperTakeArray[] = $row_result;
        }
        while($row_result = $upperThrow->fetch_row()){
            $upperThrowArray[] = $row_result;
        }
        while($row_result = $Scroll->fetch_row()){
            $ScrollArray[] = $row_result;
        }
        while($row_result = $lowerKick->fetch_row()){
            $lowerKickArray[] = $row_result;
        }
        while($row_result = $lowerShot->fetch_row()){
            $lowerShotArray[] = $row_result;
        }
?>





<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>長庚早療所</title>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/display_script.js"></script>
<link rel="stylesheet" href="css/display_style.css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<script src="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.js"></script>
    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.min.css">
    <script src="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.js"></script>
    <link rel="stylesheet" href="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.css">

</head>
<body>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">

  <tr>
    <td class="tdbline">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><p class="title">會員核准列表 </p>
          <hr size="1" />

            <h1 id ='out'>資料預覽</h1>
            <br/>
            <div id="result"></div>

			<div id="wrapper">

			<div id="tabAccordion">

			<dl>
			<dt><a href="javascript:void(0);">上肢拿球</a></dt>
			<dd>
                 <p>收尋：<input id="search_field" type="search" placeholder="Search"><button id='undo'>undo</button></p>
				<div id="example1" class="hot handsontable"></div>
			</dd>
			</dl>

			<dl>
			<dt><a href="javascript:void(0);">上肢拋球</a></dt>
			<dd>
                <p>收尋：<input id="search_field2" type="search" placeholder="Search"><button id='undo2'>undo</button></p>
				<div id="example2" class="hot handsontable"></div>
			</dd>
			</dl>

			<dl>
			<dt><a href="javascript:void(0);">上肢滾球</a></dt>
			<dd>
                <p>收尋：<input id="search_field3" type="search" placeholder="Search"><button id='undo3'>undo</button></p>
				<div id="example3" class="hot handsontable"></div>
			</dd>
			</dl>

			<dl>
			<dt><a href="javascript:void(0);">下肢踢球</a></dt>
			<dd>
                <p>收尋：<input id="search_field4" type="search" placeholder="Search"><button id='undo4'>undo</button></p>
				<div id="example4" class="hot handsontable"></div>
			</dd>
			</dl>

			<dl>
			<dt><a href="javascript:void(0);" id="but5">下肢射門</a></dt>
			<dd>
                <p>收尋：<input id="search_field5" type="search" placeholder="Search"><button id='undo5'>undo</button></p>
				<div id="example5" class="hot handsontable"></div>
			</dd>
			</dl>

            <style>
                .button {
                    background-color: #4CAF50; /* Green */
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    margin: 4px 2px;
                    cursor: pointer;
                    float: right;
                }

                .button1 {font-size: 10px;}
                </style>
            
            </div><!-- /#tabAccordion -->
                <button class="button button1" id="btn">產生報表</button>
                  <button class="button button1" onclick="history.back()">重新選擇</button>
            </div>

			</div><!-- /#tabAccordion -->

			</div><!-- /#wrapper -->

		</td>
        
      </tr>
    </table></td>
  </tr>
 
</table>
</body>
<script type="text/javascript">
    var str,jsn,col, row, controller=0, headName = [], structNum=[], stuID = <?php echo $_GET["id"] ?>;
    headName['upper_throw'] = ['編號','次數','反應時間s','滯空時間s','上拋高度m','接住狀態','測驗日期'];
    headName['lower_kick'] = ['編號','測驗項目','次數','反應時間s','總距離m','出界次數','總時間s','測驗日期'];
    headName['lower_shot'] = ['編號','次數','反應時間','左偏-/右偏+','測驗日期'];
    headName['scrollball'] = ['編號','測驗項目','次數','滾球時間','滾球離m','接住狀態','反應時間s','測驗日期'];
    headName['upper_take'] = ['編號','模式','次數','反應時間','測驗日期'];
    structNum['upper_throw'] = <?php echo StructLength('upper_throw')?>;
    structNum['upper_take'] = <?php echo StructLength('upper_take') ?>;
    structNum['scrollball'] = <?php echo StructLength('scrollball') ?>;
    structNum['lower_shot'] = <?php echo StructLength('lower_shot') ?>;
    structNum['lower_kick'] = <?php echo StructLength('lower_kick') ?>;

    function tojson(data){
        /*
        var new_tweets={};
        for (i in data){
          new_tweets[i] = data[i];
        }
        
        */
        var new_tweets = [];
        for (i in data){
            new_tweets.push(data[i]);
        }
        return new_tweets;
    }
    
    document.addEventListener("DOMContentLoaded", handson);
    //document.getElementById("but5").addEventListener("click", handson5);

    function handson(){
        var
        data = <?php echo json_encode($upperTakeArray);?>,
        example = document.getElementById('example1'),
        selectFirst = document.getElementById('selectFirst'),
        rowHeaders = document.getElementById('rowHeaders'),
        colHeaders = document.getElementById('colHeaders'),
        searchFiled = document.getElementById('search_field'),
        hot = new Handsontable(example, {
            data: data,
            startRows: 1,
            //colWidths: 80,
            startCols: structNum['upper_take'],
            colHeaders: headName['upper_take'],
            rowHeaders: true,
            height: 370,
            //colHeaders: true,
            search: true,
            autoWrapRow: true,
            outsideClickDeselects: false,
            removeRowPlugin: true,
            contextMenu: true
        });
        var
        data2 = <?php echo json_encode($upperThrowArray);?>,
        example = document.getElementById('example2'),
        rowHeaders = document.getElementById('rowHeaders'),
        colHeaders = document.getElementById('colHeaders'),
        searchFiled2 = document.getElementById('search_field2'),
        hot2 = new Handsontable(example, {
            data: data2,
            startRows: 1,
            //colWidths: 85,
            startCols: structNum['upper_throw'],
            colHeaders: headName['upper_throw'],
            rowHeaders: true,
            height: 370,
            //colHeaders: true,
            search: true,
            autoWrapRow: true,
            outsideClickDeselects: false,
            removeRowPlugin: true,
            contextMenu: true
        });
        var
        data3 = <?php echo json_encode($ScrollArray);?>,
        example = document.getElementById('example3'),
        rowHeaders = document.getElementById('rowHeaders'),
        colHeaders = document.getElementById('colHeaders'),
        searchFiled3 = document.getElementById('search_field3'),
        hot3 = new Handsontable(example, {
            data: data3,
            startRows: 1,
            startCols: structNum['scrollball'],
            colHeaders: headName['scrollball'],
            rowHeaders: true,
            height: 370,
            search: true,
            autoWrapRow: true,
            outsideClickDeselects: false,
            removeRowPlugin: true,
            contextMenu: true
        });
        var
        data4 = <?php echo json_encode($lowerKickArray);?>,
        example = document.getElementById('example4'),
        rowHeaders = document.getElementById('rowHeaders'),
        colHeaders = document.getElementById('colHeaders'),
        searchFiled4 = document.getElementById('search_field4'),
        hot4 = new Handsontable(example, {
            data: data4,
            startRows: 1,
            startCols: structNum['lower_kick'],
            colHeaders: headName['lower_kick'],
            rowHeaders: true,
            height: 370,
            //colWidths: 80,
            //colHeaders: true,
            search: true,
            autoWrapRow: true,
            outsideClickDeselects: false,
            removeRowPlugin: true,
            contextMenu: true
        });
        var
        data5 = <?php echo json_encode($lowerShotArray);?>,
        example = document.getElementById('example5'),
        selectFirst = document.getElementById('selectFirst'),
        rowHeaders = document.getElementById('rowHeaders'),
        colHeaders = document.getElementById('colHeaders'),
        searchFiled5 = document.getElementById('search_field5'),
        hot5 = new Handsontable(example, {
            data: data5,
            startRows: 1,
            //colWidths: 100,
            startCols: structNum['lower_shot'],
            colHeaders: headName['lower_shot'],
            rowHeaders: true,
            height: 370,
            //colHeaders: true,
            search: true,
            autoWrapRow: true,
            outsideClickDeselects: false,
            removeRowPlugin: true,
            contextMenu: true
        });

        Handsontable.Dom.addEvent(document.getElementById('undo'), 'click', function() {
            hot.undo();
        });
        Handsontable.Dom.addEvent(document.getElementById('undo2'), 'click', function() {
            hot2.undo();
        });
        Handsontable.Dom.addEvent(document.getElementById('undo3'), 'click', function() {
            hot3.undo();
        });
        Handsontable.Dom.addEvent(document.getElementById('undo4'), 'click', function() {
            hot4.undo();
        });
        Handsontable.Dom.addEvent(document.getElementById('undo5'), 'click', function() {
            hot5.undo();
        });

        Handsontable.Dom.addEvent(searchFiled, 'keyup', function (event) {
            var queryResult = hot.search.query(this.value);
            console.log(queryResult);
            hot.render();
        });
        Handsontable.Dom.addEvent(searchFiled2, 'keyup', function (event) {
            var queryResult = hot2.search.query(this.value);
            console.log(queryResult);
            hot2.render();
        });
        Handsontable.Dom.addEvent(searchFiled3, 'keyup', function (event) {
            var queryResult = hot3.search.query(this.value);
            console.log(queryResult);
            hot3.render();
        });
        Handsontable.Dom.addEvent(searchFiled4, 'keyup', function (event) {
            var queryResult = hot4.search.query(this.value);
            console.log(queryResult);
            hot4.render();
        });
        Handsontable.Dom.addEvent(searchFiled5, 'keyup', function (event) {
            var queryResult = hot5.search.query(this.value);
            console.log(queryResult);
            hot5.render();
        });

        document.getElementById('btn').onclick = function(){
            file = hot.getData();
            file2 = hot2.getData();
            file3 = hot3.getData();
            file4 = hot4.getData();
            file5 = hot5.getData();
            window.location.assign("graph_count.php?id="+ stuID+"&upper_take="+file+"&upper_throw="+file2+"&scrollball="+file3+"&lower_kick="+file4+"&lower_shot="+file5);

        }

    }

    

    
</script>
</html>
<?php
    $db_link->close();
?>