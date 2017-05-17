<?php
require_once("php/connMysql.php");
session_start();

if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	header("Location: index.php");
}

if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["loginMember"]);
	unset($_SESSION["memberLevel"]);
	header("Location: index.php");
}
//繫結登入會員資料
$query_RecMember = "SELECT * FROM memberdata WHERE m_username = '{$_SESSION["loginMember"]}'";
$RecMember = $db_link->query($query_RecMember);	
$row_RecMember=$RecMember->fetch_assoc();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網站會員系統</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td class="tdbline"><img src="images/mlogo.jpg" alt="會員系統"  height="67"></td>
  </tr>
  <tr>
    <td class="tdbline"><table width="90%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><p class="title">長庚早療所</p>
          <p>成功登入</p>
         
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
        <div class="regbox">
          <p class="heading"><strong>會員系統</strong></p>
            <p><strong><?php echo $row_RecMember["m_name"];?></strong>  您好。</p>
            <p>您總共登入了 <?php echo $row_RecMember["m_login"];?> 次。<br>
            本次登入的時間為：<br>
            <?php echo $row_RecMember["m_logintime"];?></p>
            <p >
              <a href="member_update.php">修改資料</a> | 
              <a href="?logout=true">登出系統</a>
            </p>
        </div>
        <div class="boxbl"></div><div class="boxbr"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
	$db_link->close();
?>