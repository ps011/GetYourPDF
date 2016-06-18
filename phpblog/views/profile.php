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
		
		
		
		</style>
		
	</head>
	
	<body>
	
	
		<div id="page-wrap">
			<div id="tools"  class="container">
				<ul class="nav navbar-nav">
					<li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li><a href="addPost.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
					<li ><a href="logout.php"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>
					
					<p onclick="location.href='viewProfile.php';" style="cursor: pointer;" class="navbar-text navbar-right">
					
						<?php 
							$connection = mysqli_connect("localhost", "root", "","software");
							$query = mysqli_query($connection,"select profileImage from login where user='$login_ses'");
							while($rows = mysqli_fetch_array($query))
							{
								if ($rows[0]=="")
								{
									echo '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>';
								}
								else
									echo '<img class="profImage img-circle" src="'.$rows[0].'">';							
							}
						?>
						 Signed in as <span style="color:#f1c40f"><?php echo $login_ses; ?></span>
					</p>
				</ul>		
			</div>
			
			<div class="container">
				<div class="row masonry-container">
					<?php							
							
					$query = mysqli_query($connection,"select * from post where user='$login_ses'");
				
					while($rows = mysqli_fetch_array($query))
					{
						$tagstring = $rows[6];
						echo '<div class="brick col-sm-6 col-md-4">';
							echo '<div onclick="location.href=\'viewPost.php?u='.$login_ses.'&p='.$rows[0].'\';" class="panel panel-info">';
								echo '<div class="panel-heading">';
									echo '<span style="color:#f1c40f">'.$rows[5].'</span>';
								echo '</div>';
								echo '<div class="panel-body">';							
									echo '<span id="date">Date: ' . $rows[2] ;
									
									if($rows[8]!= "0000-00-00")
									{echo ' *Edited on '.$rows[8];}
									
									echo  '</span><br />';
									if($rows[4] !="")
									{echo '<img class="profileImage" src="' . $rows[4] . '" alt="...">';}
									echo '<hr>';
									echo substr($rows[3],0,350) . '<br />';
									if(strlen($rows[3])>350)
									echo '<span style="color:#f1c40f"> Read more...</span><br />';
									if($tagstring!="")
									{
										$tags = explode(",", $tagstring);
										foreach ($tags as $tag)
										{
											echo '<span style="margin-left:2px; display: inline-block;"class="label label-warning">'.$tag.'</span>';
										}
									}
								echo '</div>';	
							echo '</div>';
						echo '</div>';
					}				
					?>
					
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
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/imagesloaded.pkgd.min.js"></script>
	<script src='../js/masonry.pkgd.min.js'></script>
	<script>
	var $container = $('.masonry-container');
	$container.imagesLoaded( function () {
	  $container.masonry({
		columnWidth: '.brick',
		itemSelector: '.brick'
	  });   
	});
	</script>
	</body>
	
</html>