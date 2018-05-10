<?php
  require_once '../Model/_Connection.php';
  require_once '../Model/Functions.php';
  require_once '../View/Include/Master_Modal.php';
// Header Content
  function HTMLHeader() { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Stocktake Managment System</title>

    	<!-- 3RD PARTY FILES -->
    	<!-- Bootstrap -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    	<!--[if lt IE 9]>
    			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    		<![endif]-->

    	<!-- CUSTOM FILES -->
    	<link rel="stylesheet" type="text/css" media="screen" href="/SMS/View/CSS/master.css" />
    	<script src="../Control/JS/main.js" defer></script>


    </head>

    <body>
<?php
  }
// Footer
function HTMLFooter() { ?>
  </div>
  <footer>
  		<p class="Same_Line">Developed By Ethan Houley.</p>
  		<p class="Same_Line"> Copyright &copy; 2018 Copyright Holder All Rights Reserved.</p>
  	</footer>
  <!-- jQuery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- jQuery addons -->
  <!-- jquery validate -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <!-- Date Picker (Remover Before Production) -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
  <!-- Bootstrap JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <!-- Ajax JavaScript File -->
  <script src="../Control/JS/ajax.js"></script>

  <div id="Loading_Screen"><?php Loading(); ?></div>
  <div class="error">
    <p id="BrowserInfomartion"></p>
    <div>
    <?php     print_r ($_SESSION); ?>
    </div>
    <?php
      if(isset($_SESSION['error'])) {
        echo '<div class="error message">';
        echo $_SESSION['error'];
        echo '</div>';
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['message'])) {
        echo '<div class="info message">';
        echo $_SESSION['message'];
        echo '</div>';
        unset($_SESSION['message']);
      }


}
// Clock
 function clock() { ?>
      <p>Current Time:
        <span class="clock" id="time"></span>
      </p>
 <?php }

// Non Login
  function LoginNav() {
    // Non-Login Nav ?>
    <nav class="navbar navbar-inverse remove_radius navbar-fixed-top background_black">
    		<div class="container-fluid">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    	        <span class="sr-only">Toggle navigation</span>
    	        <span class="icon-bar"></span>
    	        <span class="icon-bar"></span>
    	        <span class="icon-bar"></span>
    	      </button>
    				<a class="navbar-brand" href="#">SMS</a>
    			</div>
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				<ul class="nav navbar-nav">
    					<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    				</ul>
    				<ul class="nav navbar-nav navbar-right ">
    					<li><a href="#" class="" id="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

    				</ul>
    			</div>
    			<!-- /.navbar-collapse -->
    		</div>
    		<!-- /.container-fluid -->
    	</nav>
    <?php
  }
  function LoginBody() {
    // Non-Login body ?>
    <div class="jumbotron">
    		<div class="container">
    			<h1>Please Login To View This Page</h1>
    			<h2>Stocktake Managment System</h2>
          <?php clock(); ?>
    	   </div>
    		<div class="container">
    		</div>
    		<hr>
    <?php
  }
// Staff
  function StaffNav() {
    // Staff Nav ?>
    <!-- Staff User Menu -->
    <nav class="navbar navbar-inverse remove_radius navbar-fixed-top background_black">
    	<div class="container-fluid">
    		<div class="navbar-header">
    			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    				<span class="sr-only">Toggle navigation</span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			</button>
    			<a class="navbar-brand" href="#">SMS</a>
    		</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    			<ul class="nav navbar-nav">
    				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    				<li><a href="Job_Request.php"><span class="glyphicon glyphicon-pencil"></span> Report A Problem</a></li>
    			</ul>
    			<ul class="nav navbar-nav navbar-right ">
    				<li><a href="../Control/Logout.php" class="text_nav"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    			</ul>
    		</div>
    	</div>
    </nav>
    <?php
  }
  function StaffBody() {
    // Staff Body ?>
    <div class="jumbotron">
    		<div class="container">
    		<?php echo '<h1>Welcome, '.$_SESSION['FName'].' </h1>'; ?>
    			<h2>Stocktake Managment System</h2>
        <?php clock();?>
        </div>
    	</div>
    	<div class="container">
    <?php  $ResultsMostRecentOpenSQL = MostRecentOpenJobSQL(); ?>

      <div class="container">
       <!-- Most Recent Jobs -->
      <div class="row">
      	<h2 class="heading">Most Recent Job Request</h2>
        <?php
        foreach ($ResultsMostRecentOpenSQL as $OpenJob) {
          echo '<div class="col-md-4">';
             // TITTLE
          echo '	<h3>Job Number <span># '.$OpenJob['JobID'].'</h3>';
             // Location
          echo '	<h3>Location</h3>';
          echo '  <p>'.$OpenJob["BuildingName"].' - '.$OpenJob["RoomName"].' </p>';
            // Job Description Heading
          echo '	<h3>Description From The Completed Job Request</h3>';
            // Job Description
          echo '	<p>'.$OpenJob['ExtraInfo'].' , Date the Job Was Logged: '.$OpenJob['DateLogged'].' </p>';
            // Date Completed
          echo '	<h4>Date Completed: '.$OpenJob['DateComplete'].'</h4>';
             // Link To Job Form
              echo '<button type="button" name="button" class="btn btn-default" id="CloseJobButton" onclick="CloseStaffViewableJob(this)" data-toggle="modal" data-target="#CloseJobInfo" value="'.$OpenJob["JobID"].'">View More Details <span class="glyphicon glyphicon-chevron-right"></span></button>';
              echo '</div>';
        }
    ?>
    		</div>

    		<hr>
    <?php
    ViewCloseJobModal();
  }
