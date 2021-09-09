<?php
require('assets/includes/db.php');
session_start();


function isAuthenicated() {
    if(isset($_SESSION['user_id'])) {
        session_regenerate_id();
    } else {
        header('location: login.php');
        die();
    }
}


//register a user
function registerUser() {
    $name = $email = $phone = $password = $otp = null;
    global $formErrors;
    $formErrors = array();

    if(empty($_POST['name'])) {
        array_push($formErrors, 'Name cannot remain empty!');
    }

    if(empty($_POST['email'])) {
        array_push($formErrors, 'Email cannot remain empty!');
    }

    if(empty($_POST['phone'])) {
        array_push($formErrors, 'Phone cannot remain empty!');
    }

    if(empty($_POST['password'])) {
        array_push($formErrors, 'Password cannot remain empty!');
    }

    if(empty($_POST['otp'])) {
        array_push($formErrors, 'OTP cannot remain empty!');
    }

    if(isDataExists($_POST['email'], $_POST['phone'])) {
        array_push($formErrors, 'An account with the same email or phone is already registered!');
    }

    if(!matchOtp($_POST['otp'], $_POST['phone'])) {
        array_push($formErrors, 'OTP entered is incorrect!');
    }

    if(empty($formErrors)) {
        global $conn;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES(?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $email, $phone, $password);
        $stmt->execute();

        if($stmt) {
            echo "<script>alert('Your account has been activated!')</script>";
        } else {
            array_push($formErrors, 'An error occurred, please try again!');
        }
    }
}


//send OTP
function sendOTP($otp, $phone) {
    global $conn;
    clearOtherOTPs($phone);

    $stmt = $conn->prepare("INSERT INTO `otp_authentication`(`otp`, `phone`) VALUES(?, ?)");
    $stmt->bind_param('ss', $otp, $phone);
    $stmt->execute();
    

    if($stmt) {
    	//send otp
    	$curl = curl_init();
        $message = "<#>OTP to activate your ChorsTech account is: $otp. Do not share this with anyone by any means.";
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=YOUR_API_KEY&message=".urlencode($message)."&language=english&route=q&numbers=".urlencode($phone),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
    	
        return true;
    } else {
        return false;
    }
}

//match OTP 
function matchOtp($otp, $phone) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM `otp_authentication` WHERE `otp` = ? AND `phone` = ?");
    $stmt->bind_param('is', $otp, $phone);
    $stmt->execute();

    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            $row = $result->fetch_assoc();
            if($row) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

//clear OTP
function clearOtherOTPs($phone) {
    global $conn;

    $stmt = $conn->prepare("DELETE FROM `otp_authentication` WHERE `phone` = ?");
    $stmt->bind_param('s', $phone);
    $stmt->execute();

    if($stmt) {
        return true;
    } else {
        return false;
    }
}


//login a user
function loginUser() {
    $email = $password = null;
    global $formErrors;
    $formErrors = array();

    if(empty($_POST['email'])) {
        array_push($formErrors, 'Email cannot remain empty!');
    }

    if(empty($_POST['password'])) {
        array_push($formErrors, 'Password cannot remain empty!');
    }

    if(empty($formErrors)) {
        global $conn;
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();

        if($stmt) {
            $result = $stmt->get_result();
            if($result) {
                $row = $result->fetch_assoc();
                if($row) {
                    $hashed_password = $row['password'];
                    if(password_verify($password, $hashed_password)) {
                        $_SESSION['user_id'] = $row['id'];
                        header('location: dashboard/');
                        exit();
                    } else {
                        array_push($formErrors, 'Please enter valid password!');
                    }
                } else {
                    array_push($formErrors, 'Please enter valid email address!');
                }
            } else {
                array_push($formErrors, 'Please enter valid login credentials!');
            }
        } else {
            array_push($formErrors, 'An error occurred, please try again!');
        }
    }
}

//check if data exists
function isDataExists($email, $phone) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ? OR `phone` = ?");
    $stmt->bind_param('ss', $email, $phone);
    $stmt->execute();

    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            $row = $result->fetch_assoc();
            if($row) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>