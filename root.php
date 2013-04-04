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

/* Include includeFiles.class.php to facilitate one include for all include files.         */

include(ROOT_PATH.'library/includeFiles.class.php');

/* Use new includeFiles('includeset') to include the set of include files listed in that   */
/* section of the switch case in includeFiles.class.php.                                   */
/* Example: new includeFiles('dataGrid')                                                   */

?>