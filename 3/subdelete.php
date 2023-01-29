<?php

$connect= mysqli_connect("localhost","root","","user_1");

$em_id= $_GET['emp_id'];

$query = "DELETE FROM con WHERE id='$em_id'";

$con = mysqli_query($connect,$query);

header('location:editcontact.php');



?>