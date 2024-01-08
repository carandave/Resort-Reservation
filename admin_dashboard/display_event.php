<?php                
include('../database/connect.php');

// $sql = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.payment_status, r.dateCreated, r.code, p.people_Id, p.address, t.Category, t.Price, a.payment_Id, a.people_Id, a.reservation_Id, a.total, a.downpayment, a.reference, a.date_of_pay, a.balance FROM reservation r INNER JOIN people p ON r.people_Id = p.people_Id INNER JOIN room t ON r.room_Id = t.room_Id INNER JOIN payment a ON r.reservation_Id = a.reservation_Id WHERE reservationStatus='Pending' ORDER BY r.reservation_Id DESC";
//         $result = $conn->query($sql);

// $display_query = "SELECT reqId, patientId, appointment_date, appointment_time, status from request_appointment";   
$display_query = "SELECT r.reservation_Id, r.people_Id, r.name, r.email, r.number, r.room_Id, r.timeInOut, r.dateIn, r.dateOut, r.adult, r.children, r.reservationStatus, r.payment_status, r.dateCreated, r.code, p.people_Id, p.address, t.Category, t.Price FROM reservation r INNER JOIN people p ON r.people_Id = p.people_Id INNER JOIN room t ON r.room_Id = t.room_Id ";
$results = mysqli_query($conn,$display_query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$data_arr=array();
    $i=1;
	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{	
	$data_arr[$i]['event_id'] = $data_row['reservation_Id'];
	$data_arr[$i]['title'] = $data_row['name'];
    $data_arr[$i]['patStatus'] = $data_row['reservationStatus'];

    $data_arr[$i]['email'] = $data_row['email'];
    $data_arr[$i]['roomType'] = $data_row['room_Id'];
    $data_arr[$i]['timeInOut'] = $data_row['timeInOut'];
    $data_arr[$i]['adult'] = $data_row['adult'];
    $data_arr[$i]['children'] = $data_row['children'];
    $data_arr[$i]['paymentStatus'] = $data_row['payment_status'];
    $data_arr[$i]['dateSubmitted'] = $data_row['dateCreated'];
	// $data_arr[$i]['title_firstname'] = $data_row['first_name'];
	// $data_arr[$i]['dentist_fullname'] = $data_row['fullname'];
	$data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['dateIn']));
    $data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['dateOut']));
	// $data_arr[$i]['end_time'] = $data_row['appointment_time'];

	if($data_row['reservationStatus'] == "Cancelled"){
		$data_arr[$i]['color'] = '#dc3545'; 
	}

	if($data_row['reservationStatus'] == "Unpaid"){
		$data_arr[$i]['color'] = '#FF7F7F'; 
	}

	if($data_row['reservationStatus'] == "Pending"){
		$data_arr[$i]['color'] = '#F05E16'; 
	}

	if($data_row['reservationStatus'] == "Confirmed"){
		$data_arr[$i]['color'] = '#059142'; 
	}

    if($data_row['reservationStatus'] == "Arrived"){
		$data_arr[$i]['color'] = '#17a2b8'; 
	}

	if($data_row['reservationStatus'] == "Successed"){
		$data_arr[$i]['color'] = '#8000FF'; 
	}

	// if($data_row['reservationStatus'] == "Cancelled"){
	// 	$data_arr[$i]['color'] = '#A42821'; 
	// }

	// if($data_row['reservationStatus'] == "No Show"){
	// 	$data_arr[$i]['color'] = '#060D0D'; 
	// }

	$i++;
	}
	
	$data = array(
                'status' => true,
                'msg' => 'successfully!',
				'data' => $data_arr
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Error!'				
            );
}
echo json_encode($data);


?>