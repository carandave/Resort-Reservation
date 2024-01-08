<?php 



include('../database/connect.php');
session_start();

if(!isset($_SESSION['peopleId']) && $_SESSION['type'] != "User"){
    header("Location: login_form.php");
}

   $resId = $_GET['resId'];
   $pepId = $_GET['pepId'];

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


            include "../user_dashboard/header.php";
            include "../user_dashboard/sidebar.php";
           
           
        ?>


<div class="row ml-5 mb-5">
    <div class="col-md-1 ">
        qwe
    </div>

  <div class="col-md-11  ">
    
  <div class="d-flex justify-content: center; align-items: center ">
    <h3 class="ml-5 mt-5">Reservation History Information </h3>
  </div>

  <?php 

        $sql = "SELECT p.payment_Id, p.people_Id, p.reservation_Id, p.total, p.downpayment, p.balance, p.reference, p.payment_status, p.date_of_pay, p.image_dir, r.reservation_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.code, t.Category, t.Price, t.Discount, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM payment p INNER JOIN reservation r ON p.reservation_Id = r.reservation_Id INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id WHERE p.reservation_Id ='$resId' AND p.payment_status ='1stPay'";
        
        // $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, r.code, p.people_Id, p.address, t.Category, t.Price FROM reservation r INNER JOIN people p ON r.people_Id = p.people_Id INNER JOIN room t ON r.room_Id = t.room_Id WHERE r.people_Id = '$peopleId' AND reservationStatus='Unpaid'";
        $result = $conn->query($sql);
    
  ?>

