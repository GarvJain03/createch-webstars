<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $mail = new PHPMailer(true);

  try {
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'amit.tandon1108@gmail.com';
      $mail->Password   = 'YOUR_PASSWPORD_HERE';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('amit.tandon1108@gmail.com', 'ChorsTech | Contact Page');
      $mail->addAddress('totalledcookie@gmail.com');

      
      $mail->isHTML(true);
      $mail->Subject = 'My Query is...';
      $mail->Body    = "<strong>Message: </strong>$message <br><br><strong>Email: </strong>$email<br><br><strong>Name: </strong>$name";
      $mail->AltBody = $message.' '.$email.' '.$name;

      $mail->send();
      echo '<script>alert("Your message has been sent! The support team will get back to you as soon as possible")</script>';
  } catch (Exception $e) {
      echo "<script>alert('Message could not be sent. Please try again! {$mail->ErrorInfo}')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tailwind.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;display=swap" rel="stylesheet">
    <title>ChorsTech | Contact Us</title>
</head>
<body>
   <nav class="navbar bg-white shadow-lg">
      <div class="max-w-full mx-auto px-4">
        <div class="flex justify-between">
          <div class="flex space-x-7">
            <div>
              <!-- Website Logo -->
              <a href="./" class="flex items-center py-4 px-2">
                <span class="font-semibold text-gray-500 text-lg logo">CORSTECH.</span>
              </a>
            </div>
            <!-- Primary Navbar items -->
            <div class="hidden md:flex items-center space-x-1">
              <a href="#home" class="py-4 px-2 text-gray-500 nav-link hover:border-b-4 font-semibold">Home</a>
              <a href="#services"
                class="py-4 px-2 text-gray-500 font-semibold nav-link transition duration-300">Services</a>
              <a href="#about"
                class="py-4 px-2 text-gray-500 font-semibold nav-link transition duration-300">About</a>
              <a href="contact.php"
                class="py-4 px-2 text-gray-500 font-semibold nav-link transition duration-300">Contact
                Us</a>
            </div>
          </div>
          <!-- Secondary Navbar items -->
          <div class="hidden md:flex items-center space-x-3">
            <a href="dashboard/login.php"
              class="py-2 px-2 font-medium text-gray-500 rounded login-signup-nav-btn transition duration-300">Log
              In</a>
            <a href="dashboard/login.php"
              class="py-2 px-2 font-medium text-gray-500 rounded login-signup-nav-btn transition duration-300">Sign
              Up</a>
          </div>
          <!-- Mobile menu button -->
          <div class="md:hidden flex items-center">
            <button class="outline-none mobile-menu-button">
              <i class="fas fa-bars w-6 h-6 hover:text-green-500"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- mobile menu -->
      <div class="hidden mobile-menu">
        <ul>
          <li class="active">
            <a href="index.html" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a>
          </li>
          <li>
            <a href="#services" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a>
          </li>
          <li>
            <a href="#about" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a>
          </li>
          <li>
            <a href="#contact" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>
      <section class="text-gray-800 px-8 py-12 bg-gray-100">
        <div
        class="max-w-screen-xl mt-8 px-8 grid gap-8 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-8 mx-auto text-gray-900">
        <div class="flex flex-col justify-between">
          <div>
            <h2 class="text-4xl lg:text-5xl font-bold leading-tight">Lets talk about everything!</h2>
            <div class="text-gray-700 mt-8">
              Hate forms? Send us an <span class="underline">email</span> instead.
            </div>
          </div>
          <div class="mt-8 text-center">
              <img src="assets/images/contact.svg" alt="image" class="w-full">
          </div>
        </div>
        <div>

          <form action="" method="POST">
          <div>
            <span class="uppercase text-sm text-gray-600 font-bold">Full Name</span>
            <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
              type="text" name="name" placeholder="Enter your name here">
          </div>
          <div class="mt-8">
            <span class="uppercase text-sm text-gray-600 font-bold">Email</span>
            <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
              type="email" name="email" placeholder="Enter your email here">
          </div>
          <div class="mt-8">
            <span class="uppercase text-sm text-gray-600 font-bold">Message</span>
            <textarea
              class="w-full h-32 bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" name="message" placeholder="Enter your message here..."></textarea>
          </div>
          <div class="mt-8">
            <button
              class="uppercase text-sm font-bold tracking-wide submit-btn text-gray-800 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline" type="submit" name="submit">
              Send Message
            </button>
          </div>
          </form>

      </div>
      </section>
      <footer class="text-white-600 body-font">
      <div class="bg-gray-100">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col items-center justify-center sm:flex-row">
          <p class="text-gray-900 text-base font-semibold text-center sm:text-center">Made with <span
              class="text-red-600"><i class="fas fa-heart"></i></span> by Exun Clan</p>
        </div>
      </div>
    </footer>
  </body>
  <script src="assets/js/app.js"></script>
</html>