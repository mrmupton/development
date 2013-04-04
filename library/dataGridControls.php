<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Data Grid HTML</title>
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

</body>
</html>