<?php include './includes/connection.php' ?>
<?php 
session_start();
$edu_id = $_GET['id'];


$delete_education_query =  "delete from education where id = '$edu_id'";
$delete_education = mysqli_query($con, $delete_education_query);
 if($delete_education){
 	$url=$_SERVER['HTTP_REFERER'];
    header("location:$url");
 }

?>