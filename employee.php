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
  
    $res=mysql_query("SELECT * from employee where username='$username'");
$row=mysql_fetch_assoc('$res');
if($row['mgr_id']==-1)
  header("location:manager.php");
else
  header("location:employee.php");
?>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets\layout.css">
		<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.css"> 
    <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script-->
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
$image_link_r=mysql_query("SELECT * FROM employee WHERE username='$username'");
$image_link=mysql_fetch_assoc($image_link_r)["pic"];
while ($myrow = mysql_fetch_array($result))
{
if($myrow["username"]==$username){
	echo "<li class='sidebaroptions'><a href='";
	echo "employee.php?name=";
	echo $myrow["group"];
	echo "'";
	echo "><i class='icon-chevron-right'></i>";
	echo $myrow["group"];
	echo "</a></li>";
	//echo "<li class='divider'></li>";
}
} /*
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
      */?>  </ul>
      </div>

            </div>


            <div class="mini-layout-body">
            	
            	<div class="span9">
    <div id="forum">
    	<h2 id="group-title"><?php
$name=$_GET["name"];
if($name=="")$name=$username;
echo $name;
?></h2>
    	<div>
    		<form enctype="multipart/form-data" method="post" action="t2.php">
    			<textarea id="write-comment" rows="3" placeholder="Write something..." name="comment"></textarea>
				<input name="uploadedfile" type="file" /><br />
    			<input style="visibility:hidden" type = "text" name = "name" value=<?php echo $name; ?>>
				<input style="visibility:hidden" type = "text" name = "username" value=<?php echo $username; ?>>
    			<button class="btn btn-primary" type="submit">Post</button>
    		</form>
    	</div>
    	<hr>
		<?php
		$newvar="SELECT * FROM " . $name;
$result = mysql_query($newvar,$db);
$store1 = array();
while ($myrow = mysql_fetch_array($result))
{
array_push($store1,$myrow);
}
for($x=sizeof($store1)-1;$x>=0;$x--)
	{	echo '<div class="media">
        <img class="profile-pic" src="images\photo.jpg">
        <div class="media-body">';
		echo "<h4 class='media-heading'>";
		echo $store1[$x]["name"];
		echo "</h4><p class='time'>posted at: Time</p>";
		if($store1[$x]["file_link"]!=""){
		echo "<a href='";
		echo $store1[$x]["file_link"];
		echo "'>attachment</a><br>";
		}
		echo $store1[$x]["comment"];
		echo "</div></div><br><hr>";
	}

?>
    <!--  <div class="media">
        <img class="profile-pic" src=<?php echo "'" . $image_link . "'"; ?> >
        <div class="media-body">
          <h4 class="media-heading">Name of the commenter</h4>
          <p class="time">posted at: Time</p>
          This is the First comment!
          asdflkjalkdsjflkajds;lf
          adskfa;ksldjfla;ksdjf;laksdjflkajsdf
          This is the First comment!
          asdflkjalkdsjflkajds;lf
          adskfa;ksldjfla;ksdjf;laksdjflkajsdf
          This is the First comment!
          asdflkjalkdsjflkajds;lf
          adskfa;ksldjfla;ksdjf;laksdjflkajsdf
          This is the First comment!
          asdflkjalkdsjflkajds;lf
          adskfa;ksldjfla;ksdjf;laksdjflkajsdf
          This is the First comment!
          asdflkjalkdsjflkajds;lf
          adskfa;ksldjfla;ksdjf;laksdjflkajsdf
 
           Nested media object 
          <div class="media">
          </div> -->
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
