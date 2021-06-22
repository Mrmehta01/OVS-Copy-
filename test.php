<!DOCTYPE html>
<html>
<head>
	<title>Testing</title>
</head>
<body>
	<form method="Post" action="test.php">
		<?php $vid = "ABC"; ?>
		<input type="datetime-local" name="time">
		<input type="submit" name="Check" value="Check">
	</form>
	<form method="Post">
		<input type = 'hidden' name = 'vid' value = "<?php echo $vid; ?>">
	</form>
		<a style="text-decoration: none; color:#4d5656 ;" href="test.php">Click</a>
</body>
</html>
<?php 
	echo $_POST['vid'];
	if (isset($_POST['Check'])) 
	{
		echo $_POST['time']."<br>";
	}
	elseif (isset($_POST['vid']))
	{
		echo $_POST['vid'];
	}
?>