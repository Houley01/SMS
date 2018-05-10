<?php
  function LoginModal() {
?>
    <!-- Modal -->
    <div class="modal fade" id="loginModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
          </div>
          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" class="" action="../Control/Login.php" method="POST">
              <div class="form-group">
                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="Admin">
              </div>
              <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Enter password" value="password">
              </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#login").click(function() {
          $("#loginModal").modal();
        });
      });
      </script>
<?php
  }
  function ViewOpenJobModal() {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="JobInfo" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" name="JobNumber" id="JobNumber">Job Number #<span id="HeaderJobNumber"></span> </h4>
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
        <?php switch ($_SESSION['UserStatus']) {
          case 1:
        echo  '<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close Pop-up </button>
          </div>';
            break;
          case 2:
            echo
              '<div class="modal-footer">
              <button type="button" name="button" class="btn btn-default" id="UpdateJob"><span class="glyphicon glyphicon-ok" ></span> Updated Job Information</button>

              <button type="button" name="button" class="btn btn-default" id="CloseJob"><span class="glyphicon glyphicon-thumbs-up"></span> Close Job </button>

              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close Pop-up </button>
              </div>';
            break;
          default:
        echo  '<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close Pop-up </button>
          </div>';
            break;
        } ?>

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
  <?php }
  function ViewCloseJobModal() {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="CloseJobInfo" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" name="JobNumber">Job Number #<span id="CloseJobNumber"></span></h4>
          </div>
          <div class="modal-body">
  						<input type="text" hidden name="JobID" id="CloseJobID" value="">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Name Of Reporter</span>
                <div disabled class="form-control" aria-describedby="basic-addon1" id="CloseUserID" name="UserID">
                </div>
              </div>
  						<div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Date Submitted</span>
                <div disabled class="form-control" aria-describedby="basic-addon1" name="DateLogged" id="CloseDateLogged">
                </div>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Location</span>
                <div disabled class="form-control" aria-describedby="basic-addon1" id="CloseRoomID" name="RoomID">
                </div>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">AssetID</span>
                <div class="form-control" aria-describedby="basic-addon1" id="CloseAssetID" name="AssetID" placeholder="Please add the AssetID of The Broken Items">
              </div>
            </div>
  						<div class="row_heading">
  							<h5>Broken Equipment</h5>
  						</div>
  						<div class="input-group">
  							<span class="input-group-addon" id="basic-addon1">Mouse</span>
                <div class="form-control" aria-describedby="basic-addon1" id="CloseBroken_Mouse" name="Broken_Mouse" placeholder="Mouse">
                </div>
  							<span class="input-group-addon" id="basic-addon1">Keyboard</span>
  	            <div class="form-control" aria-describedby="basic-addon1" id="CloseBroken_Keyboard" name="Broken_Keyboard" placeholder="Keyboard">
                </div>
  							<span class="input-group-addon" id="basic-addon1">Screen</span>
  	 						<div class="form-control" aria-describedby="basic-addon1" id="CloseBroken_Screen" name="Broken_Screen" placeholder="Screen">
              </div>
            </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Extra Information</span>
                <div class="form-control" aria-describedby="basic-addon1" id="CloseExtraInfo" name="ExtraInfo">
              </div>
              </div>
  						<div class="input-group">
  							<span class="input-group-addon" id="basic-addon1">Parts Used</span>
  							<div  class="form-control" aria-describedby="basic-addon1" name="PartsUsed" id="ClosePartsUsed">
  						</div>
              </div>
  						<div class="input-group">
  							<span class="input-group-addon" id="basic-addon1">Job Status</span>
  							<div disabled class="form-control" aria-describedby="basic-addon1" name="JobStatusID" id="CloseJobStatusID">
  						</div>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Date Complete</span>
                <div disabled class="form-control" aria-describedby="basic-addon1" name="DateComplete" id="CloseDateComplete">
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close Pop-up </button>
        </div>
      </div>
    </div>
  </div>
    <script>
    $(document).ready(function(){
        $("#CloseJobButton").click(function(){
            $("#CloseJobInfo").modal();
        });
    });
    </script>
  <?php }
  function testAlert() { ?>
    <!-- Modal -->
    <div class="modal fade" id="AlertModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4><span class="glyphicon glyphicon-lock"></span> Error</h4>
          </div>
          <!-- <div class="modal-body" style="padding:40px 50px;">

        </div> -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close Alert</button>

        </div>
      </div>

    </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#Alert").click(function() {
        $("#AlertModal").modal();
      });
    });
    </script>
<?php }

  // Asset Information Modal
  function AssetInfoModal() {
?>
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
<?php
  }
?>
