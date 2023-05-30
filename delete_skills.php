<?php include './includes/connection.php' ?>
<?php 
session_start();
$skill_id = $_GET['id'];


$delete_skill_query =  "delete from skills where id = '$skill_id'";
 $delete_skill = mysqli_query($con, $delete_skill_query);
 if($delete_skill){
 	$url=$_SERVER['HTTP_REFERER'];
    header("location:$url");
 }

?>