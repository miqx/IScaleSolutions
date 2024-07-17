<?php


abstract class AbstractHelper {
    
	protected static $instance;

	/**
	 * Instantiates Classes
	 *
	 * @return object
	 */
    public static function getInstance()
	{
		return (new static::$instance);
	}
}