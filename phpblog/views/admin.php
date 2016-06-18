<?php
include('session.php');
if(isset($_SESSION['login_user'])){

	if($_SESSION['admin'] ==0)
	{
		header("location: profile.php");
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Your Profile</title>
	    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="Stylesheet" href="../css/navback.css" />
		
		<style>
		
		
		#userlist{
			margin-top:10px;
			padding:15px;
		}

		.panel-body{
			font-size:20px;
			font-weight:light;
		}
		
		.userButton{
			margin-right:5px;
			min-width:50%;
		}
		
		ul{
			list-style-type:none;
			width:30%;
			float:left;
		}
		
		#dets{			
			font-size:15px;
			float:left;
		}
		
		li{
			margin-top:5px;
		}
		
		
		#passbox{
			display:none;
		}
		</style>
		
	</head>
	
	<body>
	
		<div id="tools"  class="container">
				<ul class="nav navbar-nav">
					<li ><a href="logout.php"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>
					<p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Signed in as admin <span style="color:#f1c40f"><?php echo $login_ses; ?></span></p>
				</ul>		
		</div>
		
		
		<?php
		
		
		$connection = mysqli_connect("localhost", "root", "","software");		

		$query = mysqli_query($connection,"select * from login");
		echo '<div  class="container">';
			echo '<div id="userlist" class="panel panel-info">';
			
				echo '<div class="panel-heading">';
					echo 'Users';
				echo '</div>';
				
				echo '<div class="panel-body">';
				
					echo '<ul>';
						while($rows = mysqli_fetch_array($query))
						{
						
										echo  '<li> <button class="btn btn-success userButton" id="'.$rows[0].'" onclick="userDetails(id)">'. $rows[1] . '</button>';	
						}
					echo '</ul>';
					
					echo '<div id="dets">';
						echo '<div id="detailsbox">';		
						echo '<p id="userdetail"></p>';		
						echo '</div>';
						
						echo '<div id="passbox">';
							echo '<button class="btn btn-danger" style="margin-top:0px;" onclick="deletePost()">Delete Post</button>';
							echo '<p id="postresult"></p>';
							echo '<input class="form-control" name="newpass" type="password" id="newpass" placeholder="New Password"><br>';
							echo '<button class="btn btn-danger" style="margin-top:-5px;" onclick="changePW()">Change Password</button>';
							echo '<p id="passresult"></p>';
							echo '<button class="btn btn-danger" style="margin-top:-5px;" onclick="postAllow()">Allow/Disallow Posting</button>';
							echo '<p id="allowresult"></p>';
						echo '</div>';
					echo '</div>';
					
				echo '</div>';
				
			echo '</div>';
		echo '</div>';
		
		
		
		
		?>
		
		
		

	<script>

	var id = 3;
	var username = "";
	
	function userDetails(user)
	{
		username = document.getElementById(user).innerHTML;
		document.getElementById('passresult').innerHTML = "";
		document.getElementById('allowresult').innerHTML = "";
		document.getElementById('passbox').style.display = 'block';
		id = user;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //console.log(document.getElementById('userdetail'));
				document.getElementById('userdetail').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getdetails.php?q=" + user+"&u="+username, true);
        xmlhttp.send();
	
	}

	function changePW()
	{
		newpass = document.getElementById('newpass').value;
		console.log(newpass);
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //console.log(document.getElementById('userdetail'));
				document.getElementById('passresult').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "changepass.php?q=" + id +"&p=" + newpass, true);
        xmlhttp.send();
	
	}
	
	function postAllow()
	{
		
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
				document.getElementById('allowresult').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "postAllow.php?q=" + id, true);
        xmlhttp.send();
	
	}
	
	function deletePost()
	{
		postval = document.getElementById('postlist').value;
		postid = postval[4];
		if(postval[5]!=',')
		{
			postid = postid + postval[5];
		}
		console.log(postid);
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
				document.getElementById('postresult').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "postDelete.php?p=" + postid, true);
        xmlhttp.send();
	
	}
	
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</body>
	
</html>