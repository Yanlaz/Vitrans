<?php
namespace Yanlaz\Vitrans\Adapter;

use Yanlaz\Vitrans\Exception\VitransException;

class Csv extends AbstractAdapter {
	
	protected $delimiter = ';';
	
	protected $ext = '.csv';
	
	public function setOption($key, $value){
		switch ($key) {
			case 'delimiter':
				$this->delimiter = $value;
				break;
			default:
				throw new VitransException('option not valid '.$key);
     }
		return true;
  }		
	
	public function load($path){
		$file = $this->getLanguageFile($path);

		if (($handle = fopen($file, "r")) !== false) {
			while($item = fgetcsv($handle, 0, $this->delimiter)) {
				$item = array_map("utf8_decode", $item);
				$this->data[$item[0]] = $item[1];
			}
			fclose($handle);
		} 
		else {
			throw new VitransException('file not exist '.$file);
		}
	}
}