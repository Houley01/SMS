<?php
//every website needs to have this statement in to
//help protect from people using pages that are
//not allowed..
	session_start();
	include 'include/header.php';
	include '../Connection.php';
	switch ($_SESSION['UserStatus']) {
  	case 2:
    	include 'include/Admin_Nav.php';
    	break;

		default:
			header('location: index.php');
			break;
}
?>
