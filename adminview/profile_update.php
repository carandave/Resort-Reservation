<?php 

include('../database/connect.php');
session_start();

if(isset($_POST['updateProfile'])){

    $adminId = $_POST['admin_Id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    

    $realPassword = $_POST['real_password'];

    $newPassword = $_POST['new_password'];
    $newConfirmPassword = $_POST['newconfirm_password'];

    if(empty($newPassword) || empty($newConfirmPassword)){

        $sql = "UPDATE user_form SET username='$username', email='$email' WHERE admin_Id='$adminId'";
        $result = $conn->query($sql);

        echo '<script>alert("Profile Successfully Updated!")</script>';
        echo '<script>window.location.href="profile.php"</script>';
        
    }

    else if(!empty($newPassword) || !empty($newConfirmPassword)){
        
        if($newPassword == $newConfirmPassword){
            $sql = "UPDATE user_form SET username='$username', email='$email', password='$newPassword' WHERE admin_Id='$adminId'";
            $result = $conn->query($sql);

            echo '<script>alert("Profile Successfully Updated!")</script>';
            echo '<script>window.location.href="profile.php"</script>';
        }

        else{
            echo '<script>alert("The New Password and Confirm Password must be same!")</script>';
            echo '<script>window.location.href="profile.php"</script>';
        }
        
    }

    


    // echo '<script>alert("Profile Successfully Updated!")</script>';
    // echo '<script>window.location.href="profile.php"</script>';

}


?>