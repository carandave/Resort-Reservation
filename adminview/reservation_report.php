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
  
  <?php 
        $currentDate = date('m/d/Y');
        $sqlr = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, r.code, t.Category, t.Price, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM reservation r INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id WHERE '$currentDate' BETWEEN r.dateIn AND r.dateOut AND reservationStatus='Arrived' AND r.room_Id = t.room_Id ORDER BY reservation_Id DESC";
        $resultr = $conn->query($sqlr);
        $roomUsed = $resultr->num_rows;

        $sqlc = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, r.code, t.Category, t.Price, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM reservation r INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id WHERE '$currentDate' BETWEEN r.dateIn AND r.dateOut AND reservationStatus='Arrived' AND r.cottage_Id = c.cottage_Id ORDER BY reservation_Id DESC";
        $resultc = $conn->query($sqlc);
        $cottageUsed = $resultc->num_rows;

        $sqlh = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, r.code, t.Category, t.Price, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM reservation r INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id WHERE '$currentDate' BETWEEN r.dateIn AND r.dateOut AND reservationStatus='Arrived' AND r.hall_Id = h.hall_Id ORDER BY reservation_Id DESC";
        $resulth = $conn->query($sqlh);
        $hallUsed = $resulth->num_rows;
    
    ?>

    <h6 class="mb-3 mt-3 ml-5 font-weight-bold text-dark">Date Today: <?php echo $currentDate;?></h6>

    <div class="row ml-5 mr-5 mb-3" style="height: 100px;">
        <div class="col-md-4" style="height: 100%;">
             <div class="bg-primary d-flex justify-content-center align-items-center" style="height: 100%;">
                
                <h6 class="mb-0 font-weight-bold text-light"><?php echo $roomUsed;?> Room/s Use Today </h5>
             </div>
        </div>

        <div class="col-md-4"  style="height: 100%;">
            <div class="bg-success d-flex justify-content-center align-items-center"  style="height: 100%;">
                <h6 class="mb-0 font-weight-bold text-light"><?php echo $cottageUsed;?>  Cottage/s Use Today </h5>
            </div>
        </div>

        <div class="col-md-4"  style="height: 100%;">
            <div class="bg-dark d-flex justify-content-center align-items-center"  style="height: 100%;">
                <h6 class="mb-0 font-weight-bold text-light"><?php echo $hallUsed;?> Hall/s Use Today</h5>
            </div>
        </div>
    </div>
    
  <div class="d-flex justify-content: center; align-items: center ">
    <h3 class="ml-5 mt-1">Reservation Reports</h3>
  </div>

  <form action="reservation_report_print.php" method="POST" class="ml-5">
    <input type="submit" value="Print" name="printBtn" class="btn btn-primary form-control mb-3" style="width: 100px;">
  </form>

  <form action="reservation_report_filter.php" method="get" class="ml-5">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="font-weight-bold">From Date Reserved</label>
                <input type="date" name="from_date" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="font-weight-bold">To Date Reserved</label>
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

   



  <table class="table table-responsive" id="" style="margin: 0 auto; width: 90%; ">
        
    <thead>
    <tr >
        <th class="d-none">People ID</th>
        <th>Reservation ID</th>
        <th>Full Name</th>
        <th class="d-none">Email</th>
        <th>Room Type</th>
        <th>Cottage Type</th>
        <th>Hall Type</th>
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
        
        $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, r.code, t.Category, t.Price, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM reservation r INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id ORDER BY reservation_Id DESC ";
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

  </div>
</div>

<script>

$(document).ready(function (){

$('.editBtn').on('click', function(){
            console.log("Clikced")
            $('#editModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#print_peopleId').val(data[0]);
            $('#print_fName').val(data[1]);
            $('#print_lName').val(data[2]);
            $('#print_email').val(data[3]);
            $('#print_contact').val(data[4]);
            $('#print_address').val(data[5]);
            // $('#print_password').val(data[0]);
            // $('#name').val(data[2]);
            // $('#email').val(data[3]);
            // $('#room_type').val(data[4]);
            // $('#check_in').val(data[8]);
            // $('#check_out').val(data[9]);

            // $("#status option:selected").text(data[12]);
            // $("#status option:selected").val(data[12]);
            
            // $('#patient_appDate').val(data[6]);
            // $('#patient_concerned').val(data[7]);

            // $('#patient_status').val(data[8]);
        });

})

</script>                
</body>
 
 </html>
