<?php
   include('config.php');
   $id = $_SESSION['tok_id'];
    $query="SELECT * from assign where tokid = '$id' ";
   $sql= mysqli_query($con,$query);
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $token_no = $row['tokid'];
   $ttime = $row['ttime'];

   
   if(!isset($_SESSION['tok_id'])){
      //header("location:establishmentlogin.php");
      die();
   }
?>