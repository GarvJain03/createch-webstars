<?php
require('db.php');
require 'vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Kolkata');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(!isset($_SESSION['user_id'])) {
    die();
}

function userProfile($user_id) {
    global $conn;
    $rows = array();
    
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `id` = ? LIMIT 1");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    
    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            $row = $result->fetch_assoc();
            if($row) {
                array_push($rows, $row);
            }
            return $rows;
        }
    }
}


if(isset($_POST['payment_id']) && isset($_POST['amount']) && isset($_POST['status']) && isset($_POST['user_id']) && isset($_POST['category'])) {
    
    $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];
    $payment_status = $_POST['status'];
    $added_on = date('Y-m-d h:i:s');
    $category = $_POST['category'];
    
    if($payment_status == 'complete') {
        $payment_id = $_POST['payment_id'];
        $lastId = $_SESSION['last_id'];
        
        
        $filename = time().'.pdf';
        
        $stmt = $conn->prepare("UPDATE `bookings` SET `payment_status` = 'completed', `payment_id` = ?, `invoice` = ? WHERE `user_id` = ? AND `id` = ?");
        $stmt->bind_param('ssii', $payment_id, $filename, $user_id, $lastId);
        $stmt->execute();

        if($stmt) {
            echo 'complete_success';
            
            //reduce amount to rs
            $amount /= 100;
            //get user details
            $userId = $_SESSION['user_id'];
            $userDetails = userProfile($userId);
            foreach($userDetails as $userDetail) {
                require '../PHPMailer/Exception.php';
                require '../PHPMailer/PHPMailer.php';
                require '../PHPMailer/SMTP.php';
                
                $email = $userDetail['email'];
                $name = $userDetail['name'];
                $phone = $userDetail['phone'];
                $age = $userDetail['age'];
                $date = date('d M Y');
                
                $mail = new PHPMailer(true);                
                $mail->isSMTP();                                            
                $mail->Host = 'smtp.hostinger.in';  
                $mail->SMTPAuth = true;                               
                $mail->Username = 'no-reply@jstseguru.in';                 
                $mail->Password = 'Mehul1206@';                           
                $mail->SMTPSecure = 'tls';                           
                $mail->Port = 587;           
            
                $mail->setFrom('no-reply@jstseguru.in', 'No Reply | CorsTech');
                $mail->addAddress($email);  
                
                $mail->isHTML(true);
                $mail->Subject = "Payment Successful for CorsTech";
                $mail->Body    = '<html>
            <body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;width:100%">
              <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
                <thead>
                  <tr>
                    <th style="text-align:left;"><img style="max-width: 75px;" src="https://jstseguru.in/createch-webstars/assets/images/logo.png" alt="corstech"></th>
                    <th style="text-align:right;font-weight:400;">'.$date.'</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="height:35px;"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                      <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Transaction status</span><b style="color:green;font-weight:normal;margin:0">Success</b></p>
                      <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span> '.$payment_id.'</p>
                      <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction Amount</span> Rs. '.$amount.'.00</p>
                    </td>
                  </tr>
                  <tr>
                    <td style="height:35px;"></td>
                  </tr>
                  <tr>
                    <td style="width:50%;padding:20px;vertical-align:top">
                      <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> '.$name.'</p>
                      <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> '.$email.'</p>
                      <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> +91-'.$phone.'</p>
                    </td>
                    <td style="width:50%;padding:20px;vertical-align:top">
                      <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Age</span> '.$age.'</p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Orders</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:15px;">
                      <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">'.$category.'</span> Rs. '.$amount.' <b style="font-size:12px;font-weight:300;"> </b>
                      </p>
                    </td>
                  </tr>
                </tbody>
                <tfooter>
                  <tr>
                    <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                      <strong style="display:block;margin:0 0 10px 0;">Regards</strong> CorsTech<br> Kaifi Azmi Marg, KD Colony, Sector 12, Rama Krishna Puram, New Delhi, Delhi 110022<br><br>
                      <b>Phone:</b> +91-9811679046<br>
                      <b>Email:</b> support@corstech.com
                    </td>
                  </tr>
                </tfooter>
              </table>
            </body>
            </html>
                ';
                
                 //create pdf of invoice
                $mpdf = new \Mpdf\Mpdf();
                
                $mpdf->WriteHTML("<html><body style='background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;width:100%'><table style='max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;'><thead><tr><th style='text-align:left;'><img style='max-width: 75px;' src='https://jstseguru.in/createch-webstars/assets/images/logo.png' alt='corstech'></th><th style='text-align:right;font-weight:400;'>$date</th></tr></thead><tbody><tr><td style='height:35px;'></td></tr><tr><td colspan='2' style='border: solid 1px #ddd; padding:10px 20px;'><p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:150px'>Transaction status</span>&nbsp; <b style='color:green;font-weight:normal;margin:0'>Success</b></p><p style='font-size:14px;margin:0 0 6px 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Transaction ID</span>&nbsp; $payment_id</p><p style='font-size:14px;margin:0 0 0 0;'><span style='font-weight:bold;display:inline-block;min-width:146px'>Transaction Amount</span>&nbsp; Rs. $amount.00</p></td></tr><tr><td style='height:35px;'></td></tr><tr><td style='width:50%;padding:20px;vertical-align:top'><p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px'>Name</span> $name</p><p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Email</span> $email</p><p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Phone</span> $phone</p></td><td style='width:50%;padding:20px;vertical-align:top'><p style='margin:0 0 10px 0;padding:0;font-size:14px;'><span style='display:block;font-weight:bold;font-size:13px;'>Age</span> $age</p></td></tr><tr><td colspan='2' style='font-size:20px;padding:30px 15px 0 15px;'>Orders</td></tr><tr><td colspan='2' style='padding:15px;'><p style='font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;'><span style='display:block;font-size:13px;font-weight:normal;'>$category</span> Rs. $amount<b style='font-size:12px;font-weight:300;'> </b></p></td></tr></tbody><tfooter><tr><td colspan='2' style='font-size:14px;padding:50px 15px 0 15px;'><strong style='display:block;margin:0 0 10px 0;'>Regards</strong> CorsTech<br> Kaifi Azmi Marg, KD Colony, Sector 12, Rama Krishna Puram, New Delhi, Delhi 110022<br><br><b>Phone:</b> +91-9811679046<br><b>Email:</b> support@corstech.com</td></tr></tfooter></table></body></html>");
                
                $filepath = 'invoice-uploads/'.$filename;
                $mpdf->Output($filepath, 'F');
                
                //mail send
                $mail->send();
            }
            
        } else {
            echo 'complete_failed';
        }
    } else if($payment_status == 'incomplete') {
        $payment_id = $_POST['payment_id'];
        
        $stmt = $conn->prepare("INSERT INTO `bookings`(`user_id`,`amount`,`payment_status`,`payment_id`,`added_on`, `category`) VALUES('$user_id', '$amount', '$payment_status', '$payment_id', '$added_on', '$category')");
        $stmt->bind_param('isssss', $user_id, $amount, $payment_status, $payment_id, $added_on, $category);
        $stmt->execute();
        
        if($stmt) {
            $_SESSION['last_id'] = $last_id = $conn->insert_id;
            echo 'incomplete_success';
        } else {
            echo 'incomplete_failed';
        }
    }
}