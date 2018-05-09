<?php
  session_start();
  require_once 'Include/Admin_Access.php';
  require_once 'Include/Master_Include.php';
  require_once 'Include/Master_Modal.php';
  HTMLHeader();
?>
  <div class="" id="DataPicker">

  </div>
  <div class="col-md-6">
    <canvas id="CanvasMonthlyJobs" width="300" height="300"></canvas>
  </div>
  <div class="col-md-6">

  </div>
<?php
  HTMLFooter();
?>
