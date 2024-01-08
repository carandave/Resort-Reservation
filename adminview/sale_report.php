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
    
    </div>
  <!-- Dun na tayo sa pag eedit ng User -->
  <div class="col-md-11  ">
    
  <div class="d-flex justify-content: center; align-items: center ">
    <h3 class="ml-5 mt-1">Payment Reports</h3>
  </div>

  <form action="sale_report_print.php" method="POST" class="ml-5">
    <!-- <input type="text" class="d-none" name="namePrint" value="<?php echo $rowp['patientName']; ?>">
    <input type="text" class="d-none" name="datePrint" value="<?php echo date("l, F j Y", strtotime($rowp['dateToday']));?>">
    <input type="text" class="d-none" name="dentistnamePrint" value="<?php echo $rowp['dentistName']; ?>">
    <input type="text" class="d-none" name="medicinePrint" value="<?php echo $rowp['medicine']; ?>"> -->
    
    <input type="submit" value="Print" name="printBtn" class="btn btn-primary form-control mb-3" style="width: 100px;">
  </form>

  <form action="sale_report_filter.php" method="get" class="ml-5">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="font-weight-bold">From Date Pay</label>
                <input type="date" name="from_date" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="font-weight-bold">To Date Pay</label>
                <input type="date" name="to_date" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <div>
                    <label for="" class="font-weight-bold">Filter</label>
                </div>
                
                <button type="submit" class="btn" style="background: #009879; color: white;">Filter</button>
            </div>
        </div>
    </div>
   </form>

    <?php 
    
    $sqlf = "SELECT SUM(downpayment) AS sum FROM payment";
    // $sqlf_result = $conn->query($sqls);
    $sqlf_result = mysqli_query($conn, $sqlf);

    ?>
    
    <?php while($rowf = mysqli_fetch_assoc($sqlf_result)){?>
        <h5 class="ml-5 text-light bg-danger text-center p-1" style="width: 300px;">Total Sales: <?php echo $rowf['sum'];?> Pesos</h5>
        
    <?php } ?>
   

  
  <table class="table table-responsive" id="" style="margin: 0 auto; width: 90%; ">
        
        <thead>
        <tr >
            <th class="d-none">People Id</th>
            <th class="">Reservation Id</th>
            <th>First Name</th>
            <th>Last Name</th>
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
                
                <td><?php echo $rows['fName'];?></td>
                <td><?php echo $rows['lName'];?></td>
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

  </div>
</div>

                </body>
 
 </html>
 