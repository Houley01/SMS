<?php
  //Every Admin Page needs to have this file include to stop people from accessing admin files
  session_start();
  include 'include/header.php';
  switch ($_SESSION['UserStatus']) {

    case 2:
      include 'include/Admin_Nav.php';
      break;

    default:
      header('location: index.php');
      break;
  }
  ?>
