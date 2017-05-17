
<!DOCTYPE html>
<html>
<head>
	<title>update</title>
    <meta charset="UTF-8">
    <script src="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.js"></script>
    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.min.css">
    <script src="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.js"></script>
    <link rel="stylesheet" href="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.css">
</head>

<style type="text/css">
	output {
    display: block;
    margin-top: 4em;
    font-family: monospace;
    font-size: .8em;
}
</style>
<script type="text/javascript">
	var str,jsn,col, row, controller=1, headName = [], structNum=[];
    headName['upper_throw'] = ['id'];

    structNum['upper_throw'] = 1;

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
    
    function handson(){
        var
        example = document.getElementById('example1'),
        selectFirst = document.getElementById('selectFirst'),
        rowHeaders = document.getElementById('rowHeaders'),
        colHeaders = document.getElementById('colHeaders'),
        searchFiled = document.getElementById('search_field'),
        hot = new Handsontable(example, {
            startRows: 1,
            startCols: 1,
            colHeaders: headName['upper_throw'],
            rowHeaders: true,
            //colHeaders: true,
            search: true,
            autoWrapRow: true,
            outsideClickDeselects: false,
            removeRowPlugin: true,
            contextMenu: true
        });

        //Handsontable.Dom.addEvent(document.getElementById('StructType'), 'click', headerChange);

        Handsontable.Dom.addEvent(document.getElementById('undo'), 'click', function() {
            hot.undo();
        });

        Handsontable.Dom.addEvent(searchFiled, 'keyup', function (event) {
            var queryResult = hot.search.query(this.value);
            console.log(queryResult);
            hot.render();
        });

        document.getElementById('btn').onclick = function(){
            if (controller == 1){
                var file, ans='';
                file = hot.getData();
                //file = JSON.stringify(file);
                for (i in file){
                  ans+=file[i];
                }
                /*
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        location.reload();
                    }
                };
                xmlhttp.open("GET", "testingSave.php?data="+file);
                xmlhttp.send();
                */
                window.open("testingSave.php?data="+file); 
            }
            else if(controller == 0)
                alert('請先執行預覽資料，確認資料後再上傳！');
            //document.getElementById('result').textContent = file;
        };

    }


</script>
<body>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td class="tdbline"><img src="images/mlogo.jpg" alt="會員系統"  height="67"></td>
  </tr>
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline" >
       

          <p class="title">新增學生資料</p>
          <hr size="1" />
            <p>檔案選擇：<input id="csv" type="file"></p>
            <p>資料型態選擇：
                <select name="Type" id="StructType">
                <option value="upper_throw">上肢拋球</option>
                <option value="lower_kick">下肢踢球</option>
                <option value="lower_shot">下肢射門</option>
                <option value="scrollball">上肢斜坡滾球</option>
                <option value="upper_take">上肢拿球反應</option>
                </select>
                <button id="btn">確認上傳</button>
            </p>
            
            <h1 id ='out'>資料預覽</h1>
            <p>收尋：<input id="search_field" type="search" placeholder="Search"><button id='undo'>undo</button></p>
            <div id="example1" class="hot handsontable"></div>
            <br/>
            <div id="result"></div>

        </td>
    </table></td>
  </tr>

</table>
</body>
</html>



