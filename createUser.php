<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="library/dataGrid/javascript/jquery-1.6.4.min.js" /></script>
<script type="text/javascript">
var docroot = window.location.protocol + '//' + window.location.hostname + '/';
$(document).ready(function() {
	$('#submit').click(function() {
    	$.ajax({
       		type: 'POST',
       		url: docroot + 'library/siteSecurity/action/insertUser.php',
       		datatype: 'text',
			data: {
				username : $('#username').val(),
				password : $('#password').val(),
				email : $('#email').val()
			},
			success: function(response) {
				$("#result").html(response)
			},
          	error: function(error) {
				$("#result").html(error)
          	}
      	});
		return false;
	});
});
</script>
</head>

<body>
<div id="result">
<form id="loginform" method="post" action="">
    Username: <input type="text" name="username" id="username" value="">

    Password: <input type="password" name="password" id="password" value="">
    
    Email: <input typ="email" name="email" id="email" value="">

	<input type="submit" name="submit" id="submit" value="Create User">
</form>
</div>
</body>
</html>