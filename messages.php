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


<div class="container" style="min-height: 70vh;">
  <h1 class="section_heading">Messages</h1>
<?php 
include './includes/connection.php';

if (!isset($_SESSION['id'])) {
  header('location:login.php');
}

$user_id = $_SESSION['id'];

?>
<?php 
$show_user_messages = "select * from sendermessages where userid = '$user_id'";
$user_messages_data = mysqli_query($con, $show_user_messages);
$msg_count = mysqli_num_rows($user_messages_data);
if($msg_count > 0){ ?>
  <table class="table">
    <thead class="" style="background: #001133; color: #fff;">
      <tr>
        <th>#</th>
        <th>Sender Name</th>
        <th>Sender Email</th>
        <th>Message</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i = 0;

while($user_messages_data_array = mysqli_fetch_array($user_messages_data)){ 
  $i++
  ?>

      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $user_messages_data_array['sendername']; ?></td>
        <td><?php echo $user_messages_data_array['senderemail']; ?></td>
        <td><?php echo $user_messages_data_array['message']; ?></td>
        <td><a href = "mailto: <?php echo $user_messages_data_array['senderemail']; ?>"><button class="btn btn-light">Reply</button></td></a>
      </tr>
    <?php } ?>
    </tbody>
  </table>

<?php }else{
  echo "No Messages Yet !";
}
?>
 
  
</div>

<?php include('./includes/footer.php'); ?>

</body>
</html>