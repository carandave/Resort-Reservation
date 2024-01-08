<?php 


include('../database/connect.php');
session_start();

if(!isset($_SESSION['peopleId']) && $_SESSION['type'] != "User"){
    header("Location: login_form.php");
}
  $peopleId = $_SESSION['peopleId'];
//   $fname = $_SESSION['fname'];
//   $lname =$_SESSION['lname'];
//   $email =$_SESSION['email'];
//   $contact =$_SESSION['contact'];

if(isset($_POST['checkBtn'])){
    $check_reservationId = $_POST['check_reservationId'];
    $check_peopleId = $_POST['check_peopleId'];
    $check_roomId = $_POST['check_roomId'];
    $check_hallId = $_POST['check_hallId'];
    $check_name = $_POST['check_name'];
    $check_address = $_POST['check_address'];
    $check_code = $_POST['check_code'];
    $check_email = $_POST['check_email'];
    $check_number = $_POST['check_number'];
    $check_Category = $_POST['check_Category'];
    $check_Title = $_POST['check_Title'];
    $check_HallTitle = $_POST['check_HallTitle'];
    $check_timeInOut = $_POST['check_timeInOut'];
    $check_Price = $_POST['check_Price'];
    $check_cottagePrice = $_POST['check_cottagePrice'];
    $check_hallPrice = $_POST['check_hallPrice'];
    $check_Discount = $_POST['check_Discount'];
    $check_cottageDiscount = $_POST['check_cottageDiscount'];
    $check_hallDiscount = $_POST['check_hallDiscount'];
    $check_dateIn = $_POST['check_dateIn'];
    $check_dateOut = $_POST['check_dateOut'];
    $check_adult = $_POST['check_adult'];
    $check_children = $_POST['check_children'];
    $check_reservationStatus = $_POST['check_reservationStatus'];
    $check_dateCreated = $_POST['check_dateCreated'];

    

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Reservation Check Out</title>
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
    
      


<div class="row mt-3 p-5">

  <div class="col-md-12 p-4" style="background: #4b7565;">

  <div class="">
    
  </div>
    
   


        <?php 
        
        $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.dateCreated, p.people_Id, t.Category FROM reservation r INNER JOIN people p ON r.people_Id = p.people_Id INNER JOIN room t ON r.room_Id = t.room_Id WHERE r.people_Id = '$peopleId'";
        $result = $conn->query($sql);
        
        ?><div class="p-3" style="background: #fff;"> 
         <a href="../user_dashboard/" style="margin-left:98%; color: #000; font-size:medium; " class="fa-solid fa-square-xmark"></a>
    <p class="my-0"><span class="font-weight-bold">Name: </span> <?php echo $check_name?></p>
    <p class="my-0"><span class="font-weight-bold">Reservation ID #: </span> <?php echo $check_reservationId?></p>
    <p class="my-0"><span class="font-weight-bold">Contact #: </span> <?php echo $check_number?></p>
    <p class="my-0"><span class="font-weight-bold">Address: </span> <?php echo $check_address?></p>
  </div>
    <table class="table table-responsive mt-3" id="" style="margin: 0 auto; width: 100%; background: #fff;">
        
    <thead style="width: 100%;">
    <tr style="width: 100%;">
        <th class="d-none">People Id</th>
        <th>Full Name</th>
        <th class="d-none">Email</th>
        <th>Room Type</th>
        <th>Cottage</th>
        <th>Hall</th>
        <th>Time in and Out</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>No. Adult</th>
        <th>No. Children</th>
        <th>Overview</th>
        <!-- <th>Date Submitted</th>
        <th>Action</th> -->
    </tr>
    </thead>
    <tbody style="width: 100%;">

        <tr style="width: 100%;">
            <td><?php echo $check_name?></td>
            <td><?php echo $check_Category?></td>
            <td><?php echo $check_Title?></td>
            <td><?php echo $check_HallTitle?></td>
            <td><?php echo $check_timeInOut?></td>
            <td><?php echo $check_dateIn?></td>
            <td><?php echo $check_dateOut?></td>
            <td><?php echo $check_adult?></td>
            <td><?php echo $check_children?></td>
            <td></td>
            <!-- <td class="text-danger font-weight-bold"><?php echo $check_Price?> Php</td> -->
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
            <td>

                
                
                <span>Room Price (<?php echo $check_Price?> * <?php 

                $datetime1 = new DateTime($check_dateIn);
                $datetime2 = new DateTime($check_dateOut);
                $interval = $datetime1->diff($datetime2);

                echo $interval = $interval->format('%d');



                ?> Days)
                
                </span>

            </td>
            <td>

                <span class="text-danger  font-weight-bold">
                    <?php 
                    $totalRoomPrice = ($check_Price * $interval);
                    echo $totalRoomPrice;
                    ?>
                    Php

                    -

                    <span class="text-success font-weight-bold">
                        <?php 
                        $discount = $check_Discount;
                        echo $discount;
                        ?>% Discount
                    </span>
                </span>
                
                

            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

                
                
                <span>Cottage Price (<?php echo $check_cottagePrice?> * <?php 

                $datetime1 = new DateTime($check_dateIn);
                $datetime2 = new DateTime($check_dateOut);
                $interval = $datetime1->diff($datetime2);

                echo $interval = $interval->format('%d');



                ?> Days)
                
                </span>

            </td>
            <td>

                <span class="text-danger  font-weight-bold">
                    <?php 
                    $totalCottagePrice = (int)$check_cottagePrice * $interval;
                    echo $totalCottagePrice;
                    ?>
                    Php

                    -

                    <span class="text-success font-weight-bold">
                        <?php 
                        $cottagediscount = $check_cottageDiscount;
                        echo $cottagediscount;
                        ?>% Discount
                    </span>
                </span>
                
                

            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>

                
                
                <span>Hall Price (<?php echo $check_hallPrice?> * <?php 

                $datetime1 = new DateTime($check_dateIn);
                $datetime2 = new DateTime($check_dateOut);
                $interval = $datetime1->diff($datetime2);

                echo $interval = $interval->format('%d');



                ?> Days)
                
                </span>

            </td>
            <td>

                <span class="text-danger  font-weight-bold">
                    <?php 
                    $totalHallPrice = (int)$check_hallPrice * $interval;
                    echo $totalHallPrice;
                    ?>
                    Php
                    -
                    <span class="text-success font-weight-bold">
                        <?php 
                        $halldiscount = $check_hallDiscount;
                        echo $halldiscount;
                        ?>% Discount
                    </span>
                </span>
                
                

            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                
                <span>Total Room Price</span>

            </td>
            <td>
                
            <span class="text-info font-weight-bold">
                <?php 
                $discount = $check_Discount;
                ?>

                <?php 
                    $total = $totalRoomPrice;
                    $discount = $discount / 100;

                    $priceDiscount = (int)$total * $discount;

                    echo $total = $total - $priceDiscount;
                ?>
                Php
            </span>
                

            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                
                <span>Total Cottage Price</span>

            </td>
            <td>
                
            <span class="text-info font-weight-bold">
                <?php 
                $cottagediscount = $check_cottageDiscount;
                ?>

                <?php 
                    $totalCottage = $totalCottagePrice;
                    $cottagediscount = (int)$cottagediscount / 100;

                    $cottagepriceDiscount = $totalCottage * $cottagediscount;

                    echo $totalCottage = $totalCottage - $cottagepriceDiscount;
                ?>
                Php
            </span>
                

            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                
                <span>Total Hall Price</span>

            </td>
            <td class="">
                
            <span class="text-info font-weight-bold">
                <?php 
                $halldiscount = $check_hallDiscount;
                ?>

                <?php 
                    $totalHall = $totalHallPrice;
                    $halldiscount = (int)$halldiscount / 100;

                    $hallpriceDiscount = $totalHall * $halldiscount;

                    echo $totalHall = $totalHall - $hallpriceDiscount;
                ?>
                Php
            </span>
                

            </td>
        </tr>

        <!-- <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                
                <span>Amount</span>

            </td>
            <td>
                
            <span class="text-success font-weight-bold">
                <?php 
                $discount = $check_Discount;
                echo $discount ;
                
                ?>%
                -
                <?php 
                
                echo $totalRoomPrice;
                
                ?>
            </span>
                

            </td>
        </tr> -->


        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                
                <span>Total Amount</span>

            </td>
            <td>
                
            <span class="text-dark  font-weight-bold">
                <!-- <?php 
                $total = $totalRoomPrice;
                $discount = $discount / 100;

                $priceDiscount = $total * $discount;

                echo $total = $total - $priceDiscount;
                ?>
                Php -->

                <?php 
                
                $total = $total + $totalCottage + $totalHall;
                echo $total;
                
                ?>
                Php
            </span>
                

            </td>
        </tr>

        

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                
                <span>Downpayment</span>

            </td>
            <td>
                
                <span class="text-success  font-weight-bold">
                    <?php 
                    $downpayment = $total * 0.5;
                    echo $downpayment;
                    ?>
                    Php


                    <!-- For Balance -->
                    <?php 
                    $balance = $total - $downpayment;
                    ?>
                    
                </span>
                

            </td>
        </tr>

        

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                
                

            </td>
            <td>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Check Out
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">


                    </h5 class="modal-title" id="exampleModalLabel">Scan to Pay</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <span class="mb-3" style="font-size: 14px; color: red;">Note: The DOWNPAYMENT must be true because we can see and change the data/information you've been maid. We will cancel your reservation request if necessarry Thankyou!.</span>
                        
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="../img/QRCODE.jpg" class="img-responsive" alt="GCash Qr Code"  width="80%" height="350">
                        </div>
                        

                        <div>
                            <form action="reservation_checkOutAdd.php" method="POST" enctype="multipart/form-data">
                                <input type="text" name="out_roomId" value="<?php echo $check_roomId;?>" class="form-control d-none">
                                <input type="text" name="out_hallId" value="<?php echo $check_hallId;?>" class="form-control d-none">
                                <?php 
                                
                                $sqla = "SELECT * FROM user_form";
                                $resulta = $conn->query($sqla);
                                ?>

                                <?php if($resulta->num_rows > 0){ ?>
                                    <?php while($rowsa = $resulta->fetch_assoc()){?>
                                        
                                        <input type="text" name="out_adminEmail" value="<?php echo $rowsa['email'];?>" class="form-control d-none">
                                    <?php } ?>
                                <?php } ?>
                                
                                


                                <input type="text" name="out_name" value="<?php echo $check_name?>" class="form-control d-none">
                                <input type="text" name="out_email" value="<?php echo $check_email?>" class="form-control d-none">
                                <input type="text" name="out_number" value="<?php echo $check_number?>" class="form-control d-none">
                                <input type="text" name="out_Category" value="<?php echo $check_Category?>" class="form-control d-none">
                                <input type="text" name="out_Title" value="<?php echo $check_Title?>" class="form-control d-none">
                                <input type="text" name="out_HallTitle" value="<?php echo $check_HallTitle?>" class="form-control d-none">
                                <input type="text" name="out_Price" value="<?php echo $check_Price?>" class="form-control d-none">
                                <input type="text" name="out_Discount" value="<?php echo $priceDiscount?>" class="form-control d-none">
                                <input type="text" name="out_dateIn" value="<?php echo $check_dateIn?>" class="form-control d-none">
                                <input type="text" name="out_dateOut" value="<?php echo $check_dateOut?>" class="form-control d-none">
                                <input type="text" name="out_adult" value="<?php echo $check_adult?>" class="form-control d-none">
                                <input type="text" name="out_children" value="<?php echo $check_children?>" class="form-control d-none">

                                <input type="text" name="out_reservationId" value="<?php echo $check_reservationId?>" class="form-control d-none">
                                <input type="text" name="out_peopleId" value="<?php echo $check_peopleId?>" class="form-control d-none">
                                <input type="text" name="out_total" value="<?php echo $total?>" class="form-control d-none">
                                <input type="text" name="out_downpayment" value="<?php echo $downpayment?>" class="form-control d-none">
                                <input type="text" name="out_balance" value="<?php echo $balance?>" class="form-control d-none">
                                <label for="" class="mt-3">Screenshot of Payment</label>
                                <input type="file" name="userfile[]" multiple="" value="" class="form-control ">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="payBtn" class="btn btn-primary">
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                    </form>
                    </div>
                </div>
                </div>

                        
            </td>        

        </tbody>
               
</table>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
 
</html>