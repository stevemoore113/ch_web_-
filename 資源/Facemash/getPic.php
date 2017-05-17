<?php

	if (isset($_GET['start'])) {

		#header("Location: creatfile.php");
		header("Locatoin: index.php");
	} 



?>
<!DOCTYPE html>
<html>
<head>
	<title>Get Pic</title>
</head>
<body style="position: center;"><form action="" method="GET">
	Start: <input type="text" name="start"></input><br><br>
	end: <input type="text" name="end"></input><br><br>

	<input type="submit" value="Let Hack"></input>
	</form>
</body>
</html>