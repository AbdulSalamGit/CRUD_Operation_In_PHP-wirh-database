<?php
    require_once('../require/header.php');
    require_once('../require/db_connection.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM users WHERE user_id = '$id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Error: " . mysqli_error($conn));
        } else {
            header('location:admin_dashboard.php?message=You have successfully Deleted the data.');
        }
    }
?>
