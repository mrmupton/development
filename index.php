<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<body class="loggedOut">
<?php
//Include Necessary Files
include_once('root.php');
new includeFiles('sharedFiles,dataObject,siteSecurity,styleSheet,refererRedirect,errorReporting');
if(!isset($_SESSION['username'])){
?>
<div class="loginTitle"></div>
<div class="loginPageForm">
<?php
	include_once('library/siteSecurity/forms/loginForm.php');
?>
</div>
<?php 
} 
else{
	new includeFiles('adminBar');
?>
<script type="text/javascript">$(document).ready(function() { $("body").removeClass(); });</script>
<?php
}
	new includeFiles('lightBox');
?>
</body>
</html>