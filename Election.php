<?php
	include("db.php");
	include("head.php");
	session_start();
	if (!isset($_SESSION['eid'])) 
	{
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Voting System</title>
</head>
<body>
	<form style="
    background: rgb(0 0 0 / 50%);
    text-align: center;
    padding: 15px;
    margin: auto;
    color: white;
    border-radius: 20px;
    width: max-content;"

    method="POST"
    action="election.php" class="box">
	<h1>Select Candidate</h1>
	<div style="width: max-content; margin: auto;text-align: left;">
		<?php
			$eid = $_SESSION['eid'];
			$sql = "select vid,cname, mobile, gender, dob from candidates where Eid = '$eid'";
			$run = mysqli_query($con,$sql);
			while($row = mysqli_fetch_assoc($run)) 
			{
		?>
			<input type="radio" name="vid" value="<?php echo $row['vid'];?>" id="candidate">
				<?php echo $row['cname'];?><br>
		<?php }?>
	</div>
	<input type="submit" name="vote" value="Vote!">
</form>	
</body>
</html>
<?php 
	if(isset($_POST['vote']))
	{
		$cvid = $_POST['vid'];
		$vvid = $_SESSION['vid'];
		$sql = "update candidates set votes = votes + 1 where vid = '$cvid'";
		$run = mysqli_query($con, $sql);
		if($_SESSION['type'] == "Voter")
		{
			$sql = "update voters set status = 'Voted' where vid = '$vvid'";
			$run = mysqli_query($con, $sql);
		}
		elseif($_SESSION['type'] == "Candidate")
		{
			$sql = "update candidates set status = 'Voted' where vid = '$vvid'";
			$run = mysqli_query($con, $sql);
		}
		include("logout.php");
	}
?>