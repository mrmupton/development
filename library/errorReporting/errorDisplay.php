<?php
startSession();
if(isset($_SESSION['error'])){ 
?>
<script type="text/javascript">
$(document).ready(function() {
	$('#error').lightbox_me({
		centered: true, 
		overlayCSS: {
			background: '#3d5ba7', opacity:.7 
		},
		onLoad: function() { 
			$('#error').find('input:first').focus()
		}
	});
	$('#close').click(function (e){
		$('#error').trigger('close');
		e.preventDefault();
	});
});
</script>

<div id="error">
<a id="close">&nbsp;</a>
<?php
	echo $_SESSION['error'];
}
?>
</div>