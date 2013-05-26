<?php
startSession();
if(isset($_SESSION['message']) && !isset($_SESSION['error'])){ 
?>
<script type="text/javascript">
$(document).ready(function() {
	$('#lightBoxMessage').lightbox_me({
		centered: true, 
		overlayCSS: {
			background: '#3d5ba7', opacity:.7 
		},
		onLoad: function() { 
			$('#lightBoxMessage').find('input:first').focus()
		}
	});
	$('#close').click(function (e){
		$('#lightBoxMessage').trigger('close');
		e.preventDefault();
	});
});
</script>

<div id="lightBoxMessage">
<a href="#" id="close">&nbsp;</a>
<?php
	echo $_SESSION['message'];
?>
</div>
<?php
}
?>