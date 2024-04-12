   <style>
    h5 {
      color:red; 
      background-color:#f9ca24;
      height:34px; 
      border-radius: 20px; 
      text-align:center;
    }
  </style>
   
  
    <?php 
      require_once('../require/header.php')
     ?>
    <div class="container">
    <h2 class="text-center mt-5" style="color: black;">User Login Form</h2><br>
    <fieldset>
      <div class="form-group" style="width:490; margin: auto;">
            <?php 
                    if (isset($_GET['message'])) {
                     
                        echo "<h5 style='color:red' >".$_GET['message']."</h5>";
                    }
           ?>
      </div>
     
       <form method="GET" action="../require/user_process.php">
       
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" class="form-control" required>
        </div>
       
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" id="submit" class="btn btn-primary">
        </div>

         <div class="form-group">
            <h6 align="center">I have a not account ? <a href="../index.php">Register</a> &nbsp;  &nbsp;  &nbsp;  
            Are you admin? <a href="admin_login_page.php">Admin Login</a> </h6><br><br>
        </div>
      </form>
    </fieldset>
  </div>
</body>
</html>