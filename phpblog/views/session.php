<?php
$connection = mysqli_connect("localhost", "root", "","software");

session_start();

$user=$_SESSION['login_user'];

$result=mysqli_query($connection,"select user from login where user='$user'");

$row = mysqli_fetch_assoc($result);

$login_ses =$row['user'];

if(!isset($login_ses)){
	mysqli_close($connection); 
	header('Location: logsign.php');
}

?>