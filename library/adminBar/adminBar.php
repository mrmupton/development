<?php
//Start Session for all files including root.php
//session.gc_maxlifetime is how long it takes a session to die with no activity
//session.cookie_lifetime is how long it takes a session to die client side with or without activity
if(!session_id()){ ini_set('session.gc_maxlifetime',1440); ini_set('session.cookie_lifetime',120); session_start(); session_regenerate_id(true); }
?>
<script type="text/javascript">
var docroot = window.location.protocol + '//' + window.location.hostname + '/';
$(document).ready(function() {
<?php 
	if(isset($_SESSION['username'])){
		echo '	$("#userval").html("'.$_SESSION['username'].'");'."\n";
	}
	if(isset($_COOKIE['username'])){
		echo '	$("#username").val("'.$_COOKIE['username'].'")'."\n";
		echo '	var username = "'.$_COOKIE['username'].'";'."\n";
	}
?>
	$("#adminForm").submit( function(event) {
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: docroot + 'library/siteSecurity/action/' + $('#form').val() + '.php',
			datatype: 'text',
			data:  $(this).serialize(),
			success: function(response) {
				var rarray = response.split(' && ');
				$("#adminBarAccess").html(rarray[1]);
				if(rarray[0].indexOf('logout') > -1){
					$("#userval").html(rarray[2]);
				}
				if(rarray[0].indexOf('login') > -1){
					if(username !== undefined){ $("#username").val(username); };					
				}
				if(rarray[0].indexOf('invalid') > -1){
				}
			},
			error: function(error) {
				$("#adminBarAccess").html(error)
			}
		});
	});
});
</script>
<div class="adminbar">
	<div class="open">
    	<img src="<?php echo URL_PATH.'library/adminBar/images/expand.png'; ?>" width="29" height="29" alt="Expand Admin Bar" />
    </div>
<form id="adminForm" method="post" action="" autocomplete="off">
    <div class="adminbarform">
        <table><tbody><tr id="adminBarAccess">
<?php 
	ob_start(); include_once(ROOT_PATH.'library/siteSecurity/forms/logoutForm.php'); $logoutform = ob_get_clean();
	ob_start(); include_once(ROOT_PATH.'library/siteSecurity/forms/loginForm.php'); $loginform = ob_get_clean();
	if(isset($_SESSION['username'])){ echo $logoutform; }
	else{ echo $loginform; }
?>
        </tr></tbody></table>
    </div>
</form>
    </div>
</div>
