<?php
function GetSQLValueString($theValue, $theType) {
  switch ($theType) {
    case "string":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_MAGIC_QUOTES) : "";
      break;
    case "int":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
      break;
    case "email":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_EMAIL) : "";
      break;
    case "url":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_URL) : "";
      break;      
  }
  return $theValue;
}
require_once("php/connMysql.php");
session_start();
//檢查是否經過登入
/*
if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	header("Location: index.php");
}*/
//執行登出動作
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["loginMember"]);
	unset($_SESSION["memberLevel"]);
	header("Location: index.php");
}
//重新導向頁面
$redirectUrl="student_list.php";
//執行更新動作

if(isset($_POST["action"])&&($_POST["action"]=="update")){
	$query_update = "UPDATE student SET s_id=?, s_name=?, s_sex=?, s_birthday=?, s_email=?, s_phone=?, s_address=?, s_high=?, s_weight=?, s_hand=?, s_foot=?, s_teacher=?, s_school=?, s_grade=?, s_class=?, s_obstacle=?, s_text=? WHERE s_id={$_POST["s_id"]}";
  $obstacle = implode(",", $_POST['s_obstacle']);
	$stmt = $db_link->prepare($query_update);

	$stmt->bind_param("sssssssssssssssss", 
      $_POST["s_id"],
      $_POST["s_name"],
      $_POST["s_sex"],
      $_POST["s_birthday"],
      $_POST["s_email"],
      $_POST["s_phone"],
      $_POST["s_address"],
      $_POST["s_high"],
      $_POST["s_weight"],
      $_POST["s_hand"],
      $_POST["s_foot"],
      $_POST["s_teacher"],
      $_POST["s_school"],
      $_POST["s_grade"],
      $_POST["s_class"],
      $obstacle,
      $_POST["s_text"]);
	$stmt->execute();
	$stmt->close();
	//重新導向
	//header("Location: $redirectUrl");
}

