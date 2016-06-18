<?php
$server_name = "localhost";

$mysql_user = "root";
$mysql_pass = "";
$db_name = "csgazettedb";


$con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
if(!$con)
{
echo "Connection Error".mysqli_connect_error();
}
?>