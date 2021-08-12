 <?php
   include('config.php');
  
   
   $user_check = $_SESSION['login_shopid'];

   $sql="SELECT sname from shoplocation where sid = '$user_check' ";
   
   $ses_sql = mysqli_query($con,$sql);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_shop = $row['sname'];
   $login_shopid=$_SESSION['login_shopid'];
   /*$id = $_SESSION['book_id'];
   $custid= mysqli_query($con,"select cid from book where sid = '$id' ");
   $sql= mysqli_query($con,"select * from assign where sid = '$id' and cid='$custid' ");
   $row1 = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $token_no = $row1['tokid'];
   $ttime = $row1['ttime'];*/

   
   if(!isset($_SESSION['login_shopid'])){
     // header("location:establishmentlogin.php");
      die();
   }
?>