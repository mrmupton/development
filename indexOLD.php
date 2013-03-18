<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<!--
/*
 * examples/full/index.html
 * 
 * This file is part of dataGridOutput.
 * http://editablegrid.net
 *
 * Copyright (c) 2011 Webismymind SPRL
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://editablegrid.net/license
 */
-->

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>dataGridOutput Demo - Grid with pagination</title>
		<!-- include javascript and css files for the dataGridOutput library -->
		<script src="javascript/editablegrid-2.0.1.js"></script>
		<link rel="stylesheet" href="javascript/editablegrid-2.0.1.css" type="text/css" media="screen">

		<!-- include javascript and css files for jQuery, needed for the datepicker and autocomplete extensions -->
		<script src="javascript/jquery-1.6.4.min.js" ></script>
		<script src="javascript/jquery-ui-1.8.16.custom.min.js" ></script>
		<link rel="stylesheet" href="javascript/jquery-ui-1.8.16.custom.css" type="text/css" media="screen">
		
		<!-- include javascript and css files for the autocomplete extension -->
		<script src="javascript/autocomplete.js" ></script>
		<link rel="stylesheet" href="css/autocomplete.css" type="text/css" media="screen">

		<!-- include javascript files for the OpenFlashChart library -->
		<script src="javascript/swfobject.js"></script>
		<script src="javascript/json2.js"></script>
		<script src="javascript/ofc.js"></script>
		<script src="javascript/open_flash_chart.min.js"></script>

		<!-- include javascript and css files for this demo -->
		<script src="javascript/demo.js" ></script>
		<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen"/>
		<script type="text/javascript">
			window.onload = function() { 
				// you can use "config/demo.php" if you have PHP installed, to get live data from the demo.csv file
				editableGrid.onloadJSON("config/demo.php");
			}; 
		</script>
		
	</head>
	
	<body>
		<div id="wrap">
		<h1>dataGridOutput Demo - Grid with pagination<a href="../index.html">Back to menu</a></h1> 
		
			<!-- Feedback message zone -->
			<div id="message"></div>

			<!--  Number of rows per page and bars in chart -->
			<div id="pagecontrol">
				<label for="pagecontrol">Rows per page: </label>
				<select id="pagesize" name="pagesize">
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="40">40</option>
					<option value="50">50</option>
				</select>
				&nbsp;&nbsp;
				<label for="barcount">Bars in chart: </label>
				<select id="barcount" name="barcount">
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="40">40</option>
					<option value="50">50</option>
				</select>	
			</div>
		
			<!-- Grid filter -->
			<label for="filter">Filter :</label>
			<input type="text" id="filter"/>
		
			<!-- Grid contents -->
			<div id="tablecontent"></div>
		
			<!-- Paginator control -->
			<div id="paginator"></div>
		
			<!-- Edition zone (to demonstrate the "fixed" editor mode) -->
			<div id="edition"></div>
			
			<!-- Charts zone -->
			<div id="barchartcontent"></div>
			<div id="piechartcontent"></div>
			
		</div>
	</body>

</html>
