<?php include './includes/connection.php' ?>
	<?php
        
       if(isset($_POST['submit'])){
       	$uname = $_POST['uname'];
       	$pass = $_POST['password'];

       	$email_search = "select * from users where username='$uname'";
       	$query = mysqli_query($con, $email_search);

       	$email_count = mysqli_num_rows($query);

       	if($email_count){
       		$email_pass = mysqli_fetch_assoc($query);
       		$db_pass = $email_pass['password'];

          $_SESSION['id'] = $email_pass['id'];
       		$_SESSION['email'] = $email_pass['email'];
          $_SESSION['status'] = $email_pass['status'];
          $_SESSION['uname'] = $email_pass['username'];

       		$pass_decode = password_verify($pass, $db_pass);

       		if($pass_decode){
              if ($email_pass['status'] === "1") {
       			      header('location:admin.php');
                  echo $email_pass['status'];
       		     }else{
              header('location:user_profile.php');
            }
       			
       		}else{
            echo "Incorrect password";
                }

       
       } else{
       		echo "Username not found";
       	}
    }
	?>