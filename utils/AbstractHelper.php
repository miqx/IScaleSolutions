<?php


abstract class AbstractHelper {
    
	protected static $instance;

    public static function getInstance()
	{
		return (new static::$instance);
	}
}