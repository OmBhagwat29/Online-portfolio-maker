<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Personal website</title>
  <?php include('./includes/links.php'); ?>
<style type="text/css">
  
  .portfolio_link_success{
    background: rgb(57, 172, 57, 0.2);
    padding: 20px;
    border-radius: 5px;
    border: 2px solid rgb(57, 172, 57, 0.5);

  }

    .portfolio_link_success a{
      color: rgb(57, 172, 57);
    }

      .portfolio_link{
    background: rgb(255, 51, 0, 0.1);
    padding: 20px;
    border-radius: 5px;
    border: 2px solid rgb(255, 51, 0, 0.5);

  }

    .portfolio_link a{
      color: rgb(255, 51, 0);
    }

    .output_section{
      width: 100%;
      height: 300px;
      border: 3px solid #f2f2f2;
      border-radius: 5px;
    }

    .code_section{
      display: flex;
    }

    .code_section div{
      width: 33.3%;
      padding: 0px;
    }

    .code_section p{
      padding: 10px;
      font-style: bold;
      background: #4d4d4d;
      margin: 0px;
      color: #fff;

    }

    .code_section textarea{
      width: 100%;
      height: 300px;
      padding: 5px;
      box-sizing: border-box;
      background: #333333;
      color: #fff;
      border: none;
      outline: none;
      border: 1px solid #000;
    }
</style>
</head>
<body>

<?php include('./includes/navbar.php'); ?>


<div class="container">
<?php 
include './includes/connection.php';

if (!isset($_SESSION['id'])) {
  header('location:login.php');
}

$user_id = $_SESSION['id'];

$show_user_choices = "select * from userchoices where userid='$user_id'";
$user_choices_data = mysqli_query($con, $show_user_choices);
$user_choices_data_array = mysqli_fetch_array($user_choices_data);

$color = $user_choices_data_array['color'];
$theme = $user_choices_data_array['theme'];

?>
  <div class="row">
    <div class="col-sm">
     Current Theme
     <div class="theme" style=" <?php 
     if($theme=='light'){
      echo "background: #f2f2f2; color: $color";
     }else{
      echo "background: #333333;  color: $color";
     } ?> ;">abc</div>
    </div>
    <div class="col-sm">
    </div>
    <form class="col-sm" method="POST" style="display: flex; justify-content: space-between;">
      
      <div class="">
        <label for="usr">Color:</label>
        <input type="color" class="form-control" name="color" value="<?php echo $color; ?>" style="padding: 2px">
    </div>

 <div class="form-group">
  <label for="sel1">Select Theme:</label>
  <select class="form-control" name="theme" id="sel1" value="dark">
    <option value="light" <?php if($theme=='light'){ echo "selected"; }?>>Light</option>
    <option value="dark" <?php if($theme=='dark'){ echo "selected"; }?>>Dark</option>
  </select>
</div>
<div class="form-group" style="padding-top: 20px;">
  <button class="my_btn" name="theme_submit">Save</button>
</div>
</form>
    </div>
  </div>

</div>
<?php 


if(isset($_POST['theme_submit'])){

    $color = $_POST['color'];
     $theme = $_POST['theme'];
    
  $basic_info_update = "update userchoices set color = '$color', theme = '$theme' where userid = '$user_id'";
  $basic_info_update_query = mysqli_query($con, $basic_info_update);
  if($basic_info_update_query){
    
       ?>
                 <script type="text/javascript">
                     location.href = "user_profile.php";
                 </script>

               <?php
  }
}
?>

<div class="container">
  <?php 

include './includes/connection.php';
$user_id = $_SESSION['id'];
$show_user = "select * from users where id='$user_id'";
$user_data = mysqli_query($con, $show_user);
$user_data_array = mysqli_fetch_array($user_data);

