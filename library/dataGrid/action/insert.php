<?php
require_once('../../../root.php');
                      
// Get all parameters provided by the javascript
$tableval = $_POST['tablename'];
$cols = $_POST['columnlist'];
$vals = $_POST['valuelist'];

$query = "INSERT INTO ".$tableval." (".implode($cols,",").") VALUES (".implode($vals,",").")";

// This very generic. So this script can be used to update several tables.
$return=false;
if ( $stmt = dataObject::prepare($query)) { 
	$return = $stmt->execute();
	$stm = dataObject::prepare("SELECT MAX(id) AS ID FROM ".$tableval);
	$stm->execute();
	$mxid = $stm->fetch(PDO::FETCH_OBJ)->ID;
}
blowFishEncrypt::check();

echo $return ? $mxid : "error";
?>