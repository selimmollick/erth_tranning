<?php
include('connection.php');
session_start();
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	//echo $email;
	$password=$_POST['password'];
	$select="SELECT email,password,id,status FROM registration WHERE email='".$email."' AND password='".$password."'";
	$select_execute=mysqli_query($con,$select);
	$num_rows=mysqli_num_rows($select_execute);
	//echo $num_rows;exit();
	$fetch_array=mysqli_fetch_array($select_execute);
	if($num_rows==1)
	{
		if($fetch_array['status']==1)
		{
			$_SESSION['ID']=$fetch_array['id'];
			
			//echo $_SESSION['ID'];
			header('location:table.php');
		}
		else
		{
			echo "Admin regectied";
		}
		
	}
	else
	{
		echo "Please check your email and password";
	}
	/*if($fetch_array['status']==1)
	{
		echo "show table";
	}
	else
	{
		echo "Admin regectied";
	}*/



}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login form</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<form method="POST" enctype="multipart/form-data">
			<div class="main_div">
			<div class="sub_div">
				<h1 class="login_dsn">Login</h1>
			</div>
			<input type="text" name="email" class="email_input" placeholder="Please enter your Email" required="true">
			<input type="password" name="password" class="email_input" placeholder="Please enter your Password" required="true">
			<div class="submit_div">
				<center>
					<button class="submit" name="submit" type="submit">Submit</button>
				</center>
			</div>
		</div>
		</form>
		
	</body>
</html>