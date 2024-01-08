<?php
	include('../database/connect.php');
	// $id=$_GET['id'];
	
	if (isset($_POST['save'])){
    echo '<script>console.log("Napindot yung add hall button")</script>';
	 $title=$_POST['title'];
	 $Category=$_POST['Category'];
	 $Amenities = $_POST['Amenities'];
	 $Description=$_POST['Description'];
	 $Price=$_POST['Price'];
	 $Discount=$_POST['Discount'];
     $Capacity=$_POST['Capacity'];
	 $Status= "Available";

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

					$query = "INSERT INTO hall (title,Category,Description,Amenities,Price,Discount,Capacity,Status, name, image_dir) values ('$title','$Category','$Description','$Amenities', '$Price', '$Discount', '$Capacity', '$Status', '$name', '$img_dir') ";
					$query_run = mysqli_query($conn, $query);
					// $mysqli->query($sql) or die ($mysqli->error);

					?> <div class="alert alert-success">
					</div> <?php

					// $_SESSION['success'] = "image insert successfully ";
					// header('location:room.php');

					echo '<script>alert("Successfully Uploaded Hall")</script>';
					echo '<script>window.location.href = "hall.php"</script>';
				}


			}

		}
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
