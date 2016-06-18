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
		
		
		</style>
		
	</head>
	
	<body>
	
			<div id="tools"  class="container">
				<ul class="nav navbar-nav">
					<li><a href="profile.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li><a href="addPost.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
					<li ><a href="logout.php"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>
					<p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Signed in as <span style="color:#f1c40f"><?php echo $login_ses; ?></span></p>
				</ul>		
			</div>
		
		<div class="container">
		
			<div class="row panel panel-default">
				<div id="login" class="col-sm-6 container">
					<div class="panel panel-danger">
						<div class="panel-heading">Edit Post</div>
						<div class="panel-body">
						
						
									<form enctype="multipart/form-data" action="" method="post">
									  <div class="form-group">
										<label for="title">Title</label>
										
										<?php
											$user = $_REQUEST["u"];
											$post = $_REQUEST["p"];
											$connection = mysqli_connect("localhost", "root", "","software");		
											$query = mysqli_query($connection,"select * from post where user='$login_ses' and id='$post'");
											while($rows = mysqli_fetch_array($query))
											{
											echo '<input name="title" type="text" class="form-control" id="title" value="'.$rows[5].'">';
											  echo '</div>';
											  echo '<div class="form-group">';
											echo '<label for="text">Text</label>';
											echo '<textarea name="textarea" class="form-control" id="text" rows="10">'.$rows[3].'</textarea>';
											}
										?>
										
									  </div>
									  <div class="form-group">
										<label for="photo">Image</label>
										<br>
											<span class="btn btn-default btn-file">
											Choose File<input type="file" name="fileToUpload" id="photo">
											</span>
										<p class="help-block">Optional image for blog post.<p>
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
		
		if (isset($_POST['submit'])) {
		
		if (empty($_POST['title']) || empty($_POST['textarea'])) {
			$error = "Username or Password is empty";
		}
		else
			{

			$title=$_POST['title'];
			$text=$_POST['textarea'];
			$date= date("Y-m-d");
			$id = $_REQUEST["p"];

			$uploadOk = 1;
			$target_dir = "../images/postImages/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			if($target_file =="../images/postImages/")
			{$target_file = "";}
			
			$connection = mysqli_connect("localhost", "root", "","software");
			
			if($target_file==""){
				if (mysqli_query($connection,"update post set text='$text',title='$title',update_date='$date' where id='$id'")) {
					echo "Post edited successfully";
				} else {
					echo "Error: " ."<br>" . mysqli_error($connection);
					$uploadOk = 0;
				}
			}
			else
			{
				if (mysqli_query($connection,"update post set text='$text',image='$target_file',title='$title',update_date='$date' where id='$id'")) {
					echo "Post edited successfully";
				} else {
					echo "Error: " ."<br>" . mysqli_error($connection);
					$uploadOk = 0;
				}
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
						echo "  ";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
			}
		}}
		?>
		
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</body>
	
</html>