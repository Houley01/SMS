<?php
include '../Connection.php';
session_start();

// Write Ajax For updated and close job functions.
// SQL Query Works
//(change Null to todays date, when the job is finished) 


// function $UpdatedJob()
// {
//   // Put this into a function
//   $UpdatedJob = "UPDATE `job` SET
//   `AssetID` = '" . $_POST["AssetID"] ."',
//   `Broken_Mouse` = '" . $_POST["Broken_Mouse"] ."',
//   `Broken_Keyboard` = '" . $_POST["Broken_Keyboard"] ."',
//   `Broken_Screen` = '" . $_POST["Broken_Screen"] ."',
//   `ExtraInfo` = '" . $_POST["ExtraInfo"] ."',
//   `PartsUsed` = '" . $_POST["PartsUsed"] ."'
//   WHERE `job`.`JobID` = '". $_POST["JobID"] ."';";
//   $conn = dbConnect();
//   $stmt = $conn->prepare($UpdatedJob);
//   $stmt->execute();
// }
//
// // Close Job Function
// function CloseJob($value='')
// {
//   $UpdatedJob = "UPDATE `job` SET
//   `JobStatusID` = 2
//   WHERE `job`.`JobID` = '". $_POST["JobID"] ."';";
//   $conn = dbConnect();
//   $stmt = $conn->prepare($UpdatedJob);
//   $stmt->execute();
// }
?>
