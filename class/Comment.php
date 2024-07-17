<?php

require_once('Helper.php');
class Comment extends Helper {

	protected $newsId;

	public function getNewsId()
	{
		return $this->newsId;
	}

	public function setNewsId($newsId)
	{
		$this->newsId = $newsId;

		return $this;
	}
}