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
        <span class="clock">12:50:00 PM</span>
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
        <label class="radio-inline"><input type="radio" name="Building" value="A_Block">A Block</label>
        <label class="radio-inline"><input type="radio" name="Building" value="B_Block">B Block</label>
				<label class="radio-inline"><input type="radio" name="Building" value="C_Block">E Block</label>
				<label class="radio-inline"><input type="radio" name="Building" value="D_Block">D Block</label>
        <label class="radio-inline"><input type="radio" name="Building" value="E_Block">E Block</label>
        <label class="radio-inline"><input type="radio" name="Building" value="F_Block">F Block</label>
        <label class="radio-inline"><input type="radio" name="Building" value="G_Block">G Block</label>
				<label class="radio-inline"><input type="radio" name="Building" value="Sports_Hall">Sport Hall</label>
        <label class="radio-inline"><input type="radio" name="Building" value="Library">Library</label>
      </div>
      <div class="row">
        <div class="row_heading">
          <h3>What Room Is The Problem In?</h3>
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Room Number #</span>
          <select class="form-control" name="Room" id="Room Number">
            <option disabled selected>Please Select What Room #</option>
						<?php

						$RoomOptions = "SELECT * FROM `location` WHERE `Building` = 'A_Block';";
						$conn = dbConnect();
						$stmt = $conn->prepare($RoomOptions);
						$stmt->execute();
						$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
						for ($loop = 0; $loop < count($result); $loop++) {
							echo "<option value="$result[$loop]['LocationID']">"$result[$loop]['Room']"</option>";
						}

//						for ($loop = 0; $loop < count($result); $loop++) {
							//echo "<option value="$result[$loop]['LocationID']" Name="room">'$result[$loop]['Room']'</option>"

//							print '<option value="' . $result[$loop]['Building'] . '" Name="Room"> ' . $result[$loop]['Room'] . '</option>';
//						}


						?>

					</select>
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
