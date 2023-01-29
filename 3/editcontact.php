<?php

session_start();

$connact = mysqli_connect("localhost","root","","user_1");

$user_id = $_SESSION['user_id'];

$query= "SELECT * FROM con WHERE user_id='$user_id'";

$con= mysqli_query($connact,$query);

// $fetch =mysqli_fetch_all($con);
// $fetch =mysqli_fetch_all($con);

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
  <table class="table table-active">
    <thead>
      <tr>
        <td>id</td>
        <td>user_id</td>
        <td>name</td>
        <td>mo_no</td>
        <td>action</td>
      </tr>
    </thead>
    <tbody>
      
      <?php foreach($con as $contact){?>
      <tr>
        <td><?php echo$contact['id'];?></td>
        <td><?php echo$contact['user_id'];?></td>
        <td><?php echo$contact['name'];?></td>
        <td><?php echo$contact['mo_no'];?></td>
        <td>
              <a href="subedit.php?emp_id=<?php echo $contact['id']?>">
                
                <button class="btn btn-info">edit</button>

              </a>         
              <a href="subdelete.php?emp_id=<?php echo $contact['id']?>">
                <button class="btn btn-danger">delete</button>
                
              </a>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</body>
</html>