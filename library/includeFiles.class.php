<?php
include_once (ROOT_PATH.'library/dataObject.class.php');
include_once (ROOT_PATH.'library/errorReporting.class.php');

class includeFiles
{
	public function __construct($req){
		$rf = array();
		$rf = explode(',',$req);
		if(!isset($req)){ $req = 'None Entered'; };
		echo '<!-- Included Files from includeFiles.class.php -->'."\n";
		foreach($rf as $rfq){
			$fti = array();
			switch($rfq){
				case "dataGrid":
					$fti[] = 'dataGridOutput.class.php';
					//javascript files
					$fti[] = 'editablegrid-2.0.1.js';
					$fti[] = 'jquery-1.6.4.min.js';
					$fti[] = 'jquery-ui-1.8.16.custom.min.js';
					$fti[] = 'autocomplete.js';
					$fti[] = 'swfobject.js';
					$fti[] = 'json2.js';
					$fti[] = 'ofc.js';
					$fti[] = 'open_flash_chart.min.js';
					$fti[] = 'dataGrid.js';
					//css files
					$fti[] = 'editablegrid-2.0.1.css';
					$fti[] = 'autocomplete.css';
					$fti[] = 'demo.css';
					$fti[] = 'jquery-ui-1.8.16.custom.css';
					break;
				default:
					trigger_error("Class includeFiles(?) Missing Or Invalid Type: '".$rfq."'.", E_USER_NOTICE);
					break;
			}
			foreach($fti as $ftivalue){
				try {
					$phppos = strpos($ftivalue, '.php'); $jspos = strpos($ftivalue, '.js'); $csspos = strpos($ftivalue, '.css'); $classpos = strpos($ftivalue, '.class');
					//update folder location for class, javascript and css files
					if($classpos != false){ $ftivalue = 'library/dataGrid/'.$ftivalue; }
					if($jspos !== false){ $ftivalue = 'library/dataGrid/javascript/'.$ftivalue; }
					if($csspos !== false){ $ftivalue = 'css/'.$ftivalue; }
					//check to see if file exists
					if(!file_exists(ROOT_PATH.$ftivalue)){ trigger_error ("Required File Is Missing: ".$ftivalue, E_USER_NOTICE); };
					//output value dependant on existence of .php, .css or .js
					if($phppos !== false){ include_once (ROOT_PATH.$ftivalue); }
					if($jspos !== false){ echo '<script src="'.URL_PATH.$ftivalue.'"></script>'."\n"; }
					if($csspos !== false){ echo '<link rel="stylesheet" href="'.URL_PATH.$ftivalue.'" type="text/css">'."\n"; }
				}
				catch (Error $e){ trigger_error ("Required File Missing: ".$ftivalue, E_USER_NOTICE); }
			}
		}
		echo '<!-- End of Included Files-->'."\n";
	}
}
?>