<?php 

include './includes/connection.php';

$getUser = $_GET['user'];
$user = "select * from users where username='$getUser'";
$user_data = mysqli_query($con, $user);
$user_array = mysqli_fetch_array($user_data);


$user_id = $user_array['id'];
$show_user_choices = "select * from userchoices where userid='$user_id'";
$user_choices_data = mysqli_query($con, $show_user_choices);
$user_choices_data_array = mysqli_fetch_array($user_choices_data);

$color = $user_choices_data_array['color'];
$header = $user_choices_data_array['color']."40";
$theme; $theme_opposite; $theme_head;
if($user_choices_data_array['theme']=='light'){
  $theme = '#ffffff';
  $theme_opposite = "#00000090";
  $theme_head = "#000000";
}else{
  $theme = '#000000';
  $theme_opposite = "#ffffff90";
  $theme_head = "#ffffff";
}

?>


<?php 

$show_user = "select * from users where id='$user_id'";
$user_data = mysqli_query($con, $show_user);
$user_data_array = mysqli_fetch_array($user_data);

$logo_content = '';
$logo = explode(" ", $user_data_array['fullname']);

if(count($logo) >= 3){
$logo_content = $logo[0]." ".$logo[2];
}else{
  $logo_content = $logo[0];
} 
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Personal website</title>
  <link rel="shortcut icon" type="image/x-icon" href="./upload/<?php echo $user_choices_data_array['profile_img'] ?>">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">

  *{
    scroll-behavior: smooth !important;
  }


  :root{
  --mycolor:<?php echo $color; ?>;
  --myheader:<?php echo $header; ?>;
  --myback: <?php echo $theme; ?>;
  --thim: <?php echo $theme_opposite; ?>;
  --thimhead: <?php echo $theme_head; ?>;
}

#output{
  width: 100%;
  border: none;
  outline: none;
}

.navbar{
  background: <?php echo $theme; ?>;
  
}

.navbar ul a{
  color: <?php echo $theme_opposite; ?>;
}


  



}
</style>
<link rel="stylesheet" type="text/css" href="./styles/portfolio_section.css">

</head>
<body>



<nav class="navbar navbar-expand-md">
	<div class="container">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
    <h3><?php echo $logo_content; ?></h3>
  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#skills">Skills</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#education">Education</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#project">Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#experience">Experience</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#resume">Resume</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact Me</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<div class="main">
<style type="text/css">

  .image__section{
    margin: 20px auto !important;
    border-radius: 50%;
    width: 210px;
    height: 210px;
    margin: auto;
    padding: 5px;
    border: 5px solid var(--mycolor);
    
  } 

  .image__section img{
    border-radius: 50%;
    width: 100% !important;
     height: 100% !important;
    
  }

  .img_border{
    background: var(--mycolor);
     border-radius: 50%;
     width: 100% !important;
     height: 100% !important;


  }
</style>
	<div class="center">
    <p>Hello' I am</p>
   
    <div class="image__section">
       <div class="img_border">
      <img src="./upload/<?php echo $user_choices_data_array['profile_img'] ?>">
    </div>
    </div>
    <h1><?php echo $user_data_array['fullname']; ?></h1>
    <p><?php echo $user_data_array['bio']; ?></p>
    <button>Learn More</button>
    
  </div>
</div>

<?php     
$show_user_skills = "select * from skills where userid = '$user_id'";
$user_skill_data = mysqli_query($con, $show_user_skills);
echo $skill_count = mysqli_num_rows($user_skill_data);
if($skill_count > 0){


?>
<div class="skills" id="skills" style="margin-top: -100px">
  <h3 class="heading">My Skills</h3>
  <hr>
  <div class="container skills_container">
<?php
while($user_skill_data_array = mysqli_fetch_array($user_skill_data)){ ?>
      <div class="skill">
        <div class="skill_badge">
          <div class="sbar" style="width: <?php echo $user_skill_data_array['skillpercent']; ?>%">
            <span style="float: left;"><?php echo $user_skill_data_array['skillname']; ?></span><span style="float: right;"><?php echo $user_skill_data_array['skillpercent']; ?>%</span>
          </div>
        </div>
      </div>
<?php } ?>
      
  </div>
</div>
<?php } ?>



<?php 
$show_user_education = "select * from education where userid = '$user_id'";
$user_education_data = mysqli_query($con, $show_user_education);
$education_count = mysqli_num_rows($user_education_data);
if($education_count > 0){

?>
<div class="education">
  <h3 class="heading" id="education" style="margin-top: 150px;">My Education</h3>
  <hr>
  <div class="container skills_container">

<div class="container mt-5 mb-5" style="text-align: left; width: 100%;">
  <div class="row">
    <div class="col-md-12 offset-md-0">
      <ul class="timeline" >
<?php
while($user_education_data_array = mysqli_fetch_array($user_education_data)){ ?>

        <li>
          <h4 class="title"><?php echo $user_education_data_array['schoolname']; ?> <span> <?php echo substr($user_education_data_array['sdate'], 0, 7); ?>/ <?php echo substr($user_education_data_array['edate'], 0, 7); ?></span></h4>
          <p><?php echo $user_education_data_array['description']; ?></p><br>
        </li>

<?php } ?>
        
      </ul>
    </div>
  </div>
</div>


  </div>
</div>
<?php } ?>





