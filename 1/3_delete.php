<?php

$connect= mysqli_connect("localhost","root","","user");

$qry = "DELETE FROM data WHERE id='3'";

$con = mysqli_query($connect,$qry);


?>