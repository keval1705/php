<?php

    session_start();
    $connect=mysqli_connect("localhost","root","","user_1");

    if (isset($_POST["email"])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user= "SELECT * FROM employee WHERE `email`='$email' AND `password`='$password'";
        
        $con = mysqli_query($connect,$user);

        $count = mysqli_num_rows($con);

        // echo $count;

        // true false  condiation //

        if ($count == 1) {

            $user = mysqli_fetch_assoc($con);

            $_SESSION['user_id'] = $user['id'];

            header('location:view.php');
        }else{
            echo "Credential Does not match";
        }

    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>index.php</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/font.min.css">
</head>
<body>



<form method="POST">

<div class="container">
  <div>
    <h4>User Login</h4>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <i class="fa-solid fa-eye"></i>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" >
  </div>
    <button type="login" class="btn btn-success" name="login">login</button>
    <a href="1_postinest.php"  class="btn btn-link" name="">Registrar</a>
  </form>
</form>
</div>

</body>
</html>
