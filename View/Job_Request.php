<script src="../Control/JS/ajax.js"defer></script>
<?php
	session_start();
	require_once '../View/Include/Master_Include.php';
	switch ($_SESSION['UserStatus']) {
		case 1:
    	StaffNav();
    	break;

  	case 2:
    	AdminNav();
    	break;

		default:
			header('location: index.php');
			break;
}
	HTMLHeader();
 ?>
<div class="Work_Around_Nav">
    <div class="container">
      <h1>Report A Problem</h1>
      <?php Clock(); ?>
    </div>
  </div>
  <div class="container">
    <form class="" action="../Model/Submit_Form.php" method="post">
      <!-- name of person reporting a Problem -->
      <input type="text" hidden name="Username" value="">

			<div class="row">
				<div class="row_heading">
					<h3>What Building Is The Problem In?</h3>
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Building</span>
					<select class="form-control" name="Building" id="BuildingNumber" onchange="GetRoomInfo(this.value)" required>
						<option disabled selected>Please Select What Building </option>
						<?php
						$BuildingName = BuildingName();
						foreach ($BuildingName as $Building) {
						echo '<option value="' . $Building['BuildingID'] . '" class="' . $Building['BuildingName'] . '" Name="Building"> ' . $Building['BuildingName'] . '</option>';
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
          <select class="form-control" name="Room" id="RoomNumber" required>
            <option disabled selected>Please Select What Room #</option>
					</select>
				</div>

      </div>
      <div class="row">
        <div class="row_heading">
          <h3>Items Missing or Broken</h3>
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Number Of Mouse</span>
          <input type="text" class="form-control" placeholder="Number" aria-describedby="basic-addon1" id="Broken_Mouse" name="Broken_Mouse" onchange="OnChangeJobRequest(this)" data-validation="number" data-validation-allowing="range[0;25]" data-validation-error-msg="Please Type a Number Between 0 to 25." required
					<?php if (isset($_SESSION["Mouse"])) {
          	echo 'value="'.$_SESSION["Mouse"].'"';
          } ?>
					>
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Number Of Keyboards</span>
          <input type="text" class="form-control" placeholder="Number" aria-describedby="basic-addon1" id="Broken_Keyboard" name="Broken_Keyboard" onchange="OnChangeJobRequest(this)" data-validation="number" data-validation-allowing="range[0;25]" data-validation-error-msg="Please Type a Number Between 0 to 25." required
					 <?php if (isset($_SESSION["Keyboard"])) {
				 	 				echo 'value="'.$_SESSION["Keyboard"].'"';
				 			} ?>>
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Number Of Screens</span>
          <input type="text" class="form-control" placeholder="Number" aria-describedby="basic-addon1" id="Broken_Screen" name="Broken_Screen" onchange="OnChangeJobRequest(this)" data-validation="number" data-validation-allowing="range[0;25]" data-validation-error-msg="Please Type a Number Between 0 to 25." required
					<?php if (isset($_SESSION["Screen"])) {
				 		echo 'value="'.$_SESSION["Screen"].'"';
				 		} ?>>
        </div>
      </div>
      <div class="row">
        <div class="row_heading">
          <h3>Any Other Problem Or Infomation We May Need To Know Before Coming Out.</h3>
        </div>
        <textarea name="ExtraInfo" rows="8" cols="80" class="form-control" placeholder="Any Infomation You Wish To Add" spellcheck="true" wrap="soft" draggable="false" onchange="OnChangeJobRequest(this)" id="ExtraInfo" required data-validation="custom" data-validation-regexp="^[A-Za-z -\'  0-9]{0,}" data-validation-error-msg="Please Enter Details Of How The Event Happened, And What The Device Is Doing. "><?php if (isset($_SESSION["ExtraInfo"])) {echo $_SESSION["ExtraInfo"];}?></textarea>
				<p><span id="MaxLengthOfTextArea">1000</span> Characters Left</p>
      </div>

      <div class="row">
        <input type="submit" class="btn btn-lg btn-success" name="" value="Submit" required data-validation="disabledFormFilter">
      </div>
    </form>


    <hr>
<?php HTMLFooter(); ?>
