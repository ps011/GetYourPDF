

<!DOCTYPE html>
<html>
	<head>
	    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="Stylesheet" href="../css/index.css" />
		
	</head>
	
	<body>
	
	<div id="page-wrap">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			  
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				  <ul class="nav navbar-nav">
					<li style="background-color:rgba(0,0,0,0.5)"><a href="index.php"><span style="color:#f1c40f"><strong>Home</strong></span> </a></li>
					<li ><a href="logsign.php"><span style="color:#f1c40f"><strong>Login/Signup</strong></a></li>
				  </ul>
				  
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="contact.php"><span style="color:#f1c40f"><strong>Contact Us</strong></span></a></li>					
				  </ul>
				  
				</div>
			  </div>
			</nav>
	
			<div class="jumbotron">
			  <h1>Hello, Blogger!</h1>
			  <p>
			  Welcome aboard to a platform created just for you to share your thoughts and creativity.<br>
			  We'll help you find and follow blogs you like, and we'll help other people find and follow yours.
			</p>
			  <form action="" method="post" class="form-inline">
				<input type="text" class="form-control" name="tag" id="search" placeholder="E.g. Science">
				<button type="submit" name="submit" class="btn btn-info">Search</button>
			  </form>
			</div>
	
		<div class="container">		
		
		
			<div class="row">
			
				<?php
					echo "<script> console.log('js in php works!')</script>";
					if (isset($_POST['submit']) && !empty($_POST['tag']) )
						{
							
							$tag=$_POST['tag'];
							$connection = mysqli_connect("localhost", "root", "","software");
							$query = mysqli_query($connection,"select * from post ORDER BY date DESC");
							while($rows = mysqli_fetch_array($query))
							{
								
								$tagstring = explode(",",$rows[6]);
								echo "<script> console.log('tagstring ".$rows[6]."')</script>";
								if(in_array($tag,$tagstring))
								{
									echo "<script> console.log('found tag ".$tag."')</script>";
									echo '<div id="clickable" style="cursor: pointer;" onclick="location.href=\'guestView.php?u='.$rows[1].'\';" class="trans" col-md-12">';
									echo '<div class="row">';
										
										if($rows[4] !="")
										{	
											echo '<div class=" col-xs-6 col-md-4">';
												echo '<img class="postImage img-rounded" src="' . $rows[4] . '" alt="...">';
											echo '</div>';
											echo '<div class="col-xs-12 col-md-8">';
												
												echo '<h4><span style="color:#f1c40f">'.$rows[5].'</span><small style="float:right; color:#eee;">'.$rows[2].'</small></h4>';
												echo '<hr>';
												echo '<p style="color:#fff;">';
												echo substr($rows[3],0,350) . '<br />';
												echo '</p>';
												$tagstring = $rows[6];
												if($tagstring!="")
												{
													$tags = explode(",", $tagstring);
													foreach ($tags as $tag)
													{
														echo '<span style="margin-right:5px; padding:5px; display: inline-block;"class="label label-warning">'.$tag.'</span>';
													}
												}
												echo '<div id="rightbox">';
												$query2 = mysqli_query($connection,"select profileImage from login where user='$rows[1]'");
												while($rowsn = mysqli_fetch_array($query2))
												{
													if ($rowsn[0]=="")
													{
														echo '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>';
													}
													else
														echo '<img class="profImage img-circle" src="'.$rowsn[0].'">';	

													echo '<strong style="margin-left:8px; color:#fff; ">'.$rows[1].'</strong>';
												}
											echo '</div>';
											echo '</div>';
										}
										
										else
										{
											echo '<div class=" col-md-12">';
												echo '<h4><span style="color:#f1c40f">'.$rows[5].'</span><small style="float:right; color:#eee;">'.$rows[2].'</small></h4>';
												echo '<hr>';
												echo '<p style="color:#fff;">';
													echo substr($rows[3],0,350) . '<br />';
												echo '</p>';
												$tagstring = $rows[6];
												if($tagstring!="")
												{
													$tags = explode(",", $tagstring);
													foreach ($tags as $tag)
													{
														echo '<span style="margin-right:5px; padding:5px; display: inline-block;"class="label label-warning">'.$tag.'</span>';
													}
												}
												echo '<div id="rightbox">';
												$query2 = mysqli_query($connection,"select profileImage from login where user='$rows[1]'");
												while($rowsn = mysqli_fetch_array($query2))
												{
													if ($rowsn[0]=="")
													{
														echo '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>';
													}
													else
														echo '<img class="profImage img-circle" src="'.$rowsn[0].'">';	

													echo '<strong style="margin-left:8px; color:#fff; ">'.$rows[1].'</strong>';
												}
											echo '</div>';
											echo '</div>';
										}
										
									echo '</div>';
									echo '</div>';
								}
							}
							
						}
						
					else{	
							$connection = mysqli_connect("localhost", "root", "","software");
							$query = mysqli_query($connection,"select * from post ORDER BY date DESC LIMIT 5");
							while($rows = mysqli_fetch_array($query))
							{
								echo '<div id="clickable" style="cursor: pointer;" onclick="location.href=\'guestView.php?u='.$rows[1].'\';" class="trans" col-md-12">';	
								echo '<div class="row">';
									
									if($rows[4] !="")
									{	
										echo '<div class=" col-xs-6 col-md-4">';
											echo '<img class="postImage img-rounded" src="' . $rows[4] . '" alt="...">';
										echo '</div>';
										echo '<div class="col-xs-12 col-md-8">';
											
											echo '<h4><span style="color:#f1c40f">'.$rows[5].'</span><small style="float:right; color:#eee;">'.$rows[2].'</small></h4>';
											echo '<hr>';
											echo '<p style="color:#fff;">';
											echo substr($rows[3],0,350) . '<br />';
											echo '</p>';
											$tagstring = $rows[6];
											if($tagstring!="")
											{
												$tags = explode(",", $tagstring);
												foreach ($tags as $tag)
												{
													echo '<span style="margin-right:5px; padding:5px; display: inline-block;"class="label label-warning">'.$tag.'</span>';
												}
											}
											echo '<div id="rightbox">';
												$query2 = mysqli_query($connection,"select profileImage from login where user='$rows[1]'");
												while($rowsn = mysqli_fetch_array($query2))
												{
													if ($rowsn[0]=="")
													{
														echo '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>';
													}
													else
														echo '<img class="profImage img-circle" src="'.$rowsn[0].'">';	

													echo '<strong style="margin-left:8px; color:#fff; ">'.$rows[1].'</strong>';
												}
											echo '</div>';
											echo '</div>';
									}
									
									else
									{
										echo '<div class=" col-md-12">';
											echo '<h4><span style="color:#f1c40f">'.$rows[5].'</span><small style="float:right; color:#eee;">'.$rows[2].'</small></h4>';
											echo '<hr>';
											echo '<p style="color:#fff;">';
												echo substr($rows[3],0,350) . '<br />';
											echo '</p>';
											$tagstring = $rows[6];
											if($tagstring!="")
											{
												$tags = explode(",", $tagstring);
												foreach ($tags as $tag)
												{
													echo '<span style="margin-right:5px; padding:5px; display: inline-block;"class="label label-warning">'.$tag.'</span>';
												}
											}
											echo '<div id="rightbox">';
												$query2 = mysqli_query($connection,"select profileImage from login where user='$rows[1]'");
												while($rowsn = mysqli_fetch_array($query2))
												{
													if ($rowsn[0]=="")
													{
														echo '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>';
													}
													else
														echo '<img class="profImage img-circle" src="'.$rowsn[0].'">';	

													echo '<strong style="margin-left:8px; color:#fff; ">'.$rows[1].'</strong>';
												}
											echo '</div>';
										echo '</div>';
									}
									
								echo '</div>';
								echo '</div>';
							}
						}
						
						
				?>
				
				
			  
			</div>
				
	
		</div>
	
	</div>	
	
	
	
	
	
	<div id="bg">
		<img src="../images/Background.jpeg">
	</div>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>