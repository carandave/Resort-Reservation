<?php

include './database/connect.php';

session_start();

if(isset($_POST['submit'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $userType = "User";
    $userDateCreated = date('Y-m-d');

    if($password == $cpassword){

        $password = md5($password);

        $sql = "INSERT INTO people (`fName`, `lName`, `user_type`, `email`, `contactNumber`, `address`, `password`, `user_date_created`) VALUES ('$firstname', '$lastname', '$userType', '$email', '$number', '$address', '$password', '$userDateCreated')";
        $result = $conn->query($sql);

        echo '<script>alert("Successfully Registered!")</script>';
        echo '<script>window.location.href = "login_form.php"</script>';
    }

    else{
        echo '<script>alert("The Password and Confirm Password is not matched!")</script>';
    }

}


?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login_admin_panel</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="login_form.css">

</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="firstname" required placeholder="First Name">
      <input type="text" name="lastname" required placeholder="Last Name">
      <input type="email" name="email" required placeholder="Email">
      <input type="number" name="number" required placeholder="Contact Number">
      <input type="text" name="address" required placeholder="Address">
      <input type="password" name="password" required placeholder="Password">
      <input type="password" name="cpassword" required placeholder="Confirm Password">
      <input type="submit" name="submit" value="Submit" class="form-btn" style="margin-bottom: 5%;">
      <a href="login_form.php" style="margin-top: 10px;">Back</a>
   </form>

</div>

</body>
</html>