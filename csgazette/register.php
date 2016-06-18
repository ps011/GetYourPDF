<?php
require 'init.php';
$server_name = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$db_name = "csgazettedb";
$con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);

$name = $_POST["name"];
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];
$year = $_POST["year"];
$enrollment = $_POST["enrollment"];
$section = $_POST["section"];
$email = $_POST["email"];
$contact = $_POST["contact"];

$sql_query = "insert into student_info values('$name','$user_name','$user_pass','$year','$enrollment','$section','$email','$contact');";

if(mysqli_query($con,$sql_query))
{
//echo "<h3>Data Insertion Success</>";
}
else
{
//echo "Data insertion error".mysqli_error($con);
}

?>