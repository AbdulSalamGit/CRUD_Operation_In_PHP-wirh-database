<?php 
	include 'db_connection.php';

	if (isset($_GET['submit'])) {

		$name  		= $_GET['name'];
		$email  	= $_GET['email'];
		$phone  	= $_GET['phone'];
		$city  		= $_GET['city'];
		$dob  		= $_GET['dob'];
		$password  	= $_GET['password'];

		$sql = "INSERT INTO users (user_name, user_email, phone, city, dob, password) values(?,?,?,?,?,?)";

		$statement = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($statement,'ssssss',$name, $email, $phone, $city, $dob,  $password);

		$result = mysqli_stmt_execute($statement);
		if ($result) {
			
			header("Location:../index.php?message=Your data are successfully");
			

		}
		else{
			echo "Not insertd Data". mysqli_error($conn);
		}
	}



 ?>