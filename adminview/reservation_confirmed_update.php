<?php 

include('../database/connect.php');

if(isset($_POST['payBtn'])){
     $status = $_POST['status'];
     $peopleId = $_POST['people_Id'];
     $reservationId = $_POST['reservation_Id'];
     $email = $_POST['email'];

      // $total = $_POST['total'];
      // $balance = $_POST['balance'];
      // $payment = $_POST['payment'];
      // $dateofpay = date('Y-m-d');

      $total = $_POST['total'];
      
      $reference = $_POST['referenceNumber'];
      $paymentStatus = "2ndPay";
      $fullPaid = "Full Paid";
      $balance = "0";
      $payment = $_POST['payment'];
      $dateofpay = date('Y-m-d');


      //   $sqlu = "INSERT INTO payment (`people_Id`,`reservation_Id`,`total`,`downpayment`,`balance`,`date_of_pay`) VALUES ('$peopleId', '$reservationId', '$total', '$balance', '$payment', '$dateofpay')";
      //   $resultu = $conn->query($sqlu);
    
      //   $sql = "UPDATE reservation SET reservationStatus='$status' WHERE reservation_Id='$reservationId'";
      //   $result = $conn->query($sql);

        $sqlu = "INSERT INTO payment (`people_Id`,`reservation_Id`,`total`,`downpayment`,`balance`,`reference`,`payment_status`,`date_of_pay`) VALUES ('$peopleId', '$reservationId', '$total', '$payment', '$balance', '$reference', '$paymentStatus', '$dateofpay')";
         $resultu = $conn->query($sqlu);
      
         $sql = "UPDATE reservation SET reservationStatus='$status', payment_status='$fullPaid' WHERE reservation_Id='$reservationId'";
         $result = $conn->query($sql);

        echo '<script>alert("The payment has been inserted!")</script>';
        echo '<script>window.location.href="reservation_confirmed.php"</script>';

    

     

     
}

?>