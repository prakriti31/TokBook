<?php
   include("config.php");
   session_start();
   if(isset($_POST["username"])) {
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $password = mysqli_real_escape_string($con,$_POST['password']);
    
         $sql = "SELECT status FROM shopdetails WHERE sid='$username'";
         $sql1 = "SELECT password FROM shop WHERE sid='$username'";
         $result = mysqli_query($con,$sql);
         $result1 = mysqli_query($con,$sql1);
         if($result=='done' && $result1 == $password)
         {
            $_SESSION['login_shopid'] = $username;
         header("location: shophome.php");
         }
      
      else {
         echo '<center style="font-size:30px;color:red;"><b>Password and confirm password does not match.</b></center>';
      }

   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establishment | Login </title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body >
    <header class="text-gray-500 bg-gray-900 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
            <img src="https://img.icons8.com/dusk/64/000000/additional.png" style="width: 30px;"/>
            <span class="ml-3 text-xl">TokBook</span>
          </a>
          <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-700   flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-white" href="index.php">Home</a>

            <a class="mr-5 hover:text-white" href="adminlogin.php">Admin</a>
            <a class="mr-5 hover:text-white" href="customerlogin.php">Customer</a>
           
            <a class="mr-5 hover:text-white" href=""></a>
            <a class="mr-5 hover:text-white" href="contactus.php">Contact Us</a>
          </nav>
          <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">Get Started
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </header>
      <hr>
     <form method="post" action="shopnewlogin.php">
      <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Login</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Join us on our way to avoid crowd amongst the pandemic!</p>
          </div>
          <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0">
            <input class="flex-grow w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-teal-500 text-base px-4 py-2 mr-4 mb-4 sm:mb-0" placeholder="Your Username" type="text" name="username">
            <input class="flex-grow w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-teal-500 text-base px-4 py-2 mr-4 mb-4 sm:mb-0" placeholder="Password" type="password" name="password">
            <button class="text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg">LOGIN</button>
          </div>
        </div>
      </section>
   </form>
      
<hr>
      <footer class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
          <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
            <img src="https://img.icons8.com/dusk/64/000000/additional.png" style="width: 30px;"/>
            <span class="ml-3 text-xl">TokBook</span>
          </a>
          <p class="text-sm text-gray-600 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">© 2020 TokBook 
          </p>
          <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-600">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-600">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-600">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-600">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
      </footer>
</body>
</html>
