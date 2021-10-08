<?php
include('connection.php');

$id=base64_decode($_GET['e_id']);
if($id!='')
{
	$query="SELECT * FROM registration WHERE id='".$id."'";
	$query_execute=mysqli_query($con,$query);
	$fetch_array=mysqli_fetch_array($query_execute);
	$dob=$fetch_array['dob'];
	$dobb=explode('-', $dob);
	//print_r($dobb);
	$year=$dobb[0];
	$month=$dobb[1];
	$date=$dobb[2];
}




if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$confrom_password=$_POST['confrom_password'];
	$phone_number=$_POST['phone_number'];
	$date=$_POST['date'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$status=$_POST['status'];
	$dob=$year.'-'.$month.'-'.$date;

	$update="UPDATE registration SET name='".$name."',email='".$email."',password='".$password."',confrom_password='".$confrom_password."',phone_number='".$phone_number."',dob='".$dob."',status='".$status."' WHERE id='".$id."'";
	//echo $update;
	$update_execute=mysqli_query($con,$update);
	//echo $insert_execute;
	if($update_execute)
	{
		header('location:admin_table.php');
	}


}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Edit</title>
		<link rel="stylesheet" type="text/css" href="css/edit.css">
		<script type="text/javascript">
			$(document).ready(function(){
				$("#login").click(function(){
					alert('Well come to login paze');
					return false;
				});
			});
		</script>
	</head>
	<body>
		<form method="POST" enctype="multipart/form-data">
			<div class="top_div">
				<a href="login.php">
					<input type="button" name="submit" value="Login" class="submit_dsn" id="login">
				</a>
				
			</div>
			<div class="main_div">
				<div class="sub_div">
					<h1 class="login_dsn">Edit</h1>
				</div>
				<input type="text" name="name" class="name_input" required="true" placeholder="Please enter your Name" value="<?php echo isset($id) && ($id!='')?$fetch_array['name']:''?>">
				<input type="text" name="email" class="name_input" required="true" placeholder="Please enter your Email"  value="<?php echo isset($id) && ($id!='')?$fetch_array['email']:''?>">
				<input type="password" name="password" class="name_input" required="true" placeholder="Please enter your Password"  value="<?php echo isset($id) && ($id!='')?$fetch_array['password']:''?>">
				<input type="password" name="confrom_password" class="name_input" required="true" placeholder="Please enter your Confrom password"  value="<?php echo isset($id) && ($id!='')?$fetch_array['confrom_password']:''?>">
				<input type="text" name="phone_number" class="name_input" required="true" placeholder="Please enter your Phone Number"  value="<?php echo isset($id)&& ($id!='')?$fetch_array['phone_number']:''?>">
				<div class="sub_div">
					<select class="date_desine" name="date" required="true">
						<option value="">Date</option>
						<?php for($i=1; $i<=31;$i++)
						{
						?>
						<option value="<?php echo $i?>" <?php echo $i==$date?'selected':''?>> <?php echo $i?></option>
						<?php
						}
						?>
					</select>
					<select class="date_desine" name="month" required="true">
						<option value="">Month</option>
						<?php for($i=1; $i<=12;$i++)
						{
						?>
						<option value="<?php echo $i?>" <?php echo $i==$month?'selected':''?>><?php echo $i?></option>
						<?php
						}
						?>
					</select>
					<select class="date_desine" name="year" required="true">
						<option value="">Year</option>
						<?php for($i=1990; $i<=2019;$i++)
						{
						?>
						<option value="<?php echo $i?>" <?php echo $i==$year?'selected':''?>><?php echo $i?></option>
						<?php
						}
						?>
					</select>
				</div>
				<input type="text" name="status" class="name_input" required="true" placeholder="Please enter your Status"  value="<?php echo isset($id)&& ($id!='')?$fetch_array['status']:''?>">
				<div class="submit_div">
					<center>
						<button class="submit" name="submit" type="submit">Submit</button>
					</center>
				</div>
			</div>
		</form>
		
	</body>
</html>