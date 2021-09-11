<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>CorsTech | Homepage</title>
      <link rel="stylesheet" href="assets/css/tailwind.min.css" />
      <link rel="stylesheet" href="assets/css/styles.css" />
      <link rel="stylesheet" href="assets/css/aos.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
      <!--Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap">
      <!--Favicon-->
      <link rel="icon" href="https://jstseguru.in/createch-webstars/assets/images/logo.png" />
   </head>
   <body>
      <nav class="bg-white shadow-lg w-full fixed top-0 z-10">
         <div class="max-w-8xl mx-auto px-4">
            <div class="flex justify-between">
               <div class="flex space-x-7">
                  <div>
                     <!-- Website Logo -->
                     <a href="./" class="flex items-center py-4 px-2"> <span class="font-semibold text-gray-500 uppercase text-lg logo">CorsTech.</span> </a>
                  </div>
                  <!-- Primary Navbar items -->
                  <div class="hidden md:flex items-center space-x-1"> <a href="#home" class="py-4 px-2 text-gray-500 nav-link hover:border-b-4 font-semibold">Home</a> <a href="#services" class="py-4 px-2 text-gray-500 font-semibold nav-link transition duration-300">Services</a> <a href="#about" class="py-4 px-2 text-gray-500 font-semibold nav-link transition duration-300">About</a> <a href="contact.php" class="py-4 px-2 text-gray-500 font-semibold nav-link transition duration-300">Contact
                     Us</a> 
                  </div>
               </div>
               <!-- Secondary Navbar items -->
               <div class="hidden md:flex items-center space-x-3"> <a href="dashboard/login.php" class="py-2 px-2 font-medium text-gray-500 rounded login-signup-nav-btn transition duration-300">Log
                  In</a> <a href="dashboard/login.php" class="py-2 px-2 font-medium text-gray-500 rounded login-signup-nav-btn transition duration-300">Sign
                  Up</a> 
               </div>
               <!-- Mobile menu button -->
               <div class="md:hidden flex items-center">
                  <button class="outline-none mobile-menu-button"> <i class="fas fa-bars w-6 h-6 hover:text-green-500"></i> </button>
               </div>
            </div>
         </div>
         <!-- mobile menu -->
         <div class="hidden mobile-menu">
            <ul class="">
               <li class="active"><a href="index.html" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
               <li><a href="#services" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a></li>
               <li><a href="#about" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a></li>
               <li><a href="contact.php" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact Us</a></li>
            </ul>
         </div>
      </nav>
      <br id="home" />
      <!--Hero-->
      <section class="body">
         <center>
            <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-12">
               <div class="row align-items-center justify-center">
                  <div class="flex flex-col w-full lg:w-1/2 justify-center items-start pt-12 pb-12 px-6" data-aos="slide-right">
                     <h1 class="font-bold text-5xl mb-2">CORSTECH.</h1>
                     <p class="uppercase tracking-loose mb-4 text-2xl"><i>"Where sky is not the limit"</i></p>
                     <p class="leading-normal mb-4 text-left">CorsTech, a civil space agency built in 1978, is a global leader in the field of space exploration with a large number of workforces. We have a total of 38 centers located in some best places all over the world from where researchers can easily explore space and discover new things..</p>
                     <div class="inline-block btn-row">
                        <a href="dashboard/login.php"> <span>Login</span> <span>Login</span> </a>
                        <a href="dashboard/login.php"> <span>Signup</span> <span>Signup</span> </a>
                     </div>
                  </div>
                  <div class="col-md-5" data-aos="slide-left"> <img src="assets/images/header.png" alt="hero" width="100%" /> </div>
               </div>
            </div>
         </center>
         <br id="services" />
         <br><br>
         <!--Services-->
         <section class="text-gray-600 body-font">
            <div class="flex items-center justify-center">
               <h1 class="text-center mx-auto text-7xl font-bold p-2 services-title">
                  Services
               </h1>
            </div>
            <div class="container px-5 py-24 mx-auto">
               <div class="flex flex-wrap -m-4">
                  <div class="p-4 lg:w-1/3">
                     <div class="bg-gray-100 bg-opacity-75 px-8 pt-16 pb-12 rounded-lg overflow-hidden relative  border border-gray-600">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY: 13+</h2>
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Cors View</h1>
                        <p class="leading-relaxed mb-3">Corsview is a 2-week trip where we will get to know about the space and do fun activities.</p>
                        <a class="text-indigo-500 inline-flex items-center" href="learn-more/CorsView.pdf">
                            Learn More &nbsp;&nbsp;
                        </a>
                        || &nbsp;&nbsp;
                        <a class="text-indigo-500 inline-flex items-center" href="categories/cors-view.php">
                           Proceed
                        </a>
                     </div>
                  </div>
                  <div class="p-4 lg:w-1/3">
                     <div class="bg-gray-100 bg-opacity-75 px-8 pt-16 pb-12 rounded-lg overflow-hidden relative  border border-gray-600">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY: 18+</h2>
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Cors Launch</h1>
                        <p class="leading-relaxed mb-3">Corslaunch is a dream come true program where people will get to explore the space.</p>
                        <a class="text-indigo-500 inline-flex items-center" href="learn-more/CorsLaunch.pdf">
                            Learn More &nbsp;&nbsp;
                        </a>
                        || &nbsp;&nbsp;
                        <a class="text-indigo-500 inline-flex items-center" href="categories/cors-launch.php">
                           Proceed
                        </a>
                     </div>
                  </div>
                  <div class="p-4 lg:w-1/3">
                     <div class="bg-gray-100 bg-opacity-75 px-8 pt-16 pb-12 rounded-lg overflow-hidden relative  border border-gray-600">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY: 18+</h2>
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Corstay </h1>
                        <p class="leading-relaxed mb-3">Corstay is a program for a stay of 2 months on Mars and gain knowledge about different things.</p>
                        <a class="text-indigo-500 inline-flex items-center" href="learn-more/Corstay.pdf">
                           Learn More &nbsp;&nbsp;
                        </a>
                        || &nbsp;&nbsp;
                        <a class="text-indigo-500 inline-flex items-center" href="categories/corstay.php">
                           Proceed
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <br id="about" />
         <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
            <div class="flex items-center justify-center mb-16">
               <h1 class="text-center mx-auto text-5xl font-bold p-2 services-title">
                  Our Team
               </h1>
            </div>
            <div class="flex items-center lg:w-11/12 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
               <div class="sm:w-52 sm:h-52 h-50 w-50 sm:mr-10 inline-flex items-center justify-center rounded-full flex-shrink-0"> <img src="assets/images/mehul.png" alt="image" class="rounded-2xl"> </div>
               <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                  <h2 class="text-gray-900 text-lg title-font font-medium mb-2">Mehul Srivastava</h2>
                  <p class="leading-relaxed text-base">I am Mehul Srivastava, a student of Class 11th in DPS RKPuram. I believe in the saying that a man without a sound career planning is like a ship without the radar. It drifts and ultimately sinks down in the deep ocean. In terms of my academic career I will be pursuing economic honours after my 12th or Senior School Graduation.</p>
               </div>
            </div>
            <div class="flex items-center lg:w-11/12 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
               <div class="sm:w-52 sm:h-52 h-50 w-50 sm:mr-10 inline-flex items-center justify-center rounded-full flex-shrink-0"> <img src="assets/images/Divyam.png" alt="image" class="rounded-2xl"> </div>
               <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                  <h2 class="text-gray-900 text-lg title-font font-medium mb-2">Divyam Prusty</h2>
                  <p class="leading-relaxed text-base">To describe myself, I would like to say that I am always passionate about the work I do, am ambitious and driven to complete the work assigned to me. I also believe that I have the leadership qualities required to run a group or a team. I have a lot of hobbies that I like to do during my leisure time but the one which gives me immense pleasure is programming which is also going to be my career.</p>
               </div>
            </div>
            <div class="flex items-center lg:w-11/12 mx-auto sm:flex-row flex-col">
            <div class="sm:w-52 sm:h-42 h-50 w-50 sm:mr-10 inline-flex items-center justify-center rounded-full flex-shrink-0"> <img src="assets/images/Garv.jpg" alt="image" class="rounded-2xl"> </div>
            <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
               <h2 class="text-gray-900 text-lg title-font font-medium mb-2">Garv Jain</h2>
               <p class="leading-relaxed text-base">I am a person who is positive about every aspect of life. In life, I believe in the importance of values like passion, dedication, confidence and time management. In technical aspects, I am a Javascript developer who loves to try out different frameworks in JS and build unique projects in my free time. Being inclined towards technology since grade 7, I am looking forward to be a software engineer at Apple.</p>
            </div>
         </section>
         <!--App Section-->
         <section class="text-gray-600 body-font mb-16" id="subscribe">
              <div class="flex items-center justify-center mb-7">
                   <h1 class="text-center mx-auto text-5xl font-bold p-2 services-title">
                      Newsletter
                   </h1>
                </div>
            <form>
            <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
               <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                  <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Subscribe to our Newsletter</h1>
                  <div class="flex w-full md:justify-start justify-center items-end">
                     
                     <div class="relative mr-4 md:w-full lg:w-full xl:w-1/2 w-2/4">
                        <input type="email" id="hero-field" name="hero-field" class="w-full bg-gray-100 rounded border bg-opacity-50 border-gray-300 focus:ring-2 focus:ring-gray-200 focus:bg-transparent focus:border-gray-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Enter your email here to subscribe to newsletter" /> 
                     </div>
                     <button type="reset" id="submitEmail" class="inline-flex text-white border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded text-lg" style="background-color: #00160A;">Submit</button>
                  </div>
                  <br>
                  <br>
                  <h3 class="text-3xl mb-4 ml-2">Download our App</h3>
                  <div class="flex lg:flex-row md:flex-col"> <img src="assets/images/google-play.png" class="mr-4" alt="image"> <img src="assets/images/apple.svg" alt="image" style="height: 2.9rem;"> </div>
               </div>
               <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6"> <img class="object-cover object-center rounded" alt="hero" src="assets/images/app.svg" /> </div>
            </div>
            </form>
         </section>
      <section>
         <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <svg style="width:50px;height:50px" viewBox="0 0 24 24" class="stats-icon w-12 h-12 mb-3 inline-block" >
                            <path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                        </svg>
                        <h2 class="title-font font-medium text-3xl text-gray-900" id="counter" data-target="100">0</h2>
                        <p class="leading-relaxed">Countries</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <svg style="width:50px;height:50px" viewBox="0 0 24 24" class="stats-icon w-12 h-12 mb-3 inline-block" >
                            <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                        </svg>
                        <h2 class="title-font font-medium text-3xl text-gray-900" id="counter" data-target="10000000">0</h2>
                        <p class="leading-relaxed">Customers</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <svg style="width:50px;height:50px" viewBox="0 0 24 24" class="stats-icon w-12 h-12 mb-3 inline-block">
                            <path fill="currentColor" d="M15.19 21C14.12 19.43 13 17.36 13 15.5C13 13.67 13.96 12 15.4 11H15V9H17V10.23C17.5 10.09 18 10 18.5 10C18.67 10 18.84 10 19 10.03V3H5V21H11V17.5H13V21H15.19M15 5H17V7H15V5M9 19H7V17H9V19M9 15H7V13H9V15M9 11H7V9H9V11M9 7H7V5H9V7M11 5H13V7H11V5M11 9H13V11H11V9M11 15V13H13V15H11M18.5 12C16.6 12 15 13.61 15 15.5C15 18.11 18.5 22 18.5 22S22 18.11 22 15.5C22 13.61 20.4 12 18.5 12M18.5 16.81C17.8 16.81 17.3 16.21 17.3 15.61C17.3 14.91 17.9 14.41 18.5 14.41S19.7 15 19.7 15.61C19.8 16.21 19.2 16.81 18.5 16.81Z" />
                        </svg>
                        <h2 class="title-font font-medium text-3xl text-gray-900" id="counter" data-target="1100">0</h2>
                        <p class="leading-relaxed">Offices</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <svg style="width:50px;height:50px" viewBox="0 0 24 24" class="stats-icon w-12 h-12 mb-3 inline-block">
                            <path fill="currentColor" d="M15,13H16.5V15.82L18.94,17.23L18.19,18.53L15,16.69V13M19,8H5V19H9.67C9.24,18.09 9,17.07 9,16A7,7 0 0,1 16,9C17.07,9 18.09,9.24 19,9.67V8M5,21C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1H18V3H19A2,2 0 0,1 21,5V11.1C22.24,12.36 23,14.09 23,16A7,7 0 0,1 16,23C14.09,23 12.36,22.24 11.1,21H5M16,11.15A4.85,4.85 0 0,0 11.15,16C11.15,18.68 13.32,20.85 16,20.85A4.85,4.85 0 0,0 20.85,16C20.85,13.32 18.68,11.15 16,11.15Z" />
                        </svg>
                        <h2 class="title-font font-medium text-3xl text-gray-900" id="counter" data-target="100">0</h2>
                        <p class="leading-relaxed">Years</p>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <footer class="text-gray-600 body-font">
         <div class="bg-gray-100">
            <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col items-center justify-center sm:flex-row">
               <p class="text-gray-900 text-base font-semibold text-center sm:text-center">Made with <span class="text-red-600"><i class="fas fa-heart"></i></span> by Exun Clan</p>
            </div>
         </div>
      </footer>
      <script src="assets/js/app.js"></script>
      <script src="assets/js/aos.js"></script>
      <script>
        AOS.init();
        const newsletterBtn = document.getElementById('submitEmail');
        newsletterBtn.addEventListener('click', () => {
            var email = document.getElementById('hero-field').value;
            alert(email+' has been successfully added to our mailing list. Thank you for your patience!');
        });
      </script>
   </body>
</html>
