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
            header("Location:../pages/admin_login_page.php");
            exit();
        }

       
        $user_email = $_SESSION['user_email'];

        $query = "SELECT * FROM users ";
        $result = mysqli_query($conn, $query);

        if (!$result) {
        die("Query Error: " . mysqli_error($conn));

        }

     ?>

        <div class="box2"><br><br>
            <h2 style="color:black; padding:0 0 20px 570px;">ALL USERS</h2>
            <div class="form-group" style="width:470px; margin: auto;">
                <?php 
                    if (isset($_GET['message'])) {
                     
                        echo "<h5 style='color:#222f3e' >".$_GET['message']."</h5>";
                    }
                ?>
            </div>
            
            <button class="btn btn-primary" ><a href="admin_dashboard.php" class="table-info">VIEW DATA</a> </button>
            <button class="btn btn-primary" ><a href="../require/admin_session_destory.php" class="table-info">LOGOUT</a> </button>  
        </div>
        <table class="table table-bordered">
            <thead  class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Password</th>
                    <th scope="col">Update/ Delete</th>
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
                        <td><?= $row["password"]; ?></td>
                        <td>
                          <a href="update_page.php?id=<?= $row['user_id']; ?>" class="btn btn-success">Update</a>
                          <a href="#" class="btn btn-danger" onclick="confirmDelete(<?= $row['user_id']; ?>)">Delete</a>

                        </td>

                      <script>
                          function confirmDelete(id) {
                              if (confirm('Are you sure you want to delete this item?')) {
                                  window.location.href = 'delete_page.php?id=' + id;
                              }
                          }
                      </script>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
