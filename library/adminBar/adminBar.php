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
<?php include_once(ROOT_PATH.'library/siteSecurity/forms/loginForm.php'); ?>