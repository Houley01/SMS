<?php
  session_start();
// Makes any user who comes to the website anonymous before login.
  if(!isset($_SESSION['UserStatus'])) {
    $_SESSION['UserStatus'] = 0;
  }
 ?>
