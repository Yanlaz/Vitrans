<?php
namespace Yanlaz\Vitrans\Adapter;

/**
 * Interface AdapterInterface
 */
interface AdapterInterface
{

    public function setLanguage($lang);
    
    public function getLanguageFile($path);
    
    public function setOption($key, $value);
    
    /**
     * Load the translation file
     *
     * @param string $path
     *
     * @return mixed
     */
    public function load($path);

    /**
     * Delete a value from the cache
     *
     * @param string $key
     */
    public function del($key);		
		
    /**
     * Retrieve the value corresponding to a provided key
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * Retrieve the if value corresponding to a provided key exist
     *
     * @param string $key
     *
     * @return bool
     */
    public function has($key);
		
    /**
     * * Add a value to the cache under a unique key
     *
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value);
}
