<?php
session_start();
ob_start();
$db = mysql_connect("localhost", "ugacademics", "hack");
mysql_select_db("ugacademics",$db);

	if(!isset($_SESSION['username']))
	{
		header("location:index.php");
	}
	$username=$_SESSION['username'];
$target_path = "uploads/$username";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
 mysql_query("UPDATE employee SET pic='$target_path' WHERE username='$username'");
header('location:employee.php');
} else{
    echo "There was an error uploading the file, please try again!";
}
?>