if($user_data_array['fullname']=='' && $user_data_array['bio']==''){
  ?>
  <div class="portfolio_link">
  <a href="#">Fill Atleast 1st setions to get Portfolio link</a>
  </div>
  <?php
}else{
  ?>
<div class="portfolio_link_success">
  <a href="portfolio.php?user=<?php echo $user_data_array['username']?>">Your Portfolio is Activited Click here to view</a>
</div>

<?php
}
?>


<hr>
<style type="text/css">

  .profile_img{
    width: 270px;
    height: 200px;
    background: <?php echo $color ?>;
    margin-right: 50px;
  }

  .profile_img img{
    height: 100%;
    width: 100%;
  }

  .profile_img input{
    width: 30px;
    height: 30px;
    background: black;
    position: relative;
    top: -40px;
    left: 130px;
    z-index: 99;
    opacity: 0;
    cursor: pointer !important;
  }
.profile_img i{
  position: relative;
    top: -40px;
    left: 165px;
    background: rgba(0, 0, 0, 0.5);
    padding: 10px;
    cursor: pointer !important;
    border-radius: 5px;
}

.profile_img button{
  display: none;
  border-radius: 5px;
  position: relative;
  top: -76px;
  left: 210px;
  width: 35px;
    height: 36px;
    background: black;
    color: #fff;
}
</style>

<!-- # 1 Personal Information -->
<div class="container personal_info_container" id="personal-info">

   <h1 class="section_heading add_icon">Personal Information <a href="edit_personal_info.php">
    <?php if($user_data_array['fullname']==''){ 
      echo '<i class="fa fa-plus"></i>';
    }?>
  </a></h1>
  <div class="d-flex">
  <div class="profile_img">
    <img src="./upload/<?php echo $user_choices_data_array['profile_img'] ?>">
    <form method="POST" novalidate enctype="multipart/form-data">
      <i class="fa fa-pencil" style="color: #fff;"></i>
      <input type="file" name="profile_img" onclick="subOn()">
      <button id="sub_btn" name="profile_sub">>> </button>
    </form>
  </div>

  <script type="text/javascript">
    const subOn = () => {
      document.getElementById('sub_btn').style.display = "block";
    }
  </script>
  <?php 

         
         if(isset($_POST['profile_sub'])){
     
          $pimg = $_FILES['profile_img'];
         
 

            $p_filename = $pimg['name'];
            $p_filepath = $pimg['tmp_name'];
            $p_fileerror = $pimg['error'];
            if($p_fileerror ==0){ 

            $p_destfile = './upload/'.$p_filename;
            $r_destfile = './upload/'.$p_filename;
  

           move_uploaded_file($p_filepath,  $p_destfile);

          $p_insertquery = "update userchoices set profile_img = '$p_filename' where userid='$user_id'";
          $p_iquery = mysqli_query($con, $p_insertquery);

          if($p_iquery){
          ?>
          <script type="text/javascript">
                     location.href = "user_profile.php";
          </script>

          <?php
          }else{
            echo "string";
          }
      }
    }     
  ?>
 <div class="section_info">

    <span>
    <h3><?php echo $user_data_array['fullname']; ?></h3>
    <p><?php echo $user_data_array['bio']; ?></p>
    </span>
    <a href="edit_personal_info.php?id<?php echo $user_data_array['id']; ?>"><i class="fa fa-pencil"></i></a>
  </div>
  </div>
</div>

<hr>




<!-- # 2 Skills -->
<div class="container skills_container" id="skills">
  <h1 class="section_heading add_icon">Skills <a href="edit_skills.php"><i class="fa fa-plus"></i></a></h1>
<?php 
$show_user_skills = "select * from skills where userid = '$user_id'";
$user_skill_data = mysqli_query($con, $show_user_skills);
while($user_skill_data_array = mysqli_fetch_array($user_skill_data)){ ?>

    <h3 class="section_info"><?php echo $user_skill_data_array['skillname']; ?> 
    (<?php echo $user_skill_data_array['skillpercent']; ?>%)
    <a href="delete_skills.php?id=<?php echo $user_skill_data_array['id']; ?>"><i class="fa fa-minus"></i></a>
    </h3>

<?php } ?>
</div>

