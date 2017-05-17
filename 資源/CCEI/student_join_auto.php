

<!DOCTYPE html>
<html>
<head>
	<title>update</title>
    <meta charset="UTF-8">
    <script src="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.js"></script>
    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.min.css">
    <script src="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.js"></script>
    <link rel="stylesheet" href="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.css">
    <script src="js/handsontable-chosen-editor.js"></script>
    
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
        header = ['姓名', '性別', '生日','學生編號','身高','體重','手長','腳長','電子郵件','電話','住址','老師','家長','學校','年級','班級','障礙類別','備註'];
        example = document.getElementById('example1'),
        selectFirst = document.getElementById('selectFirst'),
        rowHeaders = document.getElementById('rowHeaders'),
        colHeaders = document.getElementById('colHeaders'),
        searchFiled = document.getElementById('search_field'),
        hot = new Handsontable(example, {
            startRows: 1,
            startCols: 18,
            colHeaders: header,
            rowHeaders: true,
            dropdownMenu: true,
            columns: [{},{
                type: 'dropdown',
                source: ['男', '女']},
                {
                type: 'date',
                dateFormat: 'MM/DD/YYYY'},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{}],
            search: true,
            autoWrapRow: true,
            outsideClickDeselects: false,
            removeRowPlugin: true,
            contextMenu: true
        });

        Handsontable.Dom.addEvent(document.getElementById('update'), 'click', loadhs);
        Handsontable.Dom.addEvent(document.getElementById('undo'), 'click', function() {
            hot.undo();
        });

        Handsontable.Dom.addEvent(searchFiled, 'keyup', function (event) {
            var queryResult = hot.search.query(this.value);
            console.log(queryResult);
            hot.render();
        });

        document.getElementById('btn').onclick = function(){
           // if (controller == 1){
                var file, ans='';
                file = hot.getData();
                //file = JSON.stringify(file);
                for (i in file){
                  ans+=file[i];
                }
                document.getElementById('check').innerText = ans;
                /*
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        location.reload();
                    }
                };
                xmlhttp.open("GET", "php/save.php?data="+file+"&len="+col+"&type="+document.getElementById('StructType').value);
                xmlhttp.send();
                */
                //window.open("php/save.php?data="+file+"&len="+col+"&type="+document.getElementById('StructType').value); 
           // }
            //else if(controller == 0)
               // alert('請先執行預覽資料，確認資料後再上傳！');
            //document.getElementById('result').textContent = file;
        };

        Handsontable.Dom.addEvent(selectFirst, 'click', function () {
           hot.selectCell(0,0);
        });
        Handsontable.Dom.addEvent(rowHeaders, 'click', function () {
          hot.updateSettings({
            rowHeaders: this.checked
          });
        });
        Handsontable.Dom.addEvent(colHeaders, 'click', function () {
          hot.updateSettings({
            colHeaders: this.checked
          });
        });
        function customDropdownRenderer(instance, td, row, col, prop, value, cellProperties) {
            var selectedId;
            var optionsList = cellProperties.chosenOptions.data;

            var values = (value + "").split(",");
            var value = [];
            for (var index = 0; index < optionsList.length; index++) {
                if (values.indexOf(optionsList[index].id + "") > -1) {
                    selectedId = optionsList[index].id;
                    value.push(optionsList[index].label);
                }
            }
            value = value.join(", ");
            
            Handsontable.TextCell.renderer.apply(this, arguments);
        }
        function onlyExactMatch(queryStr, value) {
            return queryStr.toString() === value.toString();
        }
        function loadhs(){
            jsn = [];
            controller = 1;
            var fileInput = document.getElementById("csv");
            var reader = new FileReader();
            var head;
            reader.onload = function () {
                str = reader.result;
                str = str.toString();
                var res = str.split("\n");
                head = res[0].split(',');
                for (i in res){
                    str = res[i].split(",");
                    jsn.push(tojson(str));
                }
                jsn.shift();
                hot.updateSettings({
                  colHeaders: headName[document.getElementById('StructType').value],
                })
                col = res.length;
                row = head.length;
                //alert(row);
                if (row == structNum[document.getElementById('StructType').value]){
                    hot.loadData(jsn);
                    hot.updateSettings({
                      startCols: headName[document.getElementById('StructType').value].length,
                      persistentState: true,
                      minSpareRows: 1
                    })
                }
                else{
                    alert('輸入的資料格式有誤，請先確選擇了正確的資料型態\n並以正確的格式上傳，詳情請查閱使用說明');
                    controller = 0;
                }
            };

            reader.readAsBinaryString(fileInput.files[0]);
        }
    }


</script>
<body>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">

  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline" >
       

          <p class="title">新增學生資料</p>
          <hr size="1" />
            <p>檔案選擇：<input id="csv" type="file"></p>
                <button id='update'>預覽資料</button>
                <button id="btn">確認上傳</button>
            
            <h1 id ='out'>資料預覽</h1>
            <p>收尋：<input id="search_field" type="search" placeholder="Search"><button id='undo'>undo</button></p>
            <div id="example1" class="hot handsontable"></div>
            <br/>
            <div id="result"></div>

        </td>
    </table></td>
  </tr>
<p id='check'></p>
</table>
</body>
</html>

<script type="text/javascript">
        /*function update(){
        jsn = [];
        var fileInput = document.getElementById("csv");
        var reader = new FileReader();
        reader.onload = function () {
            str = reader.result;
            str = str.toString();
            //document.getElementById("out").innerText = str;
            var res = str.split("\n");
            for (var i=1;i<res.length;i++){
                str = res[i].split(",");
                jsn.push(tojson(str));
            }
            return str;
        };

        reader.readAsBinaryString(fileInput.files[0]);
    }*/
</script>





