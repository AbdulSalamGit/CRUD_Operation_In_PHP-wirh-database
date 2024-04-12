 <style>
        h5 {
          color:red; 
          background-color:#0abde3;
          height:34px; 
          border-radius: 20px; 
          text-align:center;
        }
        button a{
            text-decoration: none;
            
        }
        button{
            float: right;
            padding: 12px;
        }
      </style>
<?php 
    require_once('../require/header.php');
    require_once('../require/db_connection.php');

    session_start(); 

    
    if(!isset($_SESSION['user_email'])) {
        header("Location:../pages/user_login.php");
        exit();
    }

   
    $user_email = $_SESSION['user_email'];

    $query = "SELECT * FROM users WHERE user_email = ?";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }
?>

<div class="box2"><br><br>
    <h2 style="color:black; padding:0 0 20px 570px;">YOUR PROFILE</h2>
    <button class="btn btn-primary"><a href="../require/user_session_destory.php" class="table-info">LOGOUT</a> </button>  
</div>
<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">City</th>
            <th scope="col">Date Of Birth</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <th scope="row"><?= $row["user_id"]; ?></th>
                <td><?= $row["user_name"]; ?></td>
                <td><?= $row["user_email"]; ?></td>
                <td><?= $row["phone"]; ?></td>
                <td><?= $row["city"]; ?></td>
                <td><?= $row["dob"]; ?></td>
            </tr>
        <?php
        } 
        ?>
    </tbody>
</table>
