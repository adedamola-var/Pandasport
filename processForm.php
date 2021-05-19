<?php
$msg = " ";

$conn = mysqli_connect('localhost','Ric', 'test1234','panda');


if (isset($_POST['save-user']))  {
	
	echo "<pre>", print_r($_FILES['profileImage']['name']), "</pre>";
	

	$profileImageName = time () . '_' . $_FILES['profileImage']['name'];

	$target = 'images/' . $profileImageName;

	if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
		$sql = "INSERT INTO panda (profile_image) VALUES ('$profileImageName')";
		if (mysqli_query($conn, $sql)) {
			$msg = "Image uploaded and saved to database";

	}else{
        	$msg = "failed to upload";
	}
  

	
	}else{
		$msg = "failed to upload";

	}


}




