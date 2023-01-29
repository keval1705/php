<?php

session_start();
$connact=mysqli_connect("localhost","root","","user_1");

if(isset ($_POST['name'])){

  $user_id= $_SESSION['user_id'];

    $user= $_SESSION['user_id'];
    $name=$_POST['name'];
    $mo_no=$_POST['mo_no'];
    $query = "INSERT INTO con (`user_id`,`name`,`mo_no`) VALUES ('$user_id','$name','$mo_no')";
    
    $view= mysqli_query($connact,$query);

    header('location:editcontact.php');

    if(!isset($user_id)){
      header('location:view.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view.php</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    

<form method="POST">

<div class="container">
    <div class="form-group">
      <h1>Add Contact</h1>
    </div>
    <div class="form-group">
      <label for="Name">Name:</label>
      <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="mo_no">mo_no:</label>
      <input type="text" class="form-control" id="mo_no" placeholder="+91xxx-xxx-xxx" name="mo_no">
    </div>
    <div>
      <button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button>
    </div>

  </form>
</form>
</div>

</body>
</html>