<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<title>Select a location</title>
		<link href="../SelectLocationMaster.css" type="text/css" rel="stylesheet" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
		</script>
		<script type="text/javascript" src="../loadxmldoc.js">
		</script>
		<script type="text/javascript" src="../writelocs.js">
		</script>
	</head>	
	<body>
		<h1>Select a location:</h1>

		<?php
			$region = $_GET['region'];
			$region = trim($region);

			echo "<br />";
			echo "<h1><span id=\"SelectedRegion\">$region</span></h1>";
			echo "<br />";
		?>

		<div id="container">
		<div id="locationColumns">
		<script type="text/javascript">
			writeLocationsToHTML();
		</script>
		</div>
		</div>
		<br />
	</body>
</html>
