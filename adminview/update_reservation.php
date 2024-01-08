<?php
	include('../database/connect.php');
	$id=$_GET['id'];
	
	$date=$_POST['date'];
	$name=$_POST['name'];
	$checkin=$_POST['checkin'];
	$checkout=$_POST['checkout'];
	$norooms=$_POST['norooms'];
	$payment=$_POST['payment'];
	$status=$_POST['status'];
	$type=$_POST['type'];
	
	mysqli_query($conn,"update reservation (date, name, checkin, checkout, norooms, payment, status, type) values ('$date','$name','$checkin','$checkout','$norooms','$payment','$status','$type)");
	header('location:reservation.php');
	
?>
