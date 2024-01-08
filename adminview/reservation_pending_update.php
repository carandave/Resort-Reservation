<?php 

include('../database/connect.php');

if(isset($_POST['saveBtn'])){
    $downpayment = $_POST['downpayment'];
    $balance = $_POST['balance'];
    $total = $_POST['total'];
    $reference = $_POST['reference'];
    $date_of_pay = $_POST['date_of_pay'];

    $time_in_out = $_POST['time_in_out'];

    $name = $_POST['name'];
    $roomType = $_POST['roomType'];
    $cottage = $_POST['cottage'];
    $hall = $_POST['hall'];
    $checkIn = $_POST['check_in'];
    $checkOut = $_POST['check_out'];
    $status = $_POST['status'];
    
     $reservationId = $_POST['reservation_Id'];
     $email = $_POST['email'];
    
    
    $sql = "UPDATE reservation SET dateIn='$checkIn', dateOut='$checkOut', reservationStatus='$status' WHERE reservation_Id='$reservationId'";
    $result = $conn->query($sql);

    require("../Phpmailer/PHPMailer.php");
    require("../Phpmailer/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // $mail->SMTPDebug = 3;
    $mail->Host = 'smtp.gmail.com';
    // $mail->Port = 587;
    $mail->Port = 587;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";

    $mail->Username = "resortvillasampaguita@gmail.com";
    // $mail->Password = "bxeivzsxepbsbpko";
    // $mail->Password = "cpxfuzxjmrcslstr";
    $mail->Password = "xupzwupbgbkgmtwe";

    // $mail->AddAddress($doctorEmail);
    $mail->AddAddress($email);
    $mail->setFrom('resortvillasampaguita@gmail.com', 'Villa Sampaguita Notification');
    $mail->Subject = 'Reservation Status || Villa Sampaguita';
    $mail->isHTML(true);

    $mail->Body = "<h3>Reservation Details</h3>
                    <p>Reservation ID #: $reservationId</p>
                    <p>Name: $name</p>
                    <p>Room Type: $roomType</p>
                    <p>Additional: $cottage $hall</p>
                    <p>Room Type: $roomType</p>
                    <p>Check In: $checkIn</p>
                    <p>Check Out: $checkOut</p>
                    <p>Time In and Out: $time_in_out</p>
                    <p>Status: $status</p>
                    <p>Downpayment: $downpayment</p>
                    <p>Balance: $balance</p>
                    <p>Total: $total</p>
                    <p>Date of Pay: $date_of_pay</p>
                    <p>Reference #: $reference</p>

                    <h3>Villa Sampaguita</h3>";

    if($mail->send()){

        // <p>Reservation ID #: $out_reservationId</p>
        // <p>Name: $out_name</p>
        // <p>Contact #: $out_number</p>
        // <p>Room Type: $out_Category</p>
        // <p>Check In: $out_dateIn</p>
        // <p>Check Out: $out_dateOut</p>
        // <p>Adult: $out_adult</p>
        // <p>Children: $out_children</p>
        // <p>Total Cost: $out_total</p>
        // <p>Down Payment: $out_downpayment</p>
        // <p>Balance: $out_balance</p>

        // <h4>Reference #: $out_referenceNo</h4>
        // <h4>Transaction #: $code</h4>

        // <p>Date of Pay: $out_dateofpay</p>
        
        
        
        // <h3>Villa Sampaguita</h3>

        // <p>If you need to get in touch, you can email or phone us directly. We look forward to welcoming you soon! Thanks! </p>	
        
        // echo '<script>alert("Email has been sent!.")</script>';
        // echo "Message";
        //Ilalagay pa natin ang Specific Dentist sa email
    }

    // <p>First Name: $firstName</p>
    // 				<p>Last Name: $lastName</p>
    // 				<p>Preferred Date: $appointDate</p>
    // 				<p>Concerned: $concerned</p>
    // 				<p>Preferred Dentist: $doctorName</p>

    else{
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' .$mail->ErrorInfo;
    }


    echo '<script>alert("The status has been updated!")</script>';
    echo '<script>window.location.href="reservation_pending.php"</script>';
}

?>