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
		$result=mysql_query('SELECT * FROM employee WHERE username="$username"');
		if(mysql_num_rows($result)==0)
		{
		    $first=$_POST['first'];
			$last=$_POST['last'];
			$name=$first." ".$last;
			$_SESSION['username']=$username;
			$query="INSERT INTO employee (username,pass,name,mgr_id) VALUES ('$username','$pass','$name','-2')";
			mysql_query($query);
			header("location:employee.php");
		}

		else
		{
		header("location:register.php");
		alert("The username exists already.");
		}
		
		
?>