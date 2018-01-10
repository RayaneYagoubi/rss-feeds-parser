<?php

namespace App;

class Manager
{

	private $news;

	public function __construct()
	{
		$this->news = new \ArrayIterator();
	}

	public function add(\Iterator $news)
	{
		$this->news->append($news);
	}

	public function getNews(): \Iterator
	{
		return $this->news;
	}

}