<?php
   include('config.php');
   //session_start();
   
   $user_check = $_SESSION['login_customer'];
   
   $ses_sql = mysqli_query($con,"select cname,city from customer where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['cname'];
   $login_custid=$user_check;
   $login_city = $row['city'];
   
   if(!isset($_SESSION['login_customer'])){
      //header("location:customerlogin.php");
      die();
   }
?>