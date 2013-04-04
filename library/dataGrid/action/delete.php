<?php

require_once('../../../root.php');
                      
// Get all parameters provided by the javascript
$id = $_POST['id'];
$tablename = $_POST['tablename'];
                                                
// This very generic. So this script can be used to update several tables.
$return=false;
if ( $stmt = dataObject::prepare("DELETE FROM ".$tablename." WHERE id = :id")) {
	$stmt->bindParam(':id', $id);
	$return = $stmt->execute();
}             

echo $return ? "ok" : "error";
?>