<?php
session_start();
$error='';
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password is empty";
}
else
	{

	$username=$_POST['username'];
	$password=$_POST['password'];

	$connection = mysqli_connect("localhost", "root", "","software");


	$query = mysqli_query($connection,"select * from login where password='$password' AND user='$username'");
	$rows = mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
	

		if ($rows == 1) {
			
			$admin = $row[3];
			$_SESSION['admin']=$admin;			
			$_SESSION['login_user']=$username;	

		}	
		
		else {
		$error = "Invalid";}
			
		
		
	mysqli_close($connection);

	

}}
?>