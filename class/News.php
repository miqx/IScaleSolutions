<?php

require_once('Helper.php');
class News extends Helper {
	protected $title;

	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	public function getTitle()
	{
		return $this->title;
	}

}