<?php
	include '../Connection.php';
	$Asset = $_GET['OpenAsset'];
	header('Content-Type: application/json');

		$AssetModal = "SELECT
    * FROM asset
		INNER JOIN rooms ON asset.RoomID = rooms.RoomID
		INNER JOIN building ON rooms.BuildingID = building.BuildingID
		 WHERE`AssetID` = '" . $Asset . "' ;";
		$conn = dbConnect();
		$stmt = $conn->prepare($AssetModal);
		$stmt->execute();
		$StaticAsset = $stmt->fetchAll(PDO::FETCH_ASSOC);


	if (isset($Asset)) {

		echo json_encode($StaticAsset);

	}else{
			echo json_encode(Array($Asset,false));
	}

 ?>
