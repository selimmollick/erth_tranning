<?php
session_start();
if ($_SESSION['ID']==NULL) {
	
header('location:login.php');
}
include('connection.php');
$uid=$_SESSION['ID'];

$query="SELECT * FROM registration WHERE id='".$uid."'";
$query_execute=mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Table</title>
		<link rel="stylesheet" type="text/css" href="css/table.css">
	</head>
	<body>
		<form method="POST">
			<div class="top_div">
				<a href="logout.php">
					<input type="button" name="submit" value="Logout" class="submit_dsn" id="login">
				</a>
			</div>
			<div class="main_div">
				<table>
				<tr>
					<th class="table">Sl.no</th>
					<th class="table">Name</th>
					<th class="table">Email</th>
					<th class="table">Phone number</th>
					<th class="table">Date of birth</th>
				</tr>
				<?php
				$i=1;
					while($data=mysqli_fetch_array($query_execute))
					{
				?>
				<tr>
					<td class="table"><?php echo $i?></td>
					<td class="table"><?php echo $data['name']?></td>
					<td class="table"><?php echo $data['email']?></td>
					<td class="table"><?php echo $data['phone_number']?></td>
					<td class="table"><?php echo $data['dob']?></td>
				</tr>
				<?php
				$i++;
				}
				
				?>
			</table>
			</div>
		</form>
	</body>
</html>
