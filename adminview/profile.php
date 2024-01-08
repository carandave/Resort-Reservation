<?php 


include('../database/connect.php');
session_start();

if(!isset($_SESSION['adminId']) && $_SESSION['type'] != "admin"){
    header("Location: login_form.php");
}

  $adminId = $_SESSION['adminId'];


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


            include "../admin_dashboard/header.php";
            include "../admin_dashboard/sidebar.php";
           
           
        ?>



<div class="row ml-5">
    <div class="col-md-1 ">
        
    </div>

  <div class="col-md-11  ">
    
  <div class="d-flex justify-content: center; align-items: center " style="flex-direction: column;">
  
  </div>
    
  <div class="">
    <form action="profile_update.php" method="POST" style="width: 80%; margin: 0 auto;">
        <?php 
        
        $sql = "SELECT * FROM user_form WHERE admin_Id='$adminId'";
        $result = $conn->query($sql);
        
        ?>

        <?php if($result->num_rows > 0){?>
            <?php while($rows = $result->fetch_assoc()){?>
            <div class="row mb-0">
                <div class="col-md-6">

                    <input type="text" name="admin_Id" class="d-none" value="<?php echo $rows['admin_Id'];?>">

                    <label for="">User Name</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $rows['username'];?>">
                </div>

                <div class="col-md-6">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $rows['email'];?>">
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

    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  
   
</head>

    
    <div class="container" style="margin-top:5px;">
        <div class="row">
            <div class="col-md-10" style="margin-left:8%;">
                <div class="card">
                    <div class="card-header">
                        <h4>VILLA SAMPAGUITA RESORT </h4>
                    </div>
                    <div class="card-body">

                        <form action="../policy.php">
                            <div class="mb-3">
                                <label>Terms & Condition</label>
                                <textarea name="description" id="your_summernote" class="form-control" rows="4"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary" style="margin-left:80%; margin-top: 2%;">SAVE</button>
                        </form>
                
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

   
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
    </script>
   
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