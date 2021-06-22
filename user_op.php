<?php
	include("admin_nav.php");
	include('db.php');
?>
<!DOCTYPE html>
<html>
<body>
	<?php 
		if(isset($_REQUEST['u']))
		{
		$utype = $_REQUEST['u'];
			if($utype == 0)
			{
				$sql="select * from candidates order by Eid desc";
				$run=mysqli_query($con,$sql);
				$i=1;
	?>
	<center>
		<table class="table" cellpadding="4">
			<tr>
				<th style="width: 5%;">Sr</th>
				<th style="width: 6%;">Election Id</th>
				<th style="width: 10%;">Voting ID</th>
				<th style="width: 15%;">Name</th>
				<th style="width: 10%;">Password</th>
				<th style="width: 15%;">Mobile</th>
				<th style="width: 6%;">Gender</th>
				<th style="width: 10%;">Date of Birth</th>
				<th style="width: 6%;">Status</th>
				<th style="width: 5%;">Votes</th>
				<th style="width: 6%"> Update</th>
				<th style="width: 6%"> Delete</th>
			</tr>
	<?php 
		while ($row = mysqli_fetch_assoc($run))
		{
			$vid=$row['vid'];
			if($i%2 == 0)
			{
				echo "<tr style='background: #d1e0e0'>";
			}
			else
			{
				echo "<tr>";
			}
				echo "<td>".$i."</td>";
				echo "<td>".$row['Eid']."</td>";
				echo "<td>".$row['vid']."</td>";
				echo "<td>".$row['cname']."</td>";
				echo "<td>".$row['pwd']."</td>";
				echo "<td>".$row['mobile']."</td>";
				echo "<td>".$row['gender']."</td>";
				echo "<td>".$row['dob']."</td>";
				echo "<td>".$row['status']."</td>";
				echo "<td>".$row['votes']."</td>";
	?>			<td><a style="text-decoration: none; color:#4d5656 ;" href="operation.php?ch= 1 & vid='<?php echo 
					$vid; ?>'">Click</a></td>
				<td><a style="text-decoration: none; color:#4d5656;" href="operation.php?ch= 0 & vid='<?php echo $vid; ?>'">Click</a></td>
	<?php		echo "</tr>";
			$i++;	
		} 
		}
	?>
		</table>
	<?php
		}
	if(isset($_REQUEST['u']))
	{
		$utype = $_REQUEST['u'];
		if($utype == 1)
		{
			$sql="select * from voters order by Eid desc";
			$run=mysqli_query($con,$sql);
			$i=1;
	?>
	<center>
		<table class="table">
			<tr>
				<th style="width: 5%;">Sr</th>
				<th style="width: 5%;">Election Id</th>
				<th style="width: 10%;">Voting ID</th>
				<th style="width: 10%;">Name</th>
				<th style="width: 10%;">Password</th>
				<th style="width: 10%;">Mobile</th>
				<th style="width: 5%;">Gender</th>
				<th style="width: 10%;">Date of Birth</th>
				<th style="width: 10%;">Status</th>
				<th style="width: 5%"> Update</th>
				<th style="width: 5%"> Delete</th>
			</tr>
	<?php 
		while ($row = mysqli_fetch_assoc($run))
		{
			$vid=$row['vid'];
			if($i % 2 == 0)
			{
				echo "<tr style='background: #d1e0e0'>";
			}
			else
			{
				echo "<tr>";
			}
				echo "<td>".$i."</td>";
				echo "<td>".$row['Eid']."</td>";
				echo "<td>".$row['vid']."</td>";
				echo "<td>".$row['vname']."</td>";
				echo "<td>".$row['pwd']."</td>";
				echo "<td>".$row['mobile']."</td>";
				echo "<td>".$row['gender']."</td>";
				echo "<td>".$row['dob']."</td>";
				echo "<td>".$row['status']."</td>";
	?>			<td><a style="text-decoration: none; color:#4d5656 ;" href="operation.php?ch= 1 & vid='<?php echo 
					$vid; ?>'">Click</a></td>
				<td><a style="text-decoration: none; color:#4d5656 ;" href="operation.php?ch= 0 & vid='<?php echo $vid; ?>'">Click</a></td>
	<?php		echo "</tr>";
			$i++;	
		} 
	}
	?>
		</table>
	<?php
		}
	?>
</body>
</html>