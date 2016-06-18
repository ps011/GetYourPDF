<?php
session_start ();
$user = @$_SESSION['username'];
if ($user)
{
//user is logged in
if (@$_POST['submit'])
{
//check fields
$oldpassword =(@$_POST['oldpassword']);
$newpassword = (@$_POST['newpassword']);
$repeatnewpassword =(@$_POST['repeatnewpassword']);
//check password against db
//connect to db
$connect = mysql_connect ("localhost","root","") or die();
mysql_select_db("HMS")or die();
$queryget = mysql_query ("SELECT Password FROM Passwords WHERE Username='$user'")or die ("Query didnt work");
$row = mysql_fetch_assoc($queryget);
$oldpassworddb = $row ['Password'];
//check passwords
if($oldpassword==$oldpassworddb)
{
//check the new password
if ($newpassword==$repeatnewpassword)
{
//succes
//change password in db
$querychange = mysql_query ("
UPTADE Passwords SET Password='$newpassword' WHERE Username='$user'
");
session_destroy();
die ("Your password has been changed.<a href='index.php'>Return </a>to the main page");
}
else 
 die ("New password dont match!");
}
else 
 die("Old password doesnt match!");
}
else
{
echo("
<form action ='changepassword.php' method='POST'>
 Old password: <input type ='text' name ='oldpassword'><p>
 New password: <input type='password' name='newpassword'><br>
 Repeat new password <input type='password' name='repeatnewpassword'><p>
 <input type='submit' name='submit' value='Change password'>
</form>
");
}
}
else
   die ("You must be logged in to change your password");
?>