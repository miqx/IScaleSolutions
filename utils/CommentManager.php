<?php

require_once(ROOT . '/utils/AbstractHelper.php');

class CommentManager extends AbstractHelper
{
	protected static $instance = CommentManager::class;

	public function __construct()
	{
		require_once(ROOT . '/utils/DB.php');
		require_once(ROOT . '/class/Comment.php');
	}

	/**
	 * Lists Comments
	 * @return Comment[]
	 */
	public function listComments()
	{
		$db = DB::getInstance();
		$rows = $db->select('SELECT * FROM `comment`');

		$comments = [];
		foreach($rows as $row) {
			$n = new Comment();
			$comments[] = $n->setId($row['id'])
			  ->setBody($row['body'])
			  ->setCreatedAt($row['created_at'])
			  ->setNewsId($row['news_id']);
		}

		return $comments;
	}

	/**
	 * Adds comments on news
	 * @param string $body
	 * @param int $newsId
	 * @return int
	 */
	public function addCommentForNews(string $body, int $newsId)
	{
		$db = DB::getInstance();
		$sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES('". $body . "','" . date('Y-m-d') . "','" . $newsId . "')";
		$db->exec($sql);
		return $db->lastInsertId($sql);
	}

	/**
	 * Deletes Comments
	 * @param int $id
	 * @return mixed
	 */
	public function deleteComment(int $id)
	{
		$db = DB::getInstance();
		$sql = "DELETE FROM `comment` WHERE `id`=" . $id;
		return $db->exec($sql);
	}
}