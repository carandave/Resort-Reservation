<?php

include './database/connect.php';


// if(isset($_POST['submit'])){

//    $name = mysqli_real_escape_string($conn, $_POST['name']);
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $pass = md5($_POST['password']);
//    $cpass = md5($_POST['cpassword']);
//    $user_type = $_POST['user_type'];

//    $select = " SELECT * FROM user_db WHERE email = '$email' && password = '$pass' ";

//    $result = mysqli_query($conn, $select);

//    if(mysqli_num_rows($result) > 0){

//       $row = mysqli_fetch_array($result);

//       if($row['user_type'] == 'admin'){

//          $_SESSION['admin_name'] = $row['name'];
//          header('location:admin.php');

//       }elseif($row['user_type'] == 'user'){

//          $_SESSION['user_name'] = $row['name'];
//          header('location:user.php');

//       }
     
//    }else{
//       $error[] = 'incorrect email or password!';
//    }

// }
?>

<!DOCTYPE html>
<html><?php

include './database/connect.php';

session_start();

if(isset($_POST['submit'])){

   // $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   // $user_type = $_POST['user_type'];

   $select = " SELECT * FROM people WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row != null){
         $_SESSION['peopleId'] = $row['people_Id'];
         $_SESSION['fname'] = $row['fName'];
         $_SESSION['lname'] = $row['lName'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['contact'] = $row['contactNumber'];
         $_SESSION['type'] = $row['user_type'];
         echo '<script>window.location.href= "./user_dashboard/home.php"</script>';
      }

      else{
         echo '<script>alert("Login Failed")</script>';
      }
     
   }

   // if(mysqli_num_rows($result) > 0){

   //    $row = mysqli_fetch_array($result);

   //    if($row['user_type'] == 'admin'){

   //       $_SESSION['admin_name'] = $row['name'];
   //       header('location:admin.php');

   //    }elseif($row['user_type'] == 'user'){

   //       $_SESSION['user_name'] = $row['name'];
   //       header('location:user.php');

   //    }
     
   // }
   else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="login_form.css">

</head>
<body>
   
<div class="form-container" style="color:black;">
   <form action="" method="post" style="height: max-content;">
      <h3>LOG IN FOR USERS</h3>
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
      <a href="login_form_admin.php"  style="margin-top: 10px;">Login for Admin</a>
      <a href="register_form.php"  style="margin-top: 10px;">Don't have an account?</a>
   </form>

</div>

</body>
</html>