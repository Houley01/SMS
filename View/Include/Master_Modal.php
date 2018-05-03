<?php
  function ViewJobModal() {
    ?>
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
    <script>
    $(document).ready(function(){
        $("#Open").click(function(){
            $("#JobInfo").modal();
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
<?php } ?>


 <!-- <script type="text/javascript">
   $(document).ready(function() {
     $("#login").click(function() {
       $("#loginModal").modal();
     });
   });
 </script> -->
