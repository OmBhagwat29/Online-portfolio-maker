<?php include './includes/connection.php' ?>
<?php 
session_start();
$project_id = $_GET['id'];


$delete_project_query =  "delete from projects where id = '$project_id'";
$delete_project = mysqli_query($con, $delete_project_query);
 if($delete_project){
 	$url=$_SERVER['HTTP_REFERER'];
    header("location:$url");
 }

?>