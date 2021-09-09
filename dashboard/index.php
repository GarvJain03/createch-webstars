<?php
include 'assets/includes/functions.php';
isAuthenicated();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>User | Dashboard</title>
</head>
<nav class="py-3 bg-secondary">
  <center>
    <div><span>USER DASHBOARD</span></div>
  </center>
</nav>

<body class="bg-light">
  <div class="container mt-5">
    <div><a class="btn btn-sm btn-secondary" href="../categories/fewnj37" style="margin-right: 20px;">Book
        Tickets</a><button class="btn btn-sm btn-danger" onclick="">Logout</button></div>
    <form action="" method="POST" id="logout-user-form">
      <input type="hidden" name="logout" />
    </form>
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="profile-page pt-5">
          <form action="" method="POST">

            <div class="mb-4">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" disabled value="" />
            </div>

            <div class="mb-4">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter your name" />
            </div>

            <div class="mb-4">
              <label class="form-label">Phone Number</label>
              <input type="text" class="form-control" placeholder="Enter 10 digit mobile number" />
            </div>

            <div class="mb-4">
              <label class="form-label">Age</label>
              <input type="text" class="form-control" placeholder="Enter your age" />
            </div>

        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    <br><br>
  </div>
  </div>
</body>

</html>