<?php
  session_start();
  include '../Model/_Connection.php';

  $JobRequest_sql = "INSERT INTO  job
    (JobID, DateLogged, UserID, RoomID, AssetID, Broken_Mouse, Broken_Keyboard, Broken_Screen, ExtraInfo, JobStatusID, PartsUsed, DateComplete)
  VALUES
  (
    NULL, NULL, '" . $_SESSION['UserID'] . "',  '" . $_POST['Room'] . "', NULL, '" . $_POST['Broken_Mouse'] . "',  '" . $_POST['Broken_Keyboard'] . "', '" . $_POST['Broken_Screen'] . "', '" . $_POST['ExtraInfo'] . "', 1, NULL, NULL);";

  $conn = dbConnect();
  $stmt = $conn->prepare($JobRequest_sql);
  $stmt->execute();
 ?>
