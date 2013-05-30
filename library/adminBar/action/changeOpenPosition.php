<?php
include_once('../../../root.php');
new includeFiles('dataObject');
$rightmargin = $_POST['margin'];
try {
	$stmt = dataObject::prepare("UPDATE cssStyle SET styleValue = :margin WHERE (styleClass = '.open') AND (styleType ='margin-right')");
	$stmt->bindParam(':margin', $rightmargin);
	$stmt->execute();
}
catch (Exception $e){ 
	$errorArray = $stmt->errorInfo(); 
	$error = $errorArray[2];
	throwError($error);
	refRedirect($ref);
	die();
};

echo $rightmargin;