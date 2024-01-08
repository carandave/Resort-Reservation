<?php 

include('../database/connect.php');
session_start();

if(!isset($_SESSION['adminId']) && $_SESSION['type'] != "admin"){
    header("Location: login_form.php");
}

?>
    <!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
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
  </head>
</head>
<body >
    
        <?php
            include "../admin_dashboard/header.php";
            include "../admin_dashboard/sidebar.php";
      
        ?>

<div class="row ml-5">
    <div class="col-md-1 ">
        qwe
    </div>
  <!-- Dun na tayo sa pag eedit ng User -->
  <div class="col-md-11  ">
    
  <div class="d-flex justify-content: center; align-items: center ">
    <h3 class="ml-5 mt-5">Print Reservation Reports</h3>
  </div>

  <button class="btn btn-info btn-border btn-round ml-5 mb-3" onclick="printDiv('printThis')">
        Print
  </button>

  <div class="card-body m-5" id="printThis">
                    <div class="d-flex flex-wrap justify-content-center pb-3" style="border-bottom:1px solid red">
                        <div class="" style="width: 100%">
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                        <img src="img/Logo.png" alt="" style="height: 150px">
                                </div>
                                <div class="col-md-4 d-flex justify-content-center flex-column">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <h6 class="mb-0 ">Republic of the Philippines</h6>    
                                        <h5 class="fw-bold mt-1 mb-0" style="color: #002c42 !important;">Villa Sampaguita Resort</h5>
                                        <h6 class="fw-bold my-0"><span class="" style="">resortvillasampaguita@gmail.com</span></h6>
                                        <h6 class="fw-bold "><span class="" style="">+63 9955495363</span></h6>
                                        
                                    </div>

                                    <h6 class="fw-bold text-center"><span class="" style="font-size: 12px">H682+Q5H Villa Sampaguita Resort, L. Sumulong Memorial Circle, Antipolo, 1870 Ri, Antipolo, Rizal, Philippines, 1990</span></h6>
                                    
                                        
                                </div>
                                
                            </div>
                                
                        </div>
                    </div>
                    <table class="table table-responsive" id="" style="margin: 0 auto; width: 90%; ">
        
    <thead>
    <tr >
        <th class="d-none">People ID</th>
        <th>Reservation ID</th>
        <th>Full Name</th>
        <th class="d-none">Email</th>
        <th>Room Type</th>
        <!-- <th>Price</th> -->
        <th class="d-none">Address</th>
        <th class="d-none">Code</th>
        <th>Check In</th>
        <th>Check Out</th>
        <!-- <th>Adult</th>
        <th>Children</th> -->
        <th>Status</th>
        <th>Reservation Created</th>
        <!-- <th>Action</th> -->
    </tr>
    </thead>
    <tbody>
        <?php 
        
        $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, r.code, t.Category, t.Price FROM reservation r INNER JOIN room t ON r.room_Id = t.room_Id ORDER BY reservation_Id DESC";
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
            <!-- <td><?php echo $rows['Price'];?></td> -->
            <td class="d-none"><?php echo $rows['address'];?></td>
            <td class="d-none"><?php echo $rows['code'];?></td>
            <td><?php echo $rows['dateIn'];?></td>
            <td><?php echo $rows['dateOut'];?></td>
            <!-- <td><?php echo $rows['adult'];?></td>
            <td><?php echo $rows['children'];?></td> -->
            <td><?php echo $rows['reservationStatus'];?></td>
            <td><?php echo $rows['dateCreated'];?></td>
            <!-- <td>
                <button class="btn btn-primary">Print</button>
            </td> -->
            <!-- <td class="d-flex justify-content-center align-items-center" style="flex-direction: column;">

                <form action="reservation_cancel.php" method="POST" style="width: 100%;" class="mb-2">
                  <input type="text" class="d-none" name="can_reservationId" value="<?php echo $rows['reservation_Id'];?>">
                  <input type="submit" class="btn btn-danger" name="cancelBtn" value="Cancel" style="width: 100%;">
                </form>
            
                <form action="reservation_checkOut.php" method="POST" style="width: 100%;">
                  <input class="d-none" type="text" name="check_reservationId" value="<?php echo $rows['reservation_Id'];?>">
                  <input class="d-none" type="text" name="check_peopleId" value="<?php echo $rows['people_Id'];?>">
                  <input class="d-none" type="text" name="check_name" value="<?php echo $rows['name'];?>">
                  <input class="d-none" type="text" name="check_address" value="<?php echo $rows['address'];?>">
                  <input class="d-none" type="text" name="check_code" value="<?php echo $rows['code'];?>">
                  <input class="d-none" type="text" name="check_email" value="<?php echo $rows['email'];?>">
                  <input class="d-none" type="text" name="check_number" value="<?php echo $rows['number'];?>">
                  <input class="d-none" type="text" name="check_Category" value="<?php echo $rows['Category'];?>">
                  <input class="d-none" type="text" name="check_Price" value="<?php echo $rows['Price'];?>">
                  <input class="d-none" type="text" name="check_dateIn" value="<?php echo $rows['dateIn'];?>">
                  <input class="d-none" type="text" name="check_dateOut" value="<?php echo $rows['dateOut'];?>">
                  <input class="d-none" type="text" name="check_adult" value="<?php echo $rows['adult'];?>">
                  <input class="d-none" type="text" name="check_children" value="<?php echo $rows['children'];?>">
                  <input class="d-none" type="text" name="check_reservationStatus" value="<?php echo $rows['reservationStatus'];?>">
                  <input class="d-none" type="text" name="check_dateCreated" value="<?php echo $rows['dateCreated'];?>">
                  <input type="submit" class="btn btn-dark" name="checkBtn" value="Check Out" style="width: 100%;">
                </form>
            </td> -->
        </tr>

            <?php } ?>
        <?php } ?>


        </tbody>
               
</table>

                <div class="row mt-3">
                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6 text-right" >
                        <?php date_default_timezone_set('Asia/Manila'); ?>
                        <p style="font-weight: bold" class="text-right"><?php echo date("Y-m-d  h:i:sa") ?></p>
                    </div>
                </div>

                
                
                            
                </div>

  

  </div>
</div>

<script>
            function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        window.print();

                        document.body.innerHTML = originalContents;
                    
            }
    </script>     
</body>
 
 </html>
