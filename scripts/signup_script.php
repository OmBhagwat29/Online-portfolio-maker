<?php 


         include("./includes/connection.php");

         if(isset($_POST['submit'])){

         	$uname = $_POST['uname'];
         	$email = $_POST['email'];
         	$pass = $_POST['password'];
            $status = "0";

         	$password = password_hash($pass, PASSWORD_BCRYPT);

         	$emailquery = "select * from users where username = '$uname'";
         	$query = mysqli_query($con, $emailquery);
         	$emailcount = mysqli_num_rows($query);

         	if($emailcount>0){
         		echo "User Already Exists";
         	}else{
         		$insertquery = "insert into users(username, email, password, status) values('$uname', '$email', '$password', '$status')";
         		$iquery = mysqli_query($con, $insertquery);

               $max_id_query = "select * from users where id = (select max(id) from users)";
               $max_id_query = mysqli_query($con, $max_id_query);
               $max_data_array = mysqli_fetch_array($max_id_query);
               $user_id =  $max_data_array['id'];


               $iq = "insert into userchoices(userid, theme, color, profile_img) values('$user_id', 'light', '#3399ff', 'avatar.png')";
               $query = mysqli_query($con, $iq);
       
         		if($iquery){
        
                  header('location:login.php');
         		}
         	}
         }
	?>