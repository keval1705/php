<?php

$connect = mysqli_connect("localhost","root","","user_1");
if (isset($_POST['first_name'])) {
    # code...
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $mo_no=$_POST['mo_no'];
    
    
    $qery= "INSERT INTO contact(`first_name`,`last_name`,`email`,`password`,`gender`,`mo_no`) VALUES ('$first_name','$last_name','$email','$password','$gender','$mo_no')";
    
    $con= mysqli_query($connect,$qery);
    // header("location:view.php");
  }
  echo 1;

?>

