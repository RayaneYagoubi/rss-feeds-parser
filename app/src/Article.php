<?php

namespace App;

class Article
{

	private $title;
	private $content;
	private $date;
	private $url;

	public function getTitle(): string
	{
		return $this->title;
	}

	public function setTitle(string $title): Article
	{
		$this->title = $title;

		return $this;
	}

	public function getContent(): string
	{
		return $this->content;
	}

	public function setContent(string $content): Article
	{
		$this->content = $content;

		return $this;
	}

	public function getDate(): \DateTime
	{
		return $this->date;
	}

	public function setDate(\DateTime $date): Article
	{
		$this->date = $date;

		return $this;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function setUrl(string $url): Article
	{
		$this->url = $url;

		return $this;
	}

}