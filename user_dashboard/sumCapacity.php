<?php 

include('../database/connect.php');
session_start();

$capacity = $_SESSION['Capacity'];

if(isset($_POST['adult']) || isset($_POST['children']))
{
     $adult = $_POST['adult'];
     $children = $_POST['children'];

     $sum = (int)$adult + (int)$children;

    if((int)$capacity < (int)$sum){
        echo 0;
        //False
    }
    else{
        echo 1;
        //True
    }
    
}



?>