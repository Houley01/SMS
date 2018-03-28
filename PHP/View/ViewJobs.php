<?php
		include 'include/header.php';
		include '../Connection.php';
		include 'include/Admin_Access.php';
?>
<div class="Work_Around_Nav">
  <div class="container">
    <h1>View Jobs</h1>
    <p>Current Time:
      <span class="clock" id="time"></span>
    </p>
  </div>
  <div class="container">
    <div class="row">
      <div class="row_heading">
        <h3>Filter Jobs</h3>
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Job Status</span>
        <select class="form-control" name="JobStatus" id="JobStatus">
          <option disabled selected>Please Select Job Status</option>
          <option value="1">Open</option>
          <option value="2">Closed</option>
        </select>

        <span class="input-group-addon" id="basic-addon1">Building</span>
				<select class="form-control" name="Building" id="BuildingNumber" onchange="GetRoomInfo(this.value)">
					<option disabled selected>Please Select What Building </option>
					<?php

					$BuildingOptions = "SELECT * FROM `building`;";
					$conn = dbConnect();
					$stmt = $conn->prepare($BuildingOptions);
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

					for ($loop = 0; $loop < count($result); $loop++) {
						echo '<option value="' . $result[$loop]['BuildingID'] . '" class="' . $result[$loop]['BuildingName'] . '" Name="Building"> ' . $result[$loop]['BuildingName'] . '</option>';
					}
					echo "</select>";
					?>

          <span class="input-group-addon" id="basic-addon1">Limit Number Of Jobs</span>
          <select class="form-control" name="Displayed" id="Displayed">
            <option disabled selected>Limit Number Of Jobs Displayed </option>
            <option value="">5</option>
            <option value="">10</option>
            <option value="">15</option>
            <option value="">20</option>
            <option value="">25</option>
            <option value="">30</option>
          </select>

      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Job Number</th>
          <th>Location</th>
          <th>Mouse</th>
          <th>Keyboard</th>
          <th>Screen</th>
          <th>Job Status</th>
          <th>View</th>
        </tr>
      </thead>
      <tbody>
				<!-- MUST DO A SORT THROUGHT JOBS FUNCTION -->
      <?php
        $JobsLogged_MySQL = "SELECT * FROM job
				INNER JOIN rooms ON job.RoomID = rooms.RoomID
				INNER JOIN building ON rooms.BuildingID = building.BuildingID
				INNER JOIN jobstatus ON job.JobStatusID = jobstatus.JobStatusID;";
        $conn = dbConnect();
      	$stmt = $conn->prepare($JobsLogged_MySQL);
      	$stmt->execute();
      	$result = $stmt->fetchAll();

        // print_r($result);
        // die();
        foreach($result as $row) {

          echo "<tr>";
          echo '<th scope="row"> ' . $row['JobID'] . ' </th>';
          echo '<td>'. $row['BuildingName'] . ' - Room ' . $row['RoomName'] . '</td>';
          echo '<td>' . $row['Broken_Mouse'] . ' Mouse</td>';
          echo '<td>' . $row['Broken_Keyboard'] . ' Keyboard</td>';
          echo '<td>' . $row['Broken_Screen'] . ' Screens</td>';
          echo '<td>' . $row['JobStatusName'] . '</td>';
          echo '<td><button type="button" class="btn btn-ms btn-info" name="button" onclick="OpenJob(this)" value="'. $row['JobID'] .'" data-toggle="modal" data-target="#JobInfo">View/Updated</button></td>';
          echo "</tr>";
        }
      ?>
      </tbody>
    </table>

  </div>

  <hr>
  <?php
    include 'include/footer.php';
  ?>
</div>

  <!-- Modal -->
  <div class="modal fade" id="JobInfo" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" name="JobNumber" id="JobNumber">Job Number </h4></h4>
        </div>
        <div class="modal-body">
					<form class="" action="../Model/JobUpdate.php" method="POST">
						<input type="text" hidden name="JobID" id="JobID" value="">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Name Of Reporter</span>
              <input type="text" disabled class="form-control" aria-describedby="basic-addon1" id="UserID" name="UserID">
            </div>
						<div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Date Submitted</span>
              <input type="text" disabled class="form-control" aria-describedby="basic-addon1" name="DateLogged" id="DateLogged">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Location</span>
              <input type="text" disabled class="form-control" aria-describedby="basic-addon1" id="RoomID" name="RoomID">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">AssetID</span>
              <input type="text" class="form-control" aria-describedby="basic-addon1" id="AssetID" name="AssetID" placeholder="Please add the AssetID of The Broken Items">
            </div>
						<div class="row_heading">
							Broken Equipment
						</div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Mouse</span>
              <input type="text" class="form-control" aria-describedby="basic-addon1" id="Broken_Mouse" name="Broken_Mouse" placeholder="Mouse">

							<span class="input-group-addon" id="basic-addon1">Keyboard</span>
	            <input type="text" class="form-control" aria-describedby="basic-addon1" id="Broken_Keyboard" name="Broken_Keyboard" placeholder="Keyboard">

							<span class="input-group-addon" id="basic-addon1">Screen</span>
	 						<input type="text" class="form-control" aria-describedby="basic-addon1" id="Broken_Screen" name="Broken_Screen" placeholder="Screen">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Extra Information</span>
              <textarea rows="8" cols="80" class="form-control" aria-describedby="basic-addon1" id="ExtraInfo" name="ExtraInfo"></textarea>
            </div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Parts Used</span>
							<input type="text"  class="form-control" aria-describedby="basic-addon1" name="PartsUsed" id="PartsUsed">
						</div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Job Status</span>
							<input type="text" disabled class="form-control" aria-describedby="basic-addon1" name="JobStatusID" id="JobStatusID">
						</div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Date Complete</span>
              <input type="text" disabled class="form-control" aria-describedby="basic-addon1" name="DateComplete" id="DateComplete">
            </div>
        </div>
        <div class="modal-footer">
					<button type="submit" name="button" class="btn btn-default" id="UpdateJob"><span class="glyphicon glyphicon-ok" onclick="UpdateJob()"></span> Updated Job Information</button>

					<button type="button" name="button" class="btn btn-default" id="CloseJob"><span class="glyphicon glyphicon-thumbs-up"></span> Close Job </button>
				</form>

					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close Pop-up </button>
        </div>
      </div>

    </div>
  </div>

</div>

<script>
$(document).ready(function(){
    $("#Open").click(function(){
        $("#JobInfo").modal();
    });
});
</script>
<script src="../Control/js/ajax.js" charset="utf-8"></script>
