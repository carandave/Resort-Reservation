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
        
    </div>

  <div class="col-md-11  ">
    
  <div class="d-flex justify-content: center; align-items: center " style="flex-direction: column;">
    <h3 class="ml-5 mt-5">My Profile</h3>
  </div>
    
  <div class="mb-5" >
    <form action="profile_update.php" method="POST" style="width: 80%; margin: 0 auto;">
        <?php 
        
        $sql = "SELECT * FROM people WHERE people_Id='$peopleId'";
        $result = $conn->query($sql);
        
        ?>

        <?php if($result->num_rows > 0){?>
            <?php while($rows = $result->fetch_assoc()){?>
            <div class="row">
                <div class="col-md-6">

                    <input type="text" name="people_Id" class="d-none" value="<?php echo $rows['people_Id'];?>">
                    

                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $rows['fName'];?>">
                </div>

                <div class="col-md-6">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $rows['lName'];?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $rows['email'];?>">
                </div>

                <div class="col-md-6">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="contact" value="<?php echo $rows['contactNumber'];?>">
                </div>
            </div>

            <div class="row mt-3 mb-4">
                <div class="col-md-12">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $rows['address'];?>">
                </div>
            </div>
            <hr style="background: black">
            <small class="mt-5 text-danger">Note: If you don't want to change your password just leave it blank.</small>
            <div class="row ">
                
                <div class="col-md-6">
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="new_password" value="">
                    <input type="text" class="form-control d-none" name="real_password" value="<?php echo $rows['password'];?>">
                </div>

                <div class="col-md-6">
                    <label for="">Confirm Password</label>
                    <input type="text" class="form-control" name="newconfirm_password" value="">
                </div>
            </div>
            <?php } ?>
        <?php } ?>
        <input type="submit" value="Save" name="updateProfile" class="btn btn-primary btn-block mt-3">
    </form>

       
  </div>

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