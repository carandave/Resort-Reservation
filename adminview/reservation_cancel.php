<?php 

include('../database/connect.php');
session_start();

if(isset($_POST['cancelBtn'])){
    $reservationId = $_POST['can_reservationId'];
    $reservationStatus = $_POST['can_reservationStatus'];

    $sql = "UPDATE reservation SET reservationStatus='Cancelled' WHERE reservation_Id = '$reservationId'";
    $result = $conn->query($sql);

    echo '<script>alert("The reservation successfully cancelled!.")</script>';
    echo '<script>window.location.href = "reservation_cancelled.php"</script>';

    //Dun na tayo sa pag sesend ng email kapag nag check out
    
    
}




?>