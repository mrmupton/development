<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
//Include Necessary Files
if(!session_id()){ ini_set('session.gc_maxlifetime',1440); ini_set('session.cookie_lifetime',120); session_start(); session_regenerate_id(true); }
session_unset();
include_once('root.php');
new includeFiles('sharedFiles,dataObject,siteSecurity,styleSheet,refererRedirect,errorReporting,adminBar,headerTemplate,footerTemplate,lightBox');
?>
<a href="index.php">Home</a>
</body>
</html>