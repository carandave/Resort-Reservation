<?php
	include('../database/connect.php');
	
	$date=$_POST['date'];
	$name=$_POST['name'];
	$checkin=$_POST['checkin'];
	$checkout=$_POST['checkout'];
	$norooms=$_POST['norooms'];
	$payment=$_POST['payment'];
	$status=$_POST['status'];
	$type=$_POST['type'];
		
		
	mysqli_query($conn,"insert into reservation (date, name, checkin, checkout, norooms, payment, status, type) values ('$date','$name','$checkin','$checkout','$norooms','$payment','$status','$type)");
	header('location:reservation.php');
	
?>








