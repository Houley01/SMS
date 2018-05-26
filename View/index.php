<?php
  session_start();
  require_once '../session.php';
  require_once 'Include/Master_Include.php';
  HTMLHeader();

  switch ($_SESSION['UserStatus']) {
    case 0:
      LoginNav();
      LoginBody();
      HTMLFooter();
      LoginModal();
      break;
    case 1:
      StaffNav();
      StaffBody();
      HTMLFooter();
      break;
    case 2:
      AdminNav();
      AdminBody();
      HTMLFooter();
      break;
    default:
      LoginNav();
      LoginBody();
      HTMLFooter();
      LoginModal();
      break;
    }

  ?>
<!-- Test Custom Alert Box -->
<!-- <button type="button" name="button" id="Alert">Test Alert</button> -->
  <!-- <?php //testAlert(); ?> -->
