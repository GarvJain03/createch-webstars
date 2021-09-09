<?php
require('db.php');
date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['payment_id']) && isset($_POST['amount']) && isset($_POST['status']) && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];
    $payment_status = $_POST['status'];
    $added_on = date('Y-m-d h:i:s');

    if($payment_status == 'complete') {
        $payment_id = $_POST['payment_id'];
        $updateDetails = mysqli_query($conn, "UPDATE `bookings` SET `payment_status` = 'completed', `payment_id` = '$payment_id' WHERE `user_id` = '$user_id'");
        if($updateDetails) {
            echo 'complete_success';
        } else {
            echo 'complete_failed';
        }
    } else if($payment_status == 'incomplete') {
        $payment_id = $_POST['payment_id'];
        $addDetails = mysqli_query($conn, "INSERT INTO `bookings`(`user_id`,`amount`,`payment_status`,`payment_id`,`added_on`) VALUES('$user_id', '$amount', '$payment_status', '$payment_id', '$added_on')");
        if($addDetails) {
            echo 'incomplete_success';
        } else {
            echo 'incomplete_failed';
        }
    }
}
?>