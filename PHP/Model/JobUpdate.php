<?php
include '../Connection.php';
session_start();

$UpdatedJob = "UPDATE `job` SET
`AssetID` = '" . $_POST["AssetID"] ."',
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
