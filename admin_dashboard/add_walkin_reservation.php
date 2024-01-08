<?php 


include('../database/connect.php');
session_start();

if(!isset($_SESSION['adminId']) && $_SESSION['type'] != "admin"){
    header("Location: login_form_admin.php");
}
  
?>

<!DOCTYPE html>
<html>
<head>
  <title> ADD RESERVATION </title>
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
	  	<script>
	  		$( function() {
	   			$( "#in" ).datepicker({
	   				minDate: 0
	   			});

           $( "#out" ).datepicker({
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

        



<div class="row ml-5 mt-3" style="margin-left: 25% !important;">
  

  <div class="col-md-10 ">
    <section class="dataTable_room">
    <form action="reservation_addForm.php" method="POST" id="">

<!-- <div class="row">
    <div class="col-md-6">
        <?php

        

        $sql = "SELECT * FROM people";
        $result = $conn->query($sql);    
        ?>

        <?php if ($result->num_rows > 0) { ?>
        <?php while($row = $result->fetch_assoc()){?>
            <input type="text" class="d-none" name="people_id" value="<?php echo $row['people_Id'];?>">
        <?php }?>
        <?php } ?>

        <label for="" class="font-weight-bold">Select User<span class="text-danger">*</span></label>

        <select class="form-control select2" name="user_name" id="user_name" style="width: 100%"  required>
        <option value="">Select User</option>
        <?php
        $sql = "SELECT * FROM people WHERE user_type='User'";
        $result = $conn->query($sql);    
        ?>

        <?php if ($result->num_rows > 0) { ?>
        <?php while($row = $result->fetch_assoc()){?>
            <option value="<?php echo $row['people_Id'];?>"><?php echo $row['fName'];?> <?php echo $row['lName'];?></option>           
        <?php }?>
        <?php } ?>
        </select>
    </div>

    <div class="col-md-6">

    </div>
</div> -->

<div class="row">
    <div class="col-md-6">
    <!-- <label for="" class="d-none">People Id</label>
    <input type="text" name="people_id" class="form-control " value="<?php echo $peopleId;?>" readonly required> -->
    <label for="" class="font-weight-bold">Select Name<span class="text-danger">*</span></label>

    <select class="form-control select2" name="people_Id" id="people_Id" style="width: 100%" required>
    <option value="">Select Name</option>
    <?php
    $sql = "SELECT * FROM people WHERE user_type='User'";
    $result = $conn->query($sql);    
    ?>

    <?php if ($result->num_rows > 0) { ?>
    <?php while($row = $result->fetch_assoc()){?>
        <option value="<?php echo $row['people_Id'];?>"><?php echo $row['fName'];?> <?php echo $row['lName'];?></option>           
    <?php }?>
    <?php } ?>
    </select>

    <input type="text" name="fullname" id="fullname" class="d-none form-control" value=""  required>
    </div>
    <div class="col-md-6">
    <label for="">Contact Number</label>
    <input type="text" name="contact" id="contact" class="form-control" value="" readonly required>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
    <label for="">Email</label>
    <input type="text" name="email" id="email" class="form-control" value="" readonly required>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
    <label for="">Check In</label>
    <input type="text" name="in" id="in" oninput="" class="form-control" required autocomplete="off">
    <!-- <input type="date" name="" id="displayIn" class="form-control"> -->
    
    </div>
    <div class="col-md-6">
    <label for="">Check Out</label>
    <input type="text" name="out" id="out" onchange="getCheck();" class="form-control" required >
    <!-- <input type="date" name="" id="displayOut" class="form-control"> -->
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
    <label for="">Room Type</label>
    
    <!-- <input type="text" name="" id="arrRoomId" class="form-control"> -->
    <select name="roomType" id="roomType" class="form-control" required>
        <option value="" id=""></option>
        <!-- <?php 
        
        $sqlr = "SELECT * FROM room";
        $resultr = $conn->query($sqlr);

        ?>

        

        <?php if($resultr->num_rows > 0){?>
        <?php while($rowr = $resultr->fetch_assoc()){?>
            <option value="" id=""></option>
            <option value="<?php echo $rowr['room_Id'];?>"><?php echo $rowr['Category'];?> (<?php echo $rowr['Discount'];?> % Discount)</option>
            
            <?php } ?>
        <?php } ?> -->

        <input type="text" id="roomTypeGet" value="" class="d-none" >
    </select>
    </div>

    <div class="col-md-6">
    <label for="">Time In and Out</label>
    <select name="timeInOut" id="timeInOut" class="form-control" required>
        <option value=""></option>
        <option value="8pm - 4am">8pm - 4am</option>
        <option value="8am - 6pm">8am - 6pm</option>
    </select>
    
    </div>
</div>

<div class="row mt-3" id="additional_row">
    <div class="col-md-6">
    <input type="button" class="btn btn-primary btn-block" id="add_cottage" value="Additional Cottage?">
    <!-- <button class="btn btn-primary btn-block" id="add_cottage">Additional Cottage?</button> -->
    </div>
    <div class="col-md-6">
    <input type="button" class="btn btn-primary btn-block" id="add_hall" value="Additional Hall?">
    <!-- <button class="btn btn-primary btn-block" id="add_hall">Additional Hall?</button> -->
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6 " id="cottage_row">
    <label for="" class="mb-0">Cottage</label>
    <div>
    <small class="text-danger" style="font-size: 12px; line-height: 5px;">Please leave it blank if you don't want to avail Cottage</small>
    </div>
    
    <select name="cottageType" id="cottageType " class="form-control" >
        <?php 
        
        $sqlr = "SELECT * FROM cottage";
        $resultr = $conn->query($sqlr);

        ?>

        <?php if($resultr->num_rows > 0){?>
        <?php while($rowr = $resultr->fetch_assoc()){?>
            <option value=""></option>
            <option value="<?php echo $rowr['cottage_Id'];?>"><?php echo $rowr['title'];?> (<?php echo $rowr['Discount'];?> % Discount)</option>
            
            <?php } ?>
        <?php } ?>

        <!-- <input type="text" id="roomTypeGet" value="" class="d-none" > -->
    </select>
    </div>
    <div class="col-md-6 " id="hall_row">
    <label for="" class="mb-0">Event Hall</label>
    <div>
    <small class="text-danger" style="font-size: 12px; line-height: 5px;">Please leave it blank if you don't want to avail Event Hall</small>
    </div>
    <select name="hallType" id="hallType" class="form-control" >

    <option value=""></option>
        <!-- <?php 
        
        $sqlr = "SELECT * FROM hall WHERE Status='Available'";
        $resultr = $conn->query($sqlr);

        ?>

        <?php if($resultr->num_rows > 0){?>
        <?php while($rowr = $resultr->fetch_assoc()){?>
            <option value=""></option>
            <option value="<?php echo $rowr['hall_Id'];?>"><?php echo $rowr['title'];?> (<?php echo $rowr['Discount'];?> % Discount)</option>
            
            <?php } ?>
        <?php } ?> -->

        <!-- <input type="text" id="roomTypeGet" value="" class="d-none" > -->
    </select>
    
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
    <label for="">Adult</label>
    <input type="number" name="adult" id="adult" oninput="jsfunction()" class="form-control" min="1"  disabled="true" required >
    </div>
    <div class="col-md-6">
    <label for="">Children</label>
    <input type="number" name="children" id="children" oninput="jsfunction()" class="form-control" min="1"  disabled="true" required >
    </div>

    <input type="text" id="sum" value="" class="d-none">
</div>

<!-- <input type="submit" id="appoint-btn" class="btn btn-primary" value="Submit"> -->
<div class="modal-footer">
    <!-- <button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button> -->
    <input type="submit" class="btn btn-primary" name="btnReserved" id="btnReserved" value="Save Reservation">
</div>
</form>


  </section>
</div>
  

  





<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

 
<script>

$("#cottage_row").hide();
$("#hall_row").hide();

$("#add_cottage").click(function(){
  // alert("Naclick add cottage");
  $("#cottage_row").show();
});

$("#add_hall").click(function(){
  // alert("Naclick add cottage");
  $("#hall_row").show();
});


$("[type='number']").keypress(function (evt) {
    evt.preventDefault();
});


// var nationality = $('select[name="roomType"]').val();
// var nationality = $("#roomType option:selected").text();

// console.log(nationality);
$("#btnReserved").attr("disabled", true);

$('#people_Id').on('change', function() {
        
        var selectedUserId = $(this).val();
        if (selectedUserId !== '') {
            $.ajax({
                url: 'get_user_data.php',
                type: 'POST',
                data: { user_id: selectedUserId },
                dataType: 'json',
                success: function(data) {
                    if (data && !data.error) {
                        $('#fullname').val(data.fName + " " + data.lName);
                        $('#contact').val(data.contactNumber);
                        $('#email').val(data.email);

                        console.log(data.lName + " " + data.fName)
                        console.log(data.contactNumber)
                        console.log(data.email)
                        
                        // Populate other input fields here
                    } else {
                        console.error(data.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });







function getCheck(){
  
  let checkIn = document.getElementById("in").value;
  let checkOut = document.getElementById("out").value;
  console.log(checkIn)
  console.log(checkOut)

  $.ajax({
    url: '../user_dashboard/getRoom.php',
    method: 'POST',
    data: {
          'checkIn' : checkIn,
          'checkOut' : checkOut
          },
    success: function(response){
      console.log(response);
      // console.log(response.response.room_Id);

      const obj = JSON.parse(response);

      // console.log(obj);

      let dropdown = $("#roomType");

      $.each(obj, function(key, value) {
          dropdown.append('<option value="' + value.room_Id + '">' + value.Category + ' (' + value.Discount + ') % Discount' + '</option>');
      });


    }
  })

  $.ajax({
    url: '../user_dashboard/getHall.php',
    method: 'POST',
    data: {
          'checkInHall' : checkIn,
          'checkOutHall' : checkOut
          },
    success: function(response){
      console.log(response);
      // console.log(response.response.room_Id);

      const obj = JSON.parse(response);

      // console.log(obj);

      let dropdown = $("#hallType");

      $.each(obj, function(key, value) {
          dropdown.append('<option value="' + value.hall_Id + '">' + value.Category + ' (' + value.Discount + ') % Discount' + '</option>');
      });


    }
  })
}

// function getCheck(){
  
//   let checkIn = document.getElementById("in").value;
//   let checkOut = document.getElementById("out").value;
//   console.log(checkIn)
//   console.log(checkOut)

//   $.ajax({
//     url: 'getHall.php',
//     method: 'POST',
//     data: {
//           'checkInHall' : checkIn,
//           'checkOutHall' : checkOut
//           },
//     success: function(response){
//       console.log(response);
//       // console.log(response.response.room_Id);

//       const obj = JSON.parse(response);

//       // console.log(obj);

//       let dropdown = $("#hallType");

//       $.each(obj, function(key, value) {
//           dropdown.append('<option value="' + value.hall_Id + '">' + value.Category + ' (' + value.Discount + ') % Discount' + '</option>');
//       });


//     }
//   })
// }







function jsfunction() {
    let adult = document.getElementById("adult").value;
    let children = document.getElementById("children").value;
    let sum = parseInt(adult) + parseInt(children);

    
    $.ajax({ 
      url: '../user_dashboard/sumCapacity.php', 
      method: 'POST', 
      data: "adult=" + adult + "&children=" + children, 
      success: function(response){
       
        console.log(response);
        if(response == 1){
          console.log(response);
          console.log("Trueee");

          $("#btnReserved").removeAttr("disabled");

          
        }
        
        else if(response == 0){
          console.log(response);
          alert("The Capacity is too much");
          
          console.log("The Capacity is too much");
          $("#btnReserved").attr("disabled", true);
        }
      }
    });
  }



  
  



$("#roomType").change(function(){

  var val = $(this).val();

  var getRoomType = $("#roomTypeGet").val(val);
  var get = getRoomType.val();

  // $("#adult").disabled = false;
  // $("#children").disabled = false;

  $("#adult").prop('disabled', false);
  $("#children").prop('disabled', false);


  

    $.ajax({ 
      url: '../user_dashboard/getCapacity.php', 
      method: 'POST', 
      data: "roomTypes=" + get, 
      success: function(responses){ 
        console.log("Room Type: " + responses);

        
        }
    });

    

    
})




         


</script> 
</body>
 
</html>