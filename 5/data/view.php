<?php
    $connect= mysqli_connect("localhost","root","","user");

    $query= "SELECT * FROM country";

    $con=mysqli_query($connect,$query)

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
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
        </tr>
        <tr>
                <?php foreach($con as $count){?>
                <td><?php echo $count['id']?></td>
                <td><?php echo $count['name']?></td>
            </tr>
            <?php }?>
    </table>

</body>
</html>
