<!DOCTYPE html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

   
    

    <script type="text/javascript">  
    $(document).ready(function() {

    // The event listener for the file upload
    document.getElementById('txtFileUpload').addEventListener('change', upload, false);

    // Method that checks that the browser supports the HTML5 File API
    function browserSupportFileUpload() {
        var isCompatible = false;
        if (window.File && window.FileReader && window.FileList && window.Blob) {
        isCompatible = true;
        }
        return isCompatible;
    }

    function tojson(data){
        var new_tweets = [];
        for (i in data){
            new_tweets.push(data[i]);
        }
		return new_tweets;
	}
    function upload(evt) {
        if (!browserSupportFileUpload()) {
            alert('The File APIs are not fully supported in this browser!');
            } else {
                var data = null;
                var file = evt.target.files[0];
                var reader = new FileReader();
                var head, res, jsn = [];
                reader.readAsText(file);
                reader.onload = function(event) {
                    var csvData = event.target.result;
                    var str = csvData.toString();
                    res = str.split('\n');
                    alert (res.length);
                    for (i in res){
	                    str = res[i].split(",");
	                    jsn.push(tojson(str));
	                }
                    $('#indata').text(jsn);
                };
                reader.onerror = function() {
                    alert('Unable to read ' + file.fileName);
                };
            }
        }

    });
</script>
    </head>
    <body>
        <div id="dvImportSegments" class="fileupload ">
    <fieldset>
        <legend>Upload your CSV File</legend>
        <input type="file" name="File Upload" id="txtFileUpload" accept=".csv" />
        <p id="indata"></p>
    </fieldset>
    </div>
    <div id="example1" class="handsontable htRowHeaders htColumnHeaders"></div>
    </body>
</html>