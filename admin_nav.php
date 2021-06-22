<?php
	include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul class="navbar">
			<li class="nav"><a href="admin_home.php" >Create Election</a></li>
			<li class="nav"><a href="user_op.php?u=0">Candidates</a></li>
			<li class="nav"><a href="user_op.php?u=1">Voters</a></li>
			<li class="nav"><a href="election_result.php">Election</a></li>
			<li class="nav"><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
</body>
</html>