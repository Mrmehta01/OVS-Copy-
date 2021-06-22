<?php
	include("db.php");
	session_start();
	$uname = $_POST['vid'];
	$pwd = $_POST['pwd'];
	$type = NULL;
	$sql = "select vid, pwd, Eid, status from voters where vid='$uname'";
	$run = mysqli_query($con,$sql);
	$type = "Voter";
	if(mysqli_num_rows($run) == 0)
	{
		$sql = "select vid, pwd from admin where vid='$uname'";
		$run = mysqli_query($con,$sql);
		$type = "Admin";
	}
	if(mysqli_num_rows($run) == 0) 
	{
		$sql = "select vid, pwd, Eid, status from candidates where vid='$uname'";
		$run = mysqli_query($con,$sql);
		$type = "Candidate";
	}
	if(mysqli_num_rows($run) == 0)
		header('Location:index.php?p=1');  
	while($row = mysqli_fetch_assoc($run))
	{
		if($row['vid'] == $uname && $row['pwd'] == $pwd && $type == "Voter" || $type == "Candidate")
		{	
			$status = $row['status'];
			$eid = $row['Eid'];
			$vid = $row['vid'];
			$sql = "select Sdate, Edate from election_list where Eid = $eid";
			$run = mysqli_query($con,$sql);
			while($row = mysqli_fetch_assoc($run))
			{
				if($row['Edate'] < date("Y-m-d H:i:s"))
				{
					$_SESSION['eid'] = NULL;
					$sql = "select vid from candidates where Eid = $eid order by votes desc";
					$run = mysqli_query($con,$sql);
					if(mysqli_num_rows($run) > 0)
					{
						while ($row = mysqli_fetch_assoc($run))
						{
							$vid= $row['vid'];
							$sql = "update election_list set EwinnerId = '$vid', Estatus = 'Ended' where Eid = '$eid'";
							$run = mysqli_query($con, $sql);
							break;
						}
					}
					elseif(mysqli_num_rows($run) == 0)
					{
						$sql = "update election_list set EwinnerId = 'No Candies', Estatus = 'Ended' where Eid = '$eid'";
						$run = mysqli_query($con, $sql);
					}
					header('Location:index.php?p=2');
				}
				elseif($row['Sdate'] > date("Y-m-d H:i:s"))
				{
					header('Location:index.php?p=0');
				}
				elseif($row['Edate'] > date("Y-m-d H:i:s") && $row['Sdate'] < date("Y-m-d H:i:s"))
				{
					if($status == "notvoted")
					{
						$sql = "update election_list set Estatus = 'Started' where Eid = $eid";
						$run = mysqli_query($con, $sql);
						$_SESSION['eid'] = $eid;
						$_SESSION['vid'] = $vid;
						$_SESSION['type'] = $type;
						header('Location:election.php');
					}
					else
					{
						header('Location:index.php?p=3');
					}
				}
			}
		}
		elseif ($row['vid'] == $uname && $row['pwd'] == $pwd && $type == "Admin")
		{
			$_SESSION['type'] = "Admin";
			header('Location:admin_home.php');
		}
		elseif($row['vid'] == $uname && $row['pwd'] != $pwd)
			header('Location:index.php?p=1');
	}
?>