<?php
startSession();
?>
<div class="pw" style="width:100%;">
<div class="adminbar">
    <div class="adminbarform">
    	<div id="adminBarAccess">
<?php 
	ob_start(); include_once(ROOT_PATH.'library/siteSecurity/forms/logoutAdminBar.php'); $logoutform = ob_get_clean();
	ob_start(); include_once(ROOT_PATH.'library/siteSecurity/forms/loginAdminBar.php'); $loginform = ob_get_clean();
	if(isset($_SESSION['username'])){ echo $logoutform; }
	else{ echo $loginform; }
?>
    	</div>
    </div>
</div>
<div class="open">
	<a href="#lock" id="lock"><img src="<?php echo URL_PATH; ?>/library/adminBar/images/locked.png" title="Make this button movable" id="lockIMG" /></a>
    <a href="#expand" id="expand"></a>
</div><br class="clear" />
</div>