<?php

   if(!$_SESSION['user']){
    $_SESSION['not-login-message']="please login to assces Admin Panel";
    header('location:'.SITEURL.'admin/login.php');
   }
