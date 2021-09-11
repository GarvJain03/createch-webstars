<?php
include 'assets/includes/functions.php';
isAuthenicated();
if(isset($_POST['logout'])) {
    logout();
}

if(isset($_POST['update'])) {
    updateProfile();
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
  <!--Favicon-->
  <link rel="icon" href="https://jstseguru.in/createch-webstars/assets/images/logo.png" />
  <title>User | Dashboard</title>
</head>
<nav class="py-3 bg-secondary">
  <center>
    <div><span class="text-white"><b>USER DASHBOARD</b></span></div>
  </center>
</nav>

<body class="bg-light">
  <div class="container mt-5">
    <div><a class="btn btn-sm btn-secondary" href="payment-history.php" style="margin-right: 20px;">Payment History</a><button class="btn btn-sm btn-danger" onclick="document.getElementById('logout-user-form').submit()">Logout</button></div>
    <form action="" method="POST" id="logout-user-form">
      <input type="hidden" name="logout" />
    </form>
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="profile-page pt-5">
          <form action="" method="POST">
            <?php
                $userDetails = userProfile();
                foreach($userDetails as $userDetail) {
            ?>
            <div class="mb-4">
              <label class="form-label">Phone Number</label>
              <input type="text" class="form-control" disabled value="<?php echo $userDetail['phone'] ?>" />
            </div>
            
            <div class="mb-4">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" value="<?php echo $userDetail['email']; ?>" />
            </div>

            <div class="mb-4">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" name="name" value="<?php echo $userDetail['name']; ?>" />
            </div>

            <div class="mb-4">
              <label class="form-label">Age</label>
              <input type="text" name="age" class="form-control" value="<?php echo $userDetail['age']; ?>" />
            </div>
            <span class="text-danger"><?php include('assets/includes/formErrors.php'); ?></span>
            <?php }
            ?>
        </div>
        <br>
        <button type="submit" name="update" class="btn btn-primary">Update Profile</button>
        </form>
      </div>
    </div>
    <br><br>
  </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>