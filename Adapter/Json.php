<?php
namespace Yanlaz\Vitrans\Adapter;

use Yanlaz\Vitrans\Exception\VitransException;

class Json extends AbstractAdapter {
	
	protected $ext = '.json';	
	
	public function load($path){
		
		$file = $this->getLanguageFile($path);

		if ($jsonFile = file_get_contents($file)) {
			if ($json = json_decode($jsonFile, 1)) {
				$this->data = array_map("utf8_decode", $json);
			}
			else {
				throw new VitransException('Json not valid '.$file);			
			}
		} 
		else {
			throw new VitransException('file not exist '.$file);
		}
	}
}