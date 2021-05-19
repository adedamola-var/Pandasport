<?php 

// connect to the database
	$conn = mysqli_connect('localhost', 'Ric', 'test1234', 'panda');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}



?>