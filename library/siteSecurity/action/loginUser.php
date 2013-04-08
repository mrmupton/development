<?php

include_once('../../../root.php');

//Retrieve POST variables
$username = $_POST['username'];
$password = $_POST['password'];

$return = false; $error = '';
try {
	$stmt = dataObject::prepare("SELECT * FROM securityUser WHERE userName = :userName");
	$stmt->bindParam(':userName',$username,PDO::PARAM_STR, 18);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_OBJ);
	$storedPasswordHash = $data->passwordHash;
	$storedPepper = $data->passwordPepper;
}
catch (Exception $e){ $return = false; $errorArray = $stmt->errorInfo(); $error = $errorArray[2]; };

$pepperedPassword = $password.APP_PEPPER.$storedPepper;

$loginValid = blowfishEncrypt::check($pepperedPassword,$storedPasswordHash);

echo $loginValid ? "Logged In" : "Login Invalid";