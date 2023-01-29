<?php
session_start();

  $connect=mysqli_connect("localhost","root","","user_1");

  $user_id = $_SESSION['user_id'];

  $user_get= "SELECT * FROM employee WHERE id='$user_id'";

  $user_qry = mysqli_query($connect,$user_get);

  $user_con = mysqli_fetch_assoc($user_qry);

  $page = 1;

  if (isset($_GET['page_no'])) {
      $page= $_GET['page_no'];
  }
  $page_q= $page * 5 - 5;

  if (!isset($user_id)) {
    header('location:index.php');
  }

//paginestion//
$qry="SELECT * FROM employee LIMIT $page_q,5";

// if(isset($_GET['search'])){
//   $search=$_GET['search'];
//   $qry="SELECT * FROM employee WHERE (user_name LIKE '%$search%') OR (gender LIKE '$search') \OR (email LIKE '$search')";
// }

$limit= mysqli_query($connect,$qry);

$quey="SELECT * FROM employee";

$con=mysqli_query($connect,$quey);

$row= mysqli_num_rows($con);

// echo $row;

$total= ceil($row/5);
echo $total
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
  <!-- <table class="table table-active">
    <thead>
      <tr>
        <td>id</td>
        <td>user_name</td>
        <td>gender</td>
        <td>email</td>
        
      </tr>
    </thead>
    <tbody>
      <td><?php echo $user_con['id']?></td>
      <td><?php echo $user_con['user_name']?></td>
      <td><?php echo $user_con['gender']?></td>
      <td><?php echo $user_con['email']?></td>
    </tbody>
  </table> -->

  <a href="logout.php">
    
    <button class="btn btn-warning "style= "float:right; margin:10px;">Logout</button>
  </a>
  <a href="edit.php?em_id=<?php echo $user_id;?>">
    
    <button class="btn btn-info" style="margin: 10px;float:right;">Edit</button>
  </a>
  <div>
    <form action="">
      <input type="text" placeholder="search in data" name=search id="finddd">
        <!-- <button class="btn btn-success" style="justify-content: center;">submit</button> -->
    </form>
  </div>

      
  <table class="table table-success">
    <thead>
      <tr>
                <td>index</td>
                <td>id</td>
                <td>user_name</td>
                <td>gender</td>
                <td>email</td>
                <td>password</td>
                <td>image</td>
                <td>action</td>
            </tr>    

        </thead> 
        <tbody class="ttbody">
          <?php foreach($limit as $key=> $employee){?>
            <tr>
              <td><?php echo ++$key?></td>
              <td><?php echo $employee['id']?></td>
              <td><?php echo $employee['user_name']?></td>
              <td><?php echo $employee['gender']?></td>
              <td><?php echo $employee['email']?></td>
              <td><?php echo $employee['password']?></td>
              <td> 

                  <?php if ($employee['image']== "" || $employee['image']==null) {?>
                    <img src="image/defalut.jpg" height="100px" width="100px" >
                  <?php } else {?>
                    <img src="image/<?php echo $employee['image'];?>" height="100px" width="100px">
                 <?php }?>
              </td>
              
              <td>
                
                <a href="edit.php?em_id=<?php echo $employee['id']?>">
                  
                  <button class="btn btn-primary" id="edit">edit</button>
                </a>
                
                <!-- <a href="delete.php?em_id=<?php echo $employee['id']?>"> -->
                  <!-- <button class="btn btn-success" id="delete">delete</button> -->
                  <button type="button" class="btn btn-danger"  id="delete"  data-user_id="<?php echo $employee['id']?>">Delete</button>
                </a>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <div>

  <nav aria-label="Page navigation example">
  <ul class="pagination">
    
    
                 
    <?php if ($page>1) {?>
      <!-- #  ($page !==1)code... -->
    
    <li class="page-item"><a class="page-link" href="view.php?page_no=<?php echo ($page-1)?>">Previous</a></li>
      
    <?php }?>
    <?php for ($i=1; $i <= $total; $i++) { ?>
      <li class="page-item"><a class="page-link" href="view.php?page_no=<?php echo $i;?>"><?php echo $i;?></a></li>
     <?php }?>
 
     <?php if ($page < $total) {?>
      <!-- # ($page==$total)code... -->
      <li class="page-item"><a class="page-link" href="view.php?page_no=<?php echo ($page+1)?>">Next</a></li>
     <?php }?>
  </ul>
</nav>

    <div class="container">
  <!-- Button to Open the Modal
  <button type="button" class="btn btn-primary" data-toggle="#delete" data-target="#delete">
    Open modal
  </button> -->

  <!-- The Modal -->
  <div class="modal" id="deleteEmp">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">are you sure went to delete data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <input type="text" id="error" hidden>
        </div>
        
       
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <!-- <a href="delete.php?em_id=<?php echo $employee['id']?>"> -->
          <button type="button" class="btn btn-danger" id="yes">yes</button>
          <!-- </a> -->
          <button type="button" class="btn btn-success" data-dismiss="modal">no</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info "  id="add" data-toggle="modal" data-target="#myModal">Add</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Form</h4>
      </div>

      <div class="modal-body">
      <form method="POST" id="data">

    <div class="container">
    <div class="form-group">
      <h1>User Details</h1>
    </div>
    <div class="form-group">
      <label for="user_name">user_name:</label>
      <input type="text" class="form-control" id="user_name" placeholder="Enter user_name" name="user_name">
    </div>
    <div class="form-group">
      <label for=last_name>Gender:</label>
      <input type="radio" value="male" name="gender">Male
      <input type="radio" value="female" name="gender">Female
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <!-- <a href="view.php"> -->
      <a  class="btn btn-success" id="submit">Submit</a>
    <!-- </a> -->
    
    <button type="Reset" class="btn btn-info" name="reset">reset</button>
      <a href="index.php" class="btn btn-link">Login user</a>
  </form>
</form>
</div>
<div id="result"></div>

      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div> -->


    <script src="css/jquery-3.6.0.min.js"></script>

    <script src="css/bootstrap.min2.js"></script>

    <script>
    //     $(document).on("click","#delete",function(){
    //         var a=confirm("are you want to delete to data");

    //         if (!a) {
    //             return(a);
    //         }
    // })

            $(document).on("click","#delete",function(){
            var user= $(this).data('user_id');
            console.log(user);
            $(document).find("#error").val(user);
            $("#deleteEmp").modal();
          })
          $(document).on("click","#yes",function(){
            var user=$(document).find("#error").val();
            location.href="delete.php?em_id="+user;
          })


        // $(document).on("click","#submit",function(){
        //   // console.log(11);
        //   var from = $("#data").serialize();
        //   $.ajax({
        //     type: "post",
        //     url:"ajex.php",
        //     data:from,
        //     success:function(res){
        //       if (res==1) {
        //         var first_name= $("#user_name").val;
        //         var append=
        //         '<tr class="table table-stripped">'+
        //         '<td>'+'first_name' +'</td>'+

        //         '</tr>'
        //         console.log(11);
        //         $('.modal-body').append();

        //       }
        //     }
        //   })
        // })

        $("#finddd").keyup(function(){
          var text=$(this).val();
          console.log(text);
          $.ajax({
            type:'get',
            url:"search.php",
            data:{text:text},
            success:function(res){
              $(".ttbody").html(res);
            }
          })
        })

          
        
    </script>
</body>
</html>