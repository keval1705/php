<?php

$connect= mysqli_connect("localhost","root","","user");

    if (isset($_POST['countries'])) {
            # code...
        $country= $_POST['countries'];
        
        $query= "INSERT INTO country (`name`) VALUES ('$country')";
        
        // echo ($query);
        
        $con = mysqli_query($connect,$query);
      }


      $connect= mysqli_connect("localhost","root","","user");
      
      $query= "SELECT * FROM country";
      
      $xcon=mysqli_query($connect,$query);
      
      $view= mysqli_fetch_assoc($xcon);

      // /////////////

      $connect=mysqli_connect("localhost","root","","user");

      if (isset($_POST['states'])) {
      $states= $_POST['states'];
      $sname=$_POST['cname'];
      $state= "INSERT INTO states (`name`,`country_id`) VALUES ('$states','$sname')";
      $con = mysqli_query($connect,$state);
      
    }
    $connect= mysqli_connect("localhost","root","","user");
      
    $query= "SELECT * FROM states";
      
    $scon=mysqli_query($connect,$query);

    $view=mysqli_fetch_assoc($scon);
      
    
//////////////////////////////////////////////////

    if(isset($_POST['city'])){
      $city=$_POST['city'];
      $cname=$_POST['sname'];
      $city="INSERT INTO city (`name`, `state_id`) VALUES('$city','$cname')";
      $con=mysqli_query($connect,$city);

    }
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .btn{
        width: 151px;
    }
  </style>
</head>
<body>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="container">
  <!-- <h2>Modal Ex</h2> -->
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin:10px; float:center;">Select Country</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">select country</h4>
        </div>
        
        <form method="POST">
        <div class="modal-body">
                <h2>Select country.</h2>
                <input type="text" class="form-control" id="countries" name="countries">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" >Submit</button>
                
            </div>
        </form>
        </div>
      
    </div>
  </div>
  
</div>

<!-- ////////////////////////////////////////////////////////////////////////////////// -->
<div class="container">
  <!-- <h2>Modal Ex</h2> -->
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#state_modal" style="margin:10px; float:center;">Select States</button>

  <!-- Modal -->
  <div class="modal fade" id="state_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">select states</h4>
        </div>
        <form method="POST">
        <div class="modal-body">
          <!-- <p>Some text in the modal.</p> -->
          <h2>selcte country</h2>
          <select name="cname" class="form-control country">
            <option value="">select country</option>
          <?php foreach($xcon as $country){?>
            <option value="<?php echo$country['id']?>"><?php echo$country['name']?></option>
            
            <?php }?>
          </select>

          <h2>selcte state</h2>

            <input type="text" class="form-control" id="state" name="states">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>

</div>
  
  <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div class="container">
  <!-- <h2>Modal Ex</h2> -->
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#city_modal" style="margin:10px; float:center;">Select City</button>

  <!-- Modal -->
  <div class="modal fade" id="city_modal" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">select city</h4>
        </div>
        <form method="POST">
        <div class="modal-body">
          <!-- <p>Some text in the modal.</p> -->
          <h2>Select country</h2>
          <select name="cname" class="form-control country">
            <option value="">select country</option>
          <?php foreach($xcon as $country){?>
            <option value="<?php echo$country['id']?>"><?php echo$country['name']?></option>
            
            <?php }?>
          </select>
          <h2>selcte state</h2>
          <select name="sname" class="form-control country">
            <option value="">select country</option>
            <?php foreach($scon as $state){?>
            <option value="<?php echo$state['id']?>"><?php echo$state['name']?></option>
            
            <?php }?>
          </select>



            <h2>selcte city</h2>
            <input type="text" class="form-control" id="" name="city" placeholder="Please Enter a city Name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="" class="btn btn-success">Submit</button>
            <!-- <button type="submit" class="btn btn-success">Submit</button> -->
          </div>
        </div>
      </form>
      
    </div>
  </div>
  
</div>

</body>
</html>
