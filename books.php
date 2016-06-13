<?php
session_start();
$semester = $_GET['s'];
$_SESSION['semester']=$semester;

if($semester==1 || $semester==2 || $semester==3 || $semester==4 || $semester==5 || $semester==6 || $semester==7 || $semester==8)
{
{header('location:books1.php'); }
}
?>