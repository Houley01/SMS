<?php
  session_start();
  if ($_GET["JobRequest"] == 'Broken_Mouse') {
    $_SESSION["Mouse"] = $_GET["Value"];
    print_r($_SESSION);
    exit();
  }
  if ($_GET["JobRequest"] == 'Broken_Keyboard') {
    $_SESSION["Keyboard"] = $_GET["Value"];
    print_r($_SESSION);
    exit();
  }
  if ($_GET["JobRequest"] == 'Broken_Screen') {
    $_SESSION["Screen"] = $_GET["Value"];
    print_r($_SESSION);
    exit();
  }
  if ($_GET["JobRequest"] == 'ExtraInfo') {
    $_SESSION["ExtraInfo"] = $_GET["Value"];
    print_r($_SESSION);
    exit();
  }
?>
