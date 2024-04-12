<?php 
// require_once('../require/header.php');
require_once('db_connection.php');

if (isset($_GET['submit'])) {
    $name       = $_GET['name'];
    $email      = $_GET['email'];
    $phone      = $_GET['phone'];
    $city       = $_GET['city'];
    $date       = $_GET['date'];
    $password   = $_GET['password'];
    $id         = $_GET['id']; 

    $query = "UPDATE users SET user_name=?, user_email=?, phone=?, city=?, dob=?, password=? WHERE user_id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $name, $email, $phone, $city, $date, $password, $id);

    
    if (mysqli_stmt_execute($stmt)) {
        
       	header('location:../pages/admin_dashboard.php?message=You have successfully Update the data.');

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
