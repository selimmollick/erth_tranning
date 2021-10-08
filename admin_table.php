<?php
session_start();
if ($_SESSION['ID']==NULL) {
	
header('location:admin_login.php');
}
include('connection.php');

$query="SELECT * FROM registration";
$query_execute=mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Table</title>
		<link rel="stylesheet" type="text/css" href="css/admin_table.css">
	</head>
	<body>
		<div class="top_div">
			<a href="admin_logout.php">
				<input type="button" name="submit" value="Logout" class="submit_dsn" id="login">
			</a>
		</div>
		
			<table>
			<tr>
				<th class="table">Sl.no</th>
				<th class="table">Name</th>
				<th class="table">Email</th>
				<th class="table">Phone number</th>
				<th class="table">Date of birth</th>
				<th class="table">Action</th>
				<th class="table">Status</th>
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
				<td class="table">
					<a href="edit.php?e_id=<?php echo base64_encode($data['id'])?>">
						<input type="button" name="edit" value="Edit" class="edit">
					</a>
					<a href="delete.php?d_id=<?php echo base64_encode($data['id'])?>">
						<input type="button" name="delete" value="Delete" class="edit">
					</a>
					
				</td>
				<td class="table"><?php echo $data['status']?></td>
			</tr>
			<?php
			$i++;
			}
			
			?>
		</table>
		
	</body>
</html>
