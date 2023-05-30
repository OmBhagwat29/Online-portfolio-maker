<?php include './includes/connection.php' ?>
<?php 
session_start();
$exp_id = $_GET['id'];


$delete_experience_query =  "delete from experience where id = '$exp_id'";
$delete_experience = mysqli_query($con, $delete_experience_query);
 if($delete_experience){
 	$url=$_SERVER['HTTP_REFERER'];
    header("location:$url");
 }

?>