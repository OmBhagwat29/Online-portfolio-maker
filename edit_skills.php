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
	  	<h1 class="section_heading">Add New Skill</h1>
	 	<input type="text" name="skillname" placeholder="Your Skill" class="input">
	 	<select class="input" name="skillpercent">
	 		<option value="">Skill Level</option>
	 		<?php 
	 		for ($i=10; $i <= 100; $i=$i+10) { 
	 			?><option value="<?php echo $i; ?>"><?php echo $i; ?>%</option><?php
	 		}

	 		?>
	 		
	 	</select>
	  	<button class="my_btn" name="submit">Save</button>
  	</form>
</div>

<?php 
include './includes/connection.php';

$user_id = $_SESSION['id'];

if(isset($_POST['submit'])){

    echo $skill_name = $_POST['skillname'];
    echo $skill_percent = $_POST['skillpercent'];

	$basic_info_update = "insert into skills(skillname, skillpercent, userid) values('$skill_name', '$skill_percent', '$user_id')";
	$basic_info_update_query = mysqli_query($con, $basic_info_update);
	if($basic_info_update_query){
 		
    	header("location:user_profile.php");
 	}
}
?>

<?php include('./includes/footer.php'); ?>

</body>
</html>