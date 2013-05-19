<?php
restartsession(false);
?>
<script type="text/javascript">
var docroot = window.location.protocol + '//' + window.location.hostname + '/';
$(document).ready(function() {
	$('.open').click(function() {
		var w = $('.adminbar').width();
		if(w < 200){ 
			$('.adminbar').animate({"width":"100%"}, "slow");
			$('.open').html('<img src="'+docroot+'library/adminBar/images/contract.png" width="29" height="29" alt="Contract Admin Bar" />'); 
		}
		else { 
			$('.adminbar').animate({"width":"36px"}, "slow");
			$('.open').html('<img src="'+docroot+'library/adminBar/images/expand.png" width="29" height="29" alt="Contract Admin Bar" />'); 
		}
	});
	$('input[type=text]').focus(function(){ $(this).css({'background':'white'}); });
	$('input[type=password]').focus(function(){ $(this).css({'background':'white'}); });
<?php 
	if(isset($_SESSION['username'])){
		echo '	$("#userval").html("'.$_SESSION['username'].'");'."\n";
	}
	if(isset($_COOKIE['username'])){
		echo '	$("#username").val("'.$_COOKIE['username'].'")'."\n";
		echo '	var username = "'.$_COOKIE['username'].'";'."\n";
	}
?>
});
</script>
<div class="adminbarbg"></div>
<div class="adminbar">
	<div class="open">
    	<img src="<?php echo URL_PATH.'library/adminBar/images/expand.png'; ?>" width="29" height="29" alt="Expand Admin Bar" />
    </div>

    <div class="adminbarform"><div id="adminBarAccess">
<?php 
	ob_start(); include_once(ROOT_PATH.'library/siteSecurity/forms/logoutAdminBar.php'); $logoutform = ob_get_clean();
	ob_start(); include_once(ROOT_PATH.'library/siteSecurity/forms/loginAdminBar.php'); $loginform = ob_get_clean();
	if(isset($_SESSION['username'])){ echo $logoutform; }
	else{ echo $loginform; }
?>
    </div></div>
    </div>
</div>
