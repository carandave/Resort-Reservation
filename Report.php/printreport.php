<?php
require_once("../database/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Villa Sampaguita Resort Website</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="print.css">

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
        
           
        ?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo isset($title) ? $title . ' | VILLA SAMPAGUITA RESORT' :  'VILLA SAMPAGUITA RESORT' ; ?></title>


<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href=">admin/css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="admin/css/jquery.dataTables.css">
<link href=">admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" language="javascript" src=">admin/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="admin/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="admin/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="admin/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="admin/js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
</head> 

 <body onload="window.print();">
 <div class="wrapper">
  
 
  <form action="" method="POST" >
  <!-- Main content -->
  <section class="invoice">
      <!-- title row -->
   
        <h4 class="page-header"> VILLA SAMPAGUITA RESORT</h4>
     
        <!-- /.col -->
      </div>
    
      <!-- title row -->
    
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
                                  
                                  
							</td>
						</tr>
						<?php
					}
				?>

							</tbody>
               
                </table>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
       
        </div>
        <!-- /.col -->
       
      </div>
      <!-- /.row -->
 
    </section>
    </form>
    <!-- /.content -->
    <div class="clearfix"></div>
 
</div>
<!-- ./wrapper --> 
</body>
</html> 