<hr>

<!-- # 3 Education -->
<div class="container education_container" id="education"> 

  <h1 class="section_heading add_icon">Education <a href="add_education.php"><i class="fa fa-plus"></i></a></h1>

<?php 
$show_user_education = "select * from education where userid = '$user_id'";
$user_education_data = mysqli_query($con, $show_user_education);
while($user_education_data_array = mysqli_fetch_array($user_education_data)){ ?>


  <div class="section_info">
    <span>
    <h3>
      <?php echo $user_education_data_array['schoolname']; ?> 
      (<?php echo $user_education_data_array['degree']; ?>)
      <i style="font-size: 12px;">

        <?php echo date("Y/m", strtotime($user_education_data_array['sdate'])); ?>-
        <?php echo date("Y/m", strtotime($user_education_data_array['edate'])); ?>
      </i>
    </h3>
    <p><?php echo $user_education_data_array['description']; ?></p>
    </span>
    <span>
      <a href="edit_education.php?id=<?php echo $user_education_data_array['id']; ?>"><i class="fa fa-pencil"></i></a>
       <a href="delete_education.php?id=<?php echo $user_education_data_array['id']; ?>"><i class="fa fa-minus"></i></a>
    </span>
    
  </div>

<?php } ?>


 
</div>

<hr>




<!-- # 4 Experience -->
<div class="container education_container" id="experience">

  <h1 class="section_heading add_icon">Experience <a href="add_experience.php"><i class="fa fa-plus"></i></a></h1>
<?php 
$show_user_experience = "select * from experience where userid = '$user_id'";
$user_experience_data = mysqli_query($con, $show_user_experience);
while($user_experience_data_array = mysqli_fetch_array($user_experience_data)){ ?>

  <div class="section_info">
    <span>
    <h3><?php echo $user_experience_data_array['companyname']; ?> (<?php echo $user_experience_data_array['position']; ?>)
    <i style="font-size: 12px;">
    <?php echo date("Y/m", strtotime($user_experience_data_array['sdate'])); ?>-
    <?php echo date("Y/m", strtotime($user_experience_data_array['edate'])); ?>
    </i>
    </h3>
    <p><?php echo $user_experience_data_array['description']; ?></p>
    </span>
   <span>
      <a href="edit_experience.php?id=<?php echo $user_experience_data_array['id']; ?>"><i class="fa fa-pencil"></i></a>
       <a href="delete_experience.php?id=<?php echo $user_experience_data_array['id']; ?>"><i class="fa fa-minus"></i></a>
    </span>
    
  </div>
<?php } ?>


</div>

<hr>




<!-- # 5 Projects -->
<div class="container education_container" id="project">

  <h1 class="section_heading add_icon">Projects <a href="add_project.php"><i class="fa fa-plus"></i></a></h1>
<?php 
$show_user_project = "select * from projects where userid = '$user_id'";
$user_project_data = mysqli_query($con, $show_user_project);
while($user_project_data_array = mysqli_fetch_array($user_project_data)){ ?>
  <div class="section_info">
    <span>
    <h3><?php echo $user_project_data_array['projecttitle']; ?> 
    <i style="font-size: 12px;"><?php echo $user_project_data_array['sdate']; ?> - <?php echo $user_project_data_array['edate']; ?> </i></h3>
    <p><?php echo $user_project_data_array['description']; ?> </p>
    <a href="<?php echo $user_project_data_array['projectlink']; ?>">Show project</a>
    </span>
    <span>
      <a href="edit_project.php?id=<?php echo $user_project_data_array['id']; ?>"><i class="fa fa-pencil"></i></a>
       <a href="delete_project.php?id=<?php echo $user_project_data_array['id']; ?>"><i class="fa fa-minus"></i></a>
    </span>
  </div>
<?php } ?>
</div>

