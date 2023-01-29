<?php

$connect= mysqli_connect("localhost","root","","user_1");
if(isset($_GET['text'])){
    $text = $_GET['text'];    
}
    $qry = "SELECT * FROM employee WHERE (user_name LIKE '%$text%') OR (gender LIKE = '%$text%') OR (email LIKE '%$text%')";
    
    $con = mysqli_query($connect,$qry);
    
     $row = mysqli_num_rows($con);
 
    $fetch = mysqli_fetch_all($con);
    
    
    foreach($con as $key=> $employee){?>
    <tr>
        <td><?php echo ++$key?></td>
        <td><?php echo $employee['id']?></td>
        <td><?php echo $employee['user_name']?></td>
        <td><?php echo $employee['gender']?></td>
        <td><?php echo $employee['email']?></td>
        <td><?php echo $employee['password']?></td>
        
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
  