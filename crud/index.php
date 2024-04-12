
    <style>
       h5 {
          background-color:#0abde3;
          height:34px; 
          border-radius: 20px; 
          text-align:center;
        }
      
    </style>
    <?php 
    	require_once('require/header_01.php')
     ?>
    <div class="container">
     
    <h2 class="text-center mt-5" style="color: black;">Register Form</h2><br>
    <fieldset>
      <div class="form-group" style="width:470px; margin: auto;">
            <?php 
                    if (isset($_GET['message'])) {
                     
                        echo "<h5 style='color:#fff' >".$_GET['message']."</h5>";
                    }
           ?>
      </div>
     
      <form method="GET" action="require/process.php">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth</label>
          <input type="date" name="dob" id="dob" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" id="submit" class="btn btn-primary">
        </div>

         <div class="form-group">
            <h6 align="center">I have a account ? <a href="pages/User_login.php">User Login</a> &nbsp;  &nbsp;  &nbsp;  
            Are you admin? <a href="pages/admin_login_page.php">Admin Login</a> </h6><br><br>
        </div>
      </form>
    </fieldset>
  </div>
</body>
</html>