<?php
include('connection.php');
$delete=base64_decode($_GET['d_id']);
$delete_query="DELETE FROM registration WHERE id='".$delete."'";
$delete_execute=mysqli_query($con,$delete_query);

if($delete_query)
{
	//echo "do you want to delete";
	header('location:admin_table.php');
}
?>