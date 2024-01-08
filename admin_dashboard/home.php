<?php 


include('../database/connect.php');
session_start();

if(!isset($_SESSION['adminId']) && $_SESSION['type'] != "admin"){
    header("Location: login_form_admin.php");
}

//No of Rooms
$sql1 = "SELECT * FROM room";
$result1 = $conn->query($sql1);
$result1->num_rows;

//No of Pending Reservation
$sql2 = "SELECT * FROM reservation WHERE reservationStatus='Pending'";
$result2 = $conn->query($sql2);
$result2->num_rows;

//No of Confirmed Reservation
$sql3 = "SELECT * FROM reservation WHERE reservationStatus='Confirmed'";
$result3 = $conn->query($sql3);
$result3->num_rows;

//No of Customers
$sql4 = "SELECT * FROM people";
$result4 = $conn->query($sql4);
$result4->num_rows;


?>

<!DOCTYPE html>
<html>
<head>
  <title>Administration Side</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/6e5c8405e6.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../admin_dashboard/home.css"></link>

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> 
        
        <!-- JS for jQuery -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      <!-- CSS for full calender -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
      
      <!-- JS for full calender -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  </head>
</head>
<body >
    
        <?php
            include "../admin_dashboard/header.php";
            include "../admin_dashboard/sidebar.php";
           
           
        ?>

        
        
        <div class="row" style="margin-left: 15%;">
          <div class="col-md-12 py-2 px-5">
            <?php require("dynamic-full-calendar.php"); ?>
          </div>
        </div>


</body>
 
</html>