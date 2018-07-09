<?php

require_once('Post.php');

class Repository
{
	public $pdo;
	public function __construct()
	{
		$host = 'localhost';
		$db   = 'book';
		$user = 'root';
		$pass = 'root';
		$charset = 'utf8';
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$this->pdo = new PDO($dsn, $user, $pass);
	}

	public function getAll()
	{
		$array = [];
		$query = $this->pdo ->query("SELECT * FROM `base`")->fetchAll();

		foreach ($query as $value) {
			$post = new Post();
			$post->id = $value['id'];
            $post->username = $value['username'];
			$post->message = $value['message'];
			$post->date = $value['date'];
			$array[] = $post;
		}	
		return $array;
	}

	public function add($post)
	{
	    $query = $this->pdo->prepare("INSERT INTO `base` 
                                                  SET `username`=:username, 
                                                      `message`=:message
                                ");

		$query->execute([
		        'username'=> $post->username,
                'message'=> $post->message,
            ]);
	}
}
