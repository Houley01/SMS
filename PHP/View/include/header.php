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
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	<!-- CUSTOM FILES -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/master.css" />
	<script src="../Control/js/main.js"></script>
</head>

<body>
	<script type="text/javascript">

	// Start function after the page has loaded
	window.onload = function() {
	  startTime();
	}
	// get time and output
	function startTime() {
	  var today = new Date();
	  var h = today.getHours() > 12 ? today.getHours() - 12 : today.getHours();
	  var am_pm = today.getHours() >= 12 ? "PM" : "AM"; //if it is am or pm
	  var m = today.getMinutes(); // MINS
	  var s = today.getSeconds(); // Secs
	  m = checkTime(m); // checks if a the number is smaller then 10 then put a 0 infront
	  s = checkTime(s); // checks if a the number is smaller then 10 then put a 0 infront
	  document.getElementById('time').innerHTML = h + ":" + m + ":" + s + " " + am_pm; // output
	  var t = setTimeout(startTime, 500); // repeat every second
	}

	// checks if a the number is smaller then 10 then put a 0 infront
	function checkTime(i) {
	  if (i < 10) {
	    i = "0" + i
	  };
	  return i;
	}

</script>
