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
			
		#login{
			padding:50px;
			width:100%;
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
		
		.postalert{
			display:none;
		}
		
		</style>
		
	</head>
	
	<body>
	
			<div id="tools"  class="container">
				<ul class="nav navbar-nav">
					<li><a href="profile.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
					<li ><a href="logout.php"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>
					<p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Signed in as <span style="color:#f1c40f"><?php echo $login_ses; ?></span></p>
				</ul>		
			</div>
		
		<div class="container">
		<div id="postalerts" class="postalert alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Post successfully submitted!</strong> 
		  <a href="profile.php" class="alert-link">Go Back.</a>
		</div>
		<div id="postalerte" class="postalert alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Error!</strong> 
		</div>
		
			<div class="row panel panel-default">
				<div id="login" class="col-sm-6 container">
					<div class="panel panel-danger">
						<div class="panel-heading">Add New Post</div>
						<div class="panel-body">
						
						
									<form enctype="multipart/form-data" action="" method="post">
									  <div class="form-group">
										<label for="title">Title</label>
										<input name="title" type="text" class="form-control" id="title" placeholder="Title">
									  </div>
									  <div class="form-group">
										<label for="text">Text</label>
										<textarea name="textarea" class="form-control" id="text" rows="10" placeholder="Text"></textarea>
									  </div>
									  <div class="form-group">
										<label for="photo">Image</label>
										<br>
											<span class="btn btn-default btn-file">
											Choose File<input type="file" name="fileToUpload" id="photo">
											</span>
										<p class="help-block">Optional image for blog post.<p>
									  </div>
									  <div class="form-group">
										<label for="tags">Tags</label>
										<input name="tags" type="text" class="form-control" id="tags" placeholder="E.g. Science...">
										<p class="help-block">Separate multiple tags with commas.<p>
									  </div>
									  <button type="submit" name="submit" class="btn btn-danger">Submit</button>
									</form>
						
						
						
						
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
		
				
		$error='';
		
		$connection = mysqli_connect("localhost", "root", "","software");		
		$result=mysqli_query($connection,"select allowPost from login where user='$login_ses'");
		$row = mysqli_fetch_assoc($result);
		$allow = $row['allowPost'];
		
		if($allow ==1){
		if (isset($_POST['submit'])) {
		
		if (empty($_POST['title']) || empty($_POST['textarea'])) {
			$error = "Title or Content is empty";
		}
		else
			{

			$title=$_POST['title'];
			$text=$_POST['textarea'];
			$tags=$_POST['tags'];
			$date= date("Y-m-d");


			$uploadOk = 1;
			$target_dir = "../images/postImages/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			
			if($target_file =="../images/postImages/")
			{$target_file = "";}
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			$connection = mysqli_connect("localhost", "root", "","software");

			if (mysqli_query($connection,"insert into post (user,date,text,image,title,tags) values ('$login_ses','$date','$text','$target_file','$title','$tags')")) {
				echo "<script>document.getElementById('postalerts').style.display = 'block';</script>";
			} else {
				echo "Error: " ."<br>" . mysqli_error($connection);
				echo "<script>document.getElementById('postalerte').style.display = 'block';</script>";
				$uploadOk = 0;
			}
				
				
			mysqli_close($connection);

			
			if($target_file !== "../images/postImages/" && $target_file !== "")
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

		}}}
		else{
			echo '<div id="postalerte" class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>You have been disabled by the Admin!</strong>
		  <a href="viewProfile.php" class="alert-link">Contact Admin.</a> 
		</div>';
			
		}
		?>
		
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</body>
	
</html>