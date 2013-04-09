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
				var rarray = response.split(' && ')
				if(rarray[0].indexOf('logout') > -1){
					$("#adminBarAccess").html(rarray[1]);
					$("#userval").html(rarray[2]);
				}
				if(rarray[0].indexOf('login') > -1){
					$("#adminBarAccess").html('Logged Out');
				}
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
include_once(ROOT_PATH.'library/siteSecurity/forms/loginForm.php');
/*
if(!isset($_SESSION['isloggedin']) || $_SESSION['isloggedin'] == false){
	include_once(ROOT_PATH.'library/siteSecurity/forms/loginForm.php');
}
else include_once(ROOT_PATH.'library/siteSecurity/forms/logoutForm.php');
*/
?>
</div>