<?php

namespace App;

class Parser
{

	private $filename;
	private $items;

	public function __construct(string $filename)
	{
		$this->filename = $filename;
		$this->items = [];
	
		$this->parse();
	}

	private function parse()
	{
		$xml = simplexml_load_file($this->filename);

		if (!$xml) {
			throw new \Exception("Unable to load XML file");
		}

		$this->items = $xml->channel->item;

		echo '<article>';
		foreach ($this->items as $item) {
			echo '<h4>' . $item->title . '</h4>';
			echo '<p>' . $item->pubDate . '</p>';
			echo '<hr/>';
		}
		echo '</article>';

	}

}