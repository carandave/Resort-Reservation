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
    min-height: 15vh;
    font-size: large;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode';
    background: whitesmoke;
    width: 100%;
}
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark " style="background: #1C6758 !important">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <img src="./img/logo.png" class="mr-3 img-responsive img-rounded" style="height: 60px; width: 80px;" alt=""> -->
    <a class=" navbar-brand font-weight-bold" href="#">VILLA SAMPAGUITA RESORT</a>

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
        <a class="nav-link text-white" href="login_form.php" style="display: inline-block; padding: 5px 10px; background: #66BFBF; border-radius: 5px;">Book Now</a> </li>
        </ul>
    </div>
    </nav>


    <div class="policy-header d-flex justify-content-center align-items-center">
        <h2 class="text-black font-weight-bold">Have a Question? Please contact us.</h2>
    </div>

    
    <div class="fluid-container mt-0 py-1 section3 d-flex justify-content-center align-items-center" id="contact">
        <div class="container ">
           
            
            <div class="row mt-5">
                <div class="col-md-7">
                    <form action="" method="POST" class="text-light">

                        <?php 
                        
                        $sqla = "SELECT * FROM user_form";
                        $result = $conn->query($sqla);

                        ?>

                        <?php if($result->num_rows > 0){?>
                            <?php while($rows = $result->fetch_assoc()){?>
                        <div class="row d-none">
                            <div class="col-md-6">
                                <label for="">Email Admin</label>
                                <input type="text" name="emailAdmin" value="<?php echo $rows['email'];?>" class="form-control">
                            </div>
                        </div>

                            <?php } ?>
                        <?php } ?>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone</label>
                                <input type="number" name="phone" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-3" >
                            <div class="col-md-12">
                                <label for="">Message</label>
                                <textarea name="message" id="" cols="10" rows="5" class="form-control" required>

                                </textarea>

                                <input type="submit" name="submit" class="btn btn-dark mt-3" value="Submit" >
                            </div>

                            
                        </div>
                    </form>
                </div>

                <div class="col-md-5 pt-1">
                    
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.563313278057!2d121.1978983742821!3d14.566946977901358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c0a1395dcbf5%3A0xefba2ec76b707699!2sVilla%20Sampaguita%20Resort!5e0!3m2!1sen!2sph!4v1687962240370!5m2!1sen!2sph" style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
                    
                </div>
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