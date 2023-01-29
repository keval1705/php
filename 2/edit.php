<?php

// session_start();

// header('location:index.php');

$connect = mysqli_connect("localhost","root","","user_1");

$emp_id = $_GET['em_id'];

if (isset($_POST['user_name'])){
    $user_name = $_POST['user_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update="UPDATE employee SET `user_name`='$user_name',`gender`='$gender',`email`='$email',`password`='$password' WHERE id=$emp_id";
    $con = mysqli_query($connect,$update);
     header("location:view.php");
    
}
  $query= "SELECT * FROM employee WHERE id='$emp_id'";

  $em= mysqli_query($connect,$query);

  $employee = mysqli_fetch_assoc($em);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>edit.php</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<form method="POST">

<div class="container">
    <div>
        <h1>UPDATE FORM</h1>
    </div>
    <div class="form-group">
      <label for="user_name">user_name:</label>
      <input type="text" class="form-control" id="user_name" placeholder="Enter user_name" name="user_name" value="<?php echo $employee['user_name']; ?>">
    </div>
    <div class="form-group">
      <label for=last_name>Gender:</label>
      <input type="radio" value="male" name="gender" <?php if($employee['gender']=="male"){echo "checked";}?>>Male
      <input type="radio" value="female" name="gender"<?php if($employee['gender']=="female"){echo "checked";}?>>female
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value=" <?php $employee['email'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" >
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-success" name="submit">Submit</button>
    <button type="Reset" class="btn btn-danger" name="reset">reset</button>
  </form>
</form>
</div>

</body>
</html>
