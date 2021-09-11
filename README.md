# CorsTech
Please find all our creations, documents, pitch deck, github repository etc [on this link](https://drive.google.com/drive/folders/1kmVxl5_4_1lDbCu8iKSXbB1fcBNSFAiR?usp=sharing)

# Challenges we ran into
Challenges we ran into was mainly on the backend side. Main challeneges were integrating the OTP service. At first we tried to integrate Twilio SDK into our application but then at the final stage we realised that Twilio in its free version only allows the client to send OTP to the number registered during the account signup which means no one else will recieve the SMS other than my mobile number. The next step, we tried to include TextLocal API but ran into a problem with some legal doucmentation (DLT SMS) in which it started asking for DLT invoice and GST info. After a comprehensive research we found an OTP service called Fast2SMS which had an extremely simple API to use and at last we were successfull.

Two other major problems we ran into was Razorpay Payment Gateway and PHPMailer library. At first we thought to integrate Razorpay-built payment pages but then realised that we had to integrate a booking system as well as a result of which we switched to Razorpay Payment API. After fixing a lot of bugs (sending response to server and checking user session etc.) we were finally able to integrate that as well. As for the PHPMailer library, there was an issue occurring with the SMTP authenicate() function because of which it only allowed us to send emails through the localhost but not the live server. After going through the docs, we used the PHP 5.2 stable version instead of the current version and were able to implement that as well. (PHPMailer is included in the contact page and payment success page)

The last problem we ran into was converting the HTML template to a PDF which was easily solved using the mPDF library in PHP.
Other problems included sleep deprivation and a maths exam on monday.

# Accomplishments that we're proud of
We're proud that after countless hours of coding and bug fixing, we were finally able to put together a functional web-app based on the prompt. We will be more than happy to present our webapp and explain its features in the WebStars Event.

# What we learned
We learned to implement different types of APIs and also to connect a new flow of logic while at the payments page (when you are not logged in, it shows a popup to fill in your credentials)

# What's next for CorsTech
We tried to build a web app as close to as we had planned out in the beginning but due to the time constraint that we had to prepare for our exam as well we were not able to include more features.

# Technologies Used
Front End: HTML, CSS, TailWindCSS, Bootstrap, JS, jQuery
<br/>
Backend: CorePHP, MySQL (Database), AJAX
