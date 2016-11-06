<?php

include_once('lib/DB.php');



class Authors {

	public static $author_name = array(
		0=>'Vasya',
		1=>'Petya',
		2=>'Kolya',
		3=>'Sasha',
		4=>'Sergey'
		);

	public static $author_surname = array(
		0=>'Ivanov',
		1=>'Petrov',
		2=>'Sidorov',
		3=>'Vasiliev',
		4=>'Nikolayev'
		);

	public static function Add_authors($quantity) {

		$db = DB::Get();
		$db->Connect('localhost', 'php2', 'root', '');
		$db->Query('CREATE TABLE authors_new (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(255))');
	
		for ($i=0; $i < $quantity; $i++) { 
			$authors = self::$author_name[rand(0, count(self::$author_name)-1)] . ' ' . 
			self::$author_surname[rand(0, count(self::$author_surname)-1)];
			$db->Query('insert into authors_new (name) values(:name)', array('name'=>$authors));
			echo 'User '.$authors.' in BD'."\n";
		}
		
		$db->Query('TRUNCATE TABLE author');
		$db->Query('INSERT INTO author SELECT * FROM authors_new');
		$db->Query('DROP TABLE authors_new');
	}
}

Class Articles {
	public static $text_string = array(
		0=>'In languages that employ articles, every common noun',
		1=>'languages express every noun with a certain grammatical number',
		2=>'its definiteness, and the lack of an article (considered a zero article) itself',
		3=>'This obligatory nature of articles makes them among the most common words in many languages',
		4=>'Articles are usually characterized as either definite or indefinite.',
		5=>'Within each type, languages may have various forms of each article, according to grammatical attributes such',
		6=>'The definite article can also be used in English to indicate a specific class among other classes:',
		7=>'However, recent developments show that definite articles are morphological'
		);

	public static function Add_articles($quantity, $auth) {

		$db = DB::Get();
		$db->Connect('localhost', 'php2', 'root', '');
		$db->Query('CREATE TABLE articles_new (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, title varchar(255), text text,	author int, views int)');

		for ($i=0; $i < $quantity; $i++) { 
			$texts = self::$text_string[rand(0, count(self::$text_string)-1)] . ' ' . 
			self::$text_string[rand(0, count(self::$text_string)-1)] . ' ' . 
			self::$text_string[rand(0, count(self::$text_string)-1)] . ' ' . 
			self::$text_string[rand(0, count(self::$text_string)-1)];
			$auth_id = rand(1, $auth);
			$data = array('title'=>'article'.$i, 'text'=>$texts, 'author'=>$auth_id, 'views'=>0);
			$db->Query('insert into articles_new (title, text, author, views) values(:title, :text, :author, :views)', $data);
			echo 'Article ' . $data['title'] . ' in BD'."\n";
		}
		$db->Query('TRUNCATE TABLE article');
		$db->Query('INSERT INTO article SELECT * FROM articles_new');
		$db->Query('DROP TABLE articles_new');
	}
}


$authors = $argv[1];
$articles = $argv[2];
$x = (int)preg_replace("/[^0-9]/", '', $authors);
$y = (int)preg_replace("/[^0-9]/", '', $articles);

$auth = new Authors;
$auth->Add_authors($x);
$article = new Articles;
$article->Add_articles($y, $x);







?>