<hr>



<!-- # 5 Resume -->
<div class="container education_container" id="resume">

  <h1 class="section_heading add_icon">Resume <a href="#"><i class="fa fa-plus"></i></a></h1>
<?php 
$show_user_resume = "select * from userchoices where userid = '$user_id'";
$user_resume_data = mysqli_query($con, $show_user_resume);
while($user_resume_data_array = mysqli_fetch_array($user_resume_data)){ ?>
  <div class="section_info">
    <span>
    <a href="<?php echo $user_resume_data_array['resume']; ?>"><h3>MyRemume.pdf</h3></a>
    </span>
    <i class="fa fa-minus"></i>
  </div>
<?php } ?>
<form action="" method="POST" novalidate enctype="multipart/form-data">
  <input type="file" name="resume" placeholder="resume" class="input">
  <button class="my_btn" name="resume_submit">Upload</button>
</form>
  
<?php 

if(isset($_POST['resume_submit'])){

 $resume = $_FILES['resume'];

 $p_filename = $resume['name'];
$p_filepath = $resume['tmp_name'];
  $p_fileerror = $resume['error'];
  if($p_fileerror ==0){ 

   $p_destfile = './upload/'.$p_filename;
  $r_destfile = './upload/'.$p_filename;
  

           move_uploaded_file($p_filepath,  $p_destfile);

          $p_insertquery = "update userchoices set resume = '$r_destfile' where userid = '$user_id'";
          $p_iquery = mysqli_query($con, $p_insertquery);

          if($p_iquery){
 ?>
                 <script type="text/javascript">
                     location.href = "user_profile.php";
                 </script>

               <?php

          }else{
            echo "string";
          }
        }  
    } 
?>
</div>

<hr>

<!-- # 5 Custom Code -->
<div class="container education_container" id="custom-code">

  <h1 class="section_heading">Custom Code</h1>
  <iframe id="output" class="output_section"></iframe>
  <form method="POST">
    <div class="code_section">
    <div>
      <p>HTML</p>
      <textarea id="html_code" name="html" oninput="run()">
        <?php echo $user_choices_data_array['html_code']; ?>
      </textarea>
    </div>
    <div>
      <p>CSS</p>
      <textarea id="css_code" name="css" oninput="run()">
        <?php echo $user_choices_data_array['css_code']; ?>
      </textarea>
    </div>
    <div>
      <p>JS</p>
      <textarea id="js_code" name="js" oninput="run()">
        <?php echo $user_choices_data_array['js_code']; ?>
      </textarea>
    </div>
  </div>
  <button class="my_btn" name="code_submit">Save</button>
</form>

  

</div>
<script type="text/javascript">
  run();
  function run(){
    let htmlCode = document.querySelector("#html_code").value;
    let cssCode = "<style>" + document.querySelector("#css_code").value + "</style>";
    let jsCode = "<scri" + "pt>" + document.querySelector("#js_code").value + "</scri" + "pt>";
    let frame = document.querySelector("#output").contentWindow.document;
    frame.open();
    frame.write(htmlCode + cssCode + jsCode);
    frame.close();

  }
</script>

<?php 


if(isset($_POST['code_submit'])){

    echo $html = $_POST['html'];
    echo $css = $_POST['css'];
    echo $js = $_POST['js'];

    $code = $html . "<style>" . $css . "</style>" . "<script>" . $js . "</script>";


  $user_code_update = "update userchoices set html_code = '$html', css_code = '$css', js_code = '$js' where userid = '$user_id'";
  $user_code_update_query = mysqli_query($con, $user_code_update);
  if($user_code_update_query){
    
      ?>
                 <script type="text/javascript">
                     location.href = "user_profile.php";
                 </script>

               <?php
  }
}
?>

</div>
<?php include('./includes/footer.php'); ?>

</body>
</html>