<?php if($result->num_rows > 0){?>
    <?php while($rows = $result->fetch_assoc()){?>
  <div class="row" style="margin: 0 auto; width: 90%; ">
    <div class="col-md-6 p-5" style="min-height: 400px; color: white; background: #4b7565">
        <h3>Reservation Info</h3>

        <div class="d-flex justify-content-end">
            <span class="">Transaction # <?php echo $rows['code'];?></span>
        </div>
        
        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Name: <?php echo $rows['name'];?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Email: <?php echo $rows['email'];?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Contact No.: <?php echo $rows['number'];?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Date In: <?php echo date("l, F j Y", strtotime($rows['dateIn']));?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Date Out: <?php echo date("l, F j Y", strtotime($rows['dateOut']));?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Time In and Out: <?php echo $rows['timeInOut'];?></span>
        </div>

        <!-- <div class="mt-3">
            <span class="font-weight-bold" style="font-size: 16px;">For any questions or additional information you can contact us.</span>
        </div> -->

        <hr style="background: white;">

        <div>
            <span style="font-size: 14px;">Phone Number: 09955495363</span>
        </div>

        <div>
            <span style="font-size: 14px;">Email: resortvillasampaguita@gmail.com</span>
        </div>

        <div>
            <span style="font-size: 14px;">Address: 	H682+Q5H Villa Sampaguita Resort, L. Sumulong Memorial Circle, Antipolo, 1870 Ri, Antipolo, Rizal, Philippines, 1990</span>
        </div>

    </div>

    <div class="col-md-5 ml-5 p-4" style="min-height: 400px; color: white; background: #4b7565">
    <a href="../user_dashboard/" style="margin-left:98%; color: #fff; font-size:small; " class="fa-solid fa-x"></a>
        <h3 class="text-center">Payment Info</h3>

        <div class="row">
            <div class="col-md-6 text-center">
                <h6>Reference #</h6>
            </div>

            <div class="col-md-6 text-center">
                <h6 class="font-weight-bold"><?php echo $rows['reference'];?> </h6>
            </div>
        </div>

        <hr style="background-color: white;">

        <!-- Dun na tayo sa pag eedit ng room -->

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">Room Type </span>
            </div>

            <div class="col-md-6 ">
                <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['Category'];?> (<?php echo $rows['Price'];?>)</span>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">Cottage </span>
            </div>

            <div class="col-md-6 ">
                <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['title'];?> (Php <?php echo $rows['cottagePrice'];?>)</span>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">Hall </span>
            </div>

            <div class="col-md-6 ">
                <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['hallTitle'];?> (Php <?php echo $rows['hallPrice'];?>)</span>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">No. of nights </span>
            </div>

            <div class="col-md-6 ">

                <span style="font-size: 15px;" class="font-weight-bold">
                <?php 

                $check_dateIn = $rows['dateIn'];
                $check_dateOut = $rows['dateOut'];

                $datetime1 = new DateTime($check_dateIn);
                $datetime2 = new DateTime($check_dateOut);
                $interval = $datetime1->diff($datetime2);

                $interval = $interval->format('%d');
                echo $interval;
                ?> 
                Days

                
                
                <?php 
                
                $price = $rows['Price'];
                $nightsTotal = $interval * $price;?>

                <?php 
                
                $cottageprice = $rows['cottagePrice'];
                $cottagenightsTotal = $interval * $cottageprice;?>

                <?php 
                
                $hallprice = $rows['hallPrice'];
                $hallnightsTotal = $interval * $hallprice;?>
                


                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">Guests</span>
            </div>

            <div class="col-md-6 ">
                <div>
                    <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['adult'];?> Adult </span>
                </div>

                <div>
                    <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['children'];?> Kids </span>
                </div>
                
                <!-- Dito na tayo sa reservation Confirmed List -->
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Room Discount </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php 
                    <?php 
                    
                     $discount = $rows['Discount'];

                     $discountPoint =  $discount / 100;
                     
                     echo $priceDiscounts = $discountPoint * $nightsTotal;

                    ?>

                    (<?php echo $rows['Discount'];?>%)
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Cottage Discount </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php 
                    <?php 
                    
                     $cottagediscount = $rows['cottageDiscount'];

                     $cottagediscountPoint =  $cottagediscount / 100;
                     
                     echo $cottagepriceDiscounts = $cottagediscountPoint * $cottagenightsTotal;

                    ?>
                    (<?php echo $rows['cottageDiscount'];?>%)
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Hall Discount </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php 
                    <?php 
                    
                     $halldiscount = $rows['hallDiscount'];

                     $halldiscountPoint =  $halldiscount / 100;
                     
                     echo $hallpriceDiscounts = $halldiscountPoint * $hallnightsTotal;

                    ?>
                    (<?php echo $rows['hallDiscount'];?>%)
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Total Room Price</span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">
                    Php
                    <?php 
                        $nightsTotal;

                        $discount = $rows['Discount'];

                        $discountPoint =  $discount / 100;
                        
                        $priceDiscounts = $discountPoint * $nightsTotal;

                        echo $totalRoomPrice = $nightsTotal - $priceDiscounts;
                    ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Total Cottage Price</span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">
                    Php
                    <?php 
                        $cottagenightsTotal;

                        $cottagediscount = $rows['cottageDiscount'];

                        $cottagediscountPoint =  $cottagediscount / 100;
                        
                        $cottagepriceDiscounts = $cottagediscountPoint * $cottagenightsTotal;

                        echo $totalCottagePrice = $cottagenightsTotal - $cottagepriceDiscounts;
                    ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Total Hall Price</span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">
                    Php
                    <?php 
                        $hallnightsTotal;

                        $halldiscount = $rows['hallDiscount'];

                        $halldiscountPoint =  $halldiscount / 100;
                        
                        $hallpriceDiscounts = $halldiscountPoint * $hallnightsTotal;

                        echo $totalHallPrice = $hallnightsTotal - $hallpriceDiscounts;
                    ?>
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Total Amount</span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php 
                <?php 
                
                echo $totalAmount = $totalRoomPrice + $totalCottagePrice + $totalHallPrice;

                ?>
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Your Downpayment </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php <?php echo $rows['downpayment'];?></span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Balance </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php <?php echo $rows['balance'];?></span>
            </div>
        </div>
    </div>
  </div>
  <?php } ?>
<?php } ?>


