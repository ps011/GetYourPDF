<?php


$q = $_REQUEST["p"];

$connection = mysqli_connect("localhost", "root", "","software");		
if(mysqli_query($connection,"delete from post where id='$q'"))
{
	echo 'Deleted';
}



?>