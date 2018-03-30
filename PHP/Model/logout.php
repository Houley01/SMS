<?php
    session_start();
//	reset UsersStatus
    unset($_SESSION['error']);
    unset($_SESSION['UserID']);
    unset($_SESSION['FName']);
    $_SESSION['UserStatus'] = 0;
    header('Location: ../view/index.php');


?>
