<?php 

include('../database/connect.php');
// session_start();

if(!isset($_SESSION['adminId']) && $_SESSION['type'] != "admin"){
    header("Location: login_form_admin.php");
}

//No of Rooms
$sql1 = "SELECT * FROM room";
$result1 = $conn->query($sql1);
$result1->num_rows;

//No of Pending Reservation
$sql2 = "SELECT * FROM reservation WHERE reservationStatus='Pending'";
$result2 = $conn->query($sql2);
$result2->num_rows;

//No of Confirmed Reservation
$sql3 = "SELECT * FROM reservation WHERE reservationStatus='Confirmed'";
$result3 = $conn->query($sql3);
$result3->num_rows;

//No of Customers
$sql4 = "SELECT * FROM people";
$result4 = $conn->query($sql4);
$result4->num_rows;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/6e5c8405e6.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../admin_dashboard/home.css"></link>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

        <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">  -->
        
        <!-- JS for jQuery -->
        

        <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

        <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
      <!-- CSS for full calender -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
      
      <!-- JS for full calender -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

      <!-- <script>
	  		$( function() {
	   			$( "#in" ).datepicker({
	   				minDate: 0
	   			});

           $( "#out" ).datepicker({
	   				minDate: 0
	   			});
	  		});
        
	  	</script> -->
</head>
<body>

        <div class="row mt-2 mr-1" >
            <div class="col-md-2 ">
              <div class="p-3 bg-dark d-flex justify-content-center align-items-center" style="min-height: 30px">
                <h6 style="font-weight:semi-bold; text-align: center; color: white;"><?php echo $result1->num_rows;?> Rooms <i class="fa fa-bed"></i></h6>
              </div>
            </div>

            <div class="col-md-3 " >
              <div class="p-3 d-flex justify-content-center align-items-center" style="background: #F05E16;min-height: 30px">
                <h6 style="font-weight:semi-bold; text-align: center; color: white;"><?php echo $result2->num_rows;?> Reservation Pending <i class="fa fa-calendar"></i></h6>
              </div>
            </div>

            <div class="col-md-3 ">
              <div class="p-3 bg-success d-flex justify-content-center align-items-center" style="min-height: 30px;">
                <h6 style="font-weight:semi-bold; text-align: center; color: white;"><?php echo $result3->num_rows;?> Reservation Confirmed <i class="fa fa-credit-card"></i></h6>
              </div>
              
            </div>

            <div class="col-md-3 ">
              <div class="p-3 bg-secondary d-flex justify-content-center align-items-center" style="min-height: 30px">
                <h6 style="font-weight:semi-bold; text-align: center; color: white;"><?php echo $result4->num_rows;?> Clients <i class="fa fa-user"></i></h6>
              </div>
            
            </div>
        </div>

        <div class="row mt-3" >
          <div class="col-md-1.5">
            <p class="my-1">Unpaid - <span class="" style="background: #FF7F7F; color: #FF7F7F;  width: 10%;  padding: 0px 10px;">-</span></p>
          </div>
          <div class="col-md-1.5">
            <p class="my-1">Cancelled - <span class="bg-danger text-danger" style="width: 10%;  padding: 0px 8px; ">-</span></p></div>
            <div class="col-md-1.5">
            <p class="my-1">Pending - <span class="" style="background: #F05E16; color: #F05E16; width: 10%;  padding: 0px 10px;">-</span></p>
          </div>
          <div class="col-md-1.5">
            <p class="my-1">Confirmed - <span class="bg-success text-success" style="width: 40%;  padding: 0px 10px;">-</span></p></div>
            <div class="col-md-1.5">
            <p class="my-1">Arrived - <span class="bg-info text-info" style="width: 40%; padding: 0px 10px;">-</span></p></div>
             <div class="col-md-1.5">
            <p class="my-1">Successed - <span class="" style="background: #8000FF; color: #8000FF; width: 40%;  padding: 0px 10px;">-</span></p>
          </div>

          <div class="col-md-2">

          </div>

          <div class="col-md-3">

          </div>

          
          
        </div>

        <div id="calendar" class="mt-3"></div>

<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Add Walk in Appointment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">�</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<form action="" method="POST" id="appoint-form">

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

                            <label for="">Full Name</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" value=""  required>
                            </div>
                            <div class="col-md-6">
                            <label for="">Contact Number</label>
                            <input type="text" name="contact" id="contact" class="form-control" value="" readonly required>
                            </div>
                        </div>

                        <div class="row">
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
                                <option value="8pm - 5am">8pm - 5am</option>
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
                            <button type="button" class="btn btn-primary" id="save_event" >Save Appointment</button>
						</div>
					</form>
				</div>
			</div>

			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
			</div> -->
		</div>
	</div>
</div>
<!-- End popup dialog box -->
    
    
</body>
</html>






