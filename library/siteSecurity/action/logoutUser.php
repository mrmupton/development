<?php

include('../../../root.php');
new includeFiles('siteSecurity,dataObject,errorReporting,refererRedirect');

if(!isset($_SERVER['HTTP_REFERRER'])) $ref = $_SERVER['HTTP_REFERER']; else $ref = URL_PATH.'index.php';

$username = $_POST['username'];

restartsession(true);

$stmt = dataObject::prepare("UPDATE securityUser SET lastLogout = NOW()  WHERE userName = :username"); 
$stmt->bindParam(':username',$username,PDO::PARAM_STR, 18);
$stmt->execute();

$loginForm = file_get_contents(ROOT_PATH.'library/siteSecurity/forms/loginForm.php');

refRedirect($ref);
?>