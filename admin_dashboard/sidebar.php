<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<style> 
.class{
    color: #fff;
    font-family: Arial, Helvetica, sans-serif;
}
</style>
<body>



<!-- Sidebar -->
<div class="sidebar">   
<div class="container">
  <img src="../img/logo.png" alt="Avatar" class="image">
  <div class="">
  
</div>
    
</div>
<h6 style="margin-top:12px;"> ADMIN</h6>
<hr style=" background-color:#7EAA92;">
    <a href="../admin_dashboard/home.php" ><i class="fa fa-home" ></i> Dashboard</a>
    <a href="../adminview/user.php" ><i class="fa fa-user"></i> Clients</a>
    <a href="../adminview/room.php" ><i class="fa fa-bed"></i> Rooms</a>
    <a href="../adminview/hall.php" ><i class="fa fa-bed"></i>Event Hall</a>
    <a href="../adminview/cottage.php" ><i class="fa fa-bed"></i> Cottage</a>

    <div class="btn-group d-flex justify-content-center align-items-center " style="margin: 0 auto; width: 20%;">
      <i class="fa fa-calendar text-light"></i>
      <button type="button" class="btn  dropdown-toggle" style="border: 0px; background: transparent !important; color: white; font-size: 16px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Reservation
      </button>
  
      <div class="dropdown-menu dropdown-menu-right">
          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../admin_dashboard/add_walkin_reservation.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center">Add Reservation</a>
          </div>
          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../adminview/reservation.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center">Check out</a>
          </div>
          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../adminview/reservation_cancelled.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center">Cancelled</a>
          </div>

          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../adminview/reservation_pending.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Pending</a>
          </div>

          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../adminview/reservation_confirmed.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Confirmed</a>
          </div>

          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../adminview/reservation_arrival.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Arrival</a>
          </div>

          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../adminview/reservation_successed.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Successed</a>
          </div>
      </div>

    </div>

    

    <a href="../adminview/payment.php"><i class="fa fa-credit-card"></i> Payment History</a>
    
    
    <div class="btn-group d-flex justify-content-center align-items-center " style="margin: 0 auto; width: 50%;">
      <i class="fa fa-clipboard-list text-light"></i>
      <button type="button" class="btn  dropdown-toggle" style="border: 0px; background: transparent !important; color: white; font-size: 16px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Reports
      </button>
  
      <div class="dropdown-menu dropdown-menu-right">
          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <!-- <a href="../adminview/reservation.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center">Reservation Check out</a> -->
            <a href="../adminview/reservation_report.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center">Reservation Reports</a>
          </div>

          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../adminview/client_report.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Client Reports</a>
          </div>

          <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <a href="../adminview/sale_report.php" style="color: #4b7565; width: 100%; font-size: 14px;" class="mr-0 px-0 text-center" >Sales Report</a>
          </div>

      </div>

    </div>

    <a href="../adminview/profile.php" ><i class="fa fa-person mr-2"></i>Settings</a>
    
    <!-- <a href="../adminview/query.php" ><i class="fa fa-person mr-2"></i>Inquieries</a> -->
    
    <!-- <a href="../adminview/setting.php" ><i class="fa fa-gears"></i> Site Settings</a> -->
  <br>  <br>  <br>  
    <a href="../login_form.php"><input type="submit" name="submit" value="LOGOUT" class="form-btn" style=" margin-left: 20%;"></a>
    </div>




<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>



