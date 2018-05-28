<?php
	session_start();
	require_once 'Include/Admin_Access.php';
	require_once '../Model/_Connection.php';
	require_once '../View/Include/Master_Include.php';
	HTMLHeader();
?>
<div class="Work_Around_Nav">
  <div class="container">
    <h1>View Jobs</h1>
    <?php clock(); ?>
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
				 $BuildingName = BuildingName();
				 foreach ($BuildingName as $BuildingName) {
					 echo '<option value="' . $BuildingName['BuildingID'] . '" class="' . $BuildingName['BuildingName'] . '" Name="Building"> ' . $BuildingName['BuildingName'] . '</option>';
				 }
				 echo "</select>";
				 ?>

					</div>
					<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Limit Number Of Jobs</span>
					<select class="form-control" name="Displayed" id="Displayed">
						<option disabled selected>Limit Number Of Jobs Displayed </option>
						<?php LimitDisplay(); ?>
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
 				 $BuildingName = BuildingName();
 				 foreach ($BuildingName as $BuildingName) {
 					 echo '<option value="' . $BuildingName['BuildingID'] . '" class="' . $BuildingName['BuildingName'] . '" Name="Building"> ' . $BuildingName['BuildingName'] . '</option>';
 				 }
 				 echo "</select>";
 				 ?>

          <span class="input-group-addon" id="basic-addon1">Limit Number Of Jobs</span>
          <select class="form-control" name="Displayed" id="Displayed">
            <option disabled selected>Limit Number Of Jobs Displayed </option>
            <?php LimitDisplay(); ?>
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
      <?php
				$CompleteJobsList  = ViewAllJobs();
        foreach($CompleteJobsList  as $row) {
          echo '<div class="Row_Table row">';
          echo '<div class="col-md-2 col-xs-3"> ' . $row['JobID'] . ' </div>';
          echo '<div class="col-md-2 col-xs-3">'. $row['BuildingName'] . ' - Room ' . $row['RoomName'] . '</div>';
          echo '<div class="col-md-1 No_Phone No_Tablet">' . $row['Broken_Mouse'] . ' Mouse</div>';
          echo '<div class="col-md-1 No_Phone No_Tablet">' . $row['Broken_Keyboard'] . ' Keyboard</div>';
          echo '<div class="col-md-2 No_Phone No_Tablet">' . $row['Broken_Screen'] . ' Screens</div>';
          echo '<div class="col-md-2 col-xs-3">' . $row['JobStatusName'] . '</div>';
					if ($row['JobStatusID'] == 2) {
						echo '<div class="col-md-2 col-xs-2"><button type="button" class="btn btn-ms btn-info" name="button" onclick="CloseStaffViewableJob(this)" value="'. $row['JobID'] .'" data-toggle="modal" data-target="#CloseJobInfo">View</button></div>';
					} else {
          	echo '<div class="col-md-2 col-xs-2">
							<button type="button" class="btn btn-ms btn-info" name="button" onclick="OpenJob(this)" value="'. $row['JobID'] .'" data-toggle="modal" data-target="#JobInfo">View</button>
							</div>';
					}
          echo "</div>";
        }
      ?>
		</div>

	</div>

  </div>

  <hr>
  <?php
    HTMLFooter();
  ?>

</div>

  <?php
		ViewOpenJobModal();
		ViewCloseJobModal();
 	?>
</div>
<script src="../View/js/ajax.js" charset="utf-8"></script>
