<?php

$connect = mysqli_connect("localhost","root","","user_1");

$s_id=$_GET['s_id'];


$qry= "SELECT * FROM city WHERE state_id='$s_id'";

$con= mysqli_query($connect,$qry);

?>

         <select name="" class="form-control ">
          <option value="">select city</option>
          <?php foreach($con as $citi){?>
            <option value="<?php echo $citi['id']?>"><?php echo $citi['name']?></option>
            <?php }?>
        </select>