<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>CorsTech | Payment - CorsView</title>
    <!--Favicon-->
    <link rel="icon" href="https://jstseguru.in/createch-webstars/assets/images/logo.png" />
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-4 mt-2">
                    <img src="assets/images/payments.svg" alt="img" width="100%">
                </div>
                <div class="col-md-8 mt-3">
                    <h2>Cors View</h2>
                    <div class="pricing-cut">
                        <p class="text-danger">Actual Price</p>
                        <h3 class="text-danger">Rs 36000.00</h3>
                    </div><br>
                    <div class="pricing">
                        <p class="text-success">Offer Price</p>
                        <h3 class="text-success">Rs 24000.00</h3>
                    </div>
                    <hr>
                    <div class="calculation">
                        <div class="text">Sub Total</div>
                        <div class="amount">Rs. 24000.00</div>
                    </div><br>
                    <div class="calculation">
                        <div class="text">Tax (18%)</div>
                        <div class="amount">Rs. 4320.00</div>
                    </div><br>
                    <div class="calculation">
                        <div class="text">Discount</div>
                        <div class="amount">N/A</div>
                    </div><br>
                    <div class="calculation">
                        <div class="text">Total Amount</div>
                        <div class="amount">Rs. 28320.00</div>
                    </div><br>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="terms" id="termsCheckbox">
                        <label class="form-check-label">I agree to the terms and conditions and Annexure-A of
                            spacewell</label>
                    </div>
                    <br><br>
                    <center><button class="btn btn-theme-secondary btn-block" id="rzp-button">Pay Now</button></center>
                </div>
            </div>
        </div>
    </div>
    
    <!--Login Modal-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="loginForm">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Login before payment</h5>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <input type="email" id="email" class="form-control" name="email" placeholder="Enter email">
                <small class="form-text text-muted">Enter your registered email here</small>
              </div>
              <div class="form-group">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                <small class="form-text text-muted">Enter your password here</small>
              </div>
              <br>
              <a href="../dashboard/login.php">Not registered? Click here to signup</a>
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success">Login</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <input type="hidden" id="company_name" value="CorsView" />
    <input type="hidden" id="amount" value="2832000" />
    <input type="hidden" id="product_desc" value="Corsview is a 2-week trip where we will get to know about the space and do fun activities." />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!--<script src="assets/js/script.js"></script>-->
    <?php include('assets/js/script.php'); ?>
</body>


</html>