<?php
 $connect=mysqli_connect("localhost","root","","user_1");

 $query= "SELECT * FROM  countries";

 $con = mysqli_query($connect,$query);
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>user details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="../1/css/bootstrap.min.css"> -->
</head>
<body>



<form method="horizontal">

<div class="container">
    <div class="form-group">
      <!-- <h1>Registrar to Form</h1> -->
    </div>
    <div class="form-group">
      <label class="control-label"for="select country">select country:</label><br>
      <div class="col-sm-10">
        <select name="country" class="form-control country">
          <option value="">select country</option>
          <?php foreach($con as $country){?>
          <option value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>
          <?php }?>
        </select>
      </div>
    </div><br>

    <div class="form-group">
      <label class="control-label"for="select states">select states:</label><br>
      <div class="col-sm-10" >
        <select name="" class="form-control " id="state">
          <option value="">select states</option>
        </select>
      </div>
    </div><br>

    <div class="form-group">
      <label class="control-label"for="select city">select city:</label><br>
      <div class="col-sm-10"id="city">
        <select name="" class="form-control ">
          <option value="">select city</option>
        </select>
      </div>
    </div>

  </form>
</form>
</div>

<script src="../2/css/jquery-3.6.0.min.js"></script>

<script src="../2/css/bootstrap.min2.js"></script>

<script>

  $(document).on("change",".country",function(){
    console.log(111);
    var c_id =$(this).val();
    $.ajax({
      type:'get',
      url:'state.php',
      data:{c_id:c_id},
      success:function(res)
      {
          $("#state").html(res);
      }
    })
  })

  $(document).on("click","#state",function(){
    // console.log(1111);
    var s_id = $(this).val();
    console.log(s_id);
    $.ajax({
      type:'get',
      url:'city.php',
      data:{s_id:s_id},
      success:function(res)
      {
        $("#city").html(res);
      }
    })
  })
</script>

</body>
</html>
