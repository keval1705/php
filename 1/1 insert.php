<?php


$connect= mysqli_connect("localhost","root","","user");
// $new="INSERT INTO  data (`name`,`email`,`gender`,`mo_no`,`country`)";

$qry  = "INSERT INTO  data (`name`,`email`,`gender`,`mo_no`,`country`) VALUES('keval','123@gmail.com','male','909909090','ind')";
$insert= "INSERT INTO  data (`name`,`email`,`gender`,`mo_no`,`country`) VALUES('akash','akash@gmail.com','male','9876512445','japan')";
$info = "INSERT INTO data(`name`,`email`,`gender`,`mo_no`,`country`) VALUES('jay','jay123@gmail.com','male','0986764646','canada')";

$con = mysqli_query($connect, $qry);
$con = mysqli_query($connect,$insert);
$con = mysqli_query($connect,$info);


?>
