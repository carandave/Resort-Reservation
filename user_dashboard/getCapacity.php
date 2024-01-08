<?php 

include('../database/connect.php');
session_start();

if(isset($_POST['roomTypes']))
{
    $getRoomType = $_POST['roomTypes'];

    $sql = "SELECT * FROM room WHERE room_Id='$getRoomType'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
            // $valCapacity = $rows['Capacity'];
            echo $_SESSION['Capacity'] = $rows['Capacity'];
            
        }
    }

    

    
}

?>