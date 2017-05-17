<?php
  
  header("Content-Type: text/html; charset=utf-8");
  include("php/connMysql.php");
  $sql_query = "SELECT * FROM memberdata";
  $result = $db_link->query($sql_query);
  $emparray = array();


  while($row_result = $result->fetch_row()){
    array_push($row_result, "true");
    $emparray[] = $row_result;

  }
?>

<!DOCTYPE html>
  <html>
  <head>
    <title>save and load try</title>
    <meta charset="UTF-8">
    <script src="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.js"></script>
    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.min.css">
  </head>
  <body>
    <h1>線上編輯</h1>
    <p>收尋：<input id="search_field" type="search" placeholder="Search"></p>
    <div id="example1" class="hot handsontable"></div>
    <br/>
    <button id="btn">送交審查</button>
    <button id="undo">Undo</button>
    <div id="result"></div>
  </body>

  <script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
  var
    data = <?php echo json_encode($emparray);?>,
    example = document.getElementById('example1'),
    searchFiled = document.getElementById('search_field'),
    hot, check = true;
  
  hot = new Handsontable(example, {
    data: data,
    colHeaders: ["ID", "clin", "名字", "帳號", "密碼", "性別", "生日", "權限", "email", "url", "手機",,,,"選取"],
    search: true,
    manualColumnFreeze: true,
    columns: [
    {},{},{},{},{},{},{},{},{},{},{},{},{},{},{type: 'checkbox'}],
    currentRowClassName: 'currentRow',
    currentColClassName: 'currentCol',
    autoWrapRow: true
  
  });
  
  function onlyExactMatch(queryStr, value) {
    return queryStr.toString() === value.toString();
  }
  
  Handsontable.Dom.addEvent(searchFiled, 'keyup', function (event) {
    var queryResult = hot.search.query(this.value);
    console.log(queryResult);
    hot.render();
  });
  
    hot.selectCell(1,1);

  function bindDumpButton() {
      if (typeof Handsontable === "undefined") {
        return;
      }
  
      Handsontable.Dom.addEvent(document.body, 'click', function (e) {
  
        var element = e.target || e.srcElement;
  
        if (element.nodeName == "BUTTON" && element.name == 'dump') {
          var name = element.getAttribute('data-dump');
          var instance = element.getAttribute('data-instance');
          var hot = window[instance];
          console.log('data of ' + name, hot.getData());
        }
      });
    }
  bindDumpButton();
  undo();
  document.getElementById('btn').onclick = function(){
    var abc, ans='';
    abc = hot.getData();
    for (var i=0;i<abc.length;i++){
      ans+=abc[i];
    }
    head('save.php');
    document.getElementById('result').textContent = abc;
  };

  document.getElementById('undo').onclick = function(){
   undo();
    
  };

});
</script>

<style type="text/css">
body {background: white; margin: 20px;}

.handsontable .currentRow {
  background-color: #E7E8EF;
}

.handsontable .currentCol {
  background-color: #F9F9FB;
}
</style>
</html>