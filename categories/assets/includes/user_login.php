<?php
session_start();
require('db.php');

if($conn->connect_errno) {
    echo 'Failed to connect to database';
}

if(isset($_POST['email']) && $_POST['password']) {
    global $conn;
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT `id`, `password` FROM `users` WHERE `email` = ?");
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
                    echo 'logged_in';
                } else {
                    echo 'invalid_cred';
                }
            } else {
                echo 'invalid_cred';
            }
        } else {
            echo 'invalid_cred';
        }
    } else {
        echo 'error';
    }
}
?>