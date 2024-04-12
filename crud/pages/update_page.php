
<style>
    .custom-input {
        width: 450px;
        margin: auto;
    }

    button {
        width: 450px;
        margin: auto;
    }
</style>


<?php
    require_once('../require/header.php');
    require_once('../require/db_connection.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM users WHERE user_id = '$id' ";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Error: " . mysqli_error($conn));
        } else {
            $row =  mysqli_fetch_assoc($result);
    ?>


<div class="container"><br>
    <h3 class="form-group custom-input">ADD User</h3>
    <form method="GET" action="../require/update_process.php">
        <div class="form-group custom-input">

            <label for="id">ID</label>
            <input type="text" class="form-control" name="id" id="id" value="<?= $row['user_id']; ?>" required>
        </div>
        <div class="form-group custom-input">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $row['user_name']; ?>" required>
        </div>
        <div class="form-group custom-input">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $row['user_email'] ?>" required>
        </div>
        <div class="form-group custom-input">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?= $row['phone'] ?>" required>
        </div>
        <div class="form-group custom-input">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" value="<?= $row['city'] ?>" required>
        </div>
        <div class="form-group custom-input">
            <label for="date">Date of Birth</label>
            <input type="date" class="form-control" name="date" id="date" value="<?= $row['dob'] ?>" required>
        </div>
        <div class="form-group custom-input">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password" value="<?= $row['password'] ?>" required>
        </div>
        <div class="form-group custom-input">
            <button type="submit" class="btn btn-primary" name="submit" style="width: 100%">SAVE</button>
        </div>
    </form>
</div>
<?php
    }
}
?>
