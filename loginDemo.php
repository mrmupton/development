<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script src="library/dataGrid/javascript/jquery-1.6.4.min.js" type="text/javascript"></script>
</head>
<body>
<script type="text/javascript">
var docroot = window.location.protocol + '//' + window.location.hostname + '/';
$(document).ready(function() {
	$("#adminForm").submit( function(event) {
		event.preventDefault();
    	$.ajax({
       		type: 'POST',
       		url: 'http://development/library/siteSecurity/action/test.php',
       		datatype: 'text',
			data: $(this).serialize(),
			success: function(response) {
				alert('success')
				//$("#adminBarAccess").html(response)
			},
          	error: function(error) {
				$("#adminBarAccess").html(error)
          	}
      	});
	});
});
</script>
<div id="adminBarAccess">
    <table colspacing="0" colpadding="0" class="loginform">
        <form id="adminForm" method="post" action="">
            <tr>
                <td>Username: <input type="text" name="username" id="username" value="" /></td>
                <td>Password: <input type="password" name="password" id="password" value="" /></td>
                <td><input type="submit" name="submit" id="submit" value="Login" /></td>
            </tr>
			<input id="form" name="form" type="hidden" value="test" />
        </form>   	
    </table>
</div>
</body>
</html>