<?php
include('connection.php');

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
	$dob=$year.'-'.$month.'-'.$date;

	$insert="INSERT INTO registration (name,email,password,confrom_password,phone_number,dob,status) VALUES ('".$name."','".$email."','".$password."','".$confrom_password."','".$phone_number."','".$dob."','1')";
	$insert_execute=mysqli_query($con,$insert);
	//echo $insert_execute;
	if($insert_execute)
	{
		echo "Sucess fuly sing up";
	}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sineup form</title>
		<link rel="stylesheet" type="text/css" href="css/singup.css">
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
					<h1 class="login_dsn">Sing up</h1>
				</div>
				<input type="text" name="name" class="name_input" required="true" placeholder="Please enter your Name" value="<?php echo(isset($_POST['name'])?$_POST['name']:'')?>">
				<input type="text" name="email" class="name_input" required="true" placeholder="Please enter your Email"  value="<?php echo(isset($_POST['email'])?$_POST['email']:'')?>">
				<input type="password" name="password" class="name_input" required="true" placeholder="Please enter your Password"  value="<?php echo(isset($_POST['password'])?$_POST['password']:'')?>">
				<input type="password" name="confrom_password" class="name_input" required="true" placeholder="Please enter your Confrom password"  value="<?php echo(isset($_POST['confrom_password'])?$_POST['confrom_password']:'')?>">
				<input type="text" name="phone_number" class="name_input" required="true" placeholder="Please enter your Phone Number"  value="<?php echo(isset($_POST['phone_number'])?$_POST['phone_number']:'')?>">
				<div class="sub_div">
					<select class="date_desine" name="date" required="true">
						<option value="">Date</option>
						<?php for($i=1; $i<=31;$i++)
						{
						?>
						<option value="<?php echo $i?>" <?php echo(isset($_POST['date']) && ($_POST['date']=="$i")?'selected':'')?>><?php echo $i?></option>
						<?php
						}
						?>
					</select>
					<select class="date_desine" name="month" required="true">
						<option value="">Month</option>
						<?php for($i=1; $i<=12;$i++)
						{
						?>
						<option value="<?php echo $i?>" <?php echo(isset($_POST['month']) && ($_POST['month']=="$i")?'selected':'')?>><?php echo $i?></option>
						<?php
						}
						?>
					</select>
					<select class="date_desine" name="year" required="true">
						<option value="">Year</option>
						<?php for($i=1990; $i<=2019;$i++)
						{
						?>
						<option value="<?php echo $i?>" <?php echo(isset($_POST['year']) && ($_POST['year']=="$i")?'selected':'')?>><?php echo $i?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="submit_div">
					<center>
						<button class="submit" name="submit" type="submit">Submit</button>
					</center>
				</div>
			</div>
		</form>
		
	</body>
</html>