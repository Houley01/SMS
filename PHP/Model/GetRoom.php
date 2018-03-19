<?php

	include '../Connection.php';

	header('Content-Type: application/json');

	function GetBuilding($BuildingID)
	{
		$BuildingOptions = "SELECT * FROM `rooms` WHERE `BuildingID` = ". $BuildingID ." ;";
		$conn = dbConnect();
		$stmt = $conn->prepare($BuildingOptions);
		$stmt->execute();
		return $staticBuildingResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	print_r (GetBuilding(1));
	die();

	if (isset($_GET['RoomDetails'])) {
			echo json_encode(Array($_GET['RoomDetails']));
	}

 ?>
