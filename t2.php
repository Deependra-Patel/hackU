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
} 
else{
    echo "There was an error uploading the file, please try again!";
}
}
else $target_file="";
if($comment!=""||$target_file!=""){
$insertt="INSERT INTO " . $name . " (name,comment,file_link) VALUES ('$username','$comment','$target_path')";
		mysql_query($insertt);
		
		$headvar = "location:employee.php?name=" . $name;
		
		header($headvar);
		}
		else {
		$headvar = "location:employee.php?name=" . $name;
		header($headvar);
		}
		?>