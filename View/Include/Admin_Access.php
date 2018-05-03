<?php
  //Every Admin Page needs to have this file include to stop people from accessing admin files
  require_once 'Include/Master_Include.php';
  session_start();
  HTMLHeader();
  switch ($_SESSION['UserStatus']) {

    case 2:
      AdminNav();
      break;

    default:
      header('location: index.php');
      break;
  }
  ?>
