<?php 

$connect= mysqli_connect("localhost","root","","user_1");

$c_id=$_GET['c_id'];
$qry="SELECT * FROM states WHERE country_id='$c_id'";
$con = mysqli_query($connect,$qry);

?>
         <select name="" class="form-control">
            <option value="">select states</option>
            <?php foreach($con as $states){?>
            <option value="<?php echo$states['id'];?>"><?php echo$states['name'];?></option>
            <?php  } ?>
        </select>