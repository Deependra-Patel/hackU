<?php
$db = mysql_connect("localhost", "ugacademics", "hack");
		mysql_select_db("ugacademics",$db);
		$username=$_POST["username"];
		$comment=$_POST['comment'];
		$name=$_POST["name"];
		if($_FILES['uploadedfile']['name']!=""){

$target_path = "uploads/$username";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}
}
else $target_file="";
if($comment!=""||$target_file!=""){

if($_POST['name']!=$username)
	{	
		
		
		//$time=time();
		$insertt="INSERT INTO " . $name . " (name,comment,file_link) VALUES ('$username','$comment','$target_path')";
		mysql_query($insertt);
		
		$headvar = "location:manager.php?name=" . $name;
		
		header($headvar);
	}
else 
	{
		$result = mysql_query("SELECT * FROM gname",$db);
$store = array();
while ($myrow = mysql_fetch_array($result))
{
array_push($store,$myrow["name"]);
}
echo sizeof($store);
for($x=1;$x<=sizeof($store);$x++)
	{
	$name=$store[$x-1];
		//$time=time();
		$insertt="INSERT INTO " . $name . " (name,comment,file_link) VALUES ('$username','$comment','$target_path')";
		mysql_query($insertt);
		
}
	header("location:manager.php");
	//print_r($_POST);
	}
	}
	else {
	$headvar = "location:manager.php?name=" . $name;
		
		header($headvar);
		}
?>