<?php

$connect=mysqli_connect("localhost","root","","user_1");

    if (isset($_POST["user_name"])) {
        $user_name = $_POST['user_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //image add//
        $image= $_FILES['image'];
        // echo $image;
        $image_name= rand(1000000,999999).time().$image['name'];

        move_uploaded_file($image['tmp_name'],'image/'.$image_name);
        $insert= "INSERT INTO  employee (`user_name`,`gender`,`email`,`password`,`image`) VALUES('$user_name','$gender','$email','$password','$image_name ')";
    
        $con = mysqli_query($connect,$insert);
        header("location:view.php");
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



<form method="POST" enctype="multipart/form-data">

<div class="container">
    <div class="form-group">
      <h1>User Details</h1>
    </div>
    <div class="form-group">
      <label for="user_name">user_name:</label>
      <input type="text" class="form-control" id="user_name" placeholder="Enter user_name" name="user_name">
    </div>
    <div class="form-group">
      <label for=last_name>Gender:</label>
      <input type="radio" value="male" name="gender">Male
      <input type="radio" value="female" name="gender">Female
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="form-group">
      <label for="image">Upload To image:</label>
      <input type="file" class="form-control" id="" placeholder="" name="image">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <a href="view.php">
      <button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button>
    </a>
    
    <button type="Reset" class="btn btn-info" name="reset">reset</button>
      <a href="index.php" class="btn btn-link">Login user</a>
  </form>
</form>
</div>

<!-- <script src="css/jquery-3.6.0.min.js"></script>
<script>
    $(document).on("click","#submit",function(){
      var a= alert("Please Enter The Data");
      if(!a){
        return(a);
      }
      else{
        return(a);
      }
    })
</script> -->
</body>
</html>
