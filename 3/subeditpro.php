<?php
    session_start();
    
    $connect = mysqli_connect("localhost","root","","user_1");
    $user= $_SESSION['user_id'];
    if (isset($_POST['first_name'])) {
      # code...
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $mo_no=$_POST['mo_no'];
    
    
    $qery= "UPDATE contact SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`password`='$password',`gender`='$gender',`mo_no`='$mo_no' WHERE id='$user'";
    
    $con= mysqli_query($connect,$qery);
    header("location:view.php");
  }

  $query ="SELECT * FROM contact WHERE id='$user'";

  $upd = mysqli_query($connect,$query);

  $view = mysqli_fetch_assoc($upd);


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
      <h1>Update Form</h1>
    </div>
    <div class="form-group">
      <label for="first_name">first_name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter first_name" name="first_name" value="<?php echo $view['first_name'];?>" >
    </div>
    <div class="form-group">
      <label for="last_name">last_name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter last_name" name="last_name" value="<?php echo $view['last_name'];?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $view['email'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="<?php echo $view['password']?>"> 
    </div>
    <div class="form-group">
      <label for=gender>Gender: </label>
      <input type="radio" value="male" name="gender" <?php if($view['gender']=='male'){echo 'checked';}?>>Male
      <input type="radio" value="female" name="gender"<?php if($view['gender']=='female'){echo 'checked';}?> >Female
    </div>
    <div class="form-group">
      <label for="mo_no">mo_no:</label>
      <input type="mo_no" class="form-control" id="mo_no" placeholder="Enter mo_no" name="mo_no" value="<?php echo $view['mo_no'];?>">
    </div>
    <div>
      <button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button>
      <!-- <a href="index.php" type="login" class="btn btn-info" name="login" id="login">login </a> -->
    </div>

  </form>
</form>
</div>

</body>
</html>
