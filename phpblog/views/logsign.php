<?php
include('login.php');


if(isset($_SESSION['login_user'])){

	if($_SESSION['admin'] ==0)
	{
		header("location: profile.php");
	}
	else
	{
		header("location: admin.php");
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
	    <link href="../css/bootstrap.min.css" rel="stylesheet">
		
		<style>
		
			.container{
				padding:80px;
			}
			
			.form-control{
				margin-bottom:-20px;
			}
			#page-wrap { 
			position: relative;
			z-index: 2;
			padding-bottom: 3em;
			}


			#bg {
			position:fixed; 
			top:-50%; 
			left:-50%; 
			width:200%; 
			height:200%;
			}

			#bg img {
			position:absolute; 
			top:0; 
			left:0; 
			right:0; 
			bottom:0; 
			margin:auto; 
			min-width:50%;
			min-height:50%;

			-webkit-filter: blur(5px);
			-moz-filter: blur(5px);
			-o-filter: blur(5px);
			-ms-filter: blur(5px);
			filter: blur(5px);
			}
			
			
			
			.navbar{
				background-color:#1abc9c;
				border: 0px solid #333;
				border-radius:0px;
			}
			
			li a{
					font-size:16px;
				}
				
			.form-group{
				margin-bottom:50px;
				
			}
			
			.panel-body, .panel{
				background-color:rgba(0,0,0,0.3);
				color:#fff;
				border:0px solid #444;
			}
			
			
		</style>
	</head>
	
	<body>
	
		<div id="page-wrap">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			  
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				  <ul class="nav navbar-nav">
					<li ><a href="index.php"><span style="color:#f1c40f"><strong>Home</strong></span> </a></li>
					<li style="background-color:rgba(0,0,0,0.5)"><a href="#"><span style="color:#f1c40f"><strong>Login/Signup</strong></a></li>
				  </ul>
				  
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="contact.php"><span style="color:#f1c40f"><strong>Contact Us</strong></span></a></li>					
				  </ul>
				  
				</div>
			  </div>
			</nav>

	
	
	
		<div id="box" class="container">
		
			<div class="row panel panel-default">
				<div  id="login" class="col-sm-6 container">
					<div class="panel panel-info">
						<div style="background-color:rgba(0,0,0,0.3); color:#f1c40f;" class="panel-heading">Login</div>
						<div class="panel-body">
						<form action="" method="post">
							<div class="form-group">
								<label>UserName</label>
								<input class="form-control"  id="userl" name="username" placeholder="username" type="text">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" id="passwordl" name="password" placeholder="**********" type="password">
							</div>
							<input class="btn btn-danger" name="submit" type="submit" value=" Login ">
							
						</form>
						</div>
					</div>
				</div>

				<div  id="signup" class="col-sm-6 container">
					<div class="panel panel-warning">
						<div style="background-color:rgba(0,0,0,0.3); color:#f1c40f;" class="panel-heading">Signup</div>
						<div class="panel-body">
						<form action="" method="post">
							<div class="form-group">
								<label>UserName</label>
								<input class="form-control" id="user" name="usernamesign" placeholder="username" type="text">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" id="password" name="passwordsign" placeholder="**********" type="password">
							</div>
						</form>
							<button class="btn btn-danger" onclick="register();" name="submitsign" type="submit" >Sign Up</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>	
	<div id="bg">
		<?php
		$connection = mysqli_connect("localhost", "root", "","software");		
		$query = mysqli_query($connection,"select image from post");
		
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
			function register()
			{	
				var user = document.getElementById('user').value;
				var pass = document.getElementById('password').value;
				
				location.href='signup.php?u='+user+'&p='+pass;
			}
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>