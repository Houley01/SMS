<script src="../Control/js/ajax.js"defer></script>
<?php
	session_start();
	include 'include/header.php';
	include '../Connection.php';
	switch ($_SESSION['UserStatus']) {
		case 1:
    	include 'include/Staff_Nav.php';
    	break;

  	case 2:
    	include 'include/Admin_Nav.php';
    	break;

		default:
			header('location: index.php');
			break;
}

 ?>
<div class="Work_Around_Nav">
    <div class="container">
      <h1>Report A Problem</h1>
      <p>Current Time:
        <span id="time" class="clock"></span>
      </p>
    </div>
  </div>
  <div class="container">
    <form class="" action="index.html" method="post">
      <!-- name of person reporting a Problem -->
      <input type="text" hidden name="Username" value="">

			<div class="row">
				<div class="row_heading">
					<h3>What Building Is The Problem In?</h3>
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Building</span>
					<select class="form-control" name="Room" id="RoomNumber">
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
			</div>

      <div class="row">
        <div class="row_heading">
          <h3>What Room Is The Problem In?</h3>
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Room Number #</span>
          <select class="form-control" name="Room" id="RoomNumber">
            <option disabled selected>Please Select What Room #</option>
						<?php
						// TEST version $RoomOptions = "SELECT * FROM `location` WHERE `Building` = 'A_Block';";
						$RoomOptions = "SELECT * FROM `rooms` WHERE `BuildingID` = 1;";
						$conn = dbConnect();
						$stmt = $conn->prepare($RoomOptions);
						$stmt->execute();
						$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


						for ($loop = 0; $loop < count($result); $loop++) {
							echo '<option value="' . $result[$loop]['RoomID'] . '" class="' . $result[$loop]['BuildingID'] . '" Name="Room"> ' . $result[$loop]['RoomName'] . '</option>';
						}
						echo "</select>";
						?>

				</div>

      </div>
      <div class="row">
        <div class="row_heading">
          <h3>Items Missing or Broken</h3>
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Number Of Mouse</span>
          <input type="text" class="form-control" placeholder="Number" aria-describedby="basic-addon1" id="Broken_Mouse">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Number Of Keyboards</span>
          <input type="text" class="form-control" placeholder="Number" aria-describedby="basic-addon1" id="Broken_Mouse">
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Number Of Screens</span>
          <input type="text" class="form-control" placeholder="Number" aria-describedby="basic-addon1" id="Broken_Mouse">
        </div>
      </div>
      <div class="row">
        <div class="row_heading">
          <h3>Any Other Problem Or Infomation We May Need</h3>
        </div>
        <textarea name="name" rows="8" cols="80" class="form-control" placeholder="Any Infomation You Wish To Add" spellcheck="true" wrap="soft" draggable="false"></textarea>
      </div>

      <div class="row">
        <input type="submit" class="btn btn-lg btn-success" name="" value="Submit">
      </div>
    </form>


    <hr>
<?php
include 'include/footer.php';
 ?>
