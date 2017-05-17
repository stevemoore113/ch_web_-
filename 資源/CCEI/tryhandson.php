<!DOCTYPE html>
<html>
<head>
	<title>tryhandson</title>
	<script src="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.js"></script>
  <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.min.css">
  <script src="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.js"></script>
  <link rel="stylesheet" href="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.css">
</head>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {

  var
    data = [
      ['', 'Kia', 'Nissan', 'Toyota', 'Honda', 'Mazda', 'Ford'],
      ['2012', 10, 11, 12, 13, 15, 16],
      ['2013', 10, 11, 12, 13, 15, 16],
      ['2014', 10, 11, 12, 13, 15, 16],
      ['2015', 10, 11, 12, 13, 15, 16],
      ['2016', 10, 11, 12, 13, 15, 16]
    ],
    container = document.getElementById('example1'),
    selectFirst = document.getElementById('selectFirst'),
    rowHeaders = document.getElementById('rowHeaders'),
    colHeaders = document.getElementById('colHeaders'),
    hot;
  
  hot = new Handsontable(container, {
    rowHeaders: true,
    colHeaders: true,
    outsideClickDeselects: false,
    removeRowPlugin: true
  });
  hot.loadData(data);
  
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

});
</script>
<body>
	<div id="example1" class="hot htRemoveRow handsontable htRowHeaders htColumnHeaders"></div>

</body>
</html>