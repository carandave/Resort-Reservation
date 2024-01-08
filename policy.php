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
    min-height: 20vh;
    background: #466b5a;
    width: 100%;
}
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark " style="background: #1C6758 !important">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <img src="./img/logo.png" class="mr-3 img-responsive img-rounded" style="height: 60px; width: 80px;" alt=""> -->
    <a class=" navbar-brand font-weight-bold" href="#">VILLA SAMPAGUITA</a>

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
        <h1 class="text-white font-weight-bold">Villa Sampaguita Resort Rules and Regulation</h1>
    </div>

    <div class="container p-3">
        <h5 class="mb-5" style="font-style: italic; ">Any reservations made through this website and with the Resort are bound by the rules and conditions listed below. We sincerely request that you read them before making a reservation.</h5>
        <p>1. Bringing alcohol drinks to the resort is allowed, but you will need to pay some additional charges.</p>
        <p>2. Pets are strictly prohibited. The guest's pet(s) will be caged at the garage during your stay, and a 5,000 penalty fee will be assessed for breaking this rule. Pets are not permitted to leave the garage area. No responsibility will be taken by management for any harm, loss, illness, or death that may happen to your pet (s).</p>
        <p>3. Please be mindful of your personal belongings. If the guest is irresponsible, the resort is not responsible for the loss.</p>
        <p>4. All visitors are expected to act in a respectful manner at all times. The management has the authority to cancel guests from the property without a refund if they behave in an irresponsible, rude, or abusive manner toward our staff.</p>
        <p>5. Use of videoke or other sound amplifying equipment is prohibited after 10:00PM. This is in accordance with the mandatory law set by the local government.</p>
        <p>6. Pool Rules​: NO diving. NO running. NO Pushing. NO rough play. Shower before entering pool. Use Restrooms. NO food or drinks allowed in the pool area. NO glass or breakable containers in the pool area. Children (14 and under) must be accompanied by an adult while swimming at all times. Do not use the pool while intoxicated (drunk).</p>
        <p>7. Make sure to keep your personal stuff safe at all times. The management will not be held accountable or liable for any guest losses of valuables or personal items.</p>
        <p>8. Children under 3 years old are free of accommodations only.</p>
        <hr class="bg-dark mt-5">
        <h5 class="font-weight: bold mb-3">CHECK-IN AND CHECK-OUT</h5>
        <p>1. Guests can only enter the resort on their assigned check-in time.</p>
        <p>2. Please be aware that there is a cutoff  time of 11pm for late-night check-ins. Any visitors who arrive after the cutoff time will not be admitted to the resort until 6am.</p>
        <p>3. 30 minutes prior to your check-out time, the maintenance worker will inspect the property for any damages.</p>
        <hr class="bg-dark mt-5">
        <h5 class="font-weight: bold mb-3">PAYMENT, REFUNDS AND CANCELLATIONS</h5>
        <p>1. Reservation down payment is non-refundable.</p>
        <p>2. Payment can be made by electronic transfer, Cash or Gcash.</p>
        <p>3. We will create a reservation once you are prepared to make a deposit (temporary reservation). Reservation made are only held for a day. The date(s) will be made available again without further notification once 12 hours have elapsed without a payment being made.</p>
        <p>4. Reservation is confirmed only when the 50% down payment is received. </p>
        <p>5. Remaining balance is payable to the caretaker upon check-in. Only cash or online transfer will be accepted. If paying by online transfer, proof of transfer is required.</p>
        <p>6. Any outstanding fees (Additional Necessities) must be paid to the caretaker before leaving the resort.</p>
        <p>6. Rebooking and/or change of date is only allowed when done at least 14 days prior to check-in date.</p>
        <p>8. No shows will be considered a cancellation and no refunds will be issued.</p>
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
                        <img src="./img/logo.png" class="image-responsive" style="height: 250px; width: 250px;" alt="">
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