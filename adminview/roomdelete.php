<?php

include '../database/connect.php';
$sql = "DELETE FROM user_form WHERE id='" . $_GET["id"] . "'";
if(mysqli_query($conn,$sql)) {
    header("location:room.php");
    echo "Record deleted";
}
else{
    echo "Error deleting: ". mysqli_error($conn);
}

mysqli_close($conn);

?>