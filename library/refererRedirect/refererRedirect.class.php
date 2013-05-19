<?php
function refRedirect($url,$type=NULL){
	if($type == 'Post'){
		$check = NoCSRF::check('token', $_POST, true,600,false);
		if($check == false){ throwError('There was a problem with your form submission.  Please submit again.'); die; }
	}
	header('Location: '.$url);
}