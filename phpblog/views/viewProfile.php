<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Your Profile</title>
	    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="Stylesheet" href="../css/navback.css" />
		
		<style>
		
		
		#date{
			font-size:10px;
			color:#999;
			text-align:right;			
			float:right;
		}	
		
		hr{
			margin:0px;
			margin-bottom:7px;
		}
		
		.panel{
			border: 0px solid black;
			box-shadow:0 3px 10px rgba(0,0,0,.23);
		}
		
		.panel-heading {
			 background-color: #16a085 !important;
		}
		
		.profImage{
			width:25px;
			height:25px;
		}
		
		.hh1{
			background-color:#f1c40f;
			border: 1px solid #f1c40f;
		}
		
		.hh2{
			background-color:#e74c3c;
			border: 1px solid #e74c3c;
		}
		
		#gone{
			display:none;
		}
		#gone2{
			display:none;
		}
		.btn-file {
			position: relative;
			overflow: hidden;
			min-width: 100%;
			min-height: 100%;
			margin-top:15px;
			background-color:#2980b9;
			height:50px;
			padding-top:15px;
		}
		.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
		}
		
		</style>
		
	</head>
	
	<body>
	<div id="page-wrap">
			<div id="tools"  class="container">
				<ul class="nav navbar-nav">
					<li><a href="profile.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li><a href="addPost.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
					<li ><a href="logout.php"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>
					
					<p class="navbar-text navbar-right">
					<img class="profImage img-circle" src="
						<?php 
							$connection = mysqli_connect("localhost", "root", "","software");
							$query = mysqli_query($connection,"select profileImage from login where user='$login_ses'");
							while($rows = mysqli_fetch_array($query))
							{
								echo $rows[0];							
							}
						?>">
						</span>  Signed in as <span style="color:#f1c40f"><?php echo $login_ses; ?></span>
					</p>
				</ul>		
			</div>
			
		<div class="container">
			<div class="row">
				<div class="imgcol col-sm-6 col-md-4">
					
						<?php 
							$connection = mysqli_connect("localhost", "root", "","software");
							$query = mysqli_query($connection,"select profileImage from login where user='$login_ses'");
							while($rows = mysqli_fetch_array($query))
							{
								echo '<img class="mainImage img-rounded" src="'.$rows[0].'">';
								echo '<form enctype="multipart/form-data" action="" method="post">';
									echo '<span class="btn btn-default btn-file">
											Change Profile Picture<input type="file" name="fileToUpload" id="photo">
											</span>';
								echo '</form>';
							}
							
							
							//IMPLEMENTATION OF PROFILE PICTURE UPLOAD LEFT!!
						?>
				</div>
				<div class="col-sm-6 col-md-4">
				
				  <div class="list-group">
				  <?php 
							$connection = mysqli_connect("localhost", "root", "","software");
							$query = mysqli_query($connection,"select * from login where user='$login_ses'");
							while($rows = mysqli_fetch_array($query))
							{
								echo '<div  onclick="displayBox(id);" id="4" class="list-group-item">
										<h4 class="list-group-item-heading">Username</h4>
										<p class="list-group-item-text">'.$rows[1].'</p>
									</div>';
								echo '<div  onclick="displayBox(id);" id="4" class="list-group-item">
										<h4 class="list-group-item-heading">User Id</h4>
										<p id="usern" class="list-group-item-text">'.$rows[0].'</p>
									</div>';	
								echo '<div onclick="displayBox(id);" id="4" class="list-group-item">
										<h4 class="list-group-item-heading">Created On</h4>
										<p class="list-group-item-text">'.$rows[5].'</p>
									</div>';
								echo '<div  onclick="displayBox(id);" id="4" class="list-group-item">
										<h4 class="list-group-item-heading">Last Update</h4>
										<p class="list-group-item-text">'.$rows[7].'</p>
									</div>';		
								echo '<div  onclick="displayBox(id);" id="4" class="list-group-item">
										<h4 class="list-group-item-heading">Email</h4>
										<p class="list-group-item-text">'.$rows[9].'</p>
									</div>';			
								echo '<div onclick="displayBox(id);" id="1" style="cursor: pointer;" class="hh1 list-group-item">
										<h4>Contact Admin</h4>
									</div>';			
								echo '<div onclick="displayBox(id);" id="2" style="cursor: pointer;" class="hh2 list-group-item">
										<h4>Change Password</h4>
									</div>';			
							}
					?>
					</div>
				
				</div>
				<div class="col-sm-6 col-md-4">
				
					<div id="gone" >
							<textarea name="textarea" class="form-control" id="text" rows="10" placeholder="Enter Text"></textarea></br>
							<input onclick="sendTicket();" class="btn btn-warning" name="submit" type="submit" value=" Submit ">
							<p id="passresult2"></p>
					</div>
					
					<div action="" method="post" id="gone2" >
							<input class="form-control" name="newpass" type="password" id="newpass" placeholder="New Password"></br>
							<input onclick="changePW();" class="btn btn-danger" name="submit" type="submit" value=" Change Password ">
							<p id="passresult"></p>
					</div>
				
				</div>
			</div>
		</div>
		
	</div>

	<div id="bg">
		<?php
		$connection = mysqli_connect("localhost", "root", "","software");		
		$query = mysqli_query($connection,"select image from post where user='$login_ses'");
		
		$arr = array();
		$i = 0;
		while($rows = mysqli_fetch_array($query))
		{
			if($rows[0]!==""){
				$arr[$i] = $rows[0];
				$i = $i+1;
			}
		}
		if(empty($arr))
		{
			echo '<img src="../images/postimages/default.jpg" alt="">';
		}
		else
		{
			$image = $arr[array_rand($arr)];
			echo '<img src="'.$image.'" alt="">';
		}
		?>
	</div>
	
	<script>
	
		function displayBox(id	)
		{
			if(id=="1")
			{
				document.getElementById('gone').style.display = 'block';
				document.getElementById('gone2').style.display = 'none';
			}
			else if(id=="4")
			{
				document.getElementById('gone').style.display = 'none';
				document.getElementById('gone2').style.display = 'none';
			}
			else	
			{
				document.getElementById('gone2').style.display = 'block';
				document.getElementById('gone').style.display = 'none';
			}
		}
		
		function changePW()
		{
			newpass = document.getElementById('newpass').value;
			user = document.getElementById('usern').innerHTML;
			console.log(user);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					//console.log(document.getElementById('userdetail'));
					document.getElementById('passresult').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "changepass.php?q=" + user +"&p=" + newpass, true);
			xmlhttp.send();
		
		}
		
		function sendTicket()
		{
			ticket = document.getElementById('text').value;
			user = document.getElementById('usern').innerHTML;
			console.log(user);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					//console.log(document.getElementById('userdetail'));
					document.getElementById('passresult2').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "sendticket.php?q=" + user +"&p=" + ticket, true);
			xmlhttp.send();
		
		}
		
	
	</script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/imagesloaded.pkgd.min.js"></script>
	<script src='../js/masonry.pkgd.min.js'></script>
	
	</body>
	
</html>