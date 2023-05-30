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
$user_id = $_SESSION['id'];
$show_user = "select * from users where id='$user_id'";
$user_data = mysqli_query($con, $show_user);
$user_data_array = mysqli_fetch_array($user_data);
?>

<div class="container" style="min-height: 60vh;">
	<form method="POST">
	  	<h1 class="section_heading">Personal Information</h1>
	 	<input type="text" name="fullname" placeholder="Your Name" class="input" value="<?php echo $user_data_array['fullname']; ?>">
	 	<textarea  name="bio" placeholder="Your Bio" rows="5" class="input" value="<?php echo $user_data_array['bio']; ?>"><?php echo $user_data_array['bio']; ?></textarea>
	  	<button class="my_btn" name="submit">Save</button>
  	</form>
</div>

<?php 
include './includes/connection.php';



if(isset($_POST['submit'])){

    echo $fullname = $_POST['fullname'];
    echo $bio = $_POST['bio'];

	$basic_info_update = "update users set fullname = '$fullname', bio = '$bio' where id = '$user_id'";
	$basic_info_update_query = mysqli_query($con, $basic_info_update);
	if($basic_info_update_query){
 		
    	header("location:user_profile.php");
 	}
}
?>

<?php include('./includes/footer.php'); ?>

</body>
</html>