// Admin
  function AdminNav() {
    // Admin Nav
    ?>
    <!-- Admin User Menu -->
    	<nav class="navbar navbar-inverse remove_radius navbar-fixed-top background_black">
    		<div class="container-fluid">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="#">SMS</a>
    			</div>
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				<ul class="nav navbar-nav">
    					<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    					<li><a href="Job_Request.php"><span class="glyphicon glyphicon-pencil"></span> Report A Problem</a></li>
    					<li><a href="View_Jobs.php"><span class="glyphicon glyphicon-eye-open"></span> View Jobs</a></li>
    					<li class="dropdown">
    						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-collapse-down"></span> Asset Managment</a>
    						<ul class="dropdown-menu">
    							<li><a href="View_Asset.php"><span class="glyphicon glyphicon-eye-open"></span> View Asset</a></li>
    							<li><a href="Write_Assets_Off.php"><span class="glyphicon glyphicon-edit"></span> Write Assets Off</a></li>
    							<li><a href="#"><span class="glyphicon glyphicon-import"></span> Import Asset Information</a></li>
    						</ul>
    					</li>
    					<li><a href="Stats.php"><span class="glyphicon glyphicon-stats"></span> Statistics</a></li>
    				</ul>
    				<ul class="nav navbar-nav navbar-right ">
    					<li><a href="../Control/Logout.php" class="text_nav"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    				</ul>
    			</div>
    			<!-- /.navbar-collapse -->
    		</div>
    		<!-- /.container-fluid -->
    	</nav>
    	<!-- End OF Nav -->
  <?php
  }
  function AdminBody() {
    // Admin Body ?>
    <div class="jumbotron">
    		<div class="container">
    	<?php echo '<h1>Welcome, '.$_SESSION['FName'].'</h1>';
    			echo '<h2>Stocktake Managment System</h2>';
          clock();
    echo '</div>
    	</div>';
        $ResultsMostRecentOpenSQL = MostRecentOpenJobSQL();

    			echo '<div class="container">';
    			// Most Recent Jobs
    			echo '<div class="row">';
    			echo '	<h2 class="heading">Most Recent Job Request</h2>';
    			foreach ($ResultsMostRecentOpenSQL as $Recent_Jobs) {
    			echo '<div class="col-md-4">';
    				 // TITTLE
    			echo '	<h3>Job Number <span>#'. $Recent_Jobs['JobID'] . '</span> </h3>';
    				 // Location
    		echo '		<h2>Location</h2>';
    		echo '<p>'.$Recent_Jobs["BuildingName"].' - '.$Recent_Jobs["RoomName"].' </p>';
    				// Job Description Heading
    		echo '		<h3>Quick Summary</h3>';
    				 // Quick Summary
    			echo '<p> Broken Mouse '.$Recent_Jobs["Broken_Mouse"].' </p>
    			<p> Broken Keyboard '.$Recent_Jobs["Broken_Keyboard"].' </p>
    			<p> Broken Screen '.$Recent_Jobs["Broken_Screen"].' </p>';
    				 // Link To Job Form
    			echo '<button type="button" name="button" class="btn btn-default" id="Open" onclick="OpenJob(this)" data-toggle="modal" data-target="#JobInfo" value="'.$Recent_Jobs["JobID"].'">View More Details <span class="glyphicon glyphicon-chevron-right"></span></button>';
    			echo '</div>';

    		}
    		echo '
    		</div>

    		<hr> ';
?>
    		<!-- Most Recent Jobs Complete -->
    		<div class="row">
          <h2 class="heading">Most Recent Job Request Completed</h2>
    		<?php
        $ResultsMostRecentCloseSQL = MostRecentCloseJobSQL();
        foreach ($ResultsMostRecentCloseSQL as $CloseJob) {
          echo '<div class="col-md-4">';
    				 // TITTLE
    			echo '	<h3>Job Number <span># '.$CloseJob['JobID'].'</h3>';
    				 // Location
    			echo '	<h3>Location</h3>';
          echo '  <p>'.$CloseJob["BuildingName"].' - '.$CloseJob["RoomName"].' </p>';
    				// Job Description Heading
    			echo '	<h3>Description From The Completed Job Request</h3>';
    				// Job Description
    			echo '	<p>'.$CloseJob['ExtraInfo'].' , Date the Job Was Logged: '.$CloseJob['DateLogged'].' </p>';
    				// Date Completed
    			echo '	<h4>Date Completed: '.$CloseJob['DateComplete'].'</h4>';
    				 // Link To Job Form
    			    echo '<button type="button" name="button" class="btn btn-default" id="CloseJobButton" onclick="CloseStaffViewableJob(this)" data-toggle="modal" data-target="#CloseJobInfo" value="'.$CloseJob["JobID"].'">View More Details <span class="glyphicon glyphicon-chevron-right"></span></button>';
              echo '</div>';
        }
    			 ?>
    			</div>
    		</div>

    		<hr>

    <?php
    ViewOpenJobModal();
    ViewCloseJobModal();
  }

  // Limit Page Display
  function LimitDisplay() {
    echo '
      <option value="">5</option>
      <option value="">10</option>
      <option value="">15</option>
      <option value="">20</option>
      <option value="">25</option>
      <option value="">30</option>
    ';
  }
// Loading SVG
  function Loading() {
  ?>
    <h1 class="text-center">Loading Your Request</h1>
    <svg class="svg-divider" x="0px" y="0px" viewBox="0 0 80 3" xml:space="preserve">
    <rect x="1" fill="rgb" width="16" height=".2" text="Loading">
    <animate attributeName="x" attributeType="XML" values="1; 64; 1" begin="0s" dur="5s" repeatCount="indefinite">
    </rect>
  </svg>
  <?php }

?>
