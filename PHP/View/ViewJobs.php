<?php
		include 'include/header.php';
		include '../Connection.php';
		include 'include/Admin_Access.php';
?>
<div class="Work_Around_Nav">
  <div class="container">
    <h1>View Jobs</h1>
    <?php include 'include/clock.php'; ?>
  </div>
	<div class="container">
		<div class="row">
			<div class="Phone_And_Tablet">
				<div class="row_heading">
					<h3>Filter Rooms</h3>
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Job Status</span>
	        <select class="form-control" name="JobStatus" id="JobStatus">
	          <option disabled selected>Please Select Job Status</option>
	          <option value="1">Open</option>
	          <option value="2">Closed</option>
	        </select>
				</div>
				<div class="input-group">
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

					</div>
					<div class="input-group">
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
		<!-- Laptop screen plus  -->
		<div class="No_Phone No_Tablet">
				<div class="row_heading">
			 <h3>Filter Rooms</h3>
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
		</div>
    <div class="container">
      <div class="row">
					<div class="col-md-2 col-xs-3 Heading_Table">Job Number</div>
					<div class="col-md-2 col-xs-3 Heading_Table">Location</div>
					<div class="col-md-1 No_Phone No_Tablet Heading_Table">Mouse</div>
					<div class="col-md-1 No_Phone No_Tablet Heading_Table">Keyboard</div>
					<div class="col-md-2 No_Phone No_Tablet Heading_Table">Screen</div>
					<div class="col-md-2 col-xs-3 Heading_Table">Job Status</div>
					<div class="col-md-2 col-xs-2 Heading_Table">View</div>

      </div>

      <div>
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

          echo '<div class="Row_Table row">';
          echo '<div class="col-md-2 col-xs-3"> ' . $row['JobID'] . ' </div>';
          echo '<div class="col-md-2 col-xs-3">'. $row['BuildingName'] . ' - Room ' . $row['RoomName'] . '</div>';
          echo '<div class="col-md-1 No_Phone No_Tablet">' . $row['Broken_Mouse'] . ' Mouse</div>';
          echo '<div class="col-md-1 No_Phone No_Tablet">' . $row['Broken_Keyboard'] . ' Keyboard</div>';
          echo '<div class="col-md-2 No_Phone No_Tablet">' . $row['Broken_Screen'] . ' Screens</div>';
          echo '<div class="col-md-2 col-xs-3">' . $row['JobStatusName'] . '</div>';
          echo '<div class="col-md-2 col-xs-2"><button type="button" class="btn btn-ms btn-info" name="button" onclick="OpenJob(this)" value="'. $row['JobID'] .'" data-toggle="modal" data-target="#JobInfo">View</button></div>';
          echo "</div>";
        }
      ?>
		</div>

	</div>

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
					<form class="" id="ViewJob" action="../Model/JobUpdate.php" method="POST">
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
			</form>
        <div class="modal-footer">
					<button type="button" name="button" class="btn btn-default" id="UpdateJob"><span class="glyphicon glyphicon-ok" ></span> Updated Job Information</button>

					<button type="button" name="button" class="btn btn-default" id="CloseJob"><span class="glyphicon glyphicon-thumbs-up"></span> Close Job </button>

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
