<?php
include_once('../../../root.php');
startSession();

new includeFiles('siteSecurity,refererRedirect,dataObject,errorReporting');
//refererRedirect used to push user back to referring page
//dataObject used to query database for login credentials
//errorReporting used to create an error

//Retrieve POST variables
$username = $_POST['username'];
$password = $_POST['password'];

$ref = getRef();

$error = ''; $loginValid = false;

ob_start(); include_once(ROOT_PATH.'library/siteSecurity/forms/loginForm.php'); $failedLogin = ob_get_clean();

try {
	$stmt = dataObject::prepare("SELECT * FROM securityUser WHERE userName = :userName");
	$stmt->bindParam(':userName',$username,PDO::PARAM_STR, 18);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_OBJ);
}
catch (Exception $e){ 
	$errorArray = $stmt->errorInfo(); 
	$error = $errorArray[2];
	throwError($error);
	refRedirect($ref);
	die();
};
if($data){
	$storedPasswordHash = $data->passwordHash; 
	$storedPepper = $data->passwordPepper; 
	$pepperedPassword = $password.APP_PEPPER.$storedPepper;
	$loginValid = blowfishEncrypt::check($pepperedPassword,$storedPasswordHash);
	$userID = $data->userID;
}
else { 
	$error .= 'The Username: <strong><u>'.$username.'</u></strong> does not exist. Please try again or click Sign Up below to create a new account.<br /><br /><br />'.$failedLogin; 
	throwError($error);
	refRedirect($ref);
	die();
}

if($loginValid){
	$_SESSION['username'] = $username;
	$_SESSION['userID'] = $userID;
	$_SESSION['isloggedin'] = true;
	$stmt = dataObject::prepare("UPDATE securityUser SET lastLogin = NOW(), lastLogout = NOW() + INTERVAL 30 MINUTE  WHERE userName = :username"); 
	$stmt->bindParam(':username',$username,PDO::PARAM_STR, 18);
	$stmt->execute();
	refRedirect($ref);
	die();
}
else {
	$error = 'Login Invalid. Password was not correct. Please try again or Sign Up below.<br /><br /><br />'.$failedLogin; 
	throwError($error);
	refRedirect($ref);
	die();
}