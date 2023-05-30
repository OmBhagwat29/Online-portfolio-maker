<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online ME</title>
	<link rel="stylesheet" type="text/css" href="./styles/profile_section.css">
	<link rel="stylesheet" type="text/css" href="styles/profile_section.css">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar fixed-top navbar-expand-md navbar-light" style="background: #fff;">
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
      </li> -->

      
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
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap');

	.main{
		display: flex;
		padding: 100px 200px;
		/*background: #001133;*/

	}
.main .left{
	width: 70%;
}
	.main .left h1{
		font-size: 50px;
		font-family: 'DM Sans', sans-serif;
		font-weight: bold;
		color: #001133;
		padding-top: 35px;
	}

	.main .left h1 span{
		font-weight: 700 !important;
		color: #3399FF;
		
	}

	.main .left p{
		font-weight: bold;
		color: grey;
	}

	.main .right img{
		width: 650px;
		padding-left: 100px;

	}

	.main_btn{
		background: #3399FF;
		color: #fff;
		border-radius: 5px;
		padding: 10px 20px;
		border:  none;
		outline: none;
	}

	.count{
		display: flex;
		justify-content: space-around;
		width: 70%;
		margin: auto;
	}

	.count h3{
		width: 210px;
		border-bottom: 7px solid #3399FF;
		margin: auto;
		text-align: center;
		font-size: 50px;
		font-weight: bold;
	}

	.count h3 span{
		font-size: 20px;
		font-weight: normal;
		margin: 0px;
	position: relative;
	top: -20px;
	}

	.banner{
		width: 100%;
		padding: 100px 200px;
		background: rgb(51, 153, 255, 0.2);
		margin: 100px 0;
		text-align: center;
	}

	.banner h1, .about h1{
		font-weight: bold;
		font-family: 'DM Sans', sans-serif;
	}
	.banner h1 span, .about  h1 span{
		color: #3399FF;
	}
	.banner p, .about p{
		font-weight: bold;
		color: grey;
	}
	.about{
		text-align: center;
		width: 60%;
		margin: auto;
	}
</style>
<div class="main">
	<div class="left">
		<h1>Create Your <span>Virtual Existence in Online World</span> With Us</h1>
		<p>Create Your Free account and get started with your free portfolio</p>
		<a href="signup.php"><button class="main_btn">Get Started</button></a>
	</div>
	<div class="right">
		<img src="./images/undraw_Online_cv_re_gn0a.png">
	</div>
</div>

<div class="count">
	<h3>16+<br><span>Users registered</span></h3>
	<h3>12+<br><span>Portfolio Created</span></h3>
</div>


<div class="banner">
	<h1>Hello, Welcome to <span>OnlineME</span></h1>
	<p>Start your online Journey with us. Join us with complete free</p>
	<button class="main_btn">Sign Up Today</button>
</div>

<div class="about">
	<h1><span>Who</span> We Are ?</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>


<div class="footer_container">
  <div class="container footer">
    <img src="./images/OMe_footer.png">
    <span>
      <h4>Copyright @ 2022 OnlineMe - All rights reserved</h4>
    </span>
    <span>
        <i class="fa fa-facebook"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-youtube-play"></i>
    </span>
  </div>
</div>
</body>
</html>