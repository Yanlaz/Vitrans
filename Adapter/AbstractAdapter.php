<?php
namespace Yanlaz\Vitrans\Adapter;

use Yanlaz\Vitrans\Exception\VitransException;
/**
 * AbstractAdapter
 */
abstract class AbstractAdapter implements AdapterInterface{
	
	protected $data = array();
	
	protected $defaultLang = 'en_US';
	
	protected $lang = null;
	
	protected $ext = null;
	
	public function setLanguage($lang){
		$this->lang = $lang;
	}
	
	public function getLanguageFile($path){
		$pathLang = $path.$this->lang.$this->ext;

		if(!file_exists($pathLang)){
			$pathLang = $path.$this->defaultLang.$this->ext;
		}
		return $pathLang;
	}
	
	public function setOption($key, $value){}
	
	public function del($key){
		throw new VitransException('not ready yet');
  	}
	
	public function set($key,$value){
		throw new VitransException('not ready yet');
	}
	
	public function get($key){
		return (isset($this->data[$key])) ? $this->data[$key] : $key;
	}
	
	public function has($key){
		return (isset($this->data[$key])) ? true : false;
	}	
}