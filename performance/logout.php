<?php
  session_start();
  
  unset($_SESSION['uid']);
  unset($_SESSION['auid']);
  unset($_SESSION['muid']);
  
  header('Location: ./login.php');
?>
