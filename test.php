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
	</head>
	
	<body>
<?php 
include_once('config/includeFiles.class.php'); new includeFiles('dataGrid');	
                    
// create a new dataGridOutput object
$grid = new dataGridOutput();
/* 
*  Add columns. The first argument of addColumn is the name of the field in the databse. 
*  The second argument is the label that will be displayed in the header
*/
$grid->addColumn('id', 'ID', 'integer', NULL, false); 
$grid->addColumn('name', 'Name', 'string');  
$grid->addColumn('firstname', 'Firstname', 'string');  
$grid->addColumn('age', 'Age', 'integer');  
$grid->addColumn('height', 'Height', 'float');  
/* The column id_country and id_continent will show a list of all available countries and continents. So, we select all rows from the tables */
$grid->addColumn('continent', 'Continent', 'string' , fetch_pairs('SELECT id, name FROM continent'),true);  
$grid->addColumn('country', 'Country', 'string', fetch_pairs('SELECT id, name FROM country'),true );  
$grid->addColumn('email', 'Email', 'email');                                               
$grid->addColumn('freelance', 'Freelance', 'boolean');  
$grid->addColumn('lastvisit', 'Lastvisit', 'date');  
$grid->addColumn('website', 'Website', 'string');
// action column ("html" type), not editable
$grid->addColumn("action", "", "html", NULL, false);

// send data to the browser
$stmt = new dataObjectResult('SELECT *, date_format(lastvisit, "%d/%m/%Y") as lastvisit FROM demo');
$result = $stmt->result;
echo '<script type="text/javascript">window.onload = function() { editableGrid.loadJSONFromString('.$grid->getJSON($result).'); editableGrid.initializeGrid(); }</script>';

?>
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
