<?php
  include '_Connection.php';
  session_start();
  // sets the AssetID to Unknow which is an id in the database
  if(empty($_POST["AssetID"])) {
    $AssetID = 0;
  } else {
    $AssetID = $_POST["AssetID"];
  }

  $UpdatedJob = "UPDATE `job` SET
  `AssetID` = '".$AssetID."',
  `Broken_Mouse` = '" . $_POST["Broken_Mouse"] ."',
  `Broken_Keyboard` = '" . $_POST["Broken_Keyboard"] ."',
  `Broken_Screen` = '" . $_POST["Broken_Screen"] ."',
  `ExtraInfo` = '" . $_POST["ExtraInfo"] ."',
  `PartsUsed` = '" . $_POST["PartsUsed"] ."'
  WHERE `job`.`JobID` = '". $_POST["JobID"] ."';";
  $conn = dbConnect();
  $stmt = $conn->prepare($UpdatedJob);
  $stmt->execute();
?>