//繫結登入會員資料
$query_RecMember = "SELECT * FROM student WHERE s_id='{$_GET['s_id']}'";
$RecMember = $db_link->query($query_RecMember);	
$studnetInfo = $RecMember->fetch_assoc();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>長庚早療所</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td class="tdbline"><img src="images/mlogo.jpg" alt="會員系統"  height="67"></td>
  </tr>
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
          <div class="dataDiv">
            <hr size="1" />
            <p class="heading">基本個人資料</p>
            <p><strong>姓    名</strong>：
            <input name="s_name" type="text" class="normalinput" id="s_name" value="<?php echo $studnetInfo['s_name']; ?>">
            <font color="#FF0000">*</font></p>
            <p><strong>性    別</strong>：
            <input name="s_sex" type="radio" value="女" <?php if ($studnetInfo['s_sex']=='女') echo 'checked'; ?>>女
            <input name="s_sex" type="radio" value="男" <?php if ($studnetInfo['s_sex']=='男') echo 'checked'; ?>>男
            <font color="#FF0000">*</font></p>
            <p><strong>生    日</strong>：
            <input name="s_birthday" type="date" class="normalinput" id="s_birthday" value="<?php echo $studnetInfo['s_birthday']; ?>">
            <font color="#FF0000">*</font> <br>
            <span class="smalltext">為西元格式(YYYY-MM-DD)。</span></p>
            <p><strong>學生編號</strong>：
            <input name="s_id" type="text" class="normalinput" id="s_id" value="<?php echo $studnetInfo['s_id']; ?>">
            <br><span class="smalltext">學生在校學號或任何編號</span>
            <p><strong>身    高</strong>：
            <input name="s_high" type="number" step="0.01" class="normalinput" id="s_high" value="<?php echo $studnetInfo['s_high']; ?>">
            </p>
            <p><strong>體    重</strong>：
            <input name="s_weight" type="number" step="0.01" class="normalinput" id="s_weight" value="<?php echo $studnetInfo['s_weight']; ?>">
            </p>
            <p><strong>手    長</strong>：
            <input name="s_hand" type="number" step="0.01" class="normalinput" id="s_hand" value="<?php echo $studnetInfo['s_hand']; ?>">
            <p><strong>腳    長</strong>：
            <input name="s_foot" type="number" step="0.01" class="normalinput" id="s_foot" value="<?php echo $studnetInfo['s_foot']; ?>">
            <p><strong>電子郵件</strong>：
            <input name="s_email" type="email" class="normalinput" id="s_email" value="<?php echo $studnetInfo['s_email']; ?>">
            <p><strong>電　　話</strong>：
            <input name="s_phone" type="text" class="normalinput" id="s_phone" value="<?php echo $studnetInfo['s_phone']; ?>"></p>
            <p><strong>住　　址</strong>：
            <input name="s_address" type="text" class="normalinput" id="s_address" size="40" value="<?php echo $studnetInfo['s_address']; ?>"></p>
            <p><strong>老    師</strong>：
            <input name="s_teacher" type="text" class="normalinput" id="s_teacher" value="<?php echo $studnetInfo['s_teacher']; ?>"></p>
            <p><strong>家    長</strong>：
            <input name="s_parents" type="text" class="normalinput" id="s_parents" value="<?php echo $studnetInfo['s_parents']; ?>">
            </p>
            <p><strong>學    校</strong>：
            <input name="s_school" type="text" class="normalinput" id="s_school" value="<?php echo $studnetInfo['s_school']; ?>">
            </p>
            <p><strong>年    級</strong>：
            <input name="s_grade" type="radio" value="一" <?php if ($studnetInfo['s_grade']=='一') echo 'checked'; ?>>一
            <input name="s_grade" type="radio" value="二" <?php if ($studnetInfo['s_grade']=='二') echo 'checked'; ?>>二
            <input name="s_grade" type="radio" value="三" <?php if ($studnetInfo['s_grade']=='三') echo 'checked'; ?>>三
            </p>
            <p><strong>班    級</strong>：
            <input name="s_class" type="number" class="normalinput" id="s_class" value="<?php echo $studnetInfo['s_class']; ?>">
            <br><span class="smalltext">請輸入阿拉伯數字。</span></p>
            <p><strong>障礙類別</strong>：<br>
            
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="智能障礙" <?php if (strpos($studnetInfo['s_obstacle'], '智能障礙') !== false) echo "checked";?>> 智能障礙
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="視覺障礙" <?php if (strpos($studnetInfo['s_obstacle'], '視覺障礙') !== false) echo "checked";?>> 視覺障礙
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="聽覺障礙" <?php if (strpos($studnetInfo['s_obstacle'], '聽覺障礙') !== false) echo "checked";?>> 聽覺障礙
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="身體病弱" <?php if (strpos($studnetInfo['s_obstacle'], '身體病弱') !== false) echo "checked";?>> 身體病弱
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="嚴重情緒障礙"> 嚴重情緒障礙
            <input id="s_obstacle" name="s_obstacle[]" type="checkbox" value="學習障礙" <?php if (strpos($studnetInfo['s_obstacle'], '學習障礙') !== false) echo "checked";?>> 學習障礙</p>
            <p><strong>備    註</strong>：
            <p><textarea name="s_text" id="s_text" cols="80" rows="5"><?php echo $studnetInfo['s_text']; ?></textarea></p>
            <p> <font color="#FF0000">*</font> 表示為必填的欄位</p>
          </div>
          <hr size="1" />
          <p align="center">
            
            <input name="action" type="hidden" id="action" value="update">
            <input type="submit" name="Submit2" value="修改資料">
            <input type="reset" name="Submit3" value="重設資料">
            <input type="button" name="Submit" value="回上一頁" onClick="window.history.back();">
          </p>
        </form></td>
      
    </table></td>
  </tr>

</table>
</body>
</html>
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
<?php
	$db_link->close();
?>