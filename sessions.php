<?php
   include('db_connect.php');
   $user_check = $_SESSION['login_name'];
   
   $ses_sql = mysqli_query($conn,"SELECT username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_name'])){
      header("location:login.php");
      die();
   }
?>