<!-- Second -->

<?php 

        // $sql = "SELECT p.payment_Id, p.people_Id, p.reservation_Id, p.total, p.downpayment, p.balance, p.reference, p.payment_status, p.date_of_pay, p.image_dir, r.reservation_Id, r.name, r.email, r.number, r.room_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.code, t.Category, t.Price, t.Discount FROM payment p INNER JOIN reservation r ON p.reservation_Id = r.reservation_Id INNER JOIN room t ON r.room_Id = t.room_Id WHERE p.reservation_Id ='$resId' AND p.payment_status ='2ndPay'";
        $sql = "SELECT p.payment_Id, p.people_Id, p.reservation_Id, p.total, p.downpayment, p.balance, p.reference, p.payment_status, p.date_of_pay, p.image_dir, r.reservation_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.code, t.Category, t.Price, t.Discount, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM payment p INNER JOIN reservation r ON p.reservation_Id = r.reservation_Id INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id WHERE p.reservation_Id ='$resId' AND p.payment_status ='2ndPay'";
    
        $result = $conn->query($sql);
    
  ?>

<?php if($result->num_rows > 0){?>
    <?php while($rows = $result->fetch_assoc()){?>
  <div class="row mt-3" style="margin: 0 auto; width: 90%; ">
    <div class="col-md-6 p-5" style="min-height: 400px; color: white; background: #4b7565">
        <h3>Reservation Info</h3>

        <div class="d-flex justify-content-end">
            <span class="">Transaction # <?php echo $rows['code'];?></span>
        </div>
        
        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Name: <?php echo $rows['name'];?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Email: <?php echo $rows['email'];?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Contact No.: <?php echo $rows['number'];?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Date In: <?php echo date("l, F j Y", strtotime($rows['dateIn']));?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Date Out: <?php echo date("l, F j Y", strtotime($rows['dateOut']));?></span>
        </div>

        <div>
            <span class="font-weight-regular" style="font-size: 16px;">Time In and Out: <?php echo $rows['timeInOut'];?></span>
        </div>

        <!-- <div class="mt-3">
            <span class="font-weight-bold" style="font-size: 16px;">For any questions or additional information you can contact us.</span>
        </div> -->

        <hr style="background: white;">

        <div>
            <span style="font-size: 14px;">Phone Number: 09955495363</span>
        </div>

        <div>
            <span style="font-size: 14px;">Email: resortvillasampaguita@gmail.com</span>
        </div>

        <div>
            <span style="font-size: 14px;">Address: 	H682+Q5H Villa Sampaguita Resort, L. Sumulong Memorial Circle, Antipolo, 1870 Ri, Antipolo, Rizal, Philippines, 1990</span>
        </div>

    </div>

    <div class="col-md-5 ml-5 p-5" style="min-height: 400px; color: white; background: #4b7565">
        <h3 class="text-center">Payment Info</h3>

        <div class="row">
            <div class="col-md-6 text-center">
                <h6>Reference #</h6>
            </div>

            <div class="col-md-6 text-center">
                <h6 class="font-weight-bold"><?php echo $rows['reference'];?> </h6>
            </div>
        </div>

        <hr style="background-color: white;">

        <!-- Dun na tayo sa pag eedit ng room -->

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">Room Type </span>
            </div>

            <div class="col-md-6">
                <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['Category'];?> (<?php echo $rows['Price'];?>)</span>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">Cottage </span>
            </div>

            <div class="col-md-6 ">
                <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['title'];?> (Php <?php echo $rows['cottagePrice'];?>)</span>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">Hall </span>
            </div>

            <div class="col-md-6 ">
                <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['hallTitle'];?> (Php <?php echo $rows['hallPrice'];?>)</span>
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">No. of nights </span>
            </div>

            <div class="col-md-6 ">

                <span style="font-size: 15px;" class="font-weight-bold">
                <?php 

                $check_dateIn = $rows['dateIn'];
                $check_dateOut = $rows['dateOut'];

                $datetime1 = new DateTime($check_dateIn);
                $datetime2 = new DateTime($check_dateOut);
                $interval = $datetime1->diff($datetime2);

                $interval = $interval->format('%d');
                echo $interval;
                ?> 
                Days

                
                
                <?php 
                
                $price = $rows['Price'];
                $nightsTotal = $interval * $price;?>

                <?php 
                
                $cottageprice = $rows['cottagePrice'];
                $cottagenightsTotal = $interval * $cottageprice;?>

                <?php 
                
                $hallprice = $rows['hallPrice'];
                $hallnightsTotal = $interval * $hallprice;?>
                


                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <span style="font-size: 14px;">Guests</span>
            </div>

            <div class="col-md-6 ">
                <div>
                    <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['adult'];?> Adult </span>
                </div>

                <div>
                    <span style="font-size: 15px;" class="font-weight-bold"><?php echo $rows['children'];?> Kids </span>
                </div>
                
                <!-- Dito na tayo sa reservation Confirmed List -->
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Room Discount </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php 
                    <?php 
                    
                     $discount = $rows['Discount'];

                     $discountPoint =  $discount / 100;
                     
                     echo $priceDiscounts = $discountPoint * $nightsTotal;

                    ?>

                    (<?php echo $rows['Discount'];?>%)
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Cottage Discount </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php 
                    <?php 
                    
                     $cottagediscount = $rows['cottageDiscount'];

                     $cottagediscountPoint =  $cottagediscount / 100;
                     
                     echo $cottagepriceDiscounts = $cottagediscountPoint * $cottagenightsTotal;

                    ?>
                    (<?php echo $rows['cottageDiscount'];?>%)
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Hall Discount </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php 
                    <?php 
                    
                     $halldiscount = $rows['hallDiscount'];

                     $halldiscountPoint =  $halldiscount / 100;
                     
                     echo $hallpriceDiscounts = $halldiscountPoint * $hallnightsTotal;

                    ?>
                    (<?php echo $rows['hallDiscount'];?>%)
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Total Room Price</span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">
                    Php
                    <?php 
                        $nightsTotal;

                        $discount = $rows['Discount'];

                        $discountPoint =  $discount / 100;
                        
                        $priceDiscounts = $discountPoint * $nightsTotal;

                        echo $totalRoomPrice = $nightsTotal - $priceDiscounts;
                    ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Total Cottage Price</span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">
                    Php
                    <?php 
                        $cottagenightsTotal;

                        $cottagediscount = $rows['cottageDiscount'];

                        $cottagediscountPoint =  $cottagediscount / 100;
                        
                        $cottagepriceDiscounts = $cottagediscountPoint * $cottagenightsTotal;

                        echo $totalCottagePrice = $cottagenightsTotal - $cottagepriceDiscounts;
                    ?>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Total Hall Price</span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">
                    Php
                    <?php 
                        $hallnightsTotal;

                        $halldiscount = $rows['hallDiscount'];

                        $halldiscountPoint =  $halldiscount / 100;
                        
                        $hallpriceDiscounts = $halldiscountPoint * $hallnightsTotal;

                        echo $totalHallPrice = $hallnightsTotal - $hallpriceDiscounts;
                    ?>
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Total Amount</span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php 
                <?php 
                
                echo $totalAmount = $totalRoomPrice + $totalCottagePrice + $totalHallPrice;

                ?>
                </span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Your Downpayment </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php <?php echo $rows['downpayment'];?></span>
            </div>
        </div>

        <hr style="background-color: white;">

        <div class="row">
            <div class="col-md-6 text-center">
                <span style="font-size: 14px;">Balance </span>
            </div>

            <div class="col-md-6 text-center">
                <span style="font-size: 14px;" class="font-weight-bold">Php <?php echo $rows['balance'];?></span>
            </div>
        </div>
    </div>
  </div>
  <?php } ?>
<?php } ?>

  

  </div>
</div>

  




  

  





<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->


<script>



</script>


</body>
 
</html>