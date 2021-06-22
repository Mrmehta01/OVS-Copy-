<?php
	include("admin_nav.php");
	include("db.php");
?>
<!DOCTYPE html>
<head>
	<title>OVS</title>
</head>
<body>
	<form method="post" class="box" action="admin_home.php">
		<h2>Create Election</h2>
		<input type="text" style="width: 80%;" name="ename" placeholder="Election Name">
		<input type="number" style="width: 40%;" min="1" step="1" name="vcount" placeholder="How Many Voters">
		<input type="number" style="width: 40%;" min="1" step="1" name="ccount" placeholder="How Many Candidates"><br>
		<label>Starting Date</label>
		<input type="datetime-local" class="dt" style="width: 50%;" name="start"><br>
		<label>Ending Date</label>
		<input type="datetime-local" class="dt" style="width: 51%;" name="end"><br>
		<input type="submit" name="gnt" value="Generate">
	</form>
</body>	
</html>
<?php
	if(isset($_POST['gnt']))
	{
		$ename = $_POST['ename'];
		$vcount = $_POST['vcount'];
		$ccount = $_POST['ccount'];
		$sdate = $_POST['start'];
		$edate = $_POST['end'];
		$sdte = explode("T", $sdate);
		$sde = explode("-", $sdte[0]);
		$ste = explode(":", $sdte[1]);
		$stime = mktime($ste[0],$ste[1],0,$sde[1],$sde[2],$sde[0]);
		$edte = explode("T", $edate);
		$ede = explode("-", $edte[0]);
		$ete = explode(":", $edte[1]);
		$etime = mktime($ete[0],$ete[1],0,$ede[1],$ede[2],$ede[0]);
		if ($stime < $etime)
		{
			$sql = "insert into election_list (Ename, Ccount, Vcount, Sdate, Edate, Estatus) Values('$ename', $ccount, $vcount, '$sdate', '$edate', 'Notstarted')";
			$run=mysqli_query($con,$sql);
			echo "<marquee direction = 'Left' behavior = 'alternate' style = 'color : green; font-size : 130%;'> Election Created Successfuly </marquee>";
		}
		else
		{
			echo "<marquee direction = 'Left' behavior = 'alternate' style = 'color : red; font-size : 130%;'> Enter valid time duration of election</marquee>";
		}
		// if(!isset($run))
		// {
		// 	mysqli_error($run);
		// }
	}
?>