<?php

include '../app/vendor/autoload.php';

$rss = new App\Parser('http://rss.nytimes.com/services/xml/rss/nyt/World.xml');
$rss2 = new App\Parser('https://www.nasa.gov/rss/dyn/breaking_news.rss');

$manager = new App\Manager();
$manager->add($rss);
$manager->add($rss2);

foreach ($manager->getNews() as $news) {	
	echo '<article>';
	foreach ($news as $article) {
		echo '<h4>' . $article->getTitle() . '</h4>';
		echo '<p>' . $article->getContent() . '</p>';
		echo '<p>' . $article->getDate()->format('Y-m-d') . '</p>';
		echo '<p>' . $article->getUrl() . '</p>';
		echo '<hr/>';
	}
	echo '</article>';
}