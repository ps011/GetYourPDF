<?php


$q = $_REQUEST["q"];
$u = $_REQUEST["u"];

$connection = mysqli_connect("localhost", "root", "","software");		
$query = mysqli_query($connection,"select * from login where id='$q'");


		
while($rows = mysqli_fetch_array($query))
		{		
			echo 'Username: '.$rows[1];
			echo '<br>';
			echo 'Password:'.$rows[2];
			echo '<br>';
			echo 'Admin: '.$rows[3];
			echo '<br>';
			echo 'Posting Allowed: '.$rows[12];
			echo '<br>';
			echo 'Creation Date: '.$rows[5];
			echo '<br>';
			echo 'Updated Date: '.$rows[7];
			echo '<br>';
			if($rows[11]!="")
			{
				echo 'Ticket Id: '.$rows[10];
				echo '<br>';
				echo 'Ticket Text: '.$rows[11];
				echo '<br>';
			}
		}
		
		
$query2 = mysqli_query($connection,"select * from post where user='$u'");
echo 'Posts:<br>';
echo '<select id="postlist" class="form-control">';
while($rows2 = mysqli_fetch_array($query2))
		{		
			echo '<option>';
			echo 'ID: '.$rows2[0];
			echo ',   ';
			echo 'Title: '.$rows2[5];
			echo ',   ';
			echo 'Date:'.$rows2[2];
			echo '</option>';
		}
echo '</select>';
?>