<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<script type="text/javascript">
var docroot = window.location.protocol + '//' + window.location.hostname + '/';
$(document).ready(function() {
	$("#adminForm").submit( function(event) {
		event.preventDefault();
    	$.ajax({
       		type: 'POST',
       		url: docroot + 'library/siteSecurity/action/' + $('#form').val() + '.php',
       		datatype: 'text',
			data: $(this).serialize(),
			success: function(response) {
				$("#adminBarAccess").html(response)
			},
          	error: function(error) {
				$("#adminBarAccess").html(error)
          	}
      	});
	});
});
</script>
<div id="adminBarAccess">
<?php

include_once('root.php');

if(!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] == false){
	include_once(ROOT_PATH.'library/siteSecurity/forms/loginForm.php');
}
else include_once(ROOT_PATH.'library/siteSecurity/forms/logoutForm.php');

?>
</div>
</body>
</html>