<?php
	session_start();
	require_once 'include/Admin_Access.php';
	require_once '../Model/_Connection.php';
	require_once '../View/Include/Master_Include.php';
	HTMLHeader();


?>
<div class="Work_Around_Nav">
  <div class="container">
    <h1>Asset Management</h1>
    <?php clock(); ?>
  </div>
  <div class="container">
    <div class="row">
			<div class="Phone_And_Tablet">
      	<div class="row_heading">
        	<h3>Filter Rooms</h3>
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
          <span class="input-group-addon" id="basic-addon1">Type Of Device</span>
          <select class="form-control" name="Displayed" id="Displayed">
            <option disabled selected>What Type Of Device Are You Looking For </option>
						<?php
						$Device = DeviceType();

						foreach ($Device as $Device) {
							echo 	'<option value="' . $Device['Type'] . '" class="' . $Device['Type'] . '" Name="TypeOfDevice"> ' . $Device['Type'] . '</option>';
						}
          	echo	'</select>';
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

				 <span class="input-group-addon" id="basic-addon1">Type Of Device</span>
				 <select class="form-control" name="Displayed" id="Displayed">
					 <option disabled selected>What Type Of Device Are You Looking For </option>
					 <?php
					 $Device = DeviceType();
					 foreach ($Device as $Device) {
						 echo 	'<option value="' . $Device['Type'] . '" class="' . $Device['Type'] . '" Name="TypeOfDevice"> ' . $Device['Type'] . '</option>';
					 }
					 echo	'</select>';
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
          <div class="col-md-2 col-xs-4 Heading_Table">Asset Number</div>
          <div class="col-md-2 col-xs-3 Heading_Table">Brand</div>
          <div class="col-md-3 No_Phone No_Tablet Heading_Table">Model</div>
          <div class="col-md-3 col-xs-3 Heading_Table">Location</div>
          <!-- <div class="col-md-2">Date Introduced</div>
          <div class="col-md-2">Date Written Off</div> -->
          <div class="col-md-2 col-xs-2 Heading_Table">Edit</div>
      </div>
      <!-- <div class="Body_Table"> -->


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
				$count = 0;
        foreach($result as $row) {

          echo '<div class="Row_Table row" id="'.$count++.'">';
          echo '<div class="col-md-2 col-xs-4"> ' . $row['AssetID'] . ' </div>';
          echo '<div class="col-md-2 col-xs-3">' . $row['Brand'] . '</div>';
          echo '<div class="col-md-3 No_Phone No_Tablet">' . $row['Model'] . '</div>';
					echo '<div class="col-md-3 col-xs-3">'. $row['BuildingName'] . ' - ' . $row['RoomName'] . '</div>';
        //  echo '<div class="col-md-2">' . $row['DateIntroduced'] . '</div>';
        //  echo '<div class="col-md-2">' . $row['DateWrittenOff'] . '</div>';
    			echo '<div class="col-md-2 col-xs-2"><button type="button" class="btn btn-ms btn-info" name="button" onclick="OpenAsset(this)" value="'. $row['AssetID'] .'" data-toggle="modal" data-target="#AssetInfo">Detail</button></div>';
          echo "</div>";
        }
      ?>
      <!-- </div> -->
    </div>

  </div>

  <hr>
  <?php
    HTMLFooter();
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
