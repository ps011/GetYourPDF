<!DOCTYPE html>
<html>
	<head>
	    <link href="../css/bootstrap.min.css" rel="stylesheet">
		
		<style>
		
			.container{
				padding:80px;
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
			
			.btn-file {
			position: relative;
			overflow: hidden;
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
			
			
			.signbutton button{
				margin-left:45%;
			}
			
			.navbar{
				background-color:#1abc9c;
				border: 0px solid #333;
				border-radius:0px;
			}
		
			#propic{
				width:100px;
				height:100px;
				display:none;
			}
			
			.postalert{
				display:none;
			}
		</style>
	</head>
	
	<body>
	
		<div id="page-wrap">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			  
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				  <ul class="nav navbar-nav">
					<li ><a href="index.php"><span style="color:#f1c40f">Home</span> </a></li>
					<li ><a href="logsign.php"><span style="color:#f1c40f">Login / Sign Up</a></li>
				  </ul>
				  
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="contact.php"><span style="color:#f1c40f">Contact Us</span></a></li>					
				  </ul>
				  
				</div>
			  </div>
			</nav>

	
	
	
			<div id="box" class="container">
			
			<div id="postalerts" class="postalert alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>User Registered successfully!</strong> 
			  <a href="logsign.php" class="alert-link">Go Back.</a>
			</div>
			<div id="postalerte" class="postalert alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> 
			</div>
			
				<div class="panel panel-warning">
					<div class="panel-heading">
						Register
					</div>
					<div class="panel-body">
					
					
								<form enctype="multipart/form-data" class="form-horizontal" action="" method="post">
								
								  <div class="form-group">
									<label for="user" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
									<input name="user" type="text" class="form-control" id="user" value="<?php echo $_REQUEST["u"]; ?>">
									</div>
								  </div>
								  
								  <div class="form-group">
									<label for="pass" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
									<input name="pass" type="password" class="form-control" id="pass" value="<?php echo $_REQUEST["p"]; ?>">
									</div>
								  </div>
								  
								  <div class="form-group">
									<label for="email" class="col-sm-2 control-label">Email Address</label>
									<div class="col-sm-10">
									<input name="email" type="email" class="form-control" id="email" >
									</div>
								  </div>
								  
								  <div class="form-group">
									<label for="age" class="col-sm-2 control-label">Age</label>
									<div class="col-sm-10">
									<input name="age" type="text" class="form-control" id="age" >
									</div>
								  </div>
								  
								  <div class="form-group">
									<label for="pic" class="col-sm-2 control-label">Profile Picture</label>
									<div class="col-sm-10">
										<span class="btn btn-default btn-file">
										Choose File<input type="file" name="fileToUpload" id="photo">
										</span>
										<p class="help-block">Optional image for blog post.<p>
										<img id="propic" src="" class="img-circle">
									</div>									
								  </div>
								  <div class="signbutton">
										<button type="submit" name="submit" class="btn btn-warning">Sign Up</button>
									</div>
								</form>
					
					
					
					
					</div>
				</div>
				
			</div>
		
		
		<?php
		
				
		$error='';
		
		if (isset($_POST['submit'])) {
		
		if (empty($_POST['user']) || empty($_POST['pass'])) {
			$error = "Username or Password is empty";
		}
		else
			{

			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$email=$_POST['email'];
			$age=$_POST['age'];
			$date= date("Y-m-d");


			$uploadOk = 1;
			$target_dir = "../images/profileImages/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			
			if($target_file =="../images/profileImages/")
			{$target_file = "";}
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			$connection = mysqli_connect("localhost", "root", "","software");
			$allowPost = 1;
			$admin = 0;
			
			
			$query=mysqli_query($connection, "select count() from login where user=$user");
			//$rows = mysqli_fetch_row($query);
			if($query > 0){
				echo 'Username already exists';
			}
			else if (mysqli_query($connection,"insert into login (user,password,admin,profileImage,creation_date,email,allowPost) values ('$user','$pass','$admin','$target_file','$date','$email','$allowPost')")) {
				echo "<script>document.getElementById('postalerts').style.display = 'block';</script>";
			} else {
				echo "Error: " ."<br>" . mysqli_error($connection);
				echo "<script>document.getElementById('postalerte').style.display = 'block';</script>";
				$uploadOk = 0;
			}
				
				
			mysqli_close($connection);

			
			if($target_file !== "../images/profileImages/" && $target_file !== "")
			{
				
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo " ";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
			}

		}}
		?>
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
		
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>