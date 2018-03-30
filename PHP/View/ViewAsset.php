<?php
	session_start();
	include 'include/Admin_Access.php';
	include 'include/header.php';
	include '../Connection.php';


?>
<div class="Work_Around_Nav">
  <div class="container">
    <h1>Asset Management</h1>
    <p>Current Time:
      <span class="clock" id="time"></span>
    </p>
  </div>
  <div class="container">
    <div class="row">
      <div class="row_heading">
        <h3>Filter Rooms</h3>
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

          <span class="input-group-addon" id="basic-addon1">Type Of Device</span>
          <select class="form-control" name="Displayed" id="Displayed">
            <option disabled selected>What Type Of Device Are You Looking For </option>
						<?php
						$TypeOfDevice = "SELECT DISTINCT Type FROM asset;";
						$conn = dbConnect();
						$stmt = $conn->prepare($TypeOfDevice);
						$stmt->execute();
						$device = $stmt->fetchAll(PDO::FETCH_ASSOC);


						for($loop = 0; $loop < count($device); $loop++) {
							echo 	'<option value="' . $device[$loop]['Type'] . '" class="' . $device[$loop]['Type'] . '" Name="TypeOfDevice"> ' . $device[$loop]['Type'] . '</option>';
						}

          	echo	'</select>';
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
          <th>Asset Number</th>
          <th>Brand</th>
          <th>Model</th>
          <th>Location</th>
          <th>Date Introduced</th>
          <th>Date Written Off</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
				<!-- MUST DO A SORT THROUGHT JOBS FUNCTION -->
      <?php
        $JobsLogged_MySQL = "SELECT * FROM asset
					INNER JOIN rooms ON asset.RoomID = rooms.RoomID
					INNER JOIN building ON rooms.BuildingID = building.BuildingID ";
        $conn = dbConnect();
      	$stmt = $conn->prepare($JobsLogged_MySQL);
      	$stmt->execute();
      	$result = $stmt->fetchAll();

        // print_r($result);
        // die();
        foreach($result as $row) {

          echo "<tr>";
          echo '<th scope="row"> ' . $row['AssetID'] . ' </th>';
          echo '<td>' . $row['Brand'] . '</td>';
          echo '<td>' . $row['Model'] . '</td>';
					echo '<td>'. $row['BuildingName'] . ' - ' . $row['RoomName'] . '</td>';
          echo '<td>' . $row['DateIntroduced'] . '</td>';
          echo '<td>' . $row['DateWrittenOff'] . '</td>';
    			echo '<td><button type="button" class="btn btn-ms btn-info" name="button" onclick="OpenAsset(this)" value="'. $row['AssetID'] .'" data-toggle="modal" data-target="#AssetInfo">Edit Details</button></td>';
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
  <div class="modal fade" id="AssetInfo" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" name="AssetNumber" id="AssetNumber">Asset Number </h4></h4>
        </div>
        <div class="modal-body">
					<form class="" id="ViewAsset" action="#" method="POST">
						<input type="text" hidden name="Type" id="Type">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Asset Number</span>
              <input type="text" class="form-control" aria-describedby="basic-addon1" id="AssetID" name="AssetID">
            </div>
						<div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Brand</span>
              <input type="text"  class="form-control" aria-describedby="basic-addon1" name="Brand" id="Brand">
            </div>

            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Model</span>
              <input type="text" class="form-control" aria-describedby="basic-addon1" id="Model" name="Model">
            </div>
						<div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Serial Number</span>
              <input type="text" class="form-control" aria-describedby="basic-addon1" id="Serial_Number" name="Serial_Number">
            </div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Location</span>
							<input type="text"  class="form-control" aria-describedby="basic-addon1" id="LocationID" name="LocationID">
						</div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Date Introduced</span>
							<input disabled type="text"  class="form-control" aria-describedby="basic-addon1" name="DateIntroduced" id="DateIntroduced">
						</div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Date Written Off</span>
							<input type="text"  class="form-control" aria-describedby="basic-addon1" name="DateWrittenOff" id="DateWrittenOff">
						</div>

        </div>
			</form>
        <div class="modal-footer">
					<button type="button" name="button" class="btn btn-default" id="UpdateAsset"><span class="glyphicon glyphicon-ok" ></span> Updated Asset Information</button>

					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close Pop-up </button>
        </div>
      </div>

    </div>
  </div>

</div>

<script>
$(document).ready(function(){
    $("#Open").click(function(){
        $("#AssetInfo").modal();
    });
});
</script>
<script src="../Control/js/ajax.js" charset="utf-8"></script>
