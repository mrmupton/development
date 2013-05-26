<?php
class includeFiles
{
	public function __construct($req,$types=NULL,$filter=''){
		$jsStop = false; $cssStop = false; $phpStop = false;
		if($types != NULL){
			if(strstr($types,'j')){ $jsStop = true; }; if(strstr($types,'c')){ $cssStop = true; };
			if(strstr($types,'p')){ $phpStop = true; };
		}
		$rf = array(); $rf = explode(',',$req); $rf = array_unique($rf);
		foreach($rf as $rfq){
			try {
				if(!($jsStop)){
					if(file_exists(ROOT_PATH.'library/'.$rfq.'/javascript/fileOrder.txt')){
						$filename = ROOT_PATH.'library/'.$rfq.'/javascript/fileOrder.txt';
						$filelist = array(); $fc = file_get_contents($filename);
						if($fc) { $filelist = explode("\n",$fc); array_shift($filelist); }
						foreach($filelist as $file){
							if(file_exists(ROOT_PATH.'library/'.$rfq.'/javascript/'.$file) && !(strstr($filter,basename($file)))){
								echo '<script src="'.URL_PATH.'library/'.$rfq.'/javascript/'.$file.'"></script>'."\n";
							}
						}
					}
					else{
						foreach(glob(ROOT_PATH.'library/'.$rfq.'/javascript/*.php') as $file) {
							if(!(strstr($filter,basename($file)))){
								echo '<script src="'.URL_PATH.'library/'.$rfq.'/javascript/'.str_replace(ROOT_PATH.'library/'.$rfq.'/javascript/','',$file).'"></script>'."\n";
							}
						}
						foreach(glob(ROOT_PATH.'library/'.$rfq.'/javascript/*.js') as $file) {
							if(!(strstr($filter,basename($file)))){
								echo '<script src="'.URL_PATH.'library/'.$rfq.'/javascript/'.str_replace(ROOT_PATH.'library/'.$rfq.'/javascript/','',$file).'"></script>'."\n";
							}
						}
					}
				}
				if(!($cssStop)){
					foreach(glob(ROOT_PATH.'library/'.$rfq.'/css/*') as $file) {
						if(!(strstr($filter,basename($file)))){
							echo '<link rel="stylesheet" href="'.URL_PATH.'library/'.$rfq.'/css/'.str_replace(ROOT_PATH.'library/'.$rfq.'/css/','',$file).'" type="text/css" />'."\n";
						}
					}
				}
			}
			catch (Error $e){ trigger_error ('Error Including Files. Directory does not exist'); };
		}
		if(!($phpStop)){
			foreach($rf as $rfq){
				foreach(glob(ROOT_PATH.'library/'.$rfq.'/*.php') as $file){ 
					if(!(strstr($filter,basename($file)))){ include_once($file); };
				}	
			}
		}
		echo "\n";
	}
}