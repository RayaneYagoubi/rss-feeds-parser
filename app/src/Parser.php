<?php

namespace App;

use App\Article;

class Parser implements \Iterator
{

	private $filename;
	private $items;
	private $position = 0;

	public function __construct(string $filename)
	{
		$this->filename = $filename;
		$this->items = [];
	
		$this->parse();
	}

	public function current()
	{
		$item = $this->items[$this->position];

		$article = new Article();

		$article->setTitle($item->title)
				->setContent($item->description)
				->setDate(new \DateTime($item->pubDate))
				->setUrl($item->link);

		return $article;
	}

	public function key()
	{
		return $this->position;
	}

	public function next()
	{
		++$this->position;
	}

	public function rewind()
	{
		$this->position = 0;
	}

	public function valid()
	{
		return isset($this->items[$this->position]);
	}

	private function parse()
	{
		$xml = simplexml_load_file($this->filename);

		if (!$xml) {
			throw new \Exception("Unable to load XML file");
		}

		$this->items = $xml->channel->item;
	}

}