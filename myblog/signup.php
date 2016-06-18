<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];


mysql_connect('localhost:3306',"root","");
		mysql_select_db('blog'); 
		mysql_query("INSERT INTO users (firstname,lastname,email,username,password) VALUES ('".$firstname."', '".$lastname."', '".$email."', '".$username."', '".$password."')");
header('Location: login.html');	
