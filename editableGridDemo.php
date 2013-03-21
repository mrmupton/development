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
<?php include_once('config/includeFiles.class.php'); new includeFiles('dataGrid'); ?>	
		<script type="text/javascript">
			window.onload = function() { 
				// you can use "datasource/demo.php" if you have PHP installed, to get live data from the demo.csv file
				editableGrid.onloadJSON("config/demo.php");
			}; 
		</script>
		
	</head>
	
	<body>
		<div id="wrap">
		<h1>dataGridOutput Demo - Grid with pagination<a href="../index.html">Back to menu</a></h1> 
		
			<!-- Feedback message zone -->
			<div id="message"></div>

			
			<!-- Grid filter -->
			<label for="filter">Filter :</label>
			<input type="text" id="filter"/>

			<div id="pagecontrol">
            	<label for="pagecontrol">Rows per page: </label>
                <select id="pagesize" name="pagesize">
                    <option value="5">5</option><option value="10">10</option><option value="15">15</option>
                    <option value="20">20</option><option value="25">25</option><option value="30">30</option>
                    <option value="40">40</option><option value="50">50</option>
                </select>&nbsp;&nbsp;
                <label for="barcount">Bars in chart: </label>
                <select id="barcount" name="barcount">
                    <option value="5">5</option><option value="10">10</option><option value="15">15</option>
                    <option value="20">20</option><option value="25">25</option><option value="30">30</option>
                    <option value="40">40</option><option value="50">50</option>
                </select>
        	</div>
		
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