<?php 
$show_user_education = "select * from experience where userid = '$user_id'";
$user_education_data = mysqli_query($con, $show_user_education);
$education_count = mysqli_num_rows($user_education_data);
if($education_count > 0){

?>
<div class="education">
  <h3 class="heading" id="experience" style="margin-top: 150px;">My Experience</h3>
  <hr>
  <div class="container skills_container">

<div class="container mt-5 mb-5" style="text-align: left; width: 100%;">
  <div class="row">
    <div class="col-md-12 offset-md-0">
      <ul class="timeline" >
<?php
while($user_education_data_array = mysqli_fetch_array($user_education_data)){ ?>

        <li>
          <h4 class="title"><?php echo $user_education_data_array['companyname']; ?> (<?php echo $user_education_data_array['position']; ?>)
            <span> <?php echo substr($user_education_data_array['sdate'], 0, 7); ?> /  <?php echo substr($user_education_data_array['edate'], 0, 7); ?></span>
          </h4>
          <p><?php echo $user_education_data_array['description']; ?></p><br>
        </li>

<?php } ?>
        
      </ul>
    </div>
  </div>
</div>


  </div>
</div>
<?php } ?>


    <?php 
$show_user_project = "select * from projects where userid = '$user_id'";
$user_project_data = mysqli_query($con, $show_user_project);
$project_count =  mysqli_num_rows($user_project_data);
if($project_count > 0){


?>
<div class="projects">
  <h3 class="heading" id="project" style="margin-top: 150px;">My Projects</h3>
  <hr>
  <div class="container skills_container">
<?php
while($user_project_data_array = mysqli_fetch_array($user_project_data)){ ?>
    <div class="pro">
      <div style="text-align: left;">
        <h4><?php echo $user_project_data_array['projecttitle']; ?> </h4>
        <p> <?php echo substr($user_project_data_array['sdate'], 0, 8); ?>/ <?php echo substr($user_project_data_array['edate'], 0, 8); ?></p>
        <p><?php echo $user_project_data_array['description']; ?> </p>
        <a href="<?php echo $user_project_data_array['projectlink']; ?> "><button>View Project</button></a>
      </div>
    </div>
<?php } ?>


  </div>
</div>
<?php } ?>
<!-- <div class="education">
  <h3 class="heading" style="margin-top: 150px;">My Experience</h3>
  <hr>
  <div class="container skills_container">

<div class="container mt-5 mb-5" style="text-align: left; width: 100%;">
  <div class="row">
    <div class="col-md-12 offset-md-0">
      <ul class="timeline" >
        <li>
          <h4 class="title">New Web Design <span>2022-2091</span></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
        </li>
        <li>
          <h4 class="title">New Web Design <span>2022-2091</span></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
        </li>
        
      </ul>
    </div>
  </div>
</div>
</div>
</div> -->
<div class="education">
  <?php 

  $show_user_choices = "select * from userchoices where userid='$user_id'";
$user_choices_data = mysqli_query($con, $show_user_choices);
$user_choices_data_array = mysqli_fetch_array($user_choices_data);
echo $user_choices_data_array['html_code']."<style>".$user_choices_data_array['css_code']."</style>"."<script>".$user_choices_data_array['js_code']."</script>";
?>

</div>

  </div>
</div>
<style type="text/css">
  .contact_form{
    width: 700px;
    margin:  auto;
  }

  .contact_form input, textarea{
    width: 100%;
    border: none;
    outline: none;
    background: <?php echo $user_choices_data_array['color'].'20'?> !important;
    border-radius: 5px;
    font-size: 18px;
    padding: 7px 20px;
    margin: 10px 0;
    border: 2px solid <?php echo $user_choices_data_array['color'].'50'?>;
  }

  textarea{
    border-radius: 5px;
  }

  .contact_form textarea::placeholder{
    color: <?php echo $user_choices_data_array['color'].'70'?>;
   }
   .contact_form input::placeholder{
    color: <?php echo $user_choices_data_array['color'].'70'?>;
   }

   @media(max-width:  560px){
     .contact_form{
    width: 90%;
    margin:  auto;
  }

}
  
</style>
<div>
 <h3 class="heading" id="contact" style="margin-top: 150px;">Contact Me</h3>
  <hr>
<div class="container contact_form">
  <form method="POST">
    <input type="text" name="sender_name" placeholder="Enter Name">
    <input type="email" name="sender_email" placeholder="Enter Email">
    <textarea name="message" rows="5" placeholder="Enter Message"></textarea>
    <button class="resume_btn" name="msg_submit"><i class="fa fa-send" style="color: #fff"></i> Send</button>
  </form>
</div>

<?php 
include './includes/connection.php';


if(isset($_POST['msg_submit'])){

    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $message = $_POST['message'];

  $send_message = "insert into sendermessages(userid, sendername, senderemail, message) values('$user_id', '$sender_name', '$sender_email', '$message')";
  $send_message_query = mysqli_query($con, $send_message);
  if($send_message_query){
    
    ?>
    <script type="text/javascript">
      const reloadUsingLocationHash = () => {
      window.location.hash = "reload";
    }
    window.onload = reloadUsingLocationHash();
    </script>

  <?php
  }
}
?>




</div>
<div class="container text-center" id="resume" style="margin-top: 150px">
  <?php 
$show_user_resume = "select * from userchoices where userid = '$user_id'";
$user_resume_data = mysqli_query($con, $show_user_resume);
while($user_resume_data_array = mysqli_fetch_array($user_resume_data)){ ?>
  <a href="<?php echo $user_resume_data_array['resume']; ?>" download><button class="resume_btn"> <i class="fa fa-download"></i> Download Resume</button></a>
<?php } ?>
</div>

<div class="footer">
  <p style="text-align: center;"><?php echo $user_data_array['email']; ?></p>

</div>
</body>
</html>