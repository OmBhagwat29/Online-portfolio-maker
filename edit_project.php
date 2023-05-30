<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Personal website</title>
  <?php include('./includes/links.php'); ?>

</head>
<body>

<?php include('./includes/navbar.php'); ?>
<?php 

include './includes/connection.php';
$project_id = $_GET['id'];
$user_id = $_SESSION['id'];
$show_project = "select * from projects where id='$project_id' and userid='$user_id'";
$project_data = mysqli_query($con, $show_project);
$project_data_array = mysqli_fetch_array($project_data);

?>

<div class="container" style="min-height: 60vh;">
	<form method="POST">
	  	<h1 class="section_heading">Edit Education</h1>
	 		<input type="text" placeholder="Project Title" name="projecttitle" value="<?php echo $project_data_array['projecttitle']; ?>" class="input">
		  <div class="d-flex">
			    <input type="text" placeholder="Project Link" name="projectlink" value="<?php echo $project_data_array['projectlink']; ?>" class="input" style="width: 50%">
			    <div style="display:  flex; justify-content: space-between;">
			      <input type="date" name="startdate" class="input" value="<?php echo $project_data_array['sdate']; ?>">
			      <input type="date" name="enddate" value="<?php echo $project_data_array['edate']; ?>" class="input">
			    </div>
		  </div>
   		<textarea class="input" name="description" placeholder="Description" value='<?php echo $project_data_array['description']; ?>'>
   			<?php echo $project_data_array['description']; ?>
   		</textarea>
  		<button class="my_btn" name="submit">Save</button>
  	</form>
</div>

<?php 
include './includes/connection.php';

$user_id = $_SESSION['id'];

if(isset($_POST['submit'])){

     echo $project_title = $_POST['projecttitle'];
    echo $project_link = $_POST['projectlink'];
    echo $description = $_POST['description'];
    echo $startdate = $_POST['startdate'];
    echo $enddate = $_POST['enddate'];

	$basic_info_update = "update projects set projecttitle = '$project_title', projectlink = '$project_link', description = '$description', sdate = '$startdate', edate = '$enddate' where id = '$project_id'";
	$basic_info_update_query = mysqli_query($con, $basic_info_update);
	if($basic_info_update_query){
 		
    	header("location:user_profile.php");
 	}
}
?>

<?php include('./includes/footer.php'); ?>

</body>
</html>