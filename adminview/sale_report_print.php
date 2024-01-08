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
    <h3 class="ml-5 mt-5">Print Sales Report</h3>
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
            <th class="d-none">People Id</th>
            <th class="">Reservation Id</th>
            <th>Full Name</th>
            <!-- <th>Last Name</th> -->
            <th>Total</th>
            <th>Payment</th>
            <th>balance</th>
            <th>Payment Status</th>
            <!-- <th>Reference</th> -->
            <th>Date of Pay</th>
            <!-- <th>User Type</th> -->
            
        </tr>
        </thead>
        <tbody>
            <?php 
            
            // $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, r.code, p.people_Id, p.address, t.Category, t.Price FROM reservation r INNER JOIN people p ON r.people_Id = p.people_Id INNER JOIN room t ON r.room_Id = t.room_Id WHERE reservationStatus='Confirmed'";

            $sql = "SELECT p.payment_Id, p.people_Id, p.reservation_Id, p.total, p.downpayment, p.balance, p.reference, p.payment_status, p.date_of_pay, u.people_Id, u.fName, u.lName FROM payment p INNER JOIN people u ON p.people_Id = u.people_Id ORDER BY p.reservation_Id DESC ";
  
            // $sql = "SELECT * FROM people";
            $result = $conn->query($sql);
            
            ?>
    
            <?php if($result->num_rows > 0){?>
                <?php while($rows = $result->fetch_assoc()){?>
            <tr>
                <!-- <td class="d-none"><?php echo $rows['people_Id'];?></td> -->
                <td class=""><?php echo $rows['reservation_Id'];?></td>
                <td><?php echo $rows['fName'];?> <?php echo $rows['lName'];?></td>
                <!-- <td></td>
                <td></td> -->
                <td><?php echo $rows['total'];?></td>
                <td><?php echo $rows['downpayment'];?></td>
                <td><?php echo $rows['balance'];?></td>
                <td>
                    <?php 
                    $rows['payment_status'];

                    if($rows['payment_status'] == "1stPay"){
                        echo "<span style='background: orange; padding: 8px 12px; width: 100%; display: inline-block; text-align: center; font-weight: bold; color: white; font-size: 14px; line-height: 14px;'>Down Payment</span>";
                    }

                    elseif($rows['payment_status'] == "2ndPay"){
                        echo "<span style='background: green; padding: 8px 12px; width: 100%; display: inline-block; text-align: center; font-weight: bold; color: white; font-size: 14px; line-height: 14px;'>Fully Paid</span>";
                    }
                    ?>
                
                </td>
                <!-- <td><?php echo $rows['reference'];?></td> -->
                <td><?php echo $rows['date_of_pay'];?></td>
                
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
