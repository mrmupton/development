<?php 
/* This file sets global variables for Document Root local directory path and domain path. */
/* Use ROOT_PATH for includes - URL_PATH for links                                         */

/* Define ROOT_PATH - Local Directory Path*/
if(phpversion() >= 5.3) define('ROOT_PATH', __DIR__.'/', true);
if(phpversion() < 5.3) define('ROOT_PATH',dirpath(__FILE__),true);

/* Define APP_PEPPER for application */
$ini = '';
if(!file_exists('_private/config.ini')){ $ini .= '../'; };
if(!file_exists($ini.'_private/config.ini')){ $ini .= '../'; };
if(!file_exists($ini.'_private/config.ini')){ $ini .= '../'; };
if(!file_exists($ini.'_private/config.ini')){ $ini .= '../'; };
$ini .= '_private/config.ini';
$parse = parse_ini_file ( $ini , true ) ;
define('APP_PEPPER',$parse["app_pepper"],true);

/* Define URL_PATH - URL Path exp: http://www.domain.com/ */
$h = "http://";
if(isset($_SERVER['HTTPS'])) $h = "https://";
define('URL_PATH', $h . $_SERVER['SERVER_NAME'] . '/',true);

/* Include includeFiles.class.php to facilitate one include for all include files.         */
include_once(ROOT_PATH.'library/includeFiles/includeFiles.class.php');
//Initiate default libraries to include
new includeFiles('dataObject,errorReporting,siteSecurity');

/* Use new includeFiles('includeset') to include the set of include files listed in that   */
/* section of the switch case in includeFiles.class.php.                                   */
/* Example: new includeFiles('dataGrid')                                                   */

?>
