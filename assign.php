<?php
session_start();
   include('sessionshop.php');

   if(isset($_POST['tokid']))
   {
      $time = $_POST['ttime'];
      $tokid = $_POST['tokid'];
      $_SESSION['tok_id']=$tokid;
      $id=$_SESSION['book_id'];
      $query="SELECT cid FROM classify WHERE link ='$id'";
   $sql= mysqli_query($con,$query);
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
      $result1 = $row['cid'];
      $sql = "INSERT INTO assign(sid,tokid,ttime,cid,status)VALUES('$login_shopid','$tokid','$time','$result1','booked')";
      $result = mysqli_query($con,$sql);
      if($result)
      {
        $sql2 = "UPDATE book SET status='done' WHERE sid = '$sid' and cid = '$cid' and reqid = '$id'";
        $result2 = mysqli_query($con,$sql2);
        header("Location: showtoken.php");
      }
   }
?>
<html>
   
   <head>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establishment | Assign Token</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
   </head>
   
   <body>
   	 <header class="text-gray-500 bg-gray-900 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
            <img src="https://img.icons8.com/dusk/64/000000/additional.png" style="width: 30px;"/>
            <span class="ml-3 text-xl">TokBook</span>
          </a>
          <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-700	flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-white" href="index.php">Home</a>
            <a class="mr-5 hover:text-white" href="adminlogin.php">Admin</a>
            <a class="mr-5 hover:text-white" href="customerlogin.php">Customer</a>
            <a class="mr-5 hover:text-white" href="logout.php">Log out</a>
            <a class="mr-5 hover:text-white" href="contactus.html">Contact Us</a>
          </nav>
          <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">Get Started
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </header>
      <section class="text-gray-500 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
          <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
            <h1 class="title-font font-medium text-3xl text-white">ASSIGNING TOKEN</h1>
            <p class="leading-relaxed mt-4">This section is for shop owners.<br>
            Assign the token.</p>
          </div>
      <center><h1 class="title-font font-medium text-3xl text-white">Sucessfully logged in as <?php echo $login_shop; ?><br>(ESTABLISHMENT)</h1>
      <br><br>
      <form method = "POST" action="assign.php">
       <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:px-0">
            <input class="flex-grow w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-teal-500 text-base px-4 py-2 mr-4 mb-4 sm:mb-0" placeholder="Token Number" type="text" name="tokid">
            <input class="flex-grow w-full bg-gray-800 rounded border border-gray-700 text-white focus:outline-none focus:border-teal-500 text-base px-4 py-2 mr-4 mb-4 sm:mb-0" placeholder="Tentative time" type="text" name="ttime">
            <button class="text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg">ASSIGN</button>
          </div>
        </form>
        <button class='text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg'><a href="shophome.php"> Back</button>
      </center>
    </div>
  </section>
  
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