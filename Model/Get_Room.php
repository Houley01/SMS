<?php
	include '../Model/_Connection.php';
	$roomdetails = $_GET['RoomDetails'];
	header('Content-Type: application/json');

		$BuildingOptions = "SELECT * FROM `rooms` WHERE `BuildingID` = ". $roomdetails ." ;";
		$conn = dbConnect();
		$stmt = $conn->prepare($BuildingOptions);
		$stmt->execute();
		$staticBuildingResults = $stmt->fetchAll(PDO::FETCH_ASSOC);


	if (isset($roomdetails)) {

		echo json_encode($staticBuildingResults);

	}else{
			echo json_encode(Array($roomdetails,false));
	}

 ?>
