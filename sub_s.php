<?php
session_start();
ob_start();
$username=$_SESSION['username'];
$title=$_POST['title'];
$ans=$_POST['ans'];
$target_path = "uploads/$username";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

$db = mysql_connect("localhost", "ugacademics", "hack");
mysql_select_db("ugacademics",$db);

$result=mysql_query("SELECT * FROM work WHERE id='$title'");
$mydata=mysql_fetch_assoc($result);

$sql="UPDATE work SET file_link='$target_path' , status='1' WHERE id='$title'";
mysql_query($sql);
echo $sql;

header("location:to_do.php");
?>