<?php
echo '<!-- Included Files from library/includeFiles/includeFiles.class.php -->'."\n";
echo '<link rel="stylesheet" href="'.URL_PATH.'library/styleSheet/style.php" type="text/css" />'."\n";
class includeFiles
{
	public function __construct($req){
		$rf = array(); $rf = explode(',',$req); $rf = array_unique($rf);
		foreach($rf as $rfq){
			try {
				if(file_exists(ROOT_PATH.'library/'.$rfq.'/javascript/fileOrder.txt')){
					$filename = ROOT_PATH.'library/'.$rfq.'/javascript/fileOrder.txt';
					$filelist = array(); $fc = file_get_contents($filename);
					if($fc) { $filelist = explode("\n",$fc); array_shift($filelist); }
					foreach($filelist as $file){
						if(file_exists(ROOT_PATH.'library/'.$rfq.'/javascript/'.$file)){
							echo '<script src="'.URL_PATH.'library/'.$rfq.'/javascript/'.$file.'"></script>'."\n";
						}
					}
				}
				else{
					foreach(glob(ROOT_PATH.'library/'.$rfq.'/javascript/*.js') as $file) {
						echo '<script src="'.URL_PATH.'library/'.$rfq.'/javascript/'.str_replace(ROOT_PATH.'library/'.$rfq.'/javascript/','',$file).'"></script>'."\n";
					}
				}
				foreach(glob(ROOT_PATH.'library/'.$rfq.'/css/*.css') as $file) {
					echo '<link rel="stylesheet" href="'.URL_PATH.'library/'.$rfq.'/css/'.str_replace(ROOT_PATH.'library/'.$rfq.'/css/','',$file).'" type="text/css" />'."\n";
				}
			}
			catch (Error $e){ trigger_error ('Error Including Files. Directory does not exist'); };
		}
		echo '<!-- End of Included Files-->'."\n";
		foreach($rf as $rfq){
			foreach(glob(ROOT_PATH.'library/'.$rfq.'/*.php') as $file){ include_once($file); }
		}
		echo "\n";
	}
}