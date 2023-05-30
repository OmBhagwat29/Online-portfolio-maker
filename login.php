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

<div class="container  login_container" style="min-height: 60vh;">

<div class="container">
<h1 class="section_heading">Login</h1>
<p style="color: red;"><?php include('./scripts/login_script.php') ?></p>
<hr>

  <form action="" method="POST" class="needs-validation" novalidate>
  <div class="form-group">
    <input type="text" class="form-control input" placeholder="Enter username" name="uname" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Username is Required for Registration.</div>
  </div>


  <div class="form-group">
    <input type="password" class="form-control input" placeholder="Enter password" name="password" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Password is Required for Registration.</div>
  </div>

  <button type="submit" name="submit" class="my_btn">Login</button>
</form>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


</div>

<hr>
<p>Don't Have an Account ? <a href="signup.php">Sign Up</a></p>


</div>


  
<?php include('./includes/footer.php'); ?>
</body>
</html>