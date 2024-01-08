<?php 

include('../database/connect.php');

if(isset($_POST['payBtn'])){
     $status = 'Arrived';
      $peopleId = $_POST['people_Id'];
      $reservationId = $_POST['reservation_Id'];
      $email = $_POST['email'];

      $total = $_POST['total'];
      $balance = "0";
	  $fullPaid = "Full Paid";
      $reference = $_POST['out_referenceNo'];
      $paymentStatus = "2ndPay";
      $payment = $_POST['payment'];
      $dateofpay = date('Y-m-d');

	  //Dito tayo sa status payment sa Confirmed list

      $phpFileUploadErrors = array(
		0 => 'There is no error, the file uploaded with success',
		1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML Form',
		3 => 'The uploaded file was only partially uploaded',
		4 => 'No file was uploaded',
		6 => 'Missing a temporary folder',
		7 => 'Failed to write file to disk',
		8 => 'A PHP extension stopped the file upload.',
	);

	if(isset($_FILES['userfile'])){

		

		$file_array = reArrayFiles($_FILES['userfile']);

		for($i = 0; $i<count($file_array); $i++){
			if($file_array[$i]['error']){
				?> <div class="alert alert-danger">
				<?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
				?> </div> <?php
			}

			else{
				$extensions = array('jpg', 'png', 'gif', 'jpeg');

				$file_ext = explode('.', $file_array[$i]['name']);

				// pre_r($file_ext);
				// die; 
				// $file_ext = end($file_ext);

				$name = $file_ext[0];
				$name = preg_replace("!-!", " ", $name);
				$name = ucwords($name);
				

				$file_ext = end($file_ext);

				if(!in_array($file_ext, $extensions)){
					?> <div class="alert alert-danger">
					<?php echo "{$file_array[$i]['name']} - Invalid File Extension!";
					?> </div> <?php
				}

				else {
					
					// $img_dir = 'web/'.$file_array[$i]['name'];
					$img_dir = '../img/'.$file_array[$i]['name'];

					move_uploaded_file($file_array[$i]['tmp_name'], $img_dir); 

					$alph = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					$code='';

					for($i=0;$i<15;$i++){
					$code .= $alph[rand(0, 35)];

                    
					}

                    $sqlu = "INSERT INTO payment (`people_Id`,`reservation_Id`,`total`,`downpayment`,`balance`,`reference`,`payment_status`,`date_of_pay`,`name`,`image_dir`) VALUES ('$peopleId', '$reservationId', '$total', '$payment', '$balance', '$reference', '$paymentStatus', '$dateofpay', '$name', '$img_dir')";
                    $resultu = $conn->query($sqlu);
                
                    $sql = "UPDATE reservation SET reservationStatus='$status', payment_status='$fullPaid' WHERE reservation_Id='$reservationId'";
                    $result = $conn->query($sql);

					// $query = "INSERT INTO payment (people_Id, reservation_Id, total, downpayment, balance, reference, payment_status, date_of_pay, name, image_dir) values ('$out_peopleId','$out_reservationId','$out_total', '$out_downpayment', '$out_balance', '$out_referenceNo', '$out_paymentStatus', '$out_dateofpay', '$name', '$img_dir') ";
					// $query_run = mysqli_query($conn, $query);

					// $query = "UPDATE reservation SET reservationStatus='Pending', code='$code', downCheckOut='$out_downpayment' WHERE reservation_Id='$out_reservationId'";
					// $query_run = mysqli_query($conn, $query);

					// require("../Phpmailer/PHPMailer.php");
					// require("../Phpmailer/SMTP.php");

					// $mail = new PHPMailer\PHPMailer\PHPMailer();

					// $mail->Host = 'smtp.gmail.com';

					// $mail->Port = 587;
					// $mail->IsSMTP();
					// $mail->SMTPAuth = true;
					// $mail->SMTPSecure = "tls";

					// $mail->Username = "resortvillasampaguita@gmail.com";

					// $mail->Password = "xupzwupbgbkgmtwe";

					// $mail->AddAddress($out_adminEmail);
					// $mail->setFrom('resortvillasampaguita@gmail.com', 'Villa Sampaguita Notification');
					// $mail->Subject = 'There is Someone Requesting a Reservation Room || Villa Sampaguita';
					// $mail->isHTML(true);

					// $mail->Body = "<h3>Reservation Details</h3>
					// 				<p>Reservation ID #: $out_reservationId</p>
					// 				<p>Name: $out_name</p>
					// 				<p>Contact #: $out_number</p>
					// 				<p>Room Type: $out_Category</p>
					// 				<p>Check In: $out_dateIn</p>
					// 				<p>Check Out: $out_dateOut</p>
					// 				<p>Adult: $out_adult</p>
					// 				<p>Children: $out_children</p>
					// 				<p>Total Cost: $out_total</p>
					// 				<p>Down Payment: $out_downpayment</p>
					// 				<p>Balance: $out_balance</p>

					// 				<h4>Reference #: $out_referenceNo</h4>
					// 				<h4>Transaction #: $code</h4>

					// 				<p>Date of Pay: $out_dateofpay</p>
									
									
									
					// 				<h3>Villa Sampaguita</h3>";

					// if($mail->send()){

					// }

					// else{
					// 	echo 'Message could not be sent.';
					// 	echo 'Mailer Error: ' .$mail->ErrorInfo;
					// }

					// ?> <?php


					echo '<script>alert("Payment Successfully!.")</script>';
					echo '<script>window.location.href = "reservation_confirmed.php"</script>';
				}


			}

		}
	}

    //  if($payment >= $balance){

    //     $sqlu = "INSERT INTO payment (`people_Id`,`reservation_Id`,`total`,`downpayment`,`balance`,`reference`,`payment_status`,`date_of_pay`,`name`,`image_dir`) VALUES ('$peopleId', '$reservationId', '$total', '$balance', '$reference', '$paymentStatus', '$dateofpay', '$name', '$image_dir')";
    //     $resultu = $conn->query($sqlu);
    
    //     $sql = "UPDATE reservation SET reservationStatus='$status' WHERE reservation_Id='$reservationId'";
    //     $result = $conn->query($sql);

    //     echo '<script>alert("The Full Payment has been inserted!")</script>';
    //     echo '<script>window.location.href="reservation_confirmed.php"</script>';

    //  }

    //  else{
    //     echo '<script>alert("Make sure the payment is higher than the balanced!")</script>';
    //  }

     
}

function reArrayFiles(&$file_post){
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for($i = 0; $i<$file_count; $i++){
        foreach($file_keys as $key){
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}


function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>