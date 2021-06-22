<?php
	include("head.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.con
		{
			background: rgba(21,67,90,0.5);
			position: absolute;
			top: 50%;
			left: 85%;
			transform: translate(-50% ,-50%);
			text-align: center;
			width: 300px;
			padding: 30px;
			font-family: sans-serif;
			color: white;
			border-radius: 20px;
		}
	</style>
</head>
<body>
	<form method="post" action="verify.php">
		<div class="con">
			<label style="font-size: 200%;">Voter Id</label>
			<input type="text" name="vid" placeholder="Voter Id">
			<label style="font-size: 200%;">Password</label>
			<input type="Password" name="pwd" placeholder="Password">
			<input type="Submit" name="sbt" value="LOGIN" align="center">
			<p>Don't Have Account ?<a href="register.php" style="text-decoration: none;"> Register</a></p>
		</div>
	</form>
</body>
</html>
<?php 
	if(isset($_REQUEST['p']))
	{
		if($_REQUEST['p'] == 1)
			echo "<marquee direction = 'left' behavior = 'alternate' style = 'margin-top : 6.5%; color : red; font-size : 130%;'> Enter Valid Id and Password </marquee>";
		elseif($_REQUEST['p'] == 0)
			echo "<marquee direction = 'left' behavior = 'alternate' style = 'margin-top : 6.5%; color : red; font-size : 130%;'> Election is not started </marquee>";
		elseif($_REQUEST['p'] == 2)
			echo "<marquee direction = 'left' behavior = 'alternate' style = 'margin-top : 6.5%; color : red; font-size : 130%;'> Election is Over </marquee>";
		elseif($_REQUEST['p'] == 3)
			echo "<marquee direction = 'left' behavior = 'alternate' style = 'margin-top : 6.5%; color : red; font-size : 130%;'> Wait for Result </marquee>";
	}
?>