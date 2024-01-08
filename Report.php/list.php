<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Villa Sampaguita Resort Website</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="list.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- OTHER LINKS -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>

    <!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/6e5c8405e6.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="../admin_dashboard/home.css"></link>
  </head>
</head>
<body >
    
        <?php
            include "../admin_dashboard/header.php";
            include "../admin_dashboard/sidebar.php";
           
           
           
        ?>




 <form class="search.php">
<div class="search">
  <input type="text" placeholder="Search..">
  <button type="submit" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
</div>
 </form>
      <!-- /.row -->
</form>
<form action="printreport.php" method="POST" target="_blank">
<input type="hidden" name="txtsearch" value="<?php echo (isset($_POST['txtsearch'])) ? $_POST['txtsearch'] : ''; ?>">
 <input type="hidden" name="categ" value="<?php echo (isset($_POST['categ'])) ? $_POST['categ'] : ''; ?>">
    <input type="hidden" name="start" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] :  date('Y-m-d'); ?>">
    <input type="hidden" name="end" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] :  date('Y-m-d'); ?>">
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12" style="margin-left:-1%;">
       
       <span class="pull-right"> <button type="submit" class="btn btn-primary"  ><i class="fa fa-print"></i> Print</button></span>  
        </div>
      </div>
    </section>
    </form>

    <div class="clearfix"></div>
 
</div>

    <!-- Table row -->
   

<section class="dataTable_room">
                <?php
                $conn= new mysqli('localhost','root','','user_db');

                $query = "SELECT * FROM reservation";
                $query_run = mysqli_query($conn,$query);
                ?>
                <table class="content-table" id="table-data">
                    <thead>
                        <tr>
                        <th>Date</th>
                            <th>Guest Name</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>No. of Rooms</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					include('../database/connect.php');
					$query=mysqli_query($conn,"select * from reservation");
					while($row=mysqli_fetch_array($query)){
						?>
                                    <tr>
                                    <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['checkin']; ?></td>
                                        <td><?php echo $row['checkout']; ?></td>
                                        <td><?php echo $row['norooms']; ?></td>
                                        <td><?php echo $row['payment']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td>
                                        <button type="button" class="btn btn-info"   data-toggle="modal" data-target="#edit"> <i class="fa-solid fa-eye" style="margin-left:-20%;"></i></button>
                                        </td>
                                    

<!-- Modal -->
<form method="POST" action="prints.php">
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
            <div class="card-body">
                        <div class="form-group">
                        <h6 style="font-weight:bold;">Date:</h6>
												<p><?php echo $row['date']?></p>
                        <h6 style="font-weight:bold;">Guest Name:</h6>
												<p><?php echo $row['name']?></p>
                        <h6 style="font-weight:bold;">Check-In:</h6>
												<p><?php echo $row['checkin']?></p>
                        <h6 style="font-weight:bold;">Check-Out:</h6>
												<p><?php echo $row['checkout']?></p>
                        <h6 style="font-weight:bold;">No. of Rooms:</h6>
												<p><?php echo $row['norooms']?></p>
                        <h6 style="font-weight:bold;">Payment:</h6>
												<p><?php echo $row['payment']?></p>
                        <h6 style="font-weight:bold;">Status:</h6>
												<p><?php echo $row['status']?></p>
                        <h6 style="font-weight:bold;">Type:</h6>
												<p><?php echo $row['type']?></p>
                            <form action="../Report.php/prints.php" method="POST" enctype="multipart/form-data"> 
                                <button name="submit" class="btn btn-success"><i class="fa fa-print"></i> Print</button>
                            </form>
                                    </tr>
                                  
						<?php
					}
				?>

							</tbody>
               
                </table>
				
</section>

