<?php
	include("db.php");
	include("head.php");
	include("session.php");
?>
	<style type="text/css">
		.con
		{
			background: rgba(21,67,90,0.5);
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50% ,-50%);
			text-align: center;
			width: 400px;
			padding: 30px;
			font-family: sans-serif;
			color: white;
			border-radius: 20px;
		}
	</style>
<?php	
	
	if($_SESSION['type'] = "Admin")
	{
		if(isset($_REQUEST['ch']) && isset($_REQUEST['vid']))
		{
			$vid = $_REQUEST['vid'];
			$sql = "select vid from voters where vid=$vid";
			$run = mysqli_query($con,$sql);
			$type = "Voter";

			if(mysqli_num_rows($run) == 0)
			{
				$sql = "select vid from candidates where vid='$vid'";
				$run = mysqli_query($con,$sql);
				$type = "Candidate";
			}
			$ch = $_REQUEST['ch'];
			$id = $_REQUEST['vid'];
			if($ch == 0)
			{
				if($type == "Candidate")
				{
					$sql="delete from candidates where vid=$vid";
					$run=mysqli_query($con,$sql);
					header("Location:user_op.php?u=0");	
				}
				elseif($type == "Voter")
				{
					$sql="delete from voters where vid=$vid";
					$run=mysqli_query($con,$sql);
					header("Location:user_op.php?u=1");
				}
			}
			elseif($ch == 1)
			{
				if($type == "Candidate")
				{

					$sql="select * from candidates where vid=$vid";
					$run=mysqli_query($con,$sql);
		?>
			<form class="con" method="POST" style="padding-top: 2%;" action="operation.php">
		<?php 
				while ($row = mysqli_fetch_assoc($run))
				{	
		?>
				<h2 style="padding-top: -3%;">Candidate</h2>
				<label>Name </label>
				<input type="text" name="name" value="<?php echo $row['cname']; ?>"><br>
				<label>Password </label>
				<input type="Password" name="pwd" placeholder="<?php echo $row['pwd']; ?>" required><br>
				<label>Mobile </label>
				<input type="Number" name="mobile" value="<?php echo $row['mobile']; ?>"><br>
				<label>Date Of Birth </label>
				<input type="date" name="date" value="<?php echo $row['dob']; ?>"><br>
				<input type="hidden" name="id" value="<?php echo $vid ;?>">
				<input type="hidden" name="type" value="<?php echo $type ;?>">
				<input type="submit" name="upd">
		<?php	
				}
		?>
			</form>
	<?php
				}
				elseif($type == "Voter")
				{
					$sql="select * from voters where vid=$vid";
					$run=mysqli_query($con,$sql);
		?>
			<form class="con" method="POST" style="padding-top: 2%;" action="operation.php">
		<?php 
				while ($row = mysqli_fetch_assoc($run))
				{	
		?>
				<h2 style="padding-top: -3%;">Voter</h2>
				<label>Name </label>
				<input type="text" name="name" value="<?php echo $row['vname']; ?>"><br>
				<label>Password </label>
				<input type="Password" name="pwd" placeholder="<?php echo $row['pwd']; ?>" required><br>
				<label>Mobile </label>
				<input type="Number" name="mobile" value="<?php echo $row['mobile']; ?>"><br>
				<label>Date Of Birth </label>
				<input type="date" name="date" value="<?php echo $row['dob']; ?>"><br>
				<input type="hidden" name="id" value="<?php echo $vid ;?>">
				<input type="hidden" name="type" value="<?php echo $type ;?>">
				<input type="submit" name="upd">
		<?php	
				}
		?>
			</form>
		<?php
				}
			}
		}
		elseif(isset($_POST['upd']))
		{
			$name = $_POST['name'];
			$pwd = $_POST['pwd'];
			$mobile = $_POST['mobile'];
			$date = $_POST['date'];
			$vid = $_POST['id'];
			$type = $_POST['type'];
			if($type == "Candidate")
			{
				$sql="update candidates set cname = '$name', pwd = '$pwd', mobile = $mobile, dob = '$date' where vid = $vid";
				$run = mysqli_query($con,$sql);
				header("Location:user_op.php?u=0");			
			}
			elseif($type == "Voter")	
			{
				$sql="update voters set vname = '$name', pwd = '$pwd', mobile = $mobile, dob = '$date' where vid = $vid";
				$run = mysqli_query($con,$sql);
				header("Location:user_op.php?u=1");
			}
		}
		elseif(isset($_REQUEST['ch']) && isset($_REQUEST['eid']))
		{
			$eid = $_REQUEST['eid'];
			if($_REQUEST['ch'] == 0)
			{
				$sql="delete from election_list where Eid=$eid";
				$run=mysqli_query($con,$sql);
				header("Location:election_result.php");
			}
			elseif($_REQUEST['ch'] == 1) 
			{
				$sql="select * from election_list where Eid=$eid";
				$run=mysqli_query($con,$sql);
	?>
		<form class="con" method="POST" style="padding-top: 2%;" action="operation.php">
	<?php 
			while ($row = mysqli_fetch_assoc($run))
			{	
	?>
			<h2 style="padding-top: -3%;">Election</h2>
			<label>Name </label>
			<input type="text" name="name" style="width: 70%;" value="<?php echo $row['Ename']; ?>"><br>
			<label>Start Date </label>
			<input type="datetime-local" style="width: 70%;" class="dt" name="sdate" value="<?php echo $row['Sdate']; ?>"><br>
			<label>End Date </label>
			<input type="datetime-local" style="width: 70%;" class="dt" name="edate" value="<?php echo $row['Edate']; ?>"><br>
			<label>Candidates </label>
			<input type="number" name="candis" style="width: 20%;" value="<?php echo $row['Ccount']; ?>">
			<label style="margin-left: 2%;">Voters </label>
			<input type="number" name="voters" style="width: 20%;" value="<?php echo $row['Vcount'] ;?>"><br>
			<input type="hidden" name="eid" value="<?php echo $eid; ?>">
			<input type="submit" name="eupd">
	<?php	
			}
	?>
		</form>
	<?php
			}
		}
		elseif(isset($_POST['eupd']))
		{
			$name = $_POST['name'];
			$sdate = $_POST['sdate'];
			$edate = $_POST['edate'];
			$candi = $_POST['candis'];
			$voter = $_POST['voters'];
			$eid = $_POST['eid'];
			$sql="update election_list set Ename = '$name', Sdate = '$sdate', Edate = '$edate', Ccount = $candi, Vcount = $voter where Eid = $eid";
				$run = mysqli_query($con,$sql);
				header("Location:election_result.php?");
		}
	}
?>