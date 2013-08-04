<html>
<?php
session_start();

ob_start();

$dbhost='localhost';
$dbname = 'ugacademics';
$dbuser = 'ugacademics';
$dbpasswd = 'hack';

$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());
		$username=$_POST['username'];
		$pass=$_POST['pass'];
		echo $pass;
		echo $username;

		$result=mysql_query("SELECT * FROM employee WHERE username='$username' AND pass='$pass'");
		echo mysql_num_rows($result);
		if(mysql_num_rows($result)==1)
		{	
			$row=mysql_fetch_assoc($result);
			$type=$row['mgr_id'];
			$_SESSION['username']=$username;
			if($type=-1)
			header("location:manager.php");

			else
			header("location:employee.php");

		}
		else
		header("location:index.php");
		

?>
</html>