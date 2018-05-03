<?php
//sanitise data sent via POST and SEND
  function Clean_User_Input($data) {
    $data = trim($data);
    $data= stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  // 3 Most Recent Open Jobs.
  function MostRecentOpenJobSQL() {
    $Most_Recent = "SELECT
    *	FROM job INNER JOIN rooms ON job.RoomID = rooms.RoomID INNER JOIN building ON rooms.BuildingID = building.BuildingID INNER JOIN jobstatus ON job.JobStatusID = jobstatus.JobStatusID	WHERE job.JobStatusID = 1	ORDER BY job.JobID DESC LIMIT 3;";
    $conn = dbConnect();
    $stmt = $conn->prepare($Most_Recent);
    $stmt->execute();
    $ResultsMostRecentOpenSQL = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $ResultsMostRecentOpenSQL;
  }
  // 3 Most Recent Close Jobs.
  function MostRecentCloseJobSQL() {
    $Most_Recent = "SELECT
    *	FROM job INNER JOIN rooms ON job.RoomID = rooms.RoomID INNER JOIN building ON rooms.BuildingID = building.BuildingID INNER JOIN jobstatus ON job.JobStatusID = jobstatus.JobStatusID	WHERE job.JobStatusID = 2	ORDER BY job.JobID DESC LIMIT 3;";
    $conn = dbConnect();
    $stmt = $conn->prepare($Most_Recent);
    $stmt->execute();
    $ResultsMostRecentCloseSQL = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $ResultsMostRecentCloseSQL;
  }
// Building
  function BuildingName() {
    $BuildingOptions = "SELECT * FROM `building`;";
    $conn = dbConnect();
    $stmt = $conn->prepare($BuildingOptions);
    $stmt->execute();
    $BuildingName = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $BuildingName;
  }
  function DeviceType() {
    $TypeOfDevice = "SELECT DISTINCT Type FROM asset;";
    $conn = dbConnect();
    $stmt = $conn->prepare($TypeOfDevice);
    $stmt->execute();
    $Device = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $Device;
  }
 ?>
