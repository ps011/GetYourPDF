<?php
	require "backend.php";


	$title = $_POST['title'];
	$text = $_POST['text'];

	echo $title;
	echo $text;
	
	add_new_post($title,$text);
	  
?>
<p><a href='new_post.html'>Add Post</a></p>