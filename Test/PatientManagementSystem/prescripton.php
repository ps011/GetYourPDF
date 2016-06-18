<?php
require("include/dbinfo.php");
$link=mysql_connect($server,$user,$pass)or die(errorReport(mysql_error()));
mysql_select_db($db,$link)or die(errorReport(mysql_error()));
# here database details      


$sql = "select Patient_ID from Patients";
$result = mysql_query($sql);
?>
<h4>Select Patient ID</h4>
<select name="select1">
 <?php 
 while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
 {
	 ?>
	 <option value="<?php echo $line['Patient_ID'];?>">
	 <?php echo $line['Patient_ID'];?> 
	 </option>   
	 <?php 
	 } 
	 ?>
	 </select> 
	 


<!DOCTYPE html>
<html>
<input style="float:right"type="date" value="<?php echo date('Y-m-d'); ?>" />

<style>
header { 
    display: block;
}
margin-align{
	
}
</style>
<article>
  <header>
    <h1 align="center">Hakeem Rafiuddin Ahmed</h1>
    <h3 align="center">ADDRESS : </h3>
    <p align="center">

Nizamia Shifa Khana

Niamath street Pernambut.635810 Vellore district Tamilnadu - India</p>
  </header>
</article>
<body>

<textarea  rows="50" cols="180">


</textarea>

</body>
</html>
<?php
		echo "<a style=\"margin-left:500\" href=\"javascript:window.print()\"><img src=\"print.jpg\" alt=\"print this page\" id=\"print-button\" height=\"80\" width=\"80\" /></a>";
?>