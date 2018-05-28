<?php
  session_start();
  include '../Model/_Connection.php';
  require_once '../Model/Functions.php';
  // File Upload
  $Time = time();
  $UploadDir = '../Uploads/';
  $UploadFile = $UploadDir . basename($Time.'_'.$_FILES['UserFile']['name']);
  echo '<br>';
  if (move_uploaded_file($_FILES['UserFile']['tmp_name'], $UploadFile)) {
    echo 'Move was successful';
  }

  // Clean User Input
  $UserID = filter_var(clean($_SESSION['UserID']), FILTER_SANITIZE_STRING);
  $Room = filter_var(clean($_POST['Room']), FILTER_SANITIZE_STRING);
  $Broken_Mouse = filter_var(clean($_POST['Broken_Mouse']), FILTER_SANITIZE_STRING);
  $Broken_Keyboard = filter_var(clean($_POST['Broken_Keyboard']), FILTER_SANITIZE_STRING);
  $Broken_Screen = filter_var(clean($_POST['Broken_Screen']), FILTER_SANITIZE_STRING);
  $ExtraInfo = filter_var(clean($_POST['ExtraInfo']), FILTER_SANITIZE_STRING);
  $File = $UploadFile;
  $JobRequest_sql = "INSERT INTO  job
    (JobID, DateLogged, UserID, RoomID, AssetID, Broken_Mouse, Broken_Keyboard, Broken_Screen, ExtraInfo, JobStatusID, PartsUsed, DateComplete, Url) VALUES (NULL, CURRENT_TIMESTAMP, :UserID, :Room, NULL, :Broken_Mouse,  :Broken_Keyboard, :Broken_Screen, :ExtraInfo, 1, NULL, NULL, :Url);";

  $conn = dbConnect();
  $stmt = $conn->prepare($JobRequest_sql);
  $stmt->bindParam(':UserID', $UserID);
  $stmt->bindParam(':Room', $Room);
  $stmt->bindParam(':Broken_Mouse', $Broken_Mouse);
  $stmt->bindParam(':Broken_Keyboard', $Broken_Keyboard);
  $stmt->bindParam(':Broken_Screen', $Broken_Screen);
  $stmt->bindParam(':ExtraInfo', $ExtraInfo);
  $stmt->bindParam(':Url', $File);

  $stmt->execute();
  header('location: /SMS/View/');
 ?>
