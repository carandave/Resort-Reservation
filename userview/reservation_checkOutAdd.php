<?php 

include ('../database/connect.php');
session_start();

if(isset($_POST['payBtn'])){

	$out_adminEmail = $_POST['out_adminEmail'];

	$out_name = $_POST['out_name'];
	$out_email = $_POST['out_email'];
	$out_number = $_POST['out_number'];
	$out_Category = $_POST['out_Category'];
	$out_Title = $_POST['out_Title'];
	$out_HallTitle = $_POST['out_HallTitle'];
	$out_Price = $_POST['out_Price'];
	$out_Discount = $_POST['out_Discount'];
	$out_dateIn = $_POST['out_dateIn'];
	$out_dateOut = $_POST['out_dateOut'];
	$out_adult = $_POST['out_adult'];
	$out_children = $_POST['out_children'];

	$out_inititalPayment = "Partial Payment";


    $out_reservationId = $_POST['out_reservationId'];
    $out_peopleId = $_POST['out_peopleId'];
	$out_roomId = $_POST['out_roomId'];
	$out_hallId = $_POST['out_hallId'];
    $out_total = $_POST['out_total'];
    $out_downpayment = $_POST['out_downpayment'];
    $out_balance = $_POST['out_balance'];
    // $out_referenceNo = $_POST['out_referenceNo'];
	$out_paymentStatus = "1stPay";
    $out_dateofpay = date("Y-m-d");

	$sqlg = "SELECT * FROM room WHERE room_Id='$out_roomId'";
	$resultg = $conn->query($sqlg);

	$reserveisTrue = false;

	if($resultg->num_rows > 0){
		while($rowsg = $resultg->fetch_assoc()){
			$roomStatus = $rowsg['Status'];

			if($roomStatus == "Available"){
				$reserveisTrue = true;
				// echo "Available and Room";

				if($out_hallId == NULL){
					// echo "Walang laman ang Hall"; 

					$reserveisTrue = true;
				}

				else if($out_hallId != NULL){
					$sqlh = "SELECT * FROM hall WHERE hall_Id='$out_hallId'";
					$resulth = $conn->query($sqlh);
	
					if($resulth->num_rows > 0){
						while($rowsh = $resulth->fetch_assoc()){
							$hallStatus = $rowsh['Status'];
							if($hallStatus == "Available"){
								// echo "Available ang Hall";

								$reserveisTrue = true;
							}
	
							else if($hallStatus == "Unavailable"){

								$reserveisTrue = false;
								// echo "Hindi Available ang Hall";
								echo '<script>alert("We can not process your reservation because the Hall is already reserved Thankyou!.")</script>';
								// echo '<script>window.location.href = "reservation.php"</script>';
							}
	
							// else if($hallStatus == ""){
							// 	echo "Walang laman ang Hall";
							// }
						}
					}
				}

				

				
				

				

			}

			else{
				$reserveisTrue = false;
				// echo "Hindi Available and Room";
				echo '<script>alert("We can not process your reservation because the room is already reserved Thankyou!.")</script>';
				// echo '<script>window.location.href = "reservation.php"</script>';
			}

			

			
		}
	}

	if($reserveisTrue == true){
		// echo '<script>alert("Pwede tayo mag pareserve.")</script>';

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
	
						$query = "INSERT INTO payment (people_Id, reservation_Id, total, downpayment, balance, payment_status, date_of_pay, name, image_dir) values ('$out_peopleId','$out_reservationId','$out_total', '$out_downpayment', '$out_balance', '$out_paymentStatus', '$out_dateofpay', '$name', '$img_dir') ";
						$query_run = mysqli_query($conn, $query);
	
						$query = "UPDATE reservation SET reservationStatus='Pending', code='$code', downCheckOut='$out_downpayment', payment_status='$out_inititalPayment' WHERE reservation_Id='$out_reservationId'";
						$query_run = mysqli_query($conn, $query);

						// $queryupdate = "UPDATE room SET Status='Unavailable' WHERE room_Id='$out_roomId'";
						// $query_runupdate = mysqli_query($conn, $queryupdate);

						if($out_hallId == NULL){
							// $queryupdateHall = "UPDATE hall SET Status='Available' WHERE hall_Id='$out_hallId'";
							// $query_runupdateHall = mysqli_query($conn, $queryupdateHall);
						}
		
						else if($out_hallId != NULL){
							$sqlh = "SELECT * FROM hall WHERE hall_Id='$out_hallId'";
							$resulth = $conn->query($sqlh);
			
							if($resulth->num_rows > 0){
								while($rowsh = $resulth->fetch_assoc()){
									$hallStatus = $rowsh['Status'];
									if($hallStatus == "Available"){
										// echo "Available ang Hall";
		
										// $queryupdateHall = "UPDATE hall SET Status='Unavailable' WHERE hall_Id='$out_hallId'";
										// $query_runupdateHall = mysqli_query($conn, $queryupdateHall);
									}
			
								}
							}
						}

						
						// $mysqli->query($sql) or die ($mysqli->error);
	
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
						$mail->AddAddress($out_adminEmail);
						$mail->setFrom('resortvillasampaguita@gmail.com', 'Villa Sampaguita Notification');
						$mail->Subject = 'There is Someone Requesting a Reservation Room || Villa Sampaguita';
						$mail->isHTML(true);
	
						$mail->Body = "<h3>Reservation Details</h3>
										<p>Reservation ID #: $out_reservationId</p>
										<p>Name: $out_name</p>
										<p>Contact #: $out_number</p>
										<p>Room Type: $out_Category</p>
										<p>Cottage: $out_Title</p>
										<p>Hall: $out_HallTitle</p>
										<p>Check In: $out_dateIn</p>
										<p>Check Out: $out_dateOut</p>
										<p>Adult: $out_adult</p>
										<p>Children: $out_children</p>
										<p>Total Price: $out_total</p>
										<p>Down Payment: $out_downpayment</p>
										<p>Balance: $out_balance</p>
	
										
										<h4>Transaction #: $code</h4>
	
										<p>Date of Pay: $out_dateofpay</p>
										
										
										
										<h3>Villa Sampaguita</h3>";
	
						if($mail->send()){
	
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
	
						?> <div class="alert alert-success">
						</div> <?php
	
						// $_SESSION['success'] = "image insert successfully ";
						// header('location:room.php');
	
						//Dun na tayo sa View Button para mag lagay ng full info sa reservation Pending List 
	
						echo '<script>alert("Payment Successfully!.")</script>';
						echo '<script>window.location.href = "reservation_pending.php"</script>';
					}
	
	
				}
	
			}
		}

	}

	else{
		// echo '<script>alert("Payment is Unsuccessfull!.")</script>';
		echo '<script>window.location.href = "reservation.php"</script>';
	}

    


		
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