<?php
	include("admin_nav.php");
	include("db.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
	</head>
	<body>
		<center>
			<table class="table" cellpadding="4">
				<tr>
					<th style="width: 4%;">Sr</th>
					<th style="width: 6%;">Election Id</th>
					<th style="width: 15%;">Election Name</th>
					<th style="width: 5%;">Candidates</th>
					<th style="width: 6%;">Voters</th>
					<th style="width: 15%;">Start Time</th>
					<th style="width: 15%;">End Time</th>
					<th style="width: 6%;">Status</th>
					<th style="width: 10%;">Winner</th>
					<th style="width: 6%"> Update</th>
					<th style="width: 6%"> Cancel</th>
				</tr>
		<?php 
			$sql = "select * from election_list order by Eid desc";
			$run = mysqli_query($con, $sql);
			$name = NULL;
			while ($row = mysqli_fetch_assoc($run)) 
			{
				$win[] = $row['EwinnerId'];
			}
			for($i = 0; $i < count($win) ;$i++)
			{
				if(isset($win[$i]))
				{
					if($win[$i] == "No Candies")
					{
						$name[] = "NOC";
					}
					else
					{
						$sql = "select cname from candidates where vid = '$win[$i]' order by Eid desc";			
						$run = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_assoc($run))
						{
							$name[] = $row['cname'];
						}
					}	
				}
				elseif(!isset($win[$i]))
				{
					$name[] = NULL;
				}
			}
			$sql = "select * from election_list order by Eid desc";
			$run = mysqli_query($con, $sql);
			$i = 1;
			while ($row = mysqli_fetch_assoc($run)) 
			{
				$Eid = $row['Eid'];
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
					echo "<td>".$row['Ename']."</td>";
					echo "<td>".$row['Ccount']."</td>";
					echo "<td>".$row['Vcount']."</td>";
					echo "<td>".$row['Sdate']."</td>";
					echo "<td>".$row['Edate']."</td>";
					echo "<td>".$row['Estatus']."</td>";
					if(!isset($name[$i-1]))
					echo "<td> Coming Soon</td>";
					elseif(isset($name[$i-1]))
					{
						if($name[$i-1] == "NOC")
						echo "<td> No Candidates</td>";
						else
						echo "<td>".$name[$i-1]."</td>";		
					}
		?>			<td><a style="text-decoration: none; color:#4d5656;" href="operation.php?ch= 1 & eid=<?php echo $Eid; ?>			">Click</a></td>
					<td><a style="text-decoration: none; color:#4d5656;" href="operation.php?ch= 0 & eid=<?php echo $Eid; ?>">Click</a></td>
				</tr>
		<?php
				$i++;
			}
		?>
			</table>
		</center>
	</body>
</html>