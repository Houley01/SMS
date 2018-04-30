	<div class="jumbotron">
		<div class="container">
			<h1>Welcome, <?php echo $_SESSION['FName']; ?></h1>
			<h2>Stocktake Managment System</h2>
			<p>Current Time:
				<span class="clock" id="time"></span>
			</p>
		</div>
	</div>
	<?php
	include '../Connection.php';

		$Most_Recent = "SELECT
    *	FROM job INNER JOIN rooms ON job.RoomID = rooms.RoomID INNER JOIN building ON rooms.BuildingID = building.BuildingID INNER JOIN jobstatus ON job.JobStatusID = jobstatus.JobStatusID	WHERE job.JobStatusID = 1	ORDER BY job.JobID DESC LIMIT 3;";

			$conn = dbConnect();
			$stmt = $conn->prepare($Most_Recent);
			$stmt->execute();
			$Results_Most_Recent = $stmt->fetchAll(PDO::FETCH_ASSOC);

			//print_r($Results_Most_Recent);
			echo '<div class="container">';
			// Most Recent Jobs
			echo '<div class="row">';
			echo '	<h2 class="heading">Most Recent Job Request</h2>';
			foreach ($Results_Most_Recent as $Results_Most_Recent) {
			echo '<div class="col-md-4">';
				 // TITTLE
			echo '	<h3>Job Number <span>#'. $Results_Most_Recent['JobID'] . '</span> </h3>';

				 // Location
		echo '		<h2>Location</h2>';
		echo '<p>'.$Results_Most_Recent["BuildingName"].' - '.$Results_Most_Recent["RoomName"].' </p>';
				// Job Description Heading
		echo '		<h3>Quick Summary</h3>';
				 // Quick Summary
			echo '<p> Broken Mouse '.$Results_Most_Recent["Broken_Mouse"].' </p>
			<p> Broken Keyboard '.$Results_Most_Recent["Broken_Keyboard"].' </p>
			<p> Broken Screen '.$Results_Most_Recent["Broken_Screen"].' </p>';
				 // Link To Job Form
			echo '	<p><a class="btn btn-default" href="#" role="button">View More Details <span class="glyphicon glyphicon-chevron-right"></span></a></p>';
			echo '</div>';
		}
			?>
		</div>

		<hr>

		<!-- Most Recent Jobs Complete -->
		<div class="row">
			<h2 class="heading">Most Recent Jobs Complete</h2>
			<div class="col-md-4">
				<!-- TITTLE -->
				<h2>Job Title</h2>
				<!-- Location-->
				<h3>Location</h3>
				<!--Job Description Heading -->
				<h3>Description Of The Job Request</h3>
				<!-- Job Description -->
				<p>Computer in A25 are missing 3 mouse, please fix as soon as possible.</p>
				<!-- Date and Time Completed -->
				<h4>Date Completed:../../....</h4>
				<h4>Time Completed:..:.. AM/PM</h4>
				<!-- Link To Job Form -->
				<p><a class="btn btn-default" href="#" role="button">View More Details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
			</div>
			<div class="col-md-4">
				<!-- TITTLE -->
				<h2>Job Title</h2>
				<!-- Location-->
				<h3>Location</h3>
				<!--Job Description Heading -->
				<h3>Description Of The Job Request</h3>
				<!-- Job Description -->
				<p>Computer in A25 are missing 3 mouse, please fix as soon as possible.</p>
				<!-- Date and Time Completed -->
				<h4>Date Completed:../../....</h4>
				<h4>Time Completed:..:.. AM/PM</h4>
				<!-- Link To Job Form -->
				<p><a class="btn btn-default" href="#" role="button">View More Details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
			</div>
			<div class="col-md-4">
				<!-- TITTLE -->
				<h2>Job Title</h2>
				<!-- Location-->
				<h3>Location</h3>
				<!--Job Description Heading -->
				<h3>Description Of The Job Request</h3>
				<!-- Job Description -->
				<p>Computer in A25 are missing 3 mouse, please fix as soon as possible.</p>
				<!-- Date and Time Completed -->
				<h4>Date Completed:../../....</h4>
				<h4>Time Completed:..:.. AM/PM</h4>
				<!-- Link To Job Form -->
				<p><a class="btn btn-default" href="#" role="button">View More Details <span class="glyphicon glyphicon-chevron-right"></span></a></p>
			</div>
		</div>

		<hr>
