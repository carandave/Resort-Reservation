<?php 

include('../database/connect.php');

if(isset($_POST['updateBtn'])){

    $peopleId = $_POST['people_Id'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "UPDATE people SET fName='$fName', lName='$lName', email='$email', contactNumber='$contact', address='$address' WHERE people_Id='$peopleId'";
    $result = $conn->query($sql);

    echo '<script>alert("User Updated Successfully!")</script>';
    echo '<script>window.location.href="user.php"</script>';




    

}

?>