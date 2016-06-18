<?php

$server_name = "localhost";

$mysql_user = "root";
$mysql_pass = "";
$db_name = "minor";


$con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];

$sql_query = "select * from student_info where user_name like '$user_name' and user_pass like '$user_pass';";
$result = mysqli_query($con,$sql_query);

if(mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_assoc($result);
$name = $row["user_name"];
echo "Login Success";
}
else
{
echo "Login Failed, try again..";
}





?>