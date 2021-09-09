<?php
require 'assets/includes/functions.php';
$phone = $_POST['phone'];
$otp = rand(111111, 999999);
sendOTP($otp, $phone);
?>