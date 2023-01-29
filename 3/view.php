<?php

session_start();

$connact=mysqli_connect("localhost","root","","user_1");

// session storage in index.php  // 
$user_id =$_SESSION['user_id'];


$query = "SELECT * FROM contact WHERE id='$user_id'";

$con= mysqli_query($connact,$query);

$user= mysqli_fetch_assoc($con);

if(!isset($user_id)){
  header('location:index.php');
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
    <a href="subeditpro.php">

        <button class="btn btn-primary" style="float:right; margin: 10px;">Edit Profile</button>    
    </a>
    <a href="logout.php">

        <button class="btn btn-danger" style="float:right; margin: 10px;">Logout</button>    
    </a>
    <a href="password.php">

        <button class="btn btn-warning" style="float:right; margin: 10px;">change password</button>
    </a>


<button type="button" class="btn btn-info" style="float:right; margin: 10px;" data-toggle="modal" data-target="#myModal">From</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Registrar from</h4> -->
      </div>
      <div class="modal-body">
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
    <div class="form-group">
      <label for=gender>Gender:</label>
      <input type="radio" value="male" name="gender">Male
      <input type="radio" value="female" name="gender">Female
    </div>
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

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>
<thead>
    <table class="table table-stipped">

        <tr>
            <td>FIRST_NAME :</td>
            <td><?php echo $user['first_name']?></td>
        </tr>
        <tr>
            <td>LAST_NAME :</td>
            <td><?php echo $user['last_name']?></td>
        </tr>
        <tr>
            <td>EMAIL :</td>
            <td><?php echo $user['email']?></td>
        </tr>
        <tr>
            <td>MO_NO :</td>
            <td><?php echo $user['mo_no']?></td>
        </tr>
        <tr>
            <td>
                    <a href="viewcontact.php">
                    <button class="btn btn-success">Add Conatct</button></td>
            </a>

            <td>
                <a href="editcontact.php">

                    <button class="btn btn-info">view Conatct</button></td>
                </a>    
        </tr>
    </table>
    
</body>
</html>