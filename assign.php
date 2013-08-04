<?php
$db = mysql_connect("localhost", "ugacademics", "hack");
if (!$db) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("ugacademics",$db);
		
$person=$_POST['person'];
$workstat=$_POST['workstat'];
$deadline=$_POST['deadline'];
$name=$_POST['name'];
$username=$_POST['username'];


$sql="INSERT INTO work(description,group_name,person,deadline) VALUES ('$workstat','$name','$person','$deadline')";
echo $sql;
if($name==$username){
header("location:assign_work.php");
}
else{
echo "Comes here ---";
mysql_query($sql);
header("location:manager.php");

}
/*else {
	echo "error in work assigning";
	}
	}*/
?>