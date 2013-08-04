<?php
$db = mysql_connect("localhost", "ugacademics", "hack");
$con = mysql_select_db("ugacademics",$db);
$gname=$_POST["gname"];
mysql_query("INSERT INTO gname (name) VALUES ('$gname')");
//CONNECT ugacademics
$sql="CREATE TABLE " . $gname .
	"(name text(25),comment text(500),file_link text(50))";
	mysql_query($sql);
header("location:manager.php");
?>
