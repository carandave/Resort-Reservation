<?php

include './database/connect.php';

session_start();

if(isset($_POST['submit'])){

//    $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
//    $cpass = md5($_POST['cpassword']);
//    $user_type = $_POST['user_type'];

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row != null){
        $_SESSION['adminId'] = $row['admin_Id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['type'] = $row['user_type'];
        // echo '<script>alert("Login Success!")</script>';
        echo '<script>window.location.href= "./admin_dashboard/home.php"</script>';
     }

     else{
        echo '<script>alert("Login Failed")</script>';
     }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
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
      <h3>login for admin</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn" style="margin-bottom: 5%;">
      <a href="login_form.php" class="mt-3" style="margin-top: 10px;">Login for User</a>
      <!-- <a href="register_form.php" class="" style="margin-top: 10px;">Don't have an account?</a> -->
   </form>

</div>

</body>
</html>