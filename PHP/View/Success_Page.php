<?php
session_start();
include 'include/header.php';
include '../session.php';

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
    include 'include/Login_Nav.php';

    break;
  case 1:
    include 'include/Staff_Nav.php';

    break;

  case 2:
    include 'include/Admin_Nav.php';

    break;

  default:
    include 'include/Login_Nav.php';

    break;
}
 ?>
 <div class="alert alert-success alert-dismissible fade in">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Success!</strong> Form was Successful Submitted
   </div>
 <?php
 include 'include/footer.php';
  ?>


<div class="error">
  <div>
    <?php
      print_r ($_SESSION);
    ?>
  </div>
  <?php
    if(isset($_SESSION['error'])) {
      echo '<div class="error message">';
      echo $_SESSION['error'];
      echo '</div>';
      unset($_SESSION['error']);
    }
  ?>
  <?php
    if(isset($_SESSION['message'])) {
      echo '<div class="info message">';
      echo $_SESSION['message'];
      echo '</div>';
      unset($_SESSION['message']);
    }
?>
</div>
<script type="text/javascript">
setTimeout(function(){window.location.href='index.php'},5000);
</script>
