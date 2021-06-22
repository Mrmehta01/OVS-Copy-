<?php
	include("head.php");
	include("db.php");
?>
<!DOCTYPE html>
<head>
	<title>Registretion</title>
	<style type="text/css">
		.box
		{	
			top: 58%;
		}
	</style>
</head>
<body>
	<form method="post" class="box" action="register.php">
		<h2>Registration</h2>
		<?php 
			$sql = "select Ename, Eid from election_list order by Eid desc";
			$run = mysqli_query($con,$sql);				
		?>
		<select name = "ename" style="width: 80%; height: 40px;">
		<?php
			while ($row = mysqli_fetch_assoc($run)) 
			{
		?>
			<option value = "<?php echo $row['Eid']; ?>"><?php echo $row['Eid'].' '.$row['Ename']; ?></option>
		<?php 
			}
		?>
		</select>
		<input type="text" style="width: 80%;" name="name" placeholder="Full Name">
		<input type="text" style="width: 38%;" name="vid" placeholder="VoterId Number">
		<input type="number" style="width: 38%;" name="mobile" min="5000000000" max="9999999999" placeholder="Mobile Number"><br>
		<label style="font-size: 25px;">Date of Birth</label>
		<input type="date" style="width: 38%;" name="dob" placeholder="DOB"><br>
		<label style="font-size: 25px;"> Gender</label>
		<select name="gender" style="width: 30%; height: 40px; ">
			<option value="Male" selected>Male</option>
			<option value="Female">Female</option>
			<option value="Othe">Other</option>
		</select>
		
		<input type="password" style="width: 30%;" name="pass" placeholder="Password"><br>
		<label style="font-size: 25px;">User Type</label>
		<select name="utype" style="width: 38%; height: 40px;">
			<option value="Voter" selected>Voter</option>
			<option value="Candidate">Candidate</option>
		</select><br>
		<input type="submit" name="rgt" value="Register">
	</form>
</body>	
</html>
<?php
	if(isset($_POST['rgt']))
	{
		$eid = $_POST['ename'];
		$uname = $_POST['name'];
		$vid = $_POST['vid'];
		$no = $_POST['mobile'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$pwd = $_POST['pass'];
		$type = $_POST['utype'];
		$sql = "select * from election_list where Eid = $eid";
		$run = mysqli_query($con,$sql);
		while ($row = mysqli_fetch_assoc($run)) 
		{
			$candi = $row['Ccount'];
			$voters = $row['Vcount'];
			$sdate = $row['Sdate'];
			$edate = $row['Edate'];
		}
		if($type == "Voter")
		{
			$sql = "select Eid from voters where Eid = $eid";
			$run = mysqli_query($con,$sql);
			$user = mysqli_num_rows($run);
			if($user < $voters)
			{
				$sql = "insert into voters(vid, vname, pwd, mobile, gender, dob, Eid, status)
				VALUES ('$vid', '$uname','$pwd',$no,'$gender','$dob', $eid, 'notvoted')";
				$run = mysqli_query($con,$sql);
				echo "<marquee direction = 'Left' behavior = 'alternate' style = 'margin-top : 6.5%; color : green; font-size : 130%;'>Voter is registered Successsfuly</marquee>";
			}
			else
			{
				echo "<marquee direction = 'Left' behavior = 'alternate' style = 'margin-top : 6.5%; color : red; font-size : 130%;'> Voter is Full for this election </marquee>";
			}
		}
		if($type == "Candidate")
		{
			$sql = "select Eid from candidates where Eid = $eid";
			$run = mysqli_query($con,$sql);
			$user = mysqli_num_rows($run);
			if ($edate < date("Y-m-d H:i"))
			{
				echo "<marquee direction = 'Left' behavior = 'alternate' style = 'margin-top : 6.5%; color : red; font-size : 130%;'>Election is Ended</marquee>";
			}
			elseif($sdate < date("Y-m-d H:i"))
			{
				echo "<marquee direction = 'Left' behavior = 'alternate' style = 'margin-top : 6.5%; color : red; font-size : 130%;'>Election is started Now Candidate can not registred</marquee>";
			}
			elseif($user > $candi)
			{
				echo "<marquee direction = 'Left' behavior = 'alternate' style = 'margin-top : 6.5%; color : red; font-size : 130%;'> Candidate is Full for this Election </marquee>";
			}
			elseif($user < $candi)
			{
				$sql = "insert into candidates (vid, cname, pwd, mobile, gender, dob, Eid, status, votes)
				VALUES ('$vid', '$uname', '$pwd', $no, '$gender', '$dob', $eid, 'notvoted', 0)";
				$run = mysqli_query($con,$sql);				
				echo "<marquee direction = 'Left' behavior = 'alternate' style = 'margin-top : 6.5%; color : green; font-size : 130%;'>Candidate is registered Successsfuly</marquee>";
			}
		}
	}
?>