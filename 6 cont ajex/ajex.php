<?php

session_start();


$connect=mysqli_connect("localhost","root","","user");

$user_id=$_SESSION['user_id'];

$name = $_POST['name'];
$mo_no= $_POST['mo_no'];
echo 11111;

$con= "INSERT INTO con (`user_id`,`name`,`mo_no`) VALUES ('$user_id','$name','$mo_no')";

$view= mysqli_query($connect,$con);



?>