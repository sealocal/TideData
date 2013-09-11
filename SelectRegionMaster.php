<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>
			Select a region of 
			<?php
				$dir = getcwd();
				$stateDir = strrchr($dir, "/");
				$stateName = ltrim($stateDir, "/");

				echo $stateName;
			?>
		</title>
		<meta name="description" content="Provides Low and High Tide time predictions for beaches and rivers in the United States. Tidal data for surfers, fisherman, and sailors." />
		<meta name="keywords" content="tide, tides, table, tables, tide table, tide charts, tide chart, low Tide, high Tide, tide height, tide prediction, tide predictions, gulf coast, Florida Keys, Texas, Louisiana, Mississippi,Alabama, Florida, Georgia, North Carolina, South Carolina, Virginia, Maryland, Maine, Massachusetts, Rhode Island, New Hampshire, Connecticut, New York, New Jersey, California, Washington, Oregon, Atlantic, Pacific, East Coast, West Coast, ocean, surf, surfing, fish, fishing, boat, boating, sailing" />
		<link href="../SelectRegionMaster.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<h1>
			Select a region:
		<!--Inserts name of state in Heading:-->
			<!--
			of 
			<?php
				$dir = getcwd();
				$stateDir = strrchr($dir, "/");
				$stateName = ltrim($stateDir, "/");
				echo $stateName;
			?>
			//-->
		</h1>
		<br />
		<br />
		<br />
		<div id="container">
			<br />
			<table id="tableleft">
				<tr>
				  <th class="left" rowspan = "5">
				    <?php
					    $dir = getcwd();
					    $stateDir = strrchr($dir, "/");
					    $stateName = ltrim($stateDir, "/");    

					    echo $stateName;
				    ?>
				  </th>
				</tr>
			</table>
			<table id="tablecenter">
				<tr>
				  <th class="center">&nbsp;</th>
				</tr>
				<tr>
				  <td class="center">&nbsp;</td>
				</tr>
				<?php  											
					$regionsDir = $dir . "/regions";
					$regions = scandir($regionsDir);

					for ($i=2; $i<count($regions); $i++)
					{
					  echo("<tr>");
					  echo("<td class=\"center\">");

					  $regionName = substr_replace($regions[$i], "", -4);
					  $uri = "SelectLocation.php?region=" . $regionName;
					  $anchor = "<a href=\"" . $uri . "\">";
					  echo $anchor;
					  echo $regionName;

					  echo ("</a>");
					  echo("</td>");
					  echo("</tr>");
			        }
				?>
			</table>
		</div>
		<br />
	</body>
</html>