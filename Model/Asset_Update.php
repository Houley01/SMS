<?php
include '../Model/_Connection.php';
session_start();

$UpdatedJob = "UPDATE `asset` SET
`AssetID` = '" . $_POST["AssetID"] ."',
`Brand` = '" . $_POST["Brand"] ."',
`Model` = '" . $_POST["Model"] ."',
`Type` = '" . $_POST["Type"] ."',
`Serial_Number` = '" . $_POST["Serial_Number"] ."',
`DateWrittenOff` = '" . $_POST["DateWrittenOff"] ."'
WHERE `asset`.`assetID` = '". $_POST["AssetID"] ."';";
$conn = dbConnect();
$stmt = $conn->prepare($UpdatedJob);
$stmt->execute();

?>
