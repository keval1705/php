<?php

$connect=mysqli_connect("localhost","root","","user");

$query="SELECT * FROM data";

$con= mysqli_query($connect,$query);

// $data=mysqli_fetch_all($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view php</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        .fa-solid{
            color:green;

        }
    </style>
    
</head>
<body>
     <table class="table table-success">
            <thead>
                    <tr>
                        <td>Index</td>
                        <td>Id</td>
                        <td>Name</td>
                        <td>E-mail</td>
                        <td>Gender</td>
                        <td>Mo-No</td>
                        <td>Country</td>
                        <td>Edit/Delete</td>
                    </tr>
             </thead>
        <tbody>

            <?php foreach($con as $key=> $data){?>
                <tr>
                    <td><?php echo ++$key?></td>
                    <td><?php echo $data['id'];?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php echo $data['gender'];?></td>
                    <td><?php echo $data['mo_no'];?></td>
                    <td><?php echo $data['country'];?></td>
                    <td>
                        
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash"></i>
                    </td>
                </tr>
            <?php }?>
    
        </tbody>
    </table>
</body>
</html>