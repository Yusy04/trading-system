<?php
   include('connectdb.php');
   session_start();
   
   if(!isset($_SESSION['user_type'])){
      header("location:index.php");
      die();
   }
?>