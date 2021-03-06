<?php
ini_set( 'display_errors', 0);

/* Set $ref variable */
$ref = getRef();

//Restart Session - Unset Previous Variables
startSession();

function handleError($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) { return; }
    switch ($errno) {
		case E_USER_ERROR:
			$errortyp =  'User Error';
			exit(1);
			break;	
		case E_USER_WARNING:
			$errortyp = 'User Warning';
			break;	
		case E_USER_NOTICE:
			$errortyp = 'User Notice - This may not be an actual error';
			break;	
		default:
			$errortyp = 'Unknown';
			break;
	}
	$msg = '<table class="error">'."\n\t";
	if(strlen($errstr) >= 1) { $msg .= '<tr>'."\n\t\t".'<td colspan="2">Error Message: '."\n\t\t".$errstr.'</td>'."\n\t".'</tr>'."\n\t"; }
	if(strlen($errfile) >= 1) { $msg .= '<tr>'."\n\t\t".'<td>Found on File:</td>'."\n\t\t".'<td>'.$errfile.'</td>'."\n\t".'</tr>'."\n\t"; }
	if(strlen($errline) >= 1) { $msg .= '<tr>'."\n\t\t".'<td>On Line:</td>'."\n\t\t".'<td>'.$errline.'</td>'."\n\t".'</tr>'."\n"; }
	$msg .= '</table>'."\n";
	if(strlen($msg) <=  47) { $msg .= 'Error Information not found'; }
	throwError($msg);
    return true;
}
// set to the user defined error handler
$old_error_handler = set_error_handler("handleError");

// function for throwing error
function throwError($error,$url=NULL){
	$_SESSION['error'] = '<span class="errorheader">Sorry! There has been an error!</span><br /><br /><hr /><span class="errortext"><br /><br />'.$error.'<br /><br /></span>';
	header('Location: '.$url);
}

if(isset($_SESSION['error'])){ unset($_SESSION['error']); }