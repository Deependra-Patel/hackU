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
          <a class="brand" href="./manager.php">Yes! boss</a>

          <div class="nav-collapse collapse">
            <ul class="nav">
              
               <form class="navbar-search" method="POST" action="searche.php">
  <input type="text" class="search-query" name="name" placeholder="Search">
</form>
             
              <li class="">
                <a href="./manager.php">Home</a>
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
        <ul class="nav nav-list bs-docs-sidenav">
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
	echo "<li class='sidebaroption'><a href='";
	echo "manager.php?name=";
	echo $store[$x-1];
	echo "'";
	echo "><i class='icon-chevron-right'></i>";
	echo $store[$x-1];
	echo "</a></li>";
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
		<?php
$name=$_GET["name"];
if($name=="")$name=$username;
echo $name;
?></h2>



  <hr>
  
<?php
$db = mysql_connect("localhost", "ugacademics", "hack");
mysql_select_db("ugacademics",$db);

if(isset($_POST['chg_grp']))
{
	$emp_id=$_POST['emp_id'];
	$new_grp=$_POST['new_grp'];
	$update=mysql_query("UPDATE employee SET group='$new_grp' WHERE id='$emp_id'",$db);
	header("location:manager.php");
}

$name=$_POST['name'];
$result=mysql_query("SELECT * FROM employee where name='$name' OR username='$name'");
while($row=mysql_fetch_assoc($result))
{
	echo '<div class="media">
        <img class="profile-pic" src="images\photo.jpg">
        <div class="media-body">';
		echo "<h4 class='media-heading'>";
	echo "NAME: ";
	echo $row['name'];
	echo "<br>";
	echo "ID: ".$row['id']."<br>";
	echo "Group: ".$row['group']."<br>";
	$emp_id=$row['id'];
	$mgr_id= $row['mgr_id'];
	$query="SELECT * FROM employee WHERE id='$mgr_id'";
	$result1=mysql_query($query);
	$row_manager=mysql_fetch_assoc($result1);
	$manager_username=$row_manager['username'];
	echo "Manager: ".$row_manager['name']."<br>";
	if($_SESSION['username']==$manager_username)
	{	echo "Add to Group:";
		$groups=mysql_query("SELECT * FROM gname",$db);
		echo "<form action='search.php' method='POST'>";
		echo "<select name='new_grp'>";
		while($grp=mysql_fetch_array($groups))
		{
		$grpname=$grp['name'];
		echo "<option value=" . $grpname .">" . $grpname ."</option>";
		}
		echo "</select>";
		echo"
		<input type='text' style='visibility:hidden' name='emp_id' value='$emp_id'></input>
		<input type='submit' name='chg_grp'></input></form>";
		
	}
		echo "</div></div><br><hr>";

	}

?>

        </div>
      </div>
      <hr>
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
