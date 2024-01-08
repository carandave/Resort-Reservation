<?php 


include('../database/connect.php');
session_start();

if(!isset($_SESSION['adminId']) && $_SESSION['type'] != "admin"){
    header("Location: login_form.php");
}
  // $peopleId = $_SESSION['peopleId'];
  // $fname = $_SESSION['fname'];
  // $lname =$_SESSION['lname'];
  // $email =$_SESSION['email'];
  // $contact =$_SESSION['contact'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Reservation</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/6e5c8405e6.js" crossorigin="anonymous"></script>
        <!-- <link rel="stylesheet" href="../admin_dashboard/home.css"></link> -->
        <link rel="stylesheet" href="../admin_dashboard/home.css"></link>
        

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> 
        
        <!-- JS for jQuery -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  	
  </head>
</head>
<body style="overflow-x: hidden;">
    
        <?php


            include "../admin_dashboard/header.php";
            include "../admin_dashboard/sidebar.php";
           
           
        ?>


<div class="row ml-5">
    <div class="col-md-1 ">
    </div>

  <div class="col-md-11  ">
    
  <div class="d-flex justify-content: center; align-items: center " style="flex-direction: column;">
    <h3 class="ml-5 mt-1">Unpaid Reservation Check Out List</h3>
  </div>
    
    <table class="table table-responsive" id="" style="margin: 0 auto; width: 90%">
        
    <thead>
    <tr >
        <th class="d-none">People ID</th>
        <th>ID #</th>
        <th>Full Name</th>
        <th class="d-none">Email</th>
        <th>Room Type</th>
        <th>Cottage</th>
        <th>Event Hall</th>
        <th>Time In & Out</th>
        <th class="d-none">Original Price</th>
        <th class="d-none">Address</th>
        <th class="d-none">Code</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Adult</th>
        <th>Children</th>
        <th>Status</th>
        <th>Date Submitted</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php 
        
        $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, r.code, p.people_Id, p.address, t.Category, t.Price, t.Discount, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM reservation r INNER JOIN people p ON r.people_Id = p.people_Id INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id WHERE reservationStatus='Unpaid' ORDER BY reservation_Id DESC";
        $result = $conn->query($sql);
        
        ?>

        <?php if($result->num_rows > 0){?>
            <?php while($rows = $result->fetch_assoc()){?>
        <tr>
            <td class="d-none"><?php echo $rows['people_Id'];?></td>
            <td><?php echo $rows['reservation_Id'];?></td>
            <td><?php echo $rows['name'];?></td>
            <td class="d-none"><?php echo $rows['email'];?></td>
            <td><?php echo $rows['Category'];?></td>
            <td><?php echo $rows['title'];?></td>
            <td><?php echo $rows['hallTitle'];?></td>
            <td><?php echo $rows['timeInOut'];?></td>
            <!-- <td>
              <?php 
                $price = $rows['Price'];
                $discount = $rows['Discount'];

                $discount = $discount / 100;

                $priceDiscount = $price * $discount;
                echo $totalPrice = $price - $priceDiscount;
              ?>
            </td> -->
            <td class="d-none"><?php echo $rows['address'];?></td>
            <td class="d-none"><?php echo $rows['code'];?></td>
            <td><?php echo $rows['dateIn'];?></td>
            <td><?php echo $rows['dateOut'];?></td>
            <td><?php echo $rows['adult'];?></td>
            <td><?php echo $rows['children'];?></td>
            <td><?php echo $rows['reservationStatus'];?></td>
            <td><?php echo $rows['dateCreated'];?></td>
            <td class="d-flex justify-content-center align-items-center" style="flex-direction: column;">

                <form action="reservation_cancel.php" method="POST" style="width: 100%;" class="mb-2">
                  <input type="text" class="d-none" name="can_reservationId" value="<?php echo $rows['reservation_Id'];?>">
                  <input type="text" class="d-none" name="can_reservationStatus" value="<?php echo $rows['reservationStatus'];?>">
                  <input type="submit" class="btn btn-danger" name="cancelBtn" value="Cancel" style="width: 100%;">
                </form>

                <form action="reservation_Admin_checkOut.php" method="POST" style="width: 100%;">
                  <input class="d-none" type="text" name="check_reservationId" value="<?php echo $rows['reservation_Id'];?>">
                  <input class="d-none" type="text" name="check_peopleId" value="<?php echo $rows['people_Id'];?>">
                  <input class="d-none" type="text" name="check_roomId" value="<?php echo $rows['room_Id'];?>">
                  <input class="d-none" type="text" name="check_hallId" value="<?php echo $rows['hall_Id'];?>">
                  <input class="d-none" type="text" name="check_name" value="<?php echo $rows['name'];?>">
                  <input class="d-none" type="text" name="check_address" value="<?php echo $rows['address'];?>">
                  <input class="d-none" type="text" name="check_code" value="<?php echo $rows['code'];?>">
                  <input class="d-none" type="text" name="check_email" value="<?php echo $rows['email'];?>">
                  <input class="d-none" type="text" name="check_number" value="<?php echo $rows['number'];?>">
                  <input class="d-none" type="text" name="check_Category" value="<?php echo $rows['Category'];?>">
                  <input class="d-none" type="text" name="check_Title" value="<?php echo $rows['title'];?>">
                  <input class="d-none" type="text" name="check_HallTitle" value="<?php echo $rows['hallTitle'];?>">
                  <input class="d-none" type="text" name="check_timeInOut" value="<?php echo $rows['timeInOut'];?>">
                  <input class="d-none" type="text" name="check_Price" value="<?php echo $rows['Price'];?>">
                  <input class="d-none" type="text" name="check_cottagePrice" value="<?php echo $rows['cottagePrice'];?>">
                  <input class="d-none" type="text" name="check_hallPrice" value="<?php echo $rows['hallPrice'];?>">
                  <input class="d-none" type="text" name="check_Discount" value="<?php echo $rows['Discount'];?>">
                  <input class="d-none" type="text" name="check_cottageDiscount" value="<?php echo $rows['cottageDiscount'];?>">
                  <input class="d-none" type="text" name="check_hallDiscount" value="<?php echo $rows['hallDiscount'];?>">
                  <input class="d-none" type="text" name="check_dateIn" value="<?php echo $rows['dateIn'];?>">
                  <input class="d-none" type="text" name="check_dateOut" value="<?php echo $rows['dateOut'];?>">
                  <input class="d-none" type="text" name="check_adult" value="<?php echo $rows['adult'];?>">
                  <input class="d-none" type="text" name="check_children" value="<?php echo $rows['children'];?>">
                  <input class="d-none" type="text" name="check_reservationStatus" value="<?php echo $rows['reservationStatus'];?>">
                  <input class="d-none" type="text" name="check_dateCreated" value="<?php echo $rows['dateCreated'];?>">
                  <input type="submit" class="btn btn-dark" name="checkBtn" value="Check Out" style="width: 100%;">
                </form>
            
            </td>
        </tr>

            <?php } ?>
        <?php } ?>


        </tbody>
               
</table>

  </div>
</div>

  




  

  





<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<!-- 
<script>
$('#click').click(function(e){
  console.log("QWE!@#")
})

$(document).ready(function(){
  console.log("Easd")

  $('#out').datetimepicker({ 
    minDate: new Date() 
  }); 
});

  $('#in').datepicker({ 
    
    minDate: 0 
  }); 



         


</script> -->
</body>
 
</html>