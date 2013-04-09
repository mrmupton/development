<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script src="library/dataGrid/javascript/jquery-1.6.4.min.js" type="text/javascript"></script>
</head>
<body>
<?php 
//Start Session for all files including root.php
//session.gc_maxlifetime is how long it takes a session to die with no activity
//session.cookie_lifetime is how long it takes a session to die client side with or without activity
if(!session_id()){ ini_set('session.gc_maxlifetime',1440); ini_set('session.cookie_lifetime',120); session_start(); }

//Include Necessary Files
include_once('root.php');
new includeFiles('dataObject,errorReporting,siteSecurity');
new includeFiles('adminBar,headerTemplate');
include_once('root.php');
new includeFiles('footerTemplate');
?>
</body>
</html>