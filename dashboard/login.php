<?php
require 'assets/includes/functions.php';
if(isset($_POST['login'])) {
  loginUser(); 
}

if(isset($_POST['signup'])) {
  registerUser();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <title id="title">User Login</title>
    <!--Favicon-->
    <link rel="icon" href="https://jstseguru.in/createch-webstars/assets/images/logo.png" />
  
</head>

<body>
  <section>
    <div class="container">

      <!--Login-->
      <div class="user signInBox">
        <div class="imgBox"><img src="assets/images/login.jpg" alt="login"></div>
        <div class="formBox" style="overflow-y: auto">
          <form action="" method="POST">
            <h2>Sign In</h2><br>
            <input type="email" name="email" placeholder="Email" required autocomplete="off" value="<?php echo isset($_POST['login']) && isset($_POST['email']) ? $_POST['email'] : null ?>" />
            <input type="password" name="password" placeholder="Password" required autocomplete="off" value="<?php echo isset($_POST['login']) && isset($_POST['password']) ? $_POST['password'] : null ?>" />
            <input type="submit" name="login" value="Login" />
            <p class="signup">Don't have an account? <a href="#" onclick="toggleForm('signup')">Signup here</a></p>
            <div class="errors">
              <small class="text-danger"><?php include('assets/includes/formErrors.php'); ?></small>
            </div>
          </form>
        </div>
      </div>
      <!--Signup-->
      <div class="user signupBox">
        <div class="formBox" style="overflow-y: auto">
          <form action="" method="POST" id="signupForm">
            <h2 class="title">Create an account</h2>
            <input type="text" name="name" placeholder="Name" required autocomplete="off" value="<?php echo isset($_POST['signup']) && isset($_POST['name']) ? $_POST['name'] : null ?>" />
            <input type="email" name="email" placeholder="Email" required autocomplete="off" value="<?php echo isset($_POST['signup']) && isset($_POST['email']) ? $_POST['email'] : null ?>" />
            <input type="text" class="mb-0" name="phone" id="phone" placeholder="Phone" required autocomplete="off" value="<?php echo isset($_POST['signup']) && isset($_POST['phone']) ? $_POST['phone'] : null ?>" />
            <small class="pt-0 mt-0"><a href="#" onclick='send_otp();'>Send OTP</a></small>
            <input type="text" name="otp" id="otp" placeholder="Enter OTP" required autocomplete="off" value="<?php echo isset($_POST['signup']) && isset($_POST['otp']) ? $_POST['otp'] : null ?>" />
            <input type="password" name="password" placeholder="Password" required autocomplete="off" value="<?php echo isset($_POST['signup']) && isset($_POST['password']) ? $_POST['password'] : null ?>" />
            <input type="submit" name="signup" value="Sign Up" />
            <p class="signup">Already have an account? <a href="#" onclick="toggleForm('')">Login here</a></p>
            <div class="errors">
              <small class="text-danger"><?php include('assets/includes/formErrors.php'); ?></small>
            </div>
          </form>
        </div>
        <div class="imgBox"><img src="assets/images/signup.jpg" alt="signup">
        </div>
      </div>
    </div>  
  </section>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>