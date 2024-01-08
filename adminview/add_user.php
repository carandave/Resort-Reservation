<?php
	include('../database/connect.php');

	if(isset($_POST['addBtn'])){

		$fName=$_POST['fName'];
		$lName=$_POST['lName'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		$user_type= "User";

		if($password == $cpassword){
			$password = md5($password);

			$sql = "INSERT INTO people (`fName`,`lName`,`user_type`,`email`,`contactNumber`,`address`,`password`) VALUES ('$fName','$lName','$user_type','$email','$contact','$address','$password')";
			$result = $conn->query($sql);

			echo '<script>alert("User Added Successfully!")</script>';
			echo '<script>window.location.href="user.php"</script>';
		}

	}
	
	
?>