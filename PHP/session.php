<?php
  session_start();
// Make a user anonymous before login
  if(!isset($_SESSION['UserStatus'])) {
    $_SESSION['UserStatus'] = 0;

  }







 ?>
