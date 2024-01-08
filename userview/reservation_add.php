<?php 

include('../database/connect.php');
session_start();


if(isset($_POST['btnReserved'])){

    $peopleId = $_POST['people_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $roomId = $_POST['roomType'];
    $cottageId = $_POST['cottageType'];
    $hallId = $_POST['hallType'];
    $timeInOut = $_POST['timeInOut'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];
    $in = $_POST['in'];
    $out = $_POST['out'];
    $status = "Unpaid";
    $dateSubmitted = date("Y-m-d");

    // $sqld = "SELECT * FROM room WHERE NOT EXISTS (SELECT NULL FROM reservation WHERE room.room_Id = reservation.room_Id AND reservation.dateIn < '07/28/2023' AND '07/27/2023' < reservation.dateOut)";
    // $sqld = "SELECT * FROM room WHERE NOT EXISTS (SELECT NULL FROM reservation WHERE room.room_Id = reservation.room_Id AND reservation.dateIn < '$out' AND '$in' < reservation.dateOut)";
    // $resultd = $conn->query($sqld);

    // if($resultd->num_rows > 0){
    //     while($rowsd = $resultd->fetch_assoc()){
    //         echo $rowsd['room_Id'];
    //     }
    // }
    
    if(empty($in) || empty($out)){
        echo '<script>alert("Sorry Can not process the reservation make sure all fields are not empty!")</script>';
    }

    else{
        $sql = "INSERT INTO reservation (`people_Id`,`name`,`email`,`number`,`room_Id`,`cottage_Id`,`hall_Id`,`timeInOut`,`dateIn`,`dateOut`,`adult`,`children`,`reservationStatus`, `dateCreated`)
        VALUES ('$peopleId','$full_name','$email','$number','$roomId','$cottageId','$hallId','$timeInOut','$in','$out','$adult','$children','$status','$dateSubmitted')";
        $result = $conn->query($sql);

        echo '<script>alert("Successfully Added Reservation!")</script>';
        echo '<script>window.location.href = "reservation.php"</script>';
    }

    
    

    
    
}

?>