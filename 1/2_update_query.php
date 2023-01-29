<?php

$connection= mysqli_connect("localhost","root","","user");

$qry= "UPDATE data SET `name`='keval', `email`='kevalpansuriya2019@gmail.com',`gender`='male',`mo_no`='9512892012',`country`='ind'WHERE id=3";

$con =mysqli_query($connection,$qry);

?>

<?php

$connect=mysqli_connect("localhost","root","","user");

$query="UPDATE data SET `name`='akash',`email`='akash@gmail.com',`gender`='male',`mo_no`='9099039752',`country`='ind' WHERE id='6'";

$update=mysqli_query($connect,$query);
?>

<?php


$connect=mysqli_connect("localhost","root","","user");

$qrt  = "INSERT INTO data(`name`,`email`,`gender`,`mo_no`,`country`) VALUES('viren','viren@gmail.com','','9098765612','japan')";
// $info = "INSERT INTO data(`name`,`email`,`gender`,`mo_no`,`country`) VALUES('jay','jay123@gmail.com','male','0986764646','canada')";

$info =mysqli_query($connect,$qrt);

?>

<?php

$connect= mysqli_connect("localhost","root","","user");

$qrt= "DELETE FROM data WHERE id='5'";

$result = mysqli_query($connect,$qrt);


?>


// INSERT TO DATA//

1. INSERT INTO TABLE NAME

// UPDATE DATA//

2.UPDATE TABLE NAME SET

//DELETE TO DATA//
 
3.DELETE FROM TABLE NAME