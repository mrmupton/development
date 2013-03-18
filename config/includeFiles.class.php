<?php
include_once ('config/dataObject.class.php');
include_once ('config/errorReporting.class.php');

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
					$fti[] = 'dataGrid.class.php';
					//javascript files
					$fti[] = 'editablegrid-2.0.1.js';
					$fti[] = 'jquery-1.6.4.min.js';
					$fti[] = 'jquery-ui-1.8.16.custom.min.js';
					$fti[] = 'autocomplete.js';
					$fti[] = 'swfobject.js';
					$fti[] = 'json2.js';
					$fti[] = 'ofc.js';
					$fti[] = 'open_flash_chart.min.js';
					$fti[] = 'demo.js';
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
					if($classpos != false){ $ftivalue = 'config/'.$ftivalue; }
					if($jspos !== false){ $ftivalue = 'javascript/'.$ftivalue; }
					if($csspos !== false){ $ftivalue = 'css/'.$ftivalue; }
					//check to see if file exists
					if(!file_exists($ftivalue)){ trigger_error ("Required File Is Missing: ".$ftivalue, E_USER_NOTICE); };
					//output value dependant on existence of .php, .css or .js
					if($phppos !== false){ include_once ($ftivalue); }
					if($jspos !== false){ echo '<script src="'.$ftivalue.'"></script>'."\n"; }
					if($csspos !== false){ echo '<link rel="stylesheet" href="'.$ftivalue.'" type="text/css">'."\n"; }
				}
				catch (Error $e){ trigger_error ("Required File Missing: ".$ftivalue, E_USER_NOTICE); }
			}
		}
		echo '<!-- End of Included Files-->'."\n";
	}
}
?>