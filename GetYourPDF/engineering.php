<?php
session_start();

$branch=$_GET['b'];
$_SESSION['branch']=$branch;

if($branch=='cse')
{	header('location:engineering.html'); }
if($branch=='it')
{header('location:engineering.html');	}
if($branch=='ece')
{header('location:engineering.html'); }
else if($branch=='ee')
{header('location:engineering.html'); }
else if($branch=='me')
{header('location:engineering.html'); }
else if($branch=='ce')
{header('location:engineering.html'); }


?>