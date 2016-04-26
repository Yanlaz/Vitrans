<?php
namespace Yanlaz\Vitrans;

use Yanlaz\Vitrans\Exceptions\ExtensionNotFoundException;

class Vitrans {
	
  protected $adapter;	
	
	protected $data = array();
	
	protected $lang = null;
	
	protected $format = null;
	
	protected $options = array();
	
	protected $path = null;
	
	public function getAdapter(){
		if (!$this->adapter) {
			throw new AdapterNotSetException('Required Adapter');
		}
		return $this->adapter;
  }
	
	protected function adapter(Adapter\AdapterInterface $adapter)	{
		$this->adapter = $adapter;
	}		
	
	public function lang($lang) {
		$this->lang = $lang;
		return $this;
	}
	
	public function path($path) {
		$this->path = $path;
		return $this;
	}	
	
	public function format($format) {
		$this->format = $format;
		return $this;
	}
	
	public function delimiter($delimiter) {
		$this->options['delimiter'] = $delimiter;
		return $this;
	}

  public function load(){
		$a = '\Yanlaz\Vitrans\Adapter\\'.ucfirst($this->format);
		$this->adapter(new $a());  
		
		$this->setOptions();
		$this->getAdapter()->setLanguage($this->lang);
		
		return $this->getAdapter()->load($this->path);
  }
	
  public function get($key){
		return $this->getAdapter()->get($key);
  }
	
	public function delete($key){
		$this->getAdapter()->del($key);
	}	
  
	public function has($key){
		return $this->getAdapter()->has($key);
  }	
  
	public function set($key, $value){
		$this->getAdapter()->set($key, $value);
	}	
	
	public function setOptions(){
		if(!empty($this->options)){
			foreach($this->options as $key=>$value){
				$this->getAdapter()->setOption($key, $value);
			}
		}
	}
}