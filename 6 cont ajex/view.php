<?php

session_start();

$connect= mysqli_connect("localhost","root","","user");

$user_id=$_SESSION['user_id'];

$qry= "SELECT * FROM contact WHERE id=$user_id";


$con = mysqli_query($connect,$qry);
$view= mysqli_fetch_assoc($con);

$page=1;

if (isset ($_GET['page_no'])) {
    $page=$_GET['page_no'];
}

$page_q= $page*4-4;
//paginestion//

$page_query="SELECT * FROM con LIMIT $page_q,4";

$limit= mysqli_query($connect,$page_query);
// view contact ///
$con_qu="SELECT * FROM con ";

$qu=mysqli_query($connect,$con_qu);

$convi=mysqli_fetch_assoc($qu);


// paginestion //
$row=mysqli_num_rows($qu);

// echo $row;

$total=ceil($row)/3;
echo $total;





//  add contact //

// if(isset($_POST['name']));
// $name = $_POST['name'];
// $mo_no= $_POST['mo_no'];

// $add= "INSERT INTO con (`user_id`,`name`,`mo_no`) VALUES ('$user_id','$name','$mo_no')";

// $adc= mysqli_query($connect,$add);
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


    <!-- <button type="button" class="btn btn-info" style="float:right; margin: 10px;" data-toggle="modal" data-target="#myModal">From</button> -->
<thead>
    <table class="table table-hover">
        <tr>
            <td>FIRST_NAME :</td>
            <td><?php echo $view['first_name']?></td>
        </tr>
        <tr>
            <td>LAST_NAME:</td>
            <td><?php echo $view['last_name']?></td>
        </tr>
        <tr>
            <td>EMAIL:</td>
            <td><?php echo $view['email']?></td>
        </tr>
        <tr>
            <td>MO_NO:</td>
            <td><?php echo $view['mo_no']?></td>
        </tr>

        <tr>
            <td>
                <!-- <button class="btn btn-primary" data-toggle="modal" data-toggle="#mymodal">Add Contact</button> -->
                <!-- !-- Trigger the modal with a button --> 
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="add">Add contact</button>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog" >
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title">Contact Infomation </h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <form method="POST"id="info">

                                    <div>
                                        <h3 for="name">NAME:</h3>
                                        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <h3 for="">MOBIL NOUMBER</h3>
                                        <input type="tel" class="form-control" id="mo_no" placeholder="Enter +91 xxxxx-xxxxx" name="mo_no">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <a class="btn btn-success" id="sub" href="#">Submit</a>
                                </div>
                            </form>
                            </div>

                        </div>
                        </div>
            </td>

            <td>
                <button class="btn btn-dark" id="view">View Contact</button>

                    
            </td>
        </tr>
    </table>
</thead>

        <table class="table table-hover " id="view_id" >
            <thead>

                <tr>
                    <td><h3>ID</h3></td>
                    <td><h3>USER Id</h3></td>
                    <td><h3>NAME</h3></td>
                    <td><h3>MO_NO</h3></td>
                </tr>
                    
            </thead>
            <tbody>
                <!-- with pageinestion and without code ($qu as $view) -->
                <?php  foreach($limit as $view) {  ?>
                    <tr>
                        <td><?php echo $view['id']?></td>
                        <td><?php echo $view ['user_id']?></td>
                        <td><?php echo $view['name']?></td>
                        <td><?php echo $view['mo_no']?></td>
                        <?php }?>
                        
                    </tr>
                    
                </tbody>
            </table>
            <tr>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if ($page >1) {?> 
                        <!-- # code... -->
                        <li class="page-item"><a class="page-link" href="view.php?page_no=<?php echo($page-1)?>">Previous</a></li>
                    <?php  }?>

                    <?php for ($i=1; $i <$total ; $i++) { ?>
                        <!-- # code... -->
                        <li class="page-item"><a class="page-link" href="view.php?page_no=<?php echo $i;?>"><?php echo $i?></a></li>
                    <?php }?>
                    <?php if ($page < $total) {?>
                        <!-- # code... -->
                        <li class="page-item"><a class="page-link" href="view.php?page_no=<?php echo ($page + 1 )?>">Next</a></li>
                    <?php }?>
                </ul>
            </nav>
        </tr>
   <script src="../1/css/jquery-3.6.0.min.js"></script>
    <!-- <script src="../1/css/bootstrap.min.css"></script> -->
    <script src="../1/css/bootstrap.js"></script>
    <script>
        $(document).on("click","#sub",function(){
            // console.log(11);
            var cont= $("#info").serialize();
            $.ajax({
                type:"post",
                url:"ajex.php",
                data:cont,
                success:function(res)
                {
                    // $("#info").val();
                    $("#myModal").hide();
                    $(".modal-backdrop").remove();
                    document.getElementById("info").reset();
                }
            })
            
        })

            $(document).on("click","#view",function(){
                // $("#view_id").show();
            })
    </script>

</body>
</html>
