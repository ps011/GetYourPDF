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
		#tools{			
		margin-bottom:-15px;
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
		
		#postbox{
			padding:20px;
			margin-top:50px;
			background:#fff;
			opacity:0.4;
		}
		
		#datetext{
			font-size:18px;
			float:right;
		}
		
		.edit{
			color:#f1c40f;
		}
		
		.delete{
			color:#e74c3c;
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
					<li ><a class="edit" onclick="location.href='editpost.php?u=<?php echo $login_ses; ?>&p=<?php echo $_REQUEST["p"]; ?>';">Edit <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></li>
					<li ><a class="delete" style="cursor: pointer;" onclick="deletePost()" ;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>
					<p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Signed in as <span style="color:#f1c40f"><?php echo $login_ses; ?></span></p>
				</ul>		
			</div>
		
		
		
		<?php
			$user = $_REQUEST["u"];
			$post = $_REQUEST["p"];
			
			
			
			$connection = mysqli_connect("localhost", "root", "","software");		
			$query = mysqli_query($connection,"select * from post where user='$login_ses' and id='$post'");
		
			while($rows = mysqli_fetch_array($query))
			{
				$tagstring = $rows[6];
				echo '<div style="padding:60px;" id="postbox" class="jumbotron">';
					
					echo '<div class="page-header">';
						echo '<h1>'.$rows[5].' <small id="datetext">'. $rows[2].'</small></h1>';
					echo '</div>';
					
					
					echo '<p style="font-size:18px;" class="text-justify">'. $rows[3] . '</p><br />';
					if($tagstring!="")
									{
										$tags = explode(",", $tagstring);
										foreach ($tags as $tag)
										{
											echo '<span style="margin-left:2px; display: inline-block;"class="label label-warning">'.$tag.'</span>';
										}
									}
				echo '</div>';
			}				
		?>

		
		
		
	
	</div>
	
	<div id="bg">
		<?php
		
		$post = $_REQUEST["p"];
		
		$connection = mysqli_connect("localhost", "root", "","software");		
		$query = mysqli_query($connection,"select image from post where user='$login_ses' and id='$post'");
		
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
	function deletePost()
	{
		
		postid = <?php echo $_REQUEST["p"]; ?>;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
				console.log(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "postDelete.php?p=" + postid, true);
        xmlhttp.send();
		
		location.href='profile.php';
	
	}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</body>
	
</html>