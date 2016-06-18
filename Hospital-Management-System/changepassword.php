<?php
$_SESSION["username"] = "24";
$conn = mysql_connect("localhost","root","");
mysql_select_db("hms",$conn);
if(count($_POST)>0) {
$result = mysql_query("SELECT *from passwords WHERE Username='" . $_SESSION["username"] . "'");
$row=mysql_fetch_array($result);
if($_POST["currentPassword"] == $row["Password"]) {
mysql_query("UPDATE passwords set Password='" . $_POST["newPassword"] . "' WHERE Username='" . $_SESSION["username"] . "'");
$message = "Password Changed";
} else $message = "Current Password is not correct";
}
?>