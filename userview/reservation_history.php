<?php 


include ('../database/connect.php');
session_start();

if(!isset($_SESSION['peopleId']) && $_SESSION['type'] != "User"){
    header("Location: login_form.php");
}
$peopleId = $_SESSION['peopleId'];

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


<div class="row ml-5">
    <div class="col-md-1 ">
        qwe
    </div>

  <div class="col-md-11  ">
    <!-- Dun na tayo sa pag aupdate ng arrived status -->
  <div class="d-flex justify-content: center; align-items: center ">
    <h3 class="ml-5 mt-5">Reservation History List</h3>
  </div>
  <table class="table table-responsive" id="" style="margin: 0 auto; width: 90%; ">
        
        <thead>
        <tr >
            <th class="d-none">Reservation Id</th>
            <th class="d-none">People Id</th>
            <th>Full Name</th>
            <th class="d-none">Email</th>
            <th>Room Type</th>
            <th>Cottage</th>
            <th>Hall</th>
            <th>Time In and Out</th>
            <!-- <th>Price</th> -->
            <th class="d-none">Address</th>
            <th class="d-none">Code</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Adult</th>
            <th>Children</th>
            <th>Payment Status</th>
            <th>Status</th>
            <!-- <th>Date Submitted</th> -->
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            
            $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.cottage_Id, r.hall_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.payment_status, r.dateCreated, r.code, p.people_Id, p.address, t.Category, t.Price, t.Discount, c.title, c.Price as cottagePrice, c.Discount as cottageDiscount, h.title as hallTitle, h.Price as hallPrice, h.Discount as hallDiscount FROM reservation r INNER JOIN people p ON r.people_Id = p.people_Id INNER JOIN room t ON r.room_Id = t.room_Id LEFT JOIN cottage c ON r.cottage_Id = c.cottage_Id LEFT JOIN hall h ON r.hall_Id = h.hall_Id WHERE r.people_Id = '$peopleId' AND reservationStatus='Successed' ORDER BY r.reservation_Id DESC";
            $result = $conn->query($sql);
            
            ?>
    
            <?php if($result->num_rows > 0){?>
                <?php while($rows = $result->fetch_assoc()){?>
            <tr>
                <td class="d-none"><?php echo $rows['reservation_Id'];?></td>
                <td class="d-none"><?php echo $rows['people_Id'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td class="d-none"><?php echo $rows['email'];?></td>
                <td><?php echo $rows['Category'];?></td>
                <td><?php echo $rows['title'];?></td>
                <td><?php echo $rows['hallTitle'];?></td>
                <td><?php echo $rows['timeInOut'];?></td>
                <!-- <td><?php echo $rows['Price'];?></td> -->
                <td class="d-none"><?php echo $rows['address'];?></td>
                <td class="d-none"><?php echo $rows['code'];?></td>
                <td><?php echo $rows['dateIn'];?></td>
                <td><?php echo $rows['dateOut'];?></td>
                <td><?php echo $rows['adult'];?></td>
                <td><?php echo $rows['children'];?></td>
                <td>
                  <div class="" style="text-align: center; font-size: 13px; padding: 6px 12px; background: #378805; color: white; border-radius: 5px;">
                    <?php echo $rows['payment_status'];?>
                  </div>
                </td>
                <td>
                  <div class="" style="padding: 6px 12px; background: #378805; color: white; border-radius: 5px;">
                    <?php echo $rows['reservationStatus'];?>
                  </div>  
                </td>
                <!-- <td><?php echo $rows['dateCreated'];?></td> -->
                <td>
                    <a style="width: 100%;" href="reservation_history_viewAll.php?resId=<?php echo $rows['reservation_Id'];?>&pepId=<?php echo $rows['people_Id'];?>" class="btn btn-dark">View</a>
                    
                </td>
            </tr>
    
                <?php } ?>
            <?php } ?>

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
                $('#name').val(data[2]);
                $('#email').val(data[3]);
                $('#room_type').val(data[4]);
                $('#check_in').val(data[7]);
                $('#check_out').val(data[8]);

                $("#status option:selected").text(data[11]);
                $("#status option:selected").val(data[11]);
                
                
            });

})

</script>
    
    
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