<?php
	include '../Connection.php';
	$Job = $_GET['OpenJob'];
	header('Content-Type: application/json');

		$JobModal = "SELECT
    * FROM job
		INNER JOIN rooms ON job.RoomID = rooms.RoomID
		INNER JOIN building ON rooms.BuildingID = building.BuildingID
		INNER JOIN jobstatus ON job.JobStatusID = jobstatus.JobStatusID
		INNER JOIN user ON job.UserID = user.UserID 
		 WHERE`JobID` = '" . $Job . "' ;";
		$conn = dbConnect();
		$stmt = $conn->prepare($JobModal);
		$stmt->execute();
		$staticJob = $stmt->fetchAll(PDO::FETCH_ASSOC);


	if (isset($Job)) {

		echo json_encode($staticJob);

	}else{
			echo json_encode(Array($Jobs,false));
	}

 ?>
