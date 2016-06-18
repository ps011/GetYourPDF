<?php
	
	$result = init();
	$system = "THis IS THE BLOG";
	
	function the_title()
	{
		$titulo = "THE BLOG AT NIGHT";
		echo "BLOGGER APP PUNEET";
	}
	
	function init(){
		mysql_connect('localhost:3306',"root","");
		mysql_select_db('blog'); 
		$result = mysql_query('SELECT * FROM posts');
		return $result;
	}
	
	function add_new_post($title, $text){
		mysql_connect('localhost:3306',"root","");
		mysql_select_db('blog');
		$result = mysql_query("INSERT INTO posts (title,text) VALUES ('".$title."', '".$text."')");
		echo mysql_error();
		echo "<a href='index.php'>Go to admin</a>";
	}
?>