<script>
$(document).ready(function() {

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


function getCheck(){
  
  let checkIn = document.getElementById("in").value;
  let checkOut = document.getElementById("out").value;
  console.log(checkIn)
  console.log(checkOut)

  $.ajax({
    url: './user_dashboard/getRoom.php',
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
    url: './user_dashboard/getHall.php',
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

function jsfunction() {
    let adult = document.getElementById("adult").value;
    let children = document.getElementById("children").value;
    let sum = parseInt(adult) + parseInt(children);

    
    $.ajax({ 
      url: '/user_dashboard/sumCapacity.php', 
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
    url: '/user_dashboard/getCapacity.php', 
    method: 'POST', 
    data: "roomTypes=" + get, 
    success: function(responses){ 
      console.log("Room Type: " + responses);

      
      }
  });

  

  
})


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



	display_events();

    $('#save_event').click(function(e){
                
                e.preventDefault();
                // $.ajax({
                //     url: 'save_event.php',
                //     method: 'post',
                //     data: $("#appoint-form").serialize()+ '&action=Appoint',
                //     success: function(response){

                //         if(response === "   SameAppointment"){
                //             console.log("The Appointment Date and Time is already appointed. Please Try Another!");
                //             // alert("The Appointment Date and Time is already appointed. Please Try Another!");

                //             Swal.fire({
                //                 position: 'center',
                //                 icon: 'error',
                //                 title: 'The Appointment Date and Time is already appointed. Please Try Another!',
                //                 showConfirmButton: false,
                //                 timer: 2000 
                //             }).then(function(){
                //                 // window.location = "dashPatient.php";
                //             })
                //         }

                //         if(response === "   UniqueAppointment"){
                //             console.log("The Appointment is Successfully Created!");
                //             // alert("The Appointment is Successfully Created!");

                //             Swal.fire({
                //                 position: 'center',
                //                 icon: 'success',
                //                 title: 'The Appointment is Successfully Created!',
                //                 showConfirmButton: false,
                //                 timer: 2000  
                //             }).then(function(){
                //                 window.location = "dashStaff.php";
                //             })
                //             // window.location.href = "dashStaff.php";
                //         }

                        
                        
                //     }
                // });
           
            return true;
        });

}); //end document.ready block


function display_events() {
	var events = new Array();
$.ajax({
    url: 'display_event.php',  
    dataType: 'json',
    success: function (response) {
    console.log(response)

    var result=response.data;
    $.each(result, function (i, item) {
    	events.push({
            event_id: result[i].event_id,
            title: result[i].title,
            pat_status: result[i].patStatus,

            pat_email: result[i].email,
            pat_roomType: result[i].roomType,
            pat_timeInOut: result[i].timeInOut,
            pat_adult: result[i].adult,
            pat_children: result[i].children,
            pat_paymentStatus: result[i].paymentStatus,
            pat_dateSubmitted: result[i].dateSubmitted,
            pat_end: result[i].end,
            start: result[i].start,
			
            color: result[i].color,
            url: result[i].url
        }); 	
    })
	

	var calendar = $('#calendar').fullCalendar({
	    defaultView: 'month',
		 timeZone: 'local',
	    editable: true,
        selectable: true,
		selectHelper: true,
        select: function(start) {
				// $('#appoint_date').val(moment(start).format('YYYY-MM-DD'));
				
				
				$('#event_entry_modal').modal('close');
			},

		

        events: events,
	    eventRender: function(event, element, view) { 
            element.bind('click', function() {

					//Pag naiclick to may lalabas na modal then makikita natin yung mga data sa specific date na calendar
					let title = event.title;
					let patientStatus = event.pat_status;
                    

                    let clientEmail = event.pat_email;
                    let clientRoomType = event.pat_roomType;
                    let clientTimeInOut = event.pat_timeInOut;
                    let clientAdult = event.pat_adult;
                    let clientChildren = event.pat_children;
                    let clientPaymentStatus = event.pat_paymentStatus;
                    let clientDateSubmitted = new Date(event.pat_dateSubmitted);
                    let clientEnd = event.pat_end;
					// let appointmentTime = event.end_time;
					// let titleFirstName = event.titleFirstName;
					// let dentistFullname = event.dentistFullname;
					
					let checkIn = new Date(event.start);
                    let checkOut = new Date(clientEnd);
					// alert("HAHAHA");
					// alert(title + patientStatus);
					alert("APPOINTMENT DETAILS" + "\n\n"
								+ "Client:                                          " + title + "\n"
                                + "Email:                                           " + clientEmail + "\n"	
                                + "Room Type:                                 " + clientRoomType + "\n"	
                                + "Time In and Out:                         " + clientTimeInOut + "\n"
                                + "Adult:                                           " + clientAdult + "\n"	
                                + "Children:                                       " + clientChildren + "\n"	
                                + "Payment Status:                            " + clientPaymentStatus + "\n"	
                                + "Reservation Submitted:                " + clientDateSubmitted.toDateString() + "\n"		
                                + "Appointment Check In:                " + checkIn.toDateString() + "\n"
                                + "Appointment Check Out:              " + checkOut.toDateString() + "\n"		
								+ "Status:                                           " + patientStatus + "\n");
					
					
				});
				// console.log(events);
    	}
		}); //end fullCalendar block	
	  },//end success block
	  error: function (xhr, status) {
	  alert(response.msg);
	  }
	});//end ajax block	
}

</script>