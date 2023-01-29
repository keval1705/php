<?php
session_start();
$user_id= $_SESSION['user_id'];

$connact = mysqli_connect("localhost","root","","user_1");
$pass= "SELECT * FROM contact WHERE id='$user_id'";
if (isset($_POST['old_password'])) {
  # code.
  $old= $_POST['old_password'];
  $new=$_POST['new_password'];
  $conf=$_POST['confiram_password'];


  $con = mysqli_query($connact,$pass);
  $view= mysqli_fetch_assoc($con);
  
  
  if ($view['password']==$old) {
    if ($new == $conf) {
      # code...
      $update= "UPDATE contact SET `password`='$new' WHERE id='$user_id'";
      $noc = mysqli_query($connact,$update);
      header("location:view.php");
    } else {
      # code...
      echo ("New Password And Confiram Password Do Not Match");
    }
    
  }
  else {
    echo ("old password incorrect");
  }
}
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>user details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<form method="POST">

<div class="container">
    
    <div class="form-group" style="margin: 50px;">
      <label for="pwd">Old Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="old_password">
    </div>
    <div class="form-group" style="margin: 50px;">
      <label for="pwd">New Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="new_password">
    </div>
    <div class="form-group " style="margin: 50px;">
      <label for="pwd">Confiram Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="confiram_password">
    </div>
    <div>
        <button class="btn btn-success btn-lg" style="margin-left: 50px;">submit</button>
    </div>

  </form>
</form>
</div>

</body>
</html>
