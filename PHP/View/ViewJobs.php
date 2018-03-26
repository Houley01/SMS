<?php
//every website needs to have this statement in to
//help protect from people using pages that are
//not allowed..
	session_start();
	include 'include/header.php';
	include '../Connection.php';
	switch ($_SESSION['UserStatus']) {
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
          <option value="">Open</option>
          <option value="">Closed</option>
        </select>

        <span class="input-group-addon" id="basic-addon1">Building</span>
        <select class="form-control" name="Building" id="Building">
          <option disabled selected>Please Select Building</option>
          <option value="1">A Block</option>
          <option value="2">B Block</option>
        </select>

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
			<!--
				JobID, DataLogged, UserID, RoomID, Broken_Mouse, Broken_Keyboard, Broken_Screen, ExtraInfo, JobStatus, PartsUsed, DateComplete

					SELECT * FROM job INNER JOIN rooms ON job.RoomID = rooms.RoomID;
			-->

        <?php
        $JobsLogged_MySQL = "SELECT * FROM job INNER JOIN rooms ON job.RoomID = rooms.RoomID INNER JOIN building ON rooms.BuildingID = building.BuildingID";
        $conn = dbConnect();
      	$stmt = $conn->prepare($JobsLogged_MySQL);
      	$stmt->execute();
      	$result = $stmt->fetchAll();

        // print_r($result);
        // die();
        for ($loop = 0; $loop < count($result); $loop++) {

          echo "<tr>";
          echo '<th scope="row"> ' . $result[$loop]['JobID'] . ' </th>';
          echo '<td>'. $result[$loop]['BuildingName'] . ' - Room ' . $result[$loop]['RoomName'] . '</td>';
          echo '<td>' . $result[$loop]['Broken_Mouse'] . ' Mouse</td>';
          echo '<td>' . $result[$loop]['Broken_Keyboard'] . ' Keyboard</td>';
          echo '<td>' . $result[$loop]['Broken_Screen'] . ' Screens</td>';
          echo '<td>' . $result[$loop]['JobStatus'] . '</td>';
          echo '<td><button type="button" class="btn btn-ms btn-info" name="button" data-toggle="modal" data-target=#View">View/Updated</button></td>';
          echo "</tr>";
        }
          ?>
      </tbody>
    </table>
    <!--
    <div class="TableHeading">

    <div class="col-md-1">
      <p>Job Number<p>
    </div>
    <div class="col-md-1">
      <p class="TableHeading">Location</p>
    </div>
    <div class="col-md-2">
      <p class="TableHeading">Broken Mouse</p>
    </div>
    <div class="col-md-2">
      <p class="TableHeading">Broken Keyboard</p>
    </div>
    <div class="col-md-2">
      <p class="TableHeading">Broken Screen<p>
    </div>
    <div class="col-md-2">
      <p class="TableHeading">Job Status</p>
    </div>
    <div class="col-md-2">
      <p class="TableHeading">View/Update</p>
    </div>
  </div>
-->

  </div>

  <hr>
  <?php
    include 'include/footer.php';
  ?>
</div>

<!-- Modal -->
<div class="modal fade" id="View" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Job ID </h4>
      </div>
      <div class="modal-body">
        <form class="" action="index.html" method="post">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Name Of Reporter</span>
            <input type="text" disabled class="form-control" aria-describedby="basic-addon1" value="Sardiomin">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Location</span>
            <input type="text" disabled class="form-control" aria-describedby="basic-addon1" value="G03">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">AssetID</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" value="" placeholder="Please add the AssetID of The broken Items">
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Problem</span>
            <textarea rows="8" cols="80" class="form-control" aria-describedby="basic-addon1">	Mouse and Keyboard have been Taken. </textarea>
          </div>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Date Job Submit</span>
            <input type="text" disabled class="form-control" aria-describedby="basic-addon1" value="11/05/2018">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span> Updated </button>
        <button type="submit" name="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span> Close Job </button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
      </div>
    </div>
