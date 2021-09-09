<?php
require('assets/includes/functions.php');

if(isset($_POST['user_email'])) {
    global $conn;
    $email = $_POST['user_email'];
    
    $stmt = $conn->prepare("SELECT `id` FROM `users` WHERE `email` = ? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    
    if($stmt) {
        $result = $stmt->get_result();
        if($result) {
            $row = $result->fetch_assoc();
            if($row) {
                echo 'authenticated';
                $_SESSION['user_id'] = $row['id'];
            } else {
                echo 'not_authenticated';
            }
        } else {
            echo 'not_authenticated';
        }
    } else {
        echo 'error';
    }
} else {
    die();
}
?>