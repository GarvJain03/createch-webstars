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
  <meta name="google-signin-client_id" content="263427951317-rm379tpait7henf0au7speh78li467sc.apps.googleusercontent.com" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <title id="title">User Login</title>

  <!--Google OAuth-->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>
  <section>
    <div class="container">

      <!--Login-->
      <div class="user signInBox">
        <div class="imgBox"><img src="assets/images/login.jpg" alt="login"></div>
        <div class="formBox">
          <form action="" method="POST">
            <h2>Sign In Using</h2><br>
            <div class="flex">
              <div class="col">
                <a onclick="fbLogin()" class="btn btn-primary">
                   <svg style="width:20px;height:25px" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" /></svg> Facebook
                </a>
              </div>
              <div class="col">
                <div class="g-signin2" data-onsuccess="googleLogin"></div>
              </div>
            </div>
            <div class="section-divider my-3">
              <span class="section-divider__title">OR</span>
            </div>
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
        <div class="formBox">
          <form action="" method="POST" id="signupForm">
            <h2>Create an account</h2>
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