<?php
require "init.php";
$faculty_name = $_POST["name"];
$faculty_user_name = $_POST["user_name"];
$faculty_user_pass = $_POST["user_pass"];
$faculty_department = $_POST["department"];
$faculty_subject = $_POST["subject"];
$faculty_id = $_POST["facultyid"];
$faculty_coordinator = $_POST["coordinator"];
$faculty_email = $_POST["email"];
$faculty_contactNo = $_POST["contactNo"];

$sql_query = "insert into faculty_info values('$faculty_name','$faculty_user_name','$faculty_user_pass','$faculty_department','$faculty_subject','$faculty_id',
'$faculty_coordinator','$faculty_email', '$faculty_contactNo');";

if(mysqli_query($con,$sql_query))
{
//echo "<h3>Data Insertion Success</>";
}
else
{
//echo "Data insertion error".mysqli_error($con);
}

?>