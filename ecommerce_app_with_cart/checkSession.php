<?php
session_start();
if($_SESSION['userId'])
  {
    
  }
  else{
    header("Location:login.php");
  }
// echo $_SESSION['userId'];
?>