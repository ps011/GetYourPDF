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
			  <h1>Contact Us</h1>
			  <div id="gone" >
							<label for="name">Name</label>
							<input name="name" type="text" class="form-control" id="name" placeholder="Name">
							<label for="email">Email Id</label>
							<input name="email" type="text" class="form-control" id="email" placeholder="emailid@domain.com">
							<label for="textarea">Message</label>
							<textarea name="textarea" class="form-control" id="text" rows="10" placeholder="Enter Text"></textarea></br>
							<input onclick="sendTicket();" class="btn btn-warning" name="submit" type="submit" value=" Submit ">
							<p id="passresult2"></p>
				</div>
			</div>
	
		
	
	</div>	
	
	
	
	
	
	<div id="bg">
		<img src="../images/Background.jpeg">
	</div>
		<script>	
			function sendTicket()
			{
				ticket = document.getElementById('text').value;
				name = document.getElementById('name').value;
				email = document.getElementById('email').value;
				user = "anon";
				console.log(user);
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('passresult2').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET", "sendticket.php?q=" + user +"&p=" + ticket+"&n=" + name+"&e=" + email, true);
				xmlhttp.send();
			
			}			
		
		</script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>