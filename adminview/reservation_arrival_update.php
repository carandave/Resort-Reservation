<?php 

include('../database/connect.php');

if(isset($_POST['saveBtn'])){
     $status = $_POST['status'];
     $roomId = $_POST['roomId'];
     $hallId = $_POST['hallId'];
    
     $reservationId = $_POST['reservation_Id'];
     $email = $_POST['email'];
    
    $sql = "UPDATE reservation SET reservationStatus='$status' WHERE reservation_Id='$reservationId'";
    $result = $conn->query($sql);

    $sqlr = "UPDATE room SET Status='Available' WHERE room_Id='$roomId'";
    $resultr = $conn->query($sqlr);

    if($hallId == NULL){
        // echo "Walang laman ang Hall"; 
    }

    else if($hallId != NULL){
        $sqlh = "SELECT * FROM hall WHERE hall_Id='$hallId'";
        $resulth = $conn->query($sqlh);

        if($resulth->num_rows > 0){
            while($rowsh = $resulth->fetch_assoc()){
                $hallStatus = $rowsh['Status'];

                if($hallStatus == "Unavailable"){
                    // echo "Available ang Hall";

                    $queryupdateHall = "UPDATE hall SET Status='Available' WHERE hall_Id='$hallId'";
                    $query_runupdateHall = mysqli_query($conn, $queryupdateHall);
                }
                

            }
        }
    }

    echo '<script>alert("The status has been updated!")</script>';
    echo '<script>window.location.href="reservation_arrival.php"</script>';
}

?>