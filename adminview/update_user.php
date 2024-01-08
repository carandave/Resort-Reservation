<?php
	include('../database/connect.php');
	$id=$_GET['id'];
	
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$user_type=$_POST['user_type'];
	
	mysqli_query($conn,"update user_form set username='$username', email='$email', password='$password', user_type='$user_type' where id='$id'");
	header('location:user.php');
?>