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
	error_reporting(0);
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
	<body>

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
          <a class="brand" href="./manager.php">Yes! boss</a>

          <div class="nav-collapse collapse">
            <ul class="nav">
              
               <form class="navbar-search" method="post" action="searchm.php">
  <input type="text" name="name" class="search-query" placeholder="Search">
</form>
             
              <li class="">
                <a href="./manager.php">Home</a>
              </li>
              <li class="">
                <a href="./assign_work.php">Assign work</a>
              </li>
              <li class="">
                <a href="./assigned.php">Assigned work</a>
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
            <li><a tabindex="-1" href="change_passm.php">Change password</a></li>
            <li><a tabindex="-1" href="change_ppm.php">Change profile pic</a></li>
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
$db = mysql_connect("localhost", "ugacademics", "hack");
mysql_select_db("ugacademics",$db);
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


       /* <li class="sidebaroptions"><a href="#typography"><i class="icon-chevron-right"></i> Typography</a></li>
          <li class="sidebaroptions"><a href="#code"><i class="icon-chevron-right"></i> Code</a></li>
          <li class="sidebaroptions"><a href="#tables"><i class="icon-chevron-right"></i> Tables</a></li>
          <li class="sidebaroptions"><a href="#forms"><i class="icon-chevron-right"></i> Forms</a></li>
          <li class="sidebaroptions"><a href="#buttons"><i class="icon-chevron-right"></i> Buttons</a></li>
          <li class="sidebaroptions"><a href="#images"><i class="icon-chevron-right"></i> Images</a></li>
          <li class="sidebaroptions"><a href="#icons"><i class="icon-chevron-right"></i> Icons by Glyphicons</a></li>
       */
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
		<?php
$name=$_GET["name"];
if($name=="")$name=$username;
echo $name;
?></h2><!--div class="mini-layout-body">
            	
            	<div class="span9">
    <div id="forum">
    	<h2 id="group-title">Work Assigned</h2-->
		<table class="table table-striped">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Title</th>
                  <th>Deadline</th>
				          <th>submitted file</th>
                </tr>
              </thead>
              <tbody>
<?php
$result = mysql_query("SELECT * FROM work",$db);
$store = array();
while ($myrow = mysql_fetch_array($result))
{
	array_push($store,$myrow);
}

for($x=0;$x<sizeof($store);$x++)
	{
	echo "<tr><td>";
	if($store[$x]["status"]==0){
	echo "Incomplete";}
	else echo "complete";
    echo "<th>";
	echo $store[$x]['id'];
	echo "</th><td>";
	echo $store[$x]["deadline"];
	echo "</td>";
	echo "<td><a href='";
	echo $store[$x]['file_link'];
	echo "'>submission</a></td></tr>";
	}
	?>
                  
              </tbody>
            </table>

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