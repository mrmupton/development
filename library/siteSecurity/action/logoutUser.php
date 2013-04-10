<?php

include('../../../root.php');
new includeFiles('dataObject,errorReporting,siteSecurity');

$username = $_POST['username'];

session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
unset($_SESSION['username']);

$stmt = dataObject::prepare("UPDATE securityUser SET lastLogout = NOW()  WHERE userName = :username"); 
$stmt->bindParam(':username',$username,PDO::PARAM_STR, 18);
$stmt->execute();

$loginForm = file_get_contents(ROOT_PATH.'library/siteSecurity/forms/loginForm.php');
echo 'login && '.$loginForm;
?>