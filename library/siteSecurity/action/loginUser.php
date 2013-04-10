<?php
session_start();

include_once('../../../root.php');


//Retrieve POST variables
$username = $_POST['username'];
$password = $_POST['password'];

//setcookie('username',$username, time()+3600, '/');

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

if($loginValid){
	$_SESSION['username'] = $username;
	$_SESSION['isloggedin'] = true;
	$stmt = dataObject::prepare("UPDATE securityUser SET lastLogin = NOW(), lastLogout = NOW() + INTERVAL 30 MINUTE  WHERE userName = :username"); 
	$stmt->bindParam(':username',$username,PDO::PARAM_STR, 18);
	$stmt->execute();
}

$logoutForm = file_get_contents(ROOT_PATH.'library/siteSecurity/forms/logoutForm.php');
$loginForm = file_get_contents(ROOT_PATH.'library/siteSecurity/forms/loginForm.php');

echo $loginValid ? 'logout'.' && '.$logoutForm . ' && ' . $username : 'login'.' && '.$loginForm;