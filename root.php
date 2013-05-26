<?php 
/* This file sets global variables for Document Root local directory path and domain path. */
/* Use ROOT_PATH for includes - URL_PATH for links                                         */

/* Define ROOT_PATH - Local Directory Path*/
if(phpversion() >= 5.3) define('ROOT_PATH', __DIR__.'/', true);
if(phpversion() < 5.3) define('ROOT_PATH',dirpath(__FILE__),true);

/* Define URL_PATH - URL Path exp: http://www.domain.com/ */
$h = "http://";
if(isset($_SERVER['HTTPS'])) $h = "https://";
define('URL_PATH', $h . $_SERVER['SERVER_NAME'] . '/',true);

/* Define APP_PEPPER for application security */
$ini = '';
if(!file_exists('_private/config.ini')){ $ini .= '../'; };
if(!file_exists($ini.'_private/config.ini')){ $ini .= '../'; };
if(!file_exists($ini.'_private/config.ini')){ $ini .= '../'; };
if(!file_exists($ini.'_private/config.ini')){ $ini .= '../'; };
$ini .= '_private/config.ini';
$parse = parse_ini_file ( $ini , true ) ;
define('APP_PEPPER',$parse["app_pepper"],true);

/* Include includeFiles.class.php to facilitate one include for all include files.         */
include_once(ROOT_PATH.'library/includeFiles/includeFiles.class.php');

/* Function to start session and optionally clear all existing variables */
function startSession($unset=false){ 
	if(!session_id()){ 
		ini_set('session.gc_maxlifetime',7200);//Length of time Server Session is valid
		ini_set('session.cookie_lifetime',600);//Length of time User Cookie is valid
		session_start();
	}
	if($unset){
		session_regenerate_id(true);//Tell the session to create an entirely new id
		session_unset();
		session_destroy();
		session_write_close();
		setcookie(session_name(),'',time() + 600,'/');
		if(isset($_SESSION['username'])) unset($_SESSION['username']);
	}
}
function getRef($includeQueryString=false){
	if(isset($_SERVER['HTTP_REFERER'])){ 
		$url = parse_url($_SERVER['HTTP_REFERER']);
		$ref = $url['scheme'].'://'.$url['host'].$url['path'];
		if($includeQueryString && isset($url['query'])) $ref .= '?'.$url['query'];
	}
	else {
		$ref = URL_PATH.'index.php';
	}
	return $ref;
}
?>
