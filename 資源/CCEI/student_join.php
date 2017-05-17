<?php


if(isset($_POST["action"])&&($_POST["action"]=="join")){

	require_once("php/connMysql.php");
	require_once("php/typecheck.php");

	$query_RecFindUser = "SELECT s_id FROM student WHERE s_id='{$_POST["s_id"]}'";
	$RecFindUser=$db_link->query($query_RecFindUser);
	if ($RecFindUser->num_rows>0){
		header("Location: member_join_s.php?errMsg=1&username={$_POST["s_id"]}");
	}else{
		$query_insert = "INSERT INTO student (s_id, s_name, s_sex, s_birthday, s_email, s_phone, s_address, s_high, s_weight, s_hand, s_foot, s_bmi, s_teacher, s_school, s_grade, s_class, s_obstacle, s_text, s_jointime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
		$stmt = $db_link->prepare($query_insert);
        $bmi = round((float)$_POST["s_weight"]/((float)$_POST["s_high"]*(float)$_POST["s_high"]), 2);
		$stmt->bind_param("ssssssssssssssssss", 
			GetSQLValueString($_POST["s_id"], 'string'),
			GetSQLValueString($_POST["s_name"], 'string'),
			GetSQLValueString($_POST["s_sex"], 'string'),
			GetSQLValueString($_POST["s_birthday"], 'string'),
			GetSQLValueString($_POST["s_email"], 'email'),
			GetSQLValueString($_POST["s_phone"], 'string'),
			GetSQLValueString($_POST["s_address"], 'string'),
			GetSQLValueString($_POST["s_high"], 'string'),
			GetSQLValueString($_POST["s_weight"], 'string'),
			GetSQLValueString($_POST["s_hand"], 'string'),
			GetSQLValueString($_POST["s_foot"], 'string'),
			$bmi, //here to change
			GetSQLValueString($_POST["s_teacher"], 'string'),
			GetSQLValueString($_POST["s_school"], 'string'),
			GetSQLValueString($_POST["s_grade"], 'string'),
			GetSQLValueString($_POST["s_class"], 'string'),
			GetSQLValueString(implode(",", $_POST['s_obstacle']), 'string'),
			GetSQLValueString($_POST["s_text"], 'string'));
		$stmt->execute();
		$stmt->close();
		$db_link->close();
		header("Location: member_join_s.php");
		
	}
}
?>
<style type="text/css">
	
</style>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>長庚早療所</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script language="javascript">

function checkForm(){
	if(document.formJoin.s_name.value==""){
		alert("請填寫姓名!");
		document.formJoin.s_name.focus();
		return false;}
	if(document.formJoin.s_birthday.value==""){
		alert("請填寫生日!");
		document.formJoin.s_birthday.focus();
		return false;}
	
	return confirm('確定送出嗎？');
}

function checkmail(myEmail) {
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(filter.test(myEmail.value)){
		return true;}
	alert("電子郵件格式不正確");
	return false;
}

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
        <form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">

          <p class="title">新增學生</p>
		  <?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
          <div class="errDiv">ID <?php echo $_GET["username"];?> 已登入在內！</div>
          <?php }?>
          <div class="dataDiv">
            <hr size="1" />
            <p class="heading">基本個人資料</p>
            <p><strong>姓    名</strong>：
            <input name="s_name" type="text" class="normalinput" id="s_name">
            <font color="#FF0000">*</font></p>
            <p><strong>性    別</strong>：
            <input name="s_sex" type="radio" value="女" checked>女
            <input name="s_sex" type="radio" value="男">男
            <font color="#FF0000">*</font></p>
            <p><strong>生    日</strong>：
            <input name="s_birthday" type="date" class="normalinput" id="s_birthday">
            <font color="#FF0000">*</font> <br>
            <span class="smalltext">為西元格式(YYYY-MM-DD)。</span></p>
            <p><strong>學生編號</strong>：
            <input name="s_id" type="text" class="normalinput" id="s_id">
            <br><span class="smalltext">學生在校學號或任何編號</span>
            <p><strong>身    高</strong>：
            <input name="s_high" type="number" step="0.01" class="normalinput" id="s_high">
            </p>
            <p><strong>體    重</strong>：
            <input name="s_weight" type="number" step="0.01" class="normalinput" id="s_weight">
            </p>
            <p><strong>手    長</strong>：
            <input name="s_hand" type="number" step="0.01" class="normalinput" id="s_hand">
            <p><strong>腳    長</strong>：
            <input name="s_foot" type="number" step="0.01" class="normalinput" id="s_foot">
            <p><strong>電子郵件</strong>：
            <input name="s_email" type="email" class="normalinput" id="s_email">
            <p><strong>電　　話</strong>：
            <input name="s_phone" type="text" class="normalinput" id="s_phone"></p>
            <p><strong>住　　址</strong>：
            <input name="s_address" type="text" class="normalinput" id="s_address" size="40"></p>
            <p><strong>老    師</strong>：
            <input name="s_teacher" type="text" class="normalinput" id="s_teacher"></p>
            <p><strong>家    長</strong>：
            <input name="s_parents" type="text" class="normalinput" id="s_parents">
            </p>
            <p><strong>學    校</strong>：
            <input name="s_school" type="text" class="normalinput" id="s_school">
            </p>
            <p><strong>年    級</strong>：
            <input name="s_grade" type="radio" value="一">一
            <input name="s_grade" type="radio" value="二">二
            <input name="s_grade" type="radio" value="三">三
            </p>
            <p><strong>班    級</strong>：
            <input name="s_class" type="number" class="normalinput" id="s_class">
            <br><span class="smalltext">請輸入阿拉伯數字。</span></p>
            <p><strong>障礙類別</strong>：<br>
            
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="智能障礙"> 智能障礙
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="視覺障礙"> 視覺障礙
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="聽覺障礙"> 聽覺障礙
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="身體病弱"> 身體病弱
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="嚴重情緒障礙"> 嚴重情緒障礙
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="學習障礙"> 學習障礙
            <!--
			<select name="s_obstacle" multiple>
			  <option value="智能障礙">智能障礙</option>
			  <option value="視覺障礙">視覺障礙</option>
			  <option value="聽覺障礙">聽覺障礙</option>
			  <option value="嚴重情緒障礙">嚴重情緒障礙</option>
			</select>--></p>
            <p><strong>備    註</strong>：
            <p><textarea name="s_text" id="s_text" cols="80" rows="5"></textarea></p>
            <p> <font color="#FF0000">*</font> 表示為必填的欄位</p>
          </div>
          <hr size="1" />
          <p align="center">
            <input name="action" type="hidden" id="action" value="join">
            <input type="submit" name="Submit2" value="送出申請">
            <input type="reset" name="Submit3" value="重設資料">
            <input type="button" name="Submit" value="回上一頁" onClick="window.history.back();">
          </p>
        </form></td>
      
    </table></td>
  </tr>

</table>
</body>
</html>