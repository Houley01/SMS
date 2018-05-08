<?php
  session_start();
  // include 'include/header.php';
  require_once '../session.php';
  require_once 'include/Master_Include.php';
  HTMLHeader();
  // If User = 0 Amoumus show Login_Nav.php = include 'include/Login_nav.php';
  // If User = 0 Amoumus show include 'include/Login_Body.php';
  //
  // If User = 1 Show staff Staff_Nav.php = include 'include/Staff_Nav.php';
  // If User = 1 Show Staff_Body.php  = include 'include/Staff_Body.php';
  //
  // If User = 2 show admin Admin_Nav.php = include 'include/Admin_nav.php';
  // If User = 2 show Admin_Body.php = include 'include/Admin_Body.php';
  switch ($_SESSION['UserStatus']) {
    case 0:
      LoginNav();
      LoginBody();
      break;
    case 1:
      StaffNav();
      StaffBody();
      break;
    case 2:
      AdminNav();
      AdminBody();
      break;
    default:
      LoginNav();
      LoginBody();
      break;
    }
    HTMLFooter()
  ?>
</div>
<!-- Test Custom Alert Box -->
<button type="button" name="button" id="Alert">Test Alert</button>
  <?php testAlert(); ?>