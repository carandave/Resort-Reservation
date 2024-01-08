<?php 

include('../database/connect.php');
// session_start();

// $capacity = $_SESSION['Capacity'];
// echo $_POST['checkIn'];
// echo $_POST['checkOut'];

if(isset($_POST['checkIn']) && isset($_POST['checkOut']))
{
    //  echo "Error";
    
      $checkIn = $_POST['checkIn'];
      $checkOut = $_POST['checkOut'];

     

    //  echo $checkIn = date_format($checkIn,"d/m/Y");
    //  echo $checkOut = date_format($checkOut,"d/m/Y");
    // 07/27/2023
    // 07/28/2023
    //  $sqld = "SELECT * FROM room WHERE NOT EXISTS (SELECT NULL FROM reservation WHERE room.room_Id = reservation.room_Id AND reservation.dateIn <= '$checkOut' AND '$checkIn' <= reservation.dateOut)";
     $sqld = "SELECT * FROM room WHERE NOT EXISTS (SELECT NULL FROM reservation WHERE room.room_Id = reservation.room_Id AND reservation.dateIn <= '$checkOut' AND '$checkIn' <= reservation.dateOut AND reservation.reservationStatus != 'Unpaid')";
     $resultd = $conn->query($sqld);

    //  $rowsd = $resultd->fetch_assoc();

    //  echo json_encode($rowsd); 

    // $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
    // echo json_encode($age); 
    if($resultd->num_rows > 0){
        while($rowsd = $resultd->fetch_assoc()){
            
            
            $json[] = $rowsd;
           

        }

        
    }

    echo json_encode($json); 
    
}

// else{
//     echo "True";
// }



?>