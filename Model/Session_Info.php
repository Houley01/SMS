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
  if ($_GET["Session"] == 'clear') {
    unset($_SESSION["Mouse"]);
    unset($_SESSION["Keyboard"]);
    unset($_SESSION["Screen"]);
    unset($_SESSION["ExtraInfo"]);
    print_r($_SESSION);
  }
  if ($_GET["Session"] == 'print') {
    print_r($_SESSION);
  }
?>
