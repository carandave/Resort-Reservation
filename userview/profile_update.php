<?php 

include('../database/connect.php');
session_start();

if(isset($_POST['updateProfile'])){

    $peopleId = $_POST['people_Id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $realPassword = $_POST['real_password'];

    $newPassword = $_POST['new_password'];
    $newConfirmPassword = $_POST['newconfirm_password'];

    if(empty($newPassword) || empty($newConfirmPassword)){

        $sql = "UPDATE people SET fName='$firstName', lName='$lastName', email='$email', contactNumber='$contact', address='$address' WHERE people_Id='$peopleId'";
        $result = $conn->query($sql);

        echo '<script>alert("Profile Successfully Updated!")</script>';
        echo '<script>window.location.href="profile.php"</script>';
        
    }

    else if(!empty($newPassword) || !empty($newConfirmPassword)){
        
        if($newPassword == $newConfirmPassword){
            $newPassword = md5($newPassword);
            $sql = "UPDATE people SET fName='$firstName', lName='$lastName', email='$email', contactNumber='$contact', address='$address', password='$newPassword' WHERE people_Id='$peopleId'";
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