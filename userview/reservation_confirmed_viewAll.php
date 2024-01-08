<?php 



include('../database/connect.php');
session_start();

if(!isset($_SESSION['peopleId']) && $_SESSION['type'] != "User"){
    header("Location: login_form.php");
}

  $peopleId = $_SESSION['peopleId'];
  $fname = $_SESSION['fname'];
  $lname =$_SESSION['lname'];
  $email =$_SESSION['email'];
  $contact =$_SESSION['contact'];

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
    <h3 class="ml-5 mt-5">Reservation Confirmed View All Information </h3>
  </div>

  <?php 

        $sql = "SELECT p.payment_Id, p.people_Id, p.reservation_Id, p.total, p.downpayment, p.reference, p.date_of_pay, p.image_dir, r.reservation_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.code, t.Category, t.Price, t.Discount, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM payment p INNER JOIN reservation r ON p.reservation_Id = r.reservation_Id INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id WHERE p.reservation_Id ='$resId'";
        
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

        <div class="mt-3">
            <span class="font-weight-bold" style="font-size: 16px;">For any questions or additional information you can contact us.</span>
        </div>

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
    <a href="../user_dashboard/" style="margin-left:98%; color: #000; font-size:medium; " class="fa-solid fa-x"></a>
        <h3 class="text-center">Payment Info</h3>

        <div class="row">
            <div class="col-md-6 text-center">
                <h6>Reference #</h6>
            </div>

            <div class="col-md-6 text-center">
                <h6 class="font-weight-bold"><?php echo $rows['reference'];?> </h6>
            </div>
        </div>

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
            <div class="col-md-6">
                <span style="font-size: 14px;">No. of nights </span>
            </div>

            <div class="col-md-6">

                <span style="font-size: 15px;" class="font-weight-bold">
                <?php 

                $check_dateIn = $rows['dateIn'];
                $check_dateOut = $rows['dateOut'];

                $datetime1 = new DateTime($check_dateIn);
                $datetime2 = new DateTime($check_dateOut);
                $interval = $datetime1->diff($datetime2);

                echo $interval = $interval->format('%d');
                
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
            <div class="col-md-6">
                <span style="font-size: 14px;">Guests</span>
            </div>

            <div class="col-md-6">
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
                <span style="font-size: 14px;" class="font-weight-bold">Php <?php echo $rows['downpayment'];?></span>
            </div>
        </div>

        
    </div>

    <!-- Button trigger modal -->
                <button type="button" class="btn btn-success editBtn mt-1 ml-auto mt-2 mr-4" >
                Pay Full Payment
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Full Payment Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <span class="" style="font-size: 14px; color: red;">Note: The FULL PAYMENT must be true because we can see and change the data/information you've been maid. We will cancel your reservation if necessarry Thankyou!.</span>
                        <form action="reservation_confirmed_update.php" class="mt-3" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" value="<?php echo $rows['people_Id'];?>" name="people_Id" id="people_Id" class="form-control d-none" >
                                    <input type="text" value="<?php echo $rows['reservation_Id'];?>" name="reservation_Id" id="reservation_Id" class="form-control d-none" >
                                    
                                    <input type="text" name="email" id="email" class="form-control d-none" >
                                    <label for="">Name</label>
                                    <input type="text" value="<?php echo $rows['name'];?>" id="name" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Room Type</label>
                                    <input type="text" value="<?php echo $rows['Category'];?>" id="room_type" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Check In</label>
                                    <input type="text" value="<?php echo date("l, F j Y", strtotime($rows['dateIn']));?>" id="check_in" class="form-control" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Check Out</label>
                                    <input type="text" value="<?php echo date("l, F j Y", strtotime($rows['dateOut']));?>" id="check_out" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Total</label>
                                    <input type="text" value="<?php echo $rows['total'];?>" id="total" name="total" class="form-control" readonly >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Balance</label>
                                    <input type="text" value="<?php echo $rows['downpayment'];?>" id="balance" name="balance" class="form-control font-weight-bold" readonly >
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center mt-3">
                            <img src="../img/QRCODE.jpg" class="img-responsive" alt="GCash Qr Code"  width="80%" height="350">
                            </div>

                            <div class="mt-2">
                                <h6 style="color: red; font-weight: bold">Pay: <?php echo $rows['downpayment'];?> Pesos</h6>
                                <input type="text" value="<?php echo $rows['downpayment'];?>" name="payment" class="form-control d-none" readonly>
                            </div>

                        <div class="">
                            
                                

                                <?php 
                                
                                $sqla = "SELECT * FROM user_form";
                                $resulta = $conn->query($sqla);
                                ?>

                                <?php if($resulta->num_rows > 0){ ?>
                                    <?php while($rowsa = $resulta->fetch_assoc()){?>
                                        
                                        <input type="text" name="out_adminEmail" value="<?php echo $rowsa['email'];?>" class="form-control d-none">
                                    <?php } ?>
                                <?php } ?>
                                
                                


                                <!-- <input type="text" name="out_name" value="<?php echo $check_name?>" class="form-control d-none">
                                <input type="text" name="out_email" value="<?php echo $check_email?>" class="form-control d-none">
                                <input type="text" name="out_number" value="<?php echo $check_number?>" class="form-control d-none">
                                <input type="text" name="out_Category" value="<?php echo $check_Category?>" class="form-control d-none">
                                <input type="text" name="out_Price" value="<?php echo $check_Price?>" class="form-control d-none">
                                <input type="text" name="out_dateIn" value="<?php echo $check_dateIn?>" class="form-control d-none">
                                <input type="text" name="out_dateOut" value="<?php echo $check_dateOut?>" class="form-control d-none">
                                <input type="text" name="out_adult" value="<?php echo $check_adult?>" class="form-control d-none">
                                <input type="text" name="out_children" value="<?php echo $check_children?>" class="form-control d-none"> -->

                                <!-- <input type="text" name="out_reservationId" value="<?php echo $check_reservationId?>" class="form-control d-none">
                                <input type="text" name="out_peopleId" value="<?php echo $check_peopleId?>" class="form-control d-none">
                                <input type="text" name="out_total" value="<?php echo $total?>" class="form-control d-none">
                                <input type="text" name="out_downpayment" value="<?php echo $downpayment?>" class="form-control d-none">
                                <input type="text" name="out_balance" value="<?php echo $balance?>" class="form-control d-none"> -->
                                <input type="text" name="out_referenceNo" class="form-control " placeholder="Reference No.">

                                <label for="" class="mt-3">Screenshot of Receipt</label>
                                <input type="file" name="userfile[]" multiple="" value="" class="form-control ">
                            
                        </div>

                            <!-- <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="">Payment</label>
                                    <input type="number" value="" id="payment" name="payment" class="form-control" >
                                </div>
                            </div> -->
                            
                            <!-- <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="">Select Status</label>
                                    
                                    <select name="status" id="status" class="form-control" >
                                        <option value=""></option>
                                        <option value="Arrived">Arrived</option>
                                        <option value="Cancelled">Cancel</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                                <input type="submit" name="payBtn" value="Pay" class="btn btn-info">

                                <!-- Dito na tayo sa form ang pag eedit ng status  -->
                            </div>
                        </form>
                    </div>
                    
                    </div>
                </div>
                </div>

                <!-- Modal -->
    
  </div>

  
  <?php } ?>
<?php } ?>



  

  </div>
</div>

<script>

$(document).ready(function (){

    $('.editBtn').on('click', function(){
                console.log("Clikced")
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                // console.log(data);
                // $('#people_Id').val(data[0]);
                // $('#reservation_Id').val(data[1]);
                // $('#name').val(data[2]);
                // $('#email').val(data[3]);
                // $('#room_type').val(data[4]);
                // $('#check_in').val(data[8]);
                // $('#check_out').val(data[9]);

                // $('#total').val(data[11]);
                // $('#balance').val(data[12]);

                // $("#status option:selected").text(data[13]);
                // $("#status option:selected").val(data[13]);
                
                
            });

})

</script>


</body>
 
</html>