<?php


$id = $_REQUEST["q"];
$ticket = $_REQUEST["p"];
$randin = rand(3,10000);
$tid = $randin;


$connection = mysqli_connect("localhost", "root", "","software");

if($id=="anon")
{	
		
	$name = $_REQUEST["n"];
	$email = $_REQUEST["e"];
	if(mysqli_query($connection,"insert into message (message,messageid,name,email) values ('$ticket','$tid','$name','$email') "))
		echo "Successful, Your message id is ".$tid;
	else
		echo "Failed";
}	
else{
	if(mysqli_query($connection,"update login set tickettext='$ticket',ticketid='$tid' where id='$id'"))
		echo "Successful, Your ticked id is ".$tid;
	else
		echo "Failed";
}

?>