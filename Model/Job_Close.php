<?php
// Close Job Function
session_start();
include '../Model/_Connection.php';
  $CloseJob = "UPDATE `job`
   SET
    `AssetID` = '" . $_POST["AssetID"] ."',
    `Broken_Mouse` = '" . $_POST["Broken_Mouse"] ."',
    `Broken_Keyboard` = '" . $_POST["Broken_Keyboard"] ."',
    `Broken_Screen` = '" . $_POST["Broken_Screen"] ."',
    `ExtraInfo` = '" . $_POST["ExtraInfo"] ."',
    `PartsUsed` = '" . $_POST["PartsUsed"] ."',
    `JobStatusID` = 2,
    `DateComplete` = 0
   WHERE
    `job`.`JobID` = '". $_POST["JobID"] ."';";
  $conn = dbConnect();
  $stmt = $conn->prepare($CloseJob);
  $stmt->execute();
?>
