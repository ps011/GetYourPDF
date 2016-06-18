<?php
session_start();
$download = $_GET['d'];
$_SESSION['download'] = $download;


if($download == 101)
{
header('location:http://cuiet.info/download/All%20Chapters%20of%20Engineering%20Chemistry.pdf');
}
if($download == 502)
{
header('location:502.pdf');
}
if($download == 503)
{
header('location:503.pdf');
}
if($download == 504)
{
header('location:504.pdf');
}
if($download == 505)
{
header('location:505.pdf');
}
if($download == 506)
{
header('location:506.pdf');
}

?>