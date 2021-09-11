<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    echo 'not_logged_in';
} else {
    echo 'logged_in';
}
?>