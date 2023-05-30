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


<div class="container" style="min-height: 60vh;">
	<form method="POST">
	  	<h1 class="section_heading">Add New Experience</h1>
	 		<input type="text" placeholder="Company Name" name="companyname" class="input">
		  <div class="d-flex">
			    <input type="text" placeholder="Position" name="position" class="input" style="width: 50%">
			    <div style="display:  flex; justify-content: space-between;">
			      <input type="date" name="startdate" class="input">
			      <input type="date" name="enddate" class="input">
			    </div>
		  </div>
   		<textarea class="input" name="description" placeholder="Description"></textarea>
  		<button class="my_btn" name="submit">Save</button>
  	</form>
</div>

<?php 
include './includes/connection.php';

$user_id = $_SESSION['id'];

if(isset($_POST['submit'])){

    echo $company_name = $_POST['companyname'];
    echo $position = $_POST['position'];
    echo $description = $_POST['description'];
    echo $startdate = $_POST['startdate'];
    echo $enddate = $_POST['enddate'];

	$basic_info_update = "insert into experience(userid, companyname, position, description, sdate, edate) values('$user_id', '$company_name', '$position', '$description', ' $startdate', '$enddate')";
	$basic_info_update_query = mysqli_query($con, $basic_info_update);
	if($basic_info_update_query){
 		
    	header("location:user_profile.php");
 	}
}
?>

<?php include('./includes/footer.php'); ?>

</body>
</html>