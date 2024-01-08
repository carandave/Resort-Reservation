<?php
	include('../database/connect.php');

	if(isset($_POST['updateBtn'])){
		 
		$hallId = $_POST['hall_Id'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$amenities= $_POST['amenities'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$discount = $_POST['discount'];
		$capacity = $_POST['capacity'];
		$status = $_POST['status'];

		

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
	
						$query = "UPDATE hall SET title='$title',Category='$category',Amenities='$amenities',Description='$description',Price='$price',Discount='$discount',Capacity='$capacity',Status='$status', name='$name', image_dir='$img_dir' WHERE hall_Id='$hallId'";
						$query_run = mysqli_query($conn, $query);
						
	
						echo '<script>alert("Successfully Updated Hall")</script>';
						echo '<script>window.location.href = "hall.php"</script>';
					}
	
	
				}
	
			}
		}

		else{
			echo '<script>console.log("Hindi napindot")</script>';	
	
			$file_array = reArrayFiles($_FILES['userfile']);

			print_r($file_array);
	
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

						$query = "UPDATE hall SET title='$title',Category='$category',Amenities='$amenities',Description='$description',Price='$price',Discount='$discount',Capacity='$capacity',Status='$status', name='$name', image_dir='$img_dir' WHERE hall_Id='$hallId'";
						$query_run = mysqli_query($conn, $query);
						
	
						echo '<script>alert("Successfully Updated Hall")</script>';
						echo '<script>window.location.href = "hall.php"</script>';
					}
	
	
				}
	
			}
		}

		//Dun na tayo sa Payment History


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
	// $id=$_GET['id'];
	
	// $img=$_FILES['img'];
	// $Name=$_POST['Name'];
	// $Category=$_POST['Category'];
	// $Description=$_POST['Description'];
    // $Price=$_POST['Price'];
	// $Capacity=$_POST['Capacity'];
	// $Status=$_POST['Status'];
	
	// mysqli_query($conn,"update 'room' set img='$img', Name='$Name', Category='$Category', Description='$Description', Price='$Price', Capacity='$Capacity', Status='$Status'");
	// header('location:room.php');
?>
