<?php 
include ('connect.php');

	if(isset($_POST['login-form']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];

		if ($email=='' && $password=='') {

			echo "Please fill the user name and password";
		}

		elseif($email=='' || $password==''){

			if(empty($_POST['email'])){
				echo "Email cann't be empty";
			}

			elseif (empty($_POST['password'])) {
				echo "Password Cann't be empty";
			}
		}

	else {
		
		$sql="SELECT * FROM `login` WHERE email='$email' and password='$password'";

		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		$data=$row['actor'];

		if ($data=="admin"){

			header("location:admin/admin_panel.php");

		}

		else
			echo "Invalid Email and Password";
		



	}

	}

 ?>