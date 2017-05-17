<?php


header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");

#echo $_GET["win"]."<br>".$_GET["los"];

$q = "SELECT `Score` FROM `memberdata` WHERE `ID` =".$_GET['win'];
$result = mysql_query($q);
$win = mysql_fetch_array($result);

$q = "SELECT `Score` FROM `memberdata` WHERE `ID` =".$_GET['los'];
$result = mysql_query($q);
$los = mysql_fetch_array($result);
/*
echo $win['Score']."<br>".$los['Score'];
$win = intval($win['Score']);
$los = intval($los['Score']);
echo $win."<br>".$los;
*/

$Ea = 1/(1+10*($win['Score']-$los['Score'])/400);
$Eb = 1/(1+10*($win['Score']-$los['Score'])/400);
echo $Ea."<br>".$Eb."<br>";
$win = $win['Score'] + 10*(1-$Ea);
$los = $los['Score'] + 10*(0-$Eb);
echo $win."<br>".$los;

$q = "UPDATE `memberdata` SET `Score`=".$win." WHERE `ID`=".$_GET['win'];
mysql_query($q);

$q = "UPDATE `memberdata` SET `Score`=".$los." WHERE `ID`=".$_GET['los'];
mysql_query($q);




header('Location:index.php')
/*

Ea = 1/(1+10*(Rb-Ra)/400)
Eb = 1/(1+10*(Ra-Rb)/400)

RwinnerNew = Rwinner + K * (1 - Ewinner)
RloserNew = Rloser + K * (0 - Eloser)

K: is a number which controls the amount by which score changes occur. Smaller number = smaller score increase/decrease per round, larger number equals the opposite. Right here I chose 10, and you can chose what you like!

If Ra = 1450 and Rb = 1350. Thus base on the algorithon on the top, we know that Ea = 0.64 and Eb = 0.36.
And the new score of Ra and Rb will be like below.

Ra' = Ra + K * (1 - 0.64) = 1450 + 10 * (0.36) = 1453.6
Rb' = Rb + K * (0 - 0.36) = 1350 + 10 * (-0.36) = 1346.4


*/

?>

