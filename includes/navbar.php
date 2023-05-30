<?php 
session_start();
?>

<?php 
include('connection.php');
if(isset($_SESSION['id'])){
  $user_id = $_SESSION['id'];
}else{
  $user_id = 0;
}


$show_user_messages = "select * from sendermessages where userid = '$user_id'";
$user_messages_data = mysqli_query($con, $show_user_messages);
$msg_count = mysqli_num_rows($user_messages_data);
?>

<?php 
if (isset($_SESSION['id'])) {
 ?>

<nav class="navbar navbar-expand-md navbar-light">
  <div class="container">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
   <img src="./images/OMe.png">
  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      

      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Edit Details
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#personal-info">Personal Information</a>
        <a class="dropdown-item" href="#skills">Skills</a>
        <a class="dropdown-item" href="#education">Education</a>
        <a class="dropdown-item" href="#experience">Experience</a>
        <a class="dropdown-item" href="#project">Project</a>
        <a class="dropdown-item" href="#custom-code">Custom Code</a>
      </div>
    </li>

      <li class="nav-item">
        <a class="nav-link" href="messages.php">Messages
          <?php if($msg_count>0){ echo '<div class="message_present"></div>';}?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./scripts/logout_script.php">Logout</a>
      </li>
    </ul>
  </div>
  </div>
</nav><?php

}else{
  ?>

<nav class="navbar navbar-expand-md navbar-light" style="background: #fff;">
  <div class="container">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
   <img src="./images/OMe.png">
  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item">
        <a class="nav-link" href="about.html">About</a>
      </li>
 -->
      
<li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
      </li>
      
      <li class="nav-item">
       <a href="signup.php"><button class="main_btn">Sign Up</button></a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<?php
}

?>

<style type="text/css">
    .main_btn{
    background: #3399FF;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;
    border:  none;
    outline: none;
  }

</style>