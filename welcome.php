<?php
   include('connectdb.php');
   session_start();


   
   if(!isset($_SESSION['user_type'])){
      header("location:index.php");
      die();
   }
   else {
      if ($_SESSION['user_type'] <= 1) {
         header("location: companies_table.php");
      }
      else {
         header("location:admin_links.php");
      }
   }
?>