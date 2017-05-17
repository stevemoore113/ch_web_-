<?php
require_once("php/connMysql.php");
session_start();
if(isset($_SESSION["loginMember"]) && ($_SESSION["loginMember"]!="")){
  if($_SESSION["memberLevel"]=="member"){
    header("Location: member_center.php");
  }else{
    header("Location: member_admin.php"); 
  }
}

if(isset($_POST["username"]) && isset($_POST["passwd"])){
	//繫結登入會員資料
	$query_RecLogin = "SELECT m_username, m_passwd, m_level, m_statue FROM memberdata WHERE m_username=?";
	$stmt=$db_link->prepare($query_RecLogin);
	$stmt->bind_param("s", $_POST["username"]);
	$stmt->execute();
	//取出帳號密碼的值綁定結果
	$stmt->bind_result($username, $passwd, $level, $statue);	
	$stmt->fetch();
	$stmt->close();
	//比對密碼，若登入成功則呈現登入狀態
	if(password_verify($_POST["passwd"],$passwd) && $statue == 'true'){
		//計算登入次數及更新登入時間
		$query_RecLoginUpdate = "UPDATE memberdata SET m_login=m_login+1, m_logintime=NOW() WHERE m_username=?";
		$stmt=$db_link->prepare($query_RecLoginUpdate);
	    $stmt->bind_param("s", $username);
	    $stmt->execute();	
	    $stmt->close();
		//設定登入者的名稱及等級
		$_SESSION["loginMember"]=$username;
		$_SESSION["memberLevel"]=$level;
		//使用Cookie記錄登入資料
		if(isset($_POST["rememberme"])&&($_POST["rememberme"]=="true")){
			setcookie("remUser", $_POST["username"], time()+365*24*60);
			setcookie("remPass", $_POST["passwd"], time()+365*24*60);
		}else{
			if(isset($_COOKIE["remUser"])){
				setcookie("remUser", $_POST["username"], time()-100);
				setcookie("remPass", $_POST["passwd"], time()-100);
			}
		}
		//若帳號等級為 member 則導向會員中心
		if($_SESSION["memberLevel"]=="member"){
			header("Location: homePage.php");
		//否則則導向管理中心
		}else{
			header("Location: member_admin.php");	
		}
	}else if($statue == 'false'){
		header("Location: index.php?errMsg=2");
	}else{
    header("Location: index.php?errMsg=1");
  }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>長庚早療所</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
</head>
<body>

    <div class="w3-container">
  <!-- <button id = "gogos" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button> -->


  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="http://www.cgu.edu.tw/ezfiles/8/1008/img/42/mark.gif" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>
<?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
            <div class="errDiv"> 登入帳號或密碼錯誤！</div>
            <?php }else if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="2")){?>
            <div class="errDiv"> 登入帳號尚未被核准！</div>
            <?php } ?>
      <form class="w3-container" name="form1" method="post" action="">
        <div class="w3-section">
            <p class="heading">登入會員系統</p>
            <form name="form1" method="post" action="">
              <p>帳號：
                <br>
                <input name="username" type="text" class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" id="username" value="<?php if(isset($_COOKIE["remUser"]) && ($_COOKIE["remUser"]!="")) echo $_COOKIE["remUser"];?>">
              </p>
              <p>密碼：<br>
                <input name="passwd" type="password" class="w3-input w3-border"  placeholder="Enter Password"  id="passwd" value="<?php if(isset($_COOKIE["remPass"]) && ($_COOKIE["remPass"]!="")) echo $_COOKIE["remPass"];?>">
              </p>
              <p>
                <input name="rememberme" type="checkbox" id="rememberme" value="false">
                記住我的帳號密碼。
              </p>
              <p align="center">
                <button id="goto" class="w3-button w3-red" name="button">登入系統</button>
                <input style="display:none" type="submit" class="w3-button w3-red" name="button" id="button" value="登入系統">
              </p>
              </form>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <!-- <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button> -->
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password</a> <a href="member_join.php">註冊會員</a><a href="http://127.0.0.1/index11/succesed">  訪客登入</a></span>
        
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">


$(function() {
$( document ).ready(function() {
   //$('#gogos').click();
  document.getElementById('id01').style.display='block';
});



$('#goto').click(

  function() {    

        $("#id01").fadeToggle();
        $("#id01").fadeToggle("slow");
        $("#id01").fadeToggle(1000);
        setTimeout(function(){ $('#button').click();}, 2000);
            }



        
    
            






            );







});
</script>






     
           
</body>
</html>
<?php
	$db_link->close();
?>