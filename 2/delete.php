  <?php
session_start();

$connect=mysqli_connect("localhost","root","","user_1");

$emp_id = $_GET['em_id'];
$user_id = $_SESSION['user_id'];

///// image delete query//
$image= "SELECT * FROM employee WHERE id='$emp_id'";

$img= mysqli_query($connect,$image);

$img_user= mysqli_fetch_assoc($img);

if (!isset($user_id)) {
    header('location:login.php');
  }

$qrt ="DELETE FROM employee WHERE id='$emp_id'";

$con=mysqli_query($connect,$qrt);
// image delete//

unlink('image/'.$image_user['image']);

header("location:view.php");

?>