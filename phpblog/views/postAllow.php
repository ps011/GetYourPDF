<?php


$id = $_REQUEST["q"];

$connection = mysqli_connect("localhost", "root", "","software");
		
$query = mysqli_query($connection,"select * from login where id='$id'");		
while($rows = mysqli_fetch_array($query))
		{		
			$post = $rows[12];
			$post = - $post;
		}

if(mysqli_query($connection,"update login set allowPost='$post' where id='$id'"))
	echo "Successful";
else
	echo "Failed";


?>