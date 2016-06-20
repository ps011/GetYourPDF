<?php
session_start();
$download = $_GET['d'];
$_SESSION['download'] = $download;


if($download == 101)
{
header('location:pdf/Engineering Chemistry.pdf');
}
if($download == 102)
{
header('location:pdf/Engineering Maths.pdf');
}
if($download == 103)
{
header('location:pdf/Communication Skills.pdf');
}
if($download == 104)
{
header('location:pdf/BEEE.pdf');
}
if($download == 105)
{
header('location:pdf/Engineering Drawing.pdf');
}
if($download == 201)
{
header('location:pdf/Engineering Physics');
}
if($download == 202)
{
header('location:pdf/Environmental_book');
}
if($download == 203)
{
header('location:pdf/Mech Engg.pdf');
}
if($download == 204)
{
header('location:pdf/Civil Engg.pdf');
}
if($download == 205)
{
header('location:504.pdf');
}

?>