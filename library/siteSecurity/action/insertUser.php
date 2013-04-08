<?php

include_once('../../../root.php');

//Retrieve POST variables
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if(strlen($password) > 20){
	echo "Password Must Be Shorter than 20 characters";
	exit();
}

//Create Individual User Pepper and add to app pepper
$alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$userPepper = substr(str_shuffle($alpha_numeric), 0, 5);
$pepperedPassword = $password.APP_PEPPER.$userPepper;

//Create Individual WorkFactor
$workfactor = rand(10,31);

//Create hash from salt and pepper above plus password from POST
$hashedPassword = blowfishEncrypt::hash($pepperedPassword);

$return = false; $error = '';
try{ 
	$stmt = dataObject::prepare("INSERT INTO securityUser (userName,userEmail,passwordHash,passwordPepper) VALUES (:userName,:userEmail,:passwordHash,:passwordPepper)"); 
	$stmt->bindParam(':userName',$username,PDO::PARAM_STR, 18);
	$stmt->bindParam(':userEmail',$email,PDO::PARAM_STR);
	$stmt->bindParam(':passwordHash',$hashedPassword,PDO::PARAM_STR);
	$stmt->bindParam(':passwordPepper',$userPepper,PDO::PARAM_STR, 5);
	$return = $stmt->execute();
}
catch (Exception $e){ $return = false; $errorArray = $stmt->errorInfo(); $error = $errorArray[2]; };

if(strstr($error,'Duplicate entry')){ $error = 'A user has already been created with that email address.'; };

if($return){
	$stmt = dataObject::prepare("SELECT userID FROM securityUser WHERE userName = :username");
	$stmt->bindParam(':username',$username,PDO::PARAM_STR, 18);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_OBJ);
	$userID = $data->userID;
	$roleID = 1; if(isset($_POST['role'])){ $roleID = $_POST['role']; }

	try{ 
		$stmt = dataObject::prepare("INSERT INTO securityUserRoles (userID,roleID) VALUES (:userID,:roleID)"); 
		$stmt->bindParam(':userID',$userID,PDO::PARAM_INT, 18);
		$stmt->bindParam(':roleID',$roleID,PDO::PARAM_INT, 18);
		$return = $stmt->execute();
	}
	catch (Exception $e){ $return = false; $errorArray = $stmt->errorInfo(); $error = 'User Created But Default Role Was Not Added. Reason: '.$errorArray[2]; };

}

echo $return ? "User Has Been Created: ".$username : "There has been an Error: ".$error;