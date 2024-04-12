<?php
	include 'db_connection.php';

	if (isset($_GET['submit'])) {
		$email  	= $_GET['email'];
		$password  	= $_GET['password'];

	$query = "SELECT email , password FROM admin WHERE email=? AND password =? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
       mysqli_stmt_bind_result($stmt,  $email,  $password);
        mysqli_stmt_fetch($stmt);
        session_start();
        $_SESSION['user_email'] = $email;

        header("Location:../pages/admin_dashboard.php");

        exit();
                 
         } else {
                 echo "Invalid email or password";
                 header("Location:../pages/admin_login_page.php?message=Invalid email or password");
                  exit();
         }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
	}

?>


		