<?php

include '../database/connect.php';
$query=mysqli_query($conn,"select * from reservation");
					while($row=mysqli_fetch_array($query)){
$name=$_GET['name'];
                    }
?>