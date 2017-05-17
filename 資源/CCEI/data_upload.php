<?php


if(isset($_POST["action"])&&($_POST["action"]=="join")){

	require_once("php/connMysql.php");
    include("php/type.php"); 
}



?>
<style type="text/css">
	
</style>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>長庚早療所</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

    function init(){
        $('#idLable').show();
        $('#typeLable').show();
        $('#numberLable').show();
        $('#reflectionLable').show();
        $('#timeLable').show();
        $('#distanceLable').show();
        $('#catchLable').show();
        $('#angleLable').show();
        $('#dateLable').show();
    };

    $('#typeLable').hide();
    $('#angleLable').hide();

    $("#StructType").change(function(){
        //$("p").hide();
        var val = this.value;
        if (val == 'upper_throw'){
            init();
            $('#typeLable').hide();
            $('#angleLable').hide();
        }else if (val == 'lower_kick') {
            init();
            $('#catchLable').hide();
            $('#angleLable').hide();
        }else if (val == 'lower_shot') {
            init();
            $('#typeLable').hide();
            $('#timeLable').hide();
            $('#distanceLable').hide();
            $('#catchLable').show();
        }else if (val == 'scrollball') {
            init();
            $('#angleLable').hide();
        }else if(val == 'upper_take') {
            init();
            $('#timeLable').hide();
            $('#distanceLable').hide();
            $('#catchLable').hide();
            $('#angleLable').hide();
        }

    });

    $("#formJoin").submit(function() {
        if ($("#id").val() == "") {
            alert("請填寫姓名!");
            document.formJoin.id.focus();
            return false;
        }
        if ($("#id").val() == "") {
            alert("請填寫姓名!");
            document.formJoin.id.focus();
            return false;
        }
    });  
});

</script>
</head>
<body>
<?php if(isset($_GET["loginStats"]) && ($_GET["loginStats"]=="1")){?>
<script language="javascript">
    alert('學生新增成功。');
    window.location.href='index.php';	  
</script>
<?php }?>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
 
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline" >
        <form action="" method="POST" name="formJoin" id="formJoin" >

          <p class="title">資料新增</p>
		  <?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
          <div class="errDiv">ID <?php echo $_GET["username"];?> 已登入在內！</div>
          <?php }?>
          <div class="dataDiv">
            <select name="Type" id="StructType">
                <option value="upper_throw">上肢拋球</option>
                <option value="lower_kick">下肢踢球</option>
                <option value="lower_shot">下肢射門</option>
                <option value="scrollball">上肢斜坡滾球</option>
                <option value="upper_take">上肢拿球反應</option>
            </select>
            <hr size="1" />
            <p class="heading">基本個人資料</p>
            <p id="idLable"><strong>學生ID</strong>：
                <input name="id" type="text" class="normalinput" id="id">
                <font color="#FF0000">*</font><br>
                <span class="smalltext">若不知道學生ID，請到學生資料頁面查詢</span>
            </p>
            <p id="typeLable"><strong>類別</strong>：
                <input id="type" name="type" type="radio" value="1"> 低、左、直線
                <input id="type" name="type" type="radio" value="2"> 中
                <input id="type" name="type" type="radio" value="3"> 高、右、Z線
                <font color="#FF0000">*</font>
            </p>
            <p id="numberLable"><strong>次    數</strong>：
                <input name="number" type="number" id="number">
                <font color="#FF0000">*</font></p>
            <p id="reflectionLable"><strong>反應時間</strong>：
                <input name="reflection" type="number" step="0.001" class="normalinput" id="reflection"> <font color="#FF0000">*</font></p>
            <p id="timeLable"><strong>滯空時間</strong>：
                <input name="time" type="number" class="normalinput" id="time"></p>
            <p id="distanceLable"><strong>上拋高度</strong>：
                <input name="distance" type="number" class="normalinput" step="0.001" id="distance"></p>
            <p id="catchLable"><strong>接住狀態</strong>：
                <input name="catch" type="radio" value="T" checked>是
                <input name="catch" type="radio" value="F">否
            </p>
            <p id="angleLable"><strong>角度</strong> :
                <input type="number" step="0.001" name="angle" id="angle"></p>
            <p id="dateLable"><strong>測驗時間</strong>：
                <input name="date" type="date" class="normalinput" id="date"></p>


            <p> <font color="#FF0000">*</font> 表示為必填的欄位</p>
          </div>
          <hr size="1" />
          <p align="center">
            <input name="action" type="hidden" id="action" value="join">
            <input type="submit" name="Submit2" value="送出申請" id="submit">
            <input type="reset" name="Submit3" value="重設資料">
            <input type="button" name="Submit" value="回上一頁" onClick="window.history.back();">
          </p>
        </form></td>
      
    </table></td>
  </tr>

</table>
</body>
</html>