<?php
session_start();

ob_start();

$dbhost='localhost';
$dbname = 'ugacademics';
$dbuser = 'ugacademics';
$dbpasswd = 'hack';

$link = mysql_connect($dbhost, $dbuser, $dbpasswd) or die ("Not able to connect" . mysql_error());
mysql_select_db($dbname, $link) or die ("Query for database failed : " . mysql_error());
	if(isset($_POST('sub')))
	{
		$username=$_POST['username'];
		$pass=$_POST['pass'];
		$result=mysql_query('SELECT * FROM employee WHERE username="$username" AND pass="$pass"');
		if(mysql_num_rows($result)==1)
		{	
			$row=mysql_fetch_assoc($result);
			$type=$row['mgr_id'];
			$_SESSION['username']=$username;
			if($type=-1)
			header("location:employee.php");
			else
			header("location:worker.php");
		}
		else
		header("location:index.html");
	}
?>

<HTML>
<head>
	<link rel="stylesheet" href="stylesheets\pure-min.css"
	/>
	<link rel="stylesheet" href="stylesheets\style.css"/>
</head>
<body>
<div id="wrapper">
<div id="header">
	<h1><em><strong>Yes! Boss</strong></em></h1>
</div>
<div id="container">
<!--<img id="image1" src="images\image1.jpg"/>-->
<div id="sign-in-box">
<form id="login" class="pure-form pure-form-aligned" action="index.html">
    <fieldset>
    	<legend>sign in</legend>
        <div class="pure-control-group">
            <label for="name">Username</label>
            <input id="name" type="text" name="username" placeholder="Username">
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input id="password" name="pass" type="password" placeholder="Password">
        </div>
        <div class="pure-controls">
            <button type="login" name="sub" class="pure-button pure-button-primary">Login</button>
        </div>
        <div class="pure-controls">
            <button type="signup" class="pure-button pure-button-error">Sign up</button>
        </div>

    </fieldset>
</form>
</div>
</div>
</div>
</body>
</HTML>