<?php
startSession();
$ref = getRef(true);
if(isset($_GET['form']) && !isset($_SESSION['error']) && !isset($_SESSION['message'])){
	$library = ROOT_PATH.'library'; $directories = array(); $output = array(); $formInclude = 'Error'; 
	$error = ''; $existingFormPaths = array();
	$directories = glob($library.'/*',GLOB_ONLYDIR);
	foreach($directories as $d){
		$subdirs = glob($d.'/*',GLOB_ONLYDIR);
		foreach($subdirs as $s){
			if(stristr($s,'forms')){
				$filepath = $s.'/'.$_GET['form'].'.php';
				if(file_exists($filepath)) {
					$existingFormPaths[] =  $filepath;
				}
			}
		}		
	}
	$paths = count($existingFormPaths);
	if($paths < 1) $error = 'Form Does Not Exist';
	elseif($paths == 1){
		ob_start(); include_once($filepath); $formInclude = ob_get_clean();
	}
	elseif($paths > 1){
		foreach($existingFormPaths as $e) $error .= "\n<br />".$e;
		$error = 'Form Exists More Than Once: '.$error;
	}
?>
<script type="text/javascript">
$(document).ready(function() {
	$('#lightBoxForm').lightbox_me({
		centered: true, 
		overlayCSS: {
			background: '#3d5ba7', opacity:.7 
		},
		onLoad: function() { 
			$('#lightBoxForm').find('input:first').focus()
		}
	});
	$('#close').click(function (e){
		$('#lightBoxForm').trigger('close');
		e.preventDefault();
	});
});
</script>

<div id="lightBoxForm">
<a href="#" id="close">&nbsp;</a>
<?php
	echo $formInclude;
?>
</div>
<?php
}
?>