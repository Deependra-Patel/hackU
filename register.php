<HTML>
<head>
	<div id="header">
	<link rel="stylesheet" href="stylesheets\pure-min.css"
	/>
	<link rel="stylesheet" href="stylesheets\register.css"/>
		<h1 style="font-color:white"><strong>Yes! Boss</strong></h1>
	</div>
</head>
<body background="images\back.jpeg">
    <div id="wrapper">
        <div id="container">
   <form id="login" class="pure-form pure-form-aligned" method="POST" action="register2.php">
    <fieldset>
    	<legend>Register</legend>
        <div class="pure-control-group">
            <label for="name">Name</label>
            <input id="name" name="first" type="text" placeholder="First name"></input>
            <input id="name" name="last" type="text" placeholder="Last name"></input>

        </div>
         <div class="pure-control-group">
            <label for="username">Pick a userID</label>
            <input id="username" name="username" type="text" placeholder="Username">
        </div>

        <div class="pure-control-group">
            <label for="password">Choose a Password</label>
            <input id="password" type="password" placeholder="Password">
        </div>

        <div class="pure-control-group">
            <label for="password">Retype Password</label>
            <input id="repassword" name="pass" type="password" placeholder="Password" onblur="check_pass" >
        </div>
        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Register</button>
        </div>

    </fieldset>
</form>
        </div>
    </div>
    <script type="text/javascript">
    function check_pass(){
    	var x=document.getElementById("password");
    	var y=document.getElementById("repassword");
    	if(x==y);
    	else 
		{
		header("location:register.php");
		alert("password not matching");

    }
    </script>
</body>
</HTML>