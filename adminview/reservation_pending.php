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
	  	<script>
	  		$( function() {
	   			$( "#check_in" ).datepicker({
	   				minDate: 0
	   			});

           $( "#check_out" ).datepicker({
	   				minDate: 0
	   			});
	  		});
        
	  	</script>
  </head>
</head>
<body style="overflow-x: hidden;">
    
        <?php


            include "../admin_dashboard/header.php";
            include "../admin_dashboard/sidebar.php";
           
           
        ?>


<div class="row ml-5">
    <div class="col-md-1 ">
        qwe
    </div>

  <div class="col-md-11  ">
    
  <div class="d-flex justify-content: center; align-items: center ">
    <h3 class="ml-5 mt-1">Reservation Pending List</h3>
  </div>
    <table class="table table-responsive" id="" style="margin: 0 auto; width: 90%; ">
        
    <thead>
    <tr >
        <th class="">ID #</th>
        <th class="d-none">People Id</th>
        <th>Full Name</th>
        <th class="d-none">Downpayment</th>
        <th class="d-none">Balance</th>
        <th class="d-none">Total</th>
        <th class="d-none">Reference</th>
        <th class="d-none">Date of Pay</th>
        <th class="d-none">Email</th>
        <th>Room Type</th>
        <th>Cottage</th>
        <th>Hall</th>
        <th>Time In & Out</th>
        <th class="d-none">Price</th>
        <th class="d-none">Address</th>
        <th class="d-none">Code</th>
        
        <th>Check In</th>
        <th>Check Out</th>
        <th>Adult</th>
        <th>Children</th>
        <th>Payment Image</th>
        <th>Payment Status</th>
        <th>Status</th>
        <th>Date Submitted</th>
        
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php 
        
        $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.payment_status, r.dateCreated, r.code, p.people_Id, p.address, t.Category, t.Price, t.Discount, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount, a.payment_Id, a.people_Id, a.reservation_Id, a.total, a.downpayment, a.reference, a.image_dir, a.date_of_pay, a.balance FROM reservation r INNER JOIN people p ON r.people_Id = p.people_Id INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id INNER JOIN payment a ON r.reservation_Id = a.reservation_Id WHERE reservationStatus='Pending' ORDER BY r.reservation_Id DESC";
        $result = $conn->query($sql);
        
        ?>

        <?php if($result->num_rows > 0){?>
            <?php while($rows = $result->fetch_assoc()){?>
        <tr>
            <td class=""><?php echo $rows['reservation_Id'];?></td>
            <td class="d-none"><?php echo $rows['people_Id'];?></td>
            <td><?php echo $rows['name'];?></td>
            <td class="d-none"><?php echo $rows['downpayment'];?></td>
            <td class="d-none"><?php echo $rows['balance'];?></td>
            <td class="d-none"><?php echo $rows['total'];?></td>
            <td class="d-none"><?php echo $rows['reference'];?></td>
            <td class="d-none"><?php echo $rows['date_of_pay'];?></td>
            <td class="d-none"><?php echo $rows['email'];?></td>
            <td><?php echo $rows['Category'];?></td>
            <td><?php echo $rows['title'];?></td>
            <td><?php echo $rows['hallTitle'];?></td>
            <td><?php echo $rows['timeInOut'];?></td>
            
            <td class="d-none"><?php echo $rows['Price'];?></td>
            <td class="d-none"><?php echo $rows['address'];?></td>
            <td class="d-none"><?php echo $rows['code'];?></td>
            
            <td><?php echo $rows['dateIn'];?></td>
            <td><?php echo $rows['dateOut'];?></td>
            <td><?php echo $rows['adult'];?></td>
            <td><?php echo $rows['children'];?></td>
            <td><a href="<?php echo $rows['image_dir']?>"><?php echo $rows['image_dir']?></a></td>
            <td>
              <div class="" style="text-align: center;font-size: 13px; padding: 6px 12px; background: #FFA500; color: white; border-radius: 5px;">
                <?php echo $rows['payment_status'];?>
              </div>
            </td>
            <td>
              <div class="" style="padding: 6px 12px; background: #FFA500; color: white; border-radius: 5px;">
                <?php echo $rows['reservationStatus'];?>
              </div>
            </td>
            <td><?php echo $rows['dateCreated'];?></td>

            

            <td>
                <a style="width: 100%;" href="reservation_pending_viewAll.php?resId=<?php echo $rows['reservation_Id'];?>&pepId=<?php echo $rows['people_Id'];?>" class="btn btn-dark mb-1">View</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info editBtn" >
                Edit Status
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="reservation_pending_update.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="reservation_Id" id="reservation_Id" class="form-control d-none" >
                                    <input type="text" name="people_Id" id="people_Id" class="form-control d-none" >
                                    
                                    <input type="text" name="downpayment" id="downpayment" class="form-control d-none" >
                                    <input type="text" name="balance" id="balance" class="form-control d-none" >
                                    <input type="text" name="total" id="total" class="form-control d-none" >
                                    <input type="text" name="reference" id="reference" class="form-control d-none" >
                                    <input type="text" name="date_of_pay" id="date_of_pay" class="form-control d-none" >
                                    <input type="text" name="time_in_out" id="time_in_out" class="form-control d-none" >
                                    
                                    <input type="text" name="email" id="email" class="form-control d-none" >
                                    
                                    <label for="">Name</label>
                                    <input type="text" value="" id="name" name="name" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Room Type</label>
                                    <input type="text" value="" id="room_type" name="roomType" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Cottage</label>
                                    <input type="text" value="" name="cottage" id="cottage" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Event Hall</label>
                                    <input type="text" value="" name="hall" id="hall" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Check In</label>
                                    <input type="text" value="" name="check_in" id="check_in" class="form-control" >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Check Out</label>
                                    <input type="text" value="" name="check_out" id="check_out" class="form-control" >
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="">Select Status</label>
                                    <!-- <input type="text" value="" id="status" class="form-control" > -->
                                    <select name="status" id="status" class="form-control" >
                                        <option value=""></option>
                                        <option value="Confirmed">Confirm</option>
                                        <option value="Cancelled">Cancel</option>
                                    </select>
                                </div>
                            </div>

                            

                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                                <input type="submit" name="saveBtn" value="Save" class="btn btn-info">

                                <!-- Dito na tayo sa form ang pag eedit ng status  -->
                            </div>
                        </form>
                    </div>
                    
                    </div>
                </div>
                </div>

                <!-- Modal -->
                

                
                
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


<script>

$(document).ready(function (){

    $('.editBtn').on('click', function(){
                console.log("Clikced")
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                
                $('#reservation_Id').val(data[0]);
                $('#people_Id').val(data[1]);
                $('#name').val(data[2]);
                $('#downpayment').val(data[3]);
                $('#balance').val(data[4]);
                $('#total').val(data[5]);
                $('#reference').val(data[6]);
                $('#date_of_pay').val(data[7]);

                
                $('#email').val(data[8]);
                $('#room_type').val(data[9]);
                $('#cottage').val(data[10]);
                $('#hall').val(data[11]);
                $('#time_in_out').val(data[12]);
                
                $('#check_in').val(data[16]);
                $('#check_out').val(data[17]);

                $("#status option:selected").text(data[21]);
                $("#status option:selected").val(data[21]);
                
                // $('#patient_appDate').val(data[6]);
                // $('#patient_concerned').val(data[7]);

                // $('#patient_status').val(data[8]);
            });

})

</script>


</body>
 
</html>