<?php

include('../../../root.php');
new includeFiles('siteSecurity,dataObject,errorReporting,refererRedirect');

$ref = getRef();

$username = $_POST['username'];

startSession(true);

$stmt = dataObject::prepare("UPDATE securityUser SET lastLogout = NOW()  WHERE userName = :username"); 
$stmt->bindParam(':username',$username,PDO::PARAM_STR, 18);
$stmt->execute();

$loginForm = file_get_contents(ROOT_PATH.'library/siteSecurity/forms/loginForm.php');

refRedirect($ref); die();
?>