<?php


$id = $_REQUEST["q"];
$newpass = $_REQUEST["p"];

$connection = mysqli_connect("localhost", "root", "","software");		

if(mysqli_query($connection,"update login set password='$newpass' where id='$id'"))
	echo "Successful";
else
	echo "Failed";


?>