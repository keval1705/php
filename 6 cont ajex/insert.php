<?php

$connect= mysqli_connect("localhost","root","","user");

if(isset($_POST['first_name'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $mo_no=$_POST['mo_no'];
    $password=$_POST['password'];

    $qry= "INSERT INTO contact (`first_name`,`last_name`,`email`,`mo_no`,`password`) VALUES('$first_name','$last_name','$email','$mo_no','$password')";
   
    $con= mysqli_query($connect,$qry);
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
    <div class="form-group">
      <h1>Registrar to Form</h1>
    </div>
    <div class="form-group">
      <label for="first_name">first_name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter first_name" name="first_name">
    </div>
    <div class="form-group">
      <label for="last_name">last_name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter last_name" name="last_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <!-- <div class="form-group">
      <label for=gender>Gender:</label>
      <input type="radio" value="male" name="gender">Male
      <input type="radio" value="female" name="gender">Female
    </div> -->
    <div class="form-group">
      <label for="mo_no">mo_no:</label>
      <input type="mo_no" class="form-control" id="mo_no" placeholder="Enter mo_no" name="mo_no">
    </div>
    <div>
      <button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button>
      <a href="index.php" type="login" class="btn btn-info" name="login" id="login">login </a>
    </div>

  </form>
</form>
</div>

</body>
</html>
