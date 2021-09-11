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
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />
  <!--Favicon-->
  <link rel="icon" href="https://jstseguru.in/createch-webstars/assets/images/logo.png" />
  <title>User | Dashboard</title>
</head>
<nav class="py-3 bg-secondary">
  <center>
    <div><span class="text-white"><b>User Dashboard | Payment History</b></span></div>
  </center>
</nav>

<body class="bg-light">
  <div class="container mt-5">
    <div><a class="btn btn-sm btn-secondary" href="./" style="margin-right: 20px;">Dashboard</a><button class="btn btn-sm btn-danger" onclick="document.getElementById('logout-user-form').submit()">Logout</button></div>
    <form action="" method="POST" id="logout-user-form">
      <input type="hidden" name="logout" />
    </form>
    <div class="row justify-content-center">
      <div class="col-md-9 mt-5">
        <table id="paymentHistory" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Payment ID</th>
                <th>Category</th>
                <th>Payment Status</th>
                <th>Invoice</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $paymentDetails = userPayments();
                $i = 0;
                foreach($paymentDetails as $paymentDetail) {
                    $i++;
                    
                    //for payment status
                    if($paymentDetail['payment_status'] == 'incomplete') {
                        $payment_status = '<span class="text-danger"><svg style="width:24px;height:24px" class="error-icon " viewBox="0 0 24 24"><path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> Pending</span>';
                    } else {
                        $payment_status = '<span class="text-success"><svg style="width:24px;height:24px" class="error-icon" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" /></svg> Success</span>';
                    }
                    
                    //for payment id
                    if(empty($paymentDetail['payment_id'])) {
                        $paymentId = 'N/A';
                    } else {
                        $paymentId = $paymentDetail['payment_id'];
                    }
                    
                    //for invoice
                    if(empty($paymentDetail['invoice'])) {
                        $invoice = 'N/A';
                    } else {
                        $invoice = '<a target="_blank" href="https://jstseguru.in/createch-webstars/categories/assets/includes/invoice-uploads/'.$paymentDetail["invoice"].'"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M17,13L12,18L7,13H10V9H14V13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z" /></svg></a>';
                    }
            ?>    
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $paymentDetail['amount']; ?></td>
                <td><?php echo date('d M Y h:i:s', strtotime($paymentDetail['added_on'])); ?></td>
                <td><?php echo $paymentId; ?></td>
                <td><?php echo $paymentDetail['category']; ?></td>
                <td><?php echo $payment_status; ?></td>
                <td><?php echo $invoice; ?></td>
            </tr>
            <?php    }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Payment ID</th>
                <th>Category</th>
                <th>Payment Status</th>
                <th>Invoice</th>
            </tr>
        </tfoot>
    </table>
      </div>
    </div>
    <br><br>
  </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/js/script.js"></script>
  <script>
    $(document).ready(function() {
        $('#paymentHistory').DataTable();
    });
  </script>
</body>

</html>