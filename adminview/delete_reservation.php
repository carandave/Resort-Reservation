<?php

include '../database/connect.php';
$sql = "DELETE FROM reservation WHERE id='" . $_GET["id"] . "'";
if(mysqli_query($conn,$sql)) {
    header("location:reservation.php");
    echo "Record deleted";
}
else{
    echo "Error deleting: ". mysqli_error($conn);
}

mysqli_close($conn);

?>