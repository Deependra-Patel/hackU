<!DOCTYPE HTML>
<html>
<?php
session_start();
ob_start();
	if(!isset($_SESSION['username']))
	{
		header("location:index.php");
	}
	$username=$_SESSION['username'];
$db = mysql_connect("localhost", "ugacademics", "hack");
mysql_select_db("ugacademics",$db);
	error_reporting(0);
	if(isset($_POST['sub']))
	{
	$old=$_POST['old'];
	$new1=$_POST['new1'];
	$new2=$_POST['new2'];
	if($new1!=$new2)
		echo "PAsswords didn't match.";
	else
	{
		$res=mysql_query("SELECT * FROM employee WHERE username='$username'");
		$old1=mysql_fetch_assoc($res)['pass'];
		if($old!=$old1)
			echo "Enter your correct password";
		else
		mysql_query("UPDATE employee SET pass='$new1' WHERE username='$username'");
echo "Password changed.";
	}
	}
?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="stylesheets\layout.css">
		<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.css"> 
    <script src="jquery\jquery.min.js"></script>
    <script src= "bootstrap\js\bootstrap-dropdown.js" type="text/javascript">
    </script>
	</head>
	<body background="images\back.jpeg">

		<!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div id="navbar-inner" class="navbar-inner">
        <div id="navbar-container" class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./employee.php">Yes! boss</a>

          <div class="nav-collapse collapse">
            <ul class="nav">
              
               <form class="navbar-search" method="post" action="searche.php">
  <input type="text" name="name" class="search-query" placeholder="Search">
</form>
             
              <li class="">
                <a href="./employee.php">Home</a>
              </li>
              <li class="">
                <a href="./to_do.php">To Do</a>
              </li>
              <li class="">
                <a href="./submit_asgn.php">Submit Assignment</a>
              </li>
            </ul>
            <ul class="nav pull-right">
              <li class="divider-vertical"></li>
              <li id="settings" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Settings
                <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
      				  <li><a tabindex="-1" href="profile.php">View Profile</a></li>
            <li><a tabindex="-1" href="change_passe.php">Change password</a></li>
            <li><a tabindex="-1" href="change_ppe.php">Change profile pic</a></li>
            <li class="divider"></li>
            <li><a tabindex="-1" href="signout.php">Sign out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

		<div class="mini-layout fluid">
            <div class="mini-layout-sidebar">
            	
            	<h3 id="sidebar-title">Groups</h3>
      <div id="span3" class="span3 bs-docs-sidebar">
        <ul id="sidenav" class="nav nav-list bs-docs-sidenav">
<?php

$result = mysql_query("SELECT * FROM gname",$db);
$store = array();
while ($myrow = mysql_fetch_array($result))
{
array_push($store,$myrow["name"]);
}

for($x=1;$x<=sizeof($store);$x++)
	{
	echo "<li class='sidebaroptions'><a href='";
	echo "manager.php?name=";
	echo $store[$x-1];
	echo "'";
	echo "><i class='icon-chevron-right'></i>";
	echo $store[$x-1];
	echo "</a></li>";
	echo "<li class='divider'></li>";
}

	   ?>
	   <li class="sidebaroptions"><form  method="post" action="group.php">
	<input type="text" name="gname" placeholder="create new group">
	</form>
	</li>
	   </ul>
      </div>

            </div>


            <div class="mini-layout-body">
            	
            	<div class="span9">
    <div id="forum">
    	<h2 id="group-title">
		Change Password</h2>
    	<div>
    		<form class="form-horizontal" method="POST" action="change_passe.php">
  <div class="control-group">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
      <input type="password" id="password" name="old" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="repassword">Retype Password</label>
    <div class="controls">
      <input type="password" id="repassword" name="new1" placeholder="Retype Password">
    </div>
</div>
  <div class="control-group">
    <label class="control-label" for="newpassword">New Password</label>
    <div class="controls">
      <input type="password" id="newpassword" name="new2" placeholder="Type new Password">
    </div>
     </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary" name='sub'>Change Password</button>
    </div>
  </div>
</form>
    	</div>
    
    </div>
    </div>

            </div>
          </div>
          <script type="text/javascript">
    $(document).ready(function() {
      $('.dropdown-toggle').dropdown();
    });
    </script>
	</body>
</html>
