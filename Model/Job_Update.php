<?php
  require_once '_Connection.php';
  require_once '../Model/Functions.php';
  session_start();
  // sets the AssetID to Unknow which is an id in the database
  if(empty($_POST["AssetID"])) {
    $AssetID = 0;
  } else {
    $AssetID  = filter_var(clean($_POST["AssetID"]), FILTER_SANITIZE_STRING);
  }

  $Broken_Mouse  = filter_var(clean($_POST["Broken_Mouse"]), FILTER_SANITIZE_STRING);
  $Broken_Keyboard  = filter_var(clean($_POST["Broken_Keyboard"]), FILTER_SANITIZE_STRING);
  $Broken_Screen  = filter_var(clean($_POST["Broken_Screen"]), FILTER_SANITIZE_STRING);
  $ExtraInfo  = filter_var(clean($_POST["ExtraInfo"]), FILTER_SANITIZE_STRING);
  $PartsUsed  = filter_var(clean($_POST["PartsUsed"]), FILTER_SANITIZE_STRING);
  $JobID  = filter_var(clean($_POST["JobID"]), FILTER_SANITIZE_STRING);
  $UpdatedJob = "UPDATE `job` SET
  `AssetID` = :AssetID,
  `Broken_Mouse` = :Broken_Mouse,
  `Broken_Keyboard` = :Broken_Keyboard,
  `Broken_Screen` = :Broken_Screen,
  `ExtraInfo` = :ExtraInfo,
  `PartsUsed` = :PartsUsed
  WHERE `job`.`JobID` = :JobID;";
  $conn = dbConnect();
  $stmt = $conn->prepare($UpdatedJob);
  $stmt->bindParam(':AssetID', $AssetID);
  $stmt->bindParam(':Broken_Mouse', $Broken_Mouse);
  $stmt->bindParam(':Broken_Keyboard', $Broken_Keyboard);
  $stmt->bindParam(':Broken_Screen', $Broken_Screen);
  $stmt->bindParam(':ExtraInfo', $ExtraInfo);
  $stmt->bindParam(':PartsUsed', $PartsUsed);
  $stmt->bindParam(':JobID', $JobID);
  $stmt->execute();
?>
