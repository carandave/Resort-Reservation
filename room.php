<?php 

include './database/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Sampaguita Resort</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>

<style>
.policy-header{
    padding: auto;
    border-radius: 10;
    box-sizing: border-box;
    font-style: italic;
    font-size: larger;
    min-height: 10vh;
    background: #466b5a;
    width: 100%;
    padding-top: 10px;
    
}
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark " style="background: #1C6758 !important">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <img src="./img/logo.png" class="mr-3 img-responsive img-rounded" style="height: 60px; width: 60px;" alt=""> -->
    <a class=" navbar-brand font-weight-italic" href="#">VILLA SAMPAGUITA RESORT</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mt-2 mt-lg-0 mx-auto">
        <li class="nav-item ">
            <a class="nav-link text-white" href="index.php">Home </a>
        </li>
        <li class="nav-item text-white">
            <a class="nav-link text-white" href="room.php">Rooms </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="amenities.php">Amenities</a>
        </li>
        <!-- <li class="nav-item text-white">
            <a class="nav-link text-white" href="#">Amenities</a>
        </li> -->
        <li class="nav-item">
        <a class="nav-link text-white" href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="policy.php">Policy</a>
        </li>

        <li class="nav-item">
        <a class="nav-link text-white" href="login_form.php" style="display: inline-block; padding: 5px 10px; background: #66BFBF; border-radius: 5px;">Book Now</a></li>
        </ul>
    </div>
    </nav>

    <div class="policy-header d-flex justify-content-center align-items-center">
        <h2 class="text-white font-weight-bold">ROOMS</h2>
    </div>

    <div class="fluid-container section1 mb-5" id="rooms">
        <div class="container ">
            <!-- <h2 class="text-center font-weight-bold mt-5">OUR ROOMS</h2> -->
        
            <div class="row mt-5">

                <?php 
                
                $sql = "SELECT * FROM room";
                $result = $conn->query($sql);
                
                ?>

                <?php if($result->num_rows > 0){?>
                    <?php while($rows = $result->fetch_assoc()){?>

                <div class="col-md-4">
                    <div class="card mt-3 " style="width: 100%;">
                        
                        <?php 
                        
                            $str = $rows['image_dir'];
                            
                            // Or we can write ltrim($str, $str[0]);
                            $image = ltrim($str, '.');
   
                        ?>

                        <img class="card-img-top image-responsive" src=".<?php echo $image;?>" alt="Card image cap">

                        <div class="card-body">
                            <h3 class="font-weight-bold"><?php echo $rows['Category'];?></h3>
                            <p class="card-text"><?php echo $rows['Price'];?> Pesos</p>
                            <large>Amenities: <?php echo $rows['Amenities'];?></large>
                            <p class="card-text"><?php echo $rows['Description'];?></p>

                            <div class="d-flex justify-content-center align-items-center">
                                <a href="login_form.php" class="btn text-center" style="color: white; background: #4f9b77 !important">Book Now</a>
                            </div>
                            
                        </div>  
                    </div>
                </div>

                    <?php } ?>
                <?php } ?>
                
            </div>
        
        </div>
    </div>


    <div class="fluid-container mt-5 section4 ">
        <div class="container ">
            
            <div class="row">
                <div class="col-md-3">
                <ul style="list-style: none">
                        <li class="mt-2"><a href="index.php" style="font-weight: bold; text-decoration: none; color: #4f9b77">Home</a></li>
                        <li class="mt-2"><a href="room.php" style="font-weight: bold; text-decoration: none; color: #4f9b77">Rooms</a></li>
                        <li class="mt-2"><a href="amenities.php" style="font-weight: bold; text-decoration: none; color: #4f9b77">Amenities</a></li>
                        <li class="mt-2"><a href="contact.php" style="font-weight: bold; text-decoration: none; color: #4f9b77">Contact Us</a></li>
                        <li class="mt-2"><a href="policy.php" style="font-weight: bold; text-decoration: none; color: #4f9b77">About</a></li>
                    </ul>
                </div>

                <div class="col-md-5">
                    <h4 class="font-weight-bold text-center mb-3" style="color: black;">CONNECT WITH US</h4>
                    <div>
                        <ul style="list-style: none">
                            <li class="d-flex align-items-center mb-3"><i class="fa fas fa-envelope mr-3" style="font-size: 24px; color: #4f9b77"></i><p class="mb-0">resortvillasampaguita@gmail.com</p></li>
                            <li class="d-flex align-items-center mb-3"><i class="fa fas fa-phone mr-3" style="font-size: 24px; color: #4f9b77"></i><p class="mb-0">09955495363</p></li>
                            <li class="d-flex align-items-center mb-3"><i class="fa fas fa-location-arrow mr-3 "  style="font-size: 24px; color: #4f9b77"></i><p class="mb-0">Villa Sampaguita Resort, L. Sumulong Memorial Circle, Antipolo, Rizal</p></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2">

                </div>

                <div class="col-md-2">
                    <div class="image-responsive d-flex justify-content-center align-items-center">
                        <img src="./img/LOGO.png" class="image-responsive" style="height: 250px; width: 250px;" alt="">
                    </div>
                </div>
            </div>
        
        </div>
    </div>

    

    
    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>