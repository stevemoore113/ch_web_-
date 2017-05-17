<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");

$q = "SELECT count(*) AS Count FROM`memberdata`";
$result = mysql_query($q);
$result = mysql_fetch_assoc($result);
$count = $result['Count'];
$ranNUM1 = rand(1,$count);
$ranNUM2 = rand(1,$count);

while ($ranNUM1 == $ranNUM2)
		$ranNUM2 = rand(1,$count);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Who is the butiest!</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>

	<script type="text/javascript" src="jquery-1.10.2.min.js"></script>

	<script type="text/javascript">
		$(function () {
			var interval;
			var ofsx = 15;
			var ofsy = 15;
			var ofsr = 10;
			$(".newone").hover(function () {
				var $this = $(this);
				interval = setInterval(function () {
					var x = Math.round(Math.random() * ofsx * 2) - ofsx;
					var y = Math.round(Math.random() * ofsy * 2) - ofsy;
					var r = Math.round(Math.random() * ofsr * 2) - ofsr;
					$this.css({
						"position": "relative",
						"left": x + "px",
						"top": y + "px",
						"-webkit-transform":"rotate(" + r + "deg)", 
						"-moz-transform":"rotate(" + r + "deg)", 
						"-ms-transform":"rotate(" + r + "deg)",
						"-o-transform":"rotate(" + r + "deg)", 
						"transform":"rotate(" + r + "deg)"
					});
				}, 20);
			},function () {
				clearInterval(interval);
				$(this).css({
					"left": 0,
					"top": 0,
					"-webkit-transform":"rotate(0deg)",
					"-moz-transform":"rotate(0deg)",
					"-ms-transform":"rotate(0deg)",
					"-o-transform":"rotate(0deg)",
					"transform":"rotate(0deg)"
				});
			});
		});

	</script>


</head>
<style type="text/css">


</style>
<script type="text/javascript">

document.onkeydown = function(e) {
    switch (e.keyCode) {
        case 37:
            
            break;
        case 38:
            
            break;
    }
};

document.onkeyup = function(e) {
    switch (e.keyCode) {
        case 37:
        
            window.location.href = 'scoreCount.php?win=<?php echo $ranNUM1; ?>&los=<?php echo $ranNUM2; ?>';
            break;
        case 39:
            window.location.href = 'scoreCount.php?win=<?php echo $ranNUM2; ?>&los=<?php echo $ranNUM1; ?>';
            break;
    }
};


//window.location.href = '...';
</script>
<body>
<header id="header">
	<br>
	<h1>FACEMASH</h1>
</header>
<div id="all">
<div id="middle">
	<h3>Were we let in for our looks? No. Will we be judged on them? Yes.</h3>
	<br>
	<h2>Who's Hotter? Click to Choose or used your key.</h2>
	<br>
</div>
<div id ="pic">
		<div id="space"></div>
		<div class="thumb">
			<a class="first" href="scoreCount.php?win=<?php echo $ranNUM1; ?>&los=<?php echo $ranNUM2; ?>"><img class="newone" src="pic/pic<?php echo $ranNUM1; ?>.jpg"></a>
			<a href=""> </a>
			<a class="last" href="scoreCount.php?win=<?php echo $ranNUM2; ?>&los=<?php echo $ranNUM1; ?>"><img class="newone" src="pic/pic<?php echo $ranNUM2; ?>.jpg"></a>
		</div>
</div>
<footer>
	<div id="space2"></div>
	<div class="foot">
		<a href="list.php">Check Score</a>
		<a href="getPic.php">Get More Pic</a>
		<a Target="_new" href="http://facebook.com/1994Leo">About Me</a>
	</div>
	<div id="space2"></div>
</footer>
</div>
</body>
</html>