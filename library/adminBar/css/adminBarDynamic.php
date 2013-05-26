<?php
header('Content-Type:text/css, charset: UTF-8');
?>
/* CSS DOCUMENT */
<?php
include_once('../../../root.php');
new includeFiles('siteSecurity,refererRedirect,dataObject,errorReporting','cj','errorDisplay.php');
try {
	$stmt = dataObject::prepare("SELECT DISTINCT styleClass FROM cssStyle WHERE pageID = 1");
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_COLUMN);
	$stmt = dataObject::prepare("SELECT styleClass, styleType, styleValue FROM cssStyle WHERE pageID = 1");
	$stmt->execute();
	$style = $stmt->fetchAll(PDO::FETCH_ASSOC);

}
catch (Exception $e){ 
	$errorArray = $stmt->errorInfo(); 
	$error = $errorArray[2];
	throwError($error);
	refRedirect($ref);
	die();
};
foreach($data as $d){ 
	$css = $d.' {'."\n";
	foreach($style as $s){
		if($s['styleClass'] == $d){
			$css .= $s['styleType'].':'.$s['styleValue'].';'."\n"; 
		}
	}
	$css .= '}'."\n";
}
//echo $css;
?>
