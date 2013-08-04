<!DOCTYPE HTML>
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
		<link rel="stylesheet" type="text/css" href="stylesheets\layout.css">
		<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.css"> 
    <script src="jquery\jquery.min.js"></script>
    <script src= "bootstrap\js\bootstrap-dropdown.js" type="text/javascript">
    </script>

    <meta charset="utf-8">
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
          <a class="brand" href="./manager.php">Yes! boss</a>

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
		$db = mysql_connect("localhost", "ugacademics", "hack");
mysql_select_db("ugacademics",$db);
$result = mysql_query("SELECT * FROM employee",$db);
while ($myrow = mysql_fetch_array($result))
{
if($myrow["username"]==$username){
	echo "<li class='sidebaroptions'><a href='";
	echo "employee.php?name=";
	echo $myrow["username"];
	echo "'";
	echo "><i class='icon-chevron-right'></i>";
	echo $myrow["username"];
	echo "</a></li>";
	//echo "<li class='divider'></li>";
}

}

/*
          <li class="sidebaroptions"><a href="#typography"><i class="icon-chevron-right"></i> Typography</a></li>
          <li class="divider"></li>
          <li class="sidebaroptions"><a href="#code"><i class="icon-chevron-right"></i> Code</a></li>
          <li class="divider"></li>
          <li class="sidebaroptions"><a href="#tables"><i class="icon-chevron-right"></i> Tables</a></li>
          <li class="divider"></li>
          <li class="sidebaroptions"><a href="#forms"><i class="icon-chevron-right"></i> Forms</a></li>
          <li class="divider"></li>
          <li class="sidebaroptions"><a href="#buttons"><i class="icon-chevron-right"></i> Buttons</a></li>
          <li class="divider"></li>
          <li class="sidebaroptions"><a href="#images"><i class="icon-chevron-right"></i> Images</a></li>
          <li class="divider"></li>
          <li class="sidebaroptions"><a href="#icons"><i class="icon-chevron-right"></i> Icons by Glyphicons</a></li>
        */
		?>
		</ul>
      </div>

            </div>


            <div class="mini-layout-body">
            	
            	<div class="span9">
    <div id="forum">
    	<h2 id="group-title">Work to do</h2>
		<table class="table table-striped">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Title</th>
                  <th>Deadline</th>
                </tr>
              </thead>
              <tbody>
<?php
$result = mysql_query("SELECT * FROM work",$db);
$store = array();
while ($myrow = mysql_fetch_array($result))
{
if($myrow["person"]==$username){
	array_push($store,$myrow["id"]);
	}
}

for($x=0;$x<sizeof($store);$x++)
	{
	$result = mysql_query("SELECT * from work WHERE id='$store[$x]'");
	$row=mysql_fetch_assoc($result);
	echo "<tr><td>";
	if($row["status"]==0){
	echo "Incomplete";}
	else echo "complete";
    echo "<th><a href='submit_asgn.php?name=";
	echo $row["id"];
	echo "'>";
	echo $row["id"];
	echo "</a></th><td>";
	echo $row["deadline"];
	echo "</td></tr>";
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
