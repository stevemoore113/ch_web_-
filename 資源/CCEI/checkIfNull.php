<!DOCTYPE html>
<html>
<head>
	<title>check if null</title>
	<!-- Ugly Hack due to jsFiddle issue -->
	<script src="https://docs.handsontable.com/pro/1.9.0/bower_components/handsontable-pro/dist/handsontable.full.min.js"></script>
	<link type="text/css" rel="stylesheet" href="https://docs.handsontable.com/pro/1.9.0/bower_components/handsontable-pro/dist/handsontable.full.min.css">
</head>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function() {

  var data = [
      {id: 1, name: 'Ted', isActive: true, color: 'orange', date: '2015-01-01'},
      {id: 2, name: 'John', isActive: false, color: 'black', date: null},
      {id: 3, name: 'Al', isActive: true, color: 'red', date: null},
      {id: 4, name: 'Ben', isActive: false, color: 'blue', date: null}
    ],
    container = document.getElementById('example1'),
    hot1,
    yellowRenderer,
    greenRenderer;
  
  yellowRenderer = function(instance, td, row, col, prop, value, cellProperties) {
    Handsontable.renderers.TextRenderer.apply(this, arguments);
    td.style.backgroundColor = 'yellow';
  
  };
  
  greenRenderer = function(instance, td, row, col, prop, value, cellProperties) {
    Handsontable.renderers.TextRenderer.apply(this, arguments);
    
    if (value === '' || value == null ){
    	td.style.backgroundColor = 'yellow';
    };
  
  };
  
  hot1 = new Handsontable(container, {
    data: data,
    startRows: 5,
    colHeaders: true,
    minSpareRows: 1,
    columns: [
      {data: "id", type: 'text'},
      // 'text' is default, you don't actually need to declare it
      {data: "name", renderer: yellowRenderer},
      // use default 'text' cell type but overwrite its renderer with yellowRenderer
      {data: "isActive", type: 'checkbox'},
      {data: "date", type: 'date', dateFormat: 'YYYY-MM-DD'},
      {data: "color",
        type: 'autocomplete',
        source: ["yellow", "red", "orange", "green", "blue", "gray", "black", "white"]
      }
    ],
    cell: [
      {row: 1, col: 0, renderer: greenRenderer}
    ],
    cells: function (row, col, prop) {
      if (col === 1 ) {
        this.renderer = greenRenderer;
      }
    }
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
<div id="example1" class="hot handsontable htColumnHeaders"></div>
</body>
</html>