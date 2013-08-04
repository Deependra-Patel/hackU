

<HTML>
<head>
	<link rel="stylesheet" href="stylesheets\pure-min.css"
	/>
	<link rel="stylesheet" href="stylesheets\style.css"/>
</head>
<body background="images\back.jpeg">
<div id="wrapper">
<div id="header">
	<h1><em><strong>Yes! Boss</strong></em></h1>
</div>
<div id="container">
<!--<img id="image1" src="images\image1.jpg"/>-->
<div id="sign-in-box">
<form id="login" class="pure-form pure-form-aligned" action="login.php" method="POST">
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
            <button type="submit" name="sub" class="pure-button pure-button-primary">Login</button>
        </div>
		</fieldset>
	</form>
	
<form id="login" class="pure-form pure-form-aligned" action="register.php">
    <fieldset>	
        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-error">Register</button>
        </div>

    </fieldset>
</form>
</div>
</div>
</div>
</body>
</HTML>