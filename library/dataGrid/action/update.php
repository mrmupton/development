<?php
require_once('../../../root.php');
// Get all parameters provided by the javascript
$colname = $_POST['colname'];
$id = $_POST['id'];
$coltype = $_POST['coltype'];
$value = $_POST['newvalue'];
$tablename = $_POST['tablename'];
                                                
// Here, this is a little tips to manage date format before update the table
if ($coltype == 'date') {
   if ($value === "") 
  	 $value = NULL;
   else {
      $date_info = date_parse_from_format('d/m/Y', $value);
      $value = "{$date_info['year']}-{$date_info['month']}-{$date_info['day']}";
   }
}                      

// This very generic. So this script can be used to update several tables.
$return=false;
if ( $stmt = dataObject::prepare("UPDATE ".$tablename." SET ".$colname." = :newvalue WHERE id = :id")) {
	$stmt->bindParam(':newvalue', $value);
	$stmt->bindParam(':id', $id);
	$return = $stmt->execute();
}             

echo $return ? "ok" : "error";