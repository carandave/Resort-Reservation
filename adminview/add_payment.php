<?php
	include('../database/connect.php');
	
	$date=$_POST['date'];
    $ref_no=$_POST['ref_no'];
	$guest_name=$_POST['guest_name'];
	$check_in=$_POST['check_in'];
	$check_out=$_POST['check_out'];
	$no_rooms=$_POST['no_rooms'];
	$payment=$_POST['payment'];
	$statuses=$_POST['statuses'];
	$types=$_POST['types'];
    $img=$_FILES['img'] ['tmp_name']; 
		
	mysqli_query($conn,"insert into payment (date, ref_no, guest_name, check_in, check_out, no_rooms, payment, statuses, types, img) values ('$date','$ref_no','$guest_name','$check_in','$check_out','$no_rooms','$payment','$statuses','$types','$img')");
	header('location:payment.php');
	
?>
