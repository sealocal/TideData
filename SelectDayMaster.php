<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<title>
			High and Low Tides of the day for
			<?php
				$loc = $_GET['location'];
				$loc = trim($loc);
				echo ucwords($loc);
			?>
		</title>
		<meta name="description" content="Provides Low and High Tide time predictions for beaches and rivers in the United States. Tidal data for surfers, fisherman, and sailors." />
		<meta name="keywords" content="tide, tides, table, tables, tide table, tide charts, tide chart, low Tide, high Tide, tide height, tide prediction, tide predictions, gulf coast, Florida Keys, Texas, Louisiana, Mississippi,Alabama, Florida, Georgia, North Carolina, South Carolina, Virginia, Maryland, Maine, Massachusetts, Rhode Island, New Hampshire, Connecticut, New York, New Jersey, California, Washington, Oregon, Atlantic, Pacific, East Coast, West Coast, ocean, surf, surfing, fish, fishing, boat, boating, sailing" />
		<link href="../SelectDayMaster.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="../loadxmldoc.js"> 
		</script>
		<script type="text/javascript" src="../gettide.js">
		</script>
	</head>
	<body>
		<br />
		<br />
		<?php
			$loc = $_GET['location'];
			$loc = trim($loc);

			echo "<br />";
			echo "<h1><span id=\"SelectedLocation\">$loc</span></h1>";
			echo "<br />";
		?>
		
		<script type="text/javascript">
			getLocationData();
		</script>
		
		<form id="date">
			<select id="day" onchange="getTide()">
				<option id="1" value="01">1</option>
				<option id="2" value="02">2</option>
				<option id="3" value="03">3</option>
				<option id="4" value="04">4</option>
				<option id="5" value="05">5</option>
				<option id="6" value="06">6</option>
				<option id="7" value="07">7</option>
				<option id="8" value="08">8</option>
				<option id="9" value="09">9</option>
				<option id="10" value="10">10</option>
				<option id="11" value="11">11</option>
				<option id="12" value="12">12</option>
				<option id="13" value="13">13</option>
				<option id="14" value="14">14</option>
				<option id="15" value="15">15</option>
				<option id="16" value="16">16</option>
				<option id="17" value="17">17</option>
				<option id="18" value="18">18</option>
				<option id="19" value="19">19</option>
				<option id="20" value="20">20</option>
				<option id="21" value="21">21</option>
				<option id="22" value="22">22</option>
				<option id="23" value="23">23</option>
				<option id="24" value="24">24</option>
				<option id="25" value="25">25</option>
				<option id="26" value="26">26</option>
				<option id="27" value="27">27</option>
				<option id="28" value="28">28</option>
				<option id="29" value="29">29</option>
				<option id="30" value="30">30</option>
				<option id="31" value="31">31</option>
			</select>
			&nbsp;
			&nbsp;
			<select id="month" onchange="getTide()">
				<option id="Jan" value="01">January</option>
				<option id="Feb" value="02">February</option>
				<option id="Mar" value="03">March</option>
				<option id="Apr" value="04">April</option>
				<option id="May" value="05">May</option>
				<option id="Jun" value="06">June</option>
				<option id="Jul" value="07">July</option>
				<option id="Aug" value="08">August</option>
				<option id="Sep" value="09">September</option>
				<option id="Oct" value="10">October</option>
				<option id="Nov" value="11">November</option>
				<option id="Dec" value="12">December</option>
			</select>
			&nbsp;
			&nbsp;
			<select id="year" onchange="getTide()">
				<option id="2010" value="2010">2010</option>
				<!-- <option id="2009" value="2009">2009</option> -->
			</select>
		</form>
		<br />
		<br />
		<table class="center">
			<tr>
				<th colspan = "2">Tides for <span id="tabledate"></span><br /></th>
			</tr>
			<tr>
				<td colspan = "2">&nbsp;</td>
			</tr>
			<tr>
				<td class="left"><span id = "firsttide"></span></td>
				<td class="right"><span id = "tidetime1"></span></td>
			</tr>
			<tr>
				<td class="left"><span id = "secondtide"></span></td>
				<td class="right"><span id = "tidetime2"></span></td>
			</tr>
			<tr>
				<td class="left"><span id = "thirdtide"></span></td>
				<td class="right"><span id = "tidetime3"></span></td>
			</tr>
			<tr>
				<td class="left"><span id = "fourthtide"></span></td>
				<td class="right"><span id = "tidetime4"></span></td>
			</tr>
		</table>
		<br />
		<br />
		<br />
		<p id="note">
		</p>
		<br />
		<script type="text/javascript">
			footnote();
			setToday();
		</script>
	</body>
</html>