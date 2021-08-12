<?php
   include("config.php");
   session_start();
   if(isset($_POST["sname"])) {
      $sname = mysqli_real_escape_string($con,$_POST['sname']);
      $scity = mysqli_real_escape_string($con,$_POST['scity']); 
      $semail = mysqli_real_escape_string($con,$_POST['semail']);
       $susername = mysqli_real_escape_string($con,$_POST['susername']);
      $spassword = mysqli_real_escape_string($con,$_POST['spassword']); 
      $scpassword = mysqli_real_escape_string($con,$_POST['scpassword']); 
      if($spassword==$scpassword)
      {
         $sql = "INSERT INTO customer(username,cname,email,city,password) values ('$susername','$sname','$semail','$scity','$spassword')";
         $result = mysqli_query($con,$sql);
         if($result)
         {
            $_SESSION['login_customer'] = $susername;
         header("location: welcomecustomer.php");
         }
      }
      else {
         echo '<center style="font-size:30px;color:red;"><b>Password and confirm password does not match.</b></center>';
      }

   }
   
   if(isset($_POST["username"])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT * FROM customer WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['login_customer'] = $myusername;
         
         header("location: welcomecustomer.php");
      }else {
         echo '<center style="font-size:30px;color:red;"><b>No such account exist. Proceed to signup.</b></center>';
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer | Login & Sign Up</title>
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
            <a class="mr-5 hover:text-white" href="establishmentlogin.php">Establishment</a>
           
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
      <form method="post" action="customerlogin.php">
      <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
          <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
            <h1 class="title-font font-medium text-3xl text-white">CUSTOMER LOGIN</h1>
            <p class="leading-relaxed mt-4">Save your time and go shopping!</p>
          </div>
          <div class="lg:w-2/6 md:w-1/2 bg-gray-800 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
            <h2 class="text-white text-lg font-medium title-font mb-5">Sign Up</h2>
            <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Your Name" type="text" name="sname">
            <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="City" type="text" name="scity">
            <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Email Id" type="email" name="semail">
            <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Username" type="text" name="susername">
            <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Password" type="password" name="spassword">
            <input class="bg-gray-900 rounded border text-white border-gray-900 focus:outline-none focus:border-teal-500 text-base px-4 py-2 mb-4" placeholder="Confirm Password" type="password" name="scpassword">
            <button class="text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg">SUBMIT</button>
            <a style="text-align: center;" class="text-xs text-gray-600 mt-3" href="">Forgot password?</a>
            <p class="text-xs text-gray-600 mt-3">Already a user?Login below to start your day with ToKBooK</p>
            
          </div>
        </div>
      </section>
   </form>
       <form method="post" action="customerlogin.php">
      <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Login</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Join us on our way to avoid crowd amongst the pandemic!</p>
          </div>
          <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0">
            <input class="flex-grow w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-teal-500 text-base px-4 py-2 mr-4 mb-4 sm:mb-0" placeholder="Your Username" type="text" name="username">
            <input class="flex-grow w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-teal-500 text-base px-4 py-2 mr-4 mb-4 sm:mb-0" placeholder="Password" type="password" name="password">
            <button class="text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg">SUBMIT</button>
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
