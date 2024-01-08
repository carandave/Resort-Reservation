<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

  <!-- Sidebar -->

<div class="sidebar" id="mySidebar">
<a href="../index.php" style="margin-left:2%; color: #000; font-size:medium; " class="fa-solid fa-arrow-left"></a>
<div class="container" >
  <img src="../img/logo.png" alt="Avatar" class="image">
  <div class="">
  
</div>
    
</div>
<h6 style="margin-top:12px;"> USER</h6>
<hr style=" background-color:#4b7565;">




    <a href="../user_dashboard/home.php" ><i class="fa fa-home" ></i> Dashboard</a>

    <div class="btn-group d-flex justify-content-center align-items-center " style="margin: 0 auto; width: 50%;">
    <i class="fa fa-calendar text-light" ></i>
    <button type="button" class="btn  dropdown-toggle" style="border: 0px; background: transparent !important; color: white; font-size: 18px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Reservation
    </button>
  
  <div class="dropdown-menu dropdown-menu-right">
      <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <a href="../userview/reservation.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center">Check out</a>
      </div>

      <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <a href="../userview/reservation_cancelled.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center">Cancelled</a>
      </div>

      <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <a href="../userview/reservation_pending.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Pending</a>
      </div>

      <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <a href="../userview/reservation_confirmed.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Confirmed</a>
      </div>

      <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <a href="../userview/reservation_arrival.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Arrived</a>
      </div>

      <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
        <a href="../userview/reservation_history.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >History</a>
      </div>
  </div>

  

</div>
  <a href="../userview/payment.php" ><i class="fa fa-credit-card mr-2"></i>Payment History</a>

  <a href="../userview/profile.php" ><i class="fa fa-person mr-2"></i>My Profile</a>
  <!-- <a href="../user_dashboard/home.php" ><i class="fa fa-home" ></i> Dashboard</a> -->
    <!-- <a href="../userview/reservation.php" ><i class="fa fa-calendar" ></i> Reservation</a> -->
    
    <!-- <a href="../adminview/room.php" ><i class="fa fa-bed"></i> Rooms</a>
    <a href="../adminview/reservation.php" ><i class="fa fa-calendar"></i> Reservation</a>
    <a href="../adminview/payment.php" ><i class="fa fa-credit-card"></i> Payment History</a>
    <a href="../Report.php/list.php" ><i class="fa fa-clipboard-list"></i> Reports</a>    
    <a href="../adminview/user.php" ><i class="fa fa-user"></i> Users</a>
    <a href="../adminview/setting.php" ><i class="fa fa-gears"></i> Site Settings</a> -->
  <br> <br> <br> <br> <br> <br> <br> 

  

  <!-- dun na tayo sa pag lalagay ng drop down list sa sidebar -->
   
    <a href="../login_form.php"><input type="submit" name="submit" value="LOGOUT" class="form-btn" style=" margin-left: 20%;"></a>

    
</div>




<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>




