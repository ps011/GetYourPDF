<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="WebThemez">
    <link rel="shortcut icon" href="">
    <title>Get Your PDF</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- FancyBox -->
	<link href="assets/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body> 
          <div id="navbar-top">
      <nav class="navbar navbar-default navbar-static" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand nav-external" href="#home"><strong>GET YOUR PDF</strong></a>
          </div>
		 
          
        </div>
      </nav>
    </div>
    
          	
      </div>
    </section>

    <section id="services" class="page space">
      <div class="container text-center"> 
          <div class="heading">
            <h2 style="margin-top:-15px;">Choose Your Subject</h2>
           </div>
         <div class="row services-list">
					<div class="col-sm-6 col-md-3 text-center service animated fadeInUp visible" data-animation="fadeInUp">
						<div class="service-icon"> 
                          <a href="download.php?d=<?php echo $_SESSION['semester'];?>01"><img src="assets/img/engg.jpg" alt=""/> </a>
						</div>
						<h4 class="color-white"><?php echo $_SESSION['semester'];?>01</h4>
						<p><?php if($_SESSION['semester']==1){
							
							echo "Engineering Chemistry";}
							if($_SESSION['semester']==2){echo "Engineerig Physics";}
								if($_SESSION['semester']==3){echo "Mathematics - 2";}
								if($_SESSION['semester']==4){echo "Mathematics - 3";}
								if($_SESSION['semester']==5){echo "Data Communication";}
								if($_SESSION['semester']==6){echo "Micro Processor and Interfacing";}
								if($_SESSION['semester']==7){echo "Compiler Design";}
								if($_SESSION['semester']==8){echo "Data Communication";}?></p>
					</div><!-- END COLUMN 3 -->
					<div class="col-sm-6 col-md-3 text-center service animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="200">
						<div class="service-icon">
							<a href="download.php?d=<?php echo $_SESSION['semester'];?>02"><img src="assets/img/medi.jpg" alt=""/> </a>
						</div>
						<h4 class="color-white"><?php echo $_SESSION['semester'];?>02</h4>
						<p><?php if($_SESSION['semester']==1){echo "Mathematics-1";}
							if($_SESSION['semester']==2){echo "EEE's";}
								if($_SESSION['semester']==3){echo "Discrete Structure";}
								if($_SESSION['semester']==4){echo "Computer System Organisation";}
								if($_SESSION['semester']==5){echo "Operating System";}
								if($_SESSION['semester']==6){echo "PPL";}
								if($_SESSION['semester']==7){echo "Distributed Systems";}
								if($_SESSION['semester']==8){echo "Data Communication";}?></p>
					</div><!-- END COLUMN 3 -->
					<div class="col-sm-6 col-md-3 text-center service animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="400">
						<div class="service-icon">
							<a href="download.php?d=<?php echo $_SESSION['semester'];?>03"><img src="assets/img/comm.jpg" alt=""/> </a>
						</div>
						<h4 class="color-white"><?php echo $_SESSION['semester'];?>03</h4>
						<p><?php if($_SESSION['semester']==1){echo "Communication Skill";}
							if($_SESSION['semester']==2){echo "Basic Mechanical engg";}
								if($_SESSION['semester']==3){echo "Digital Ciruit And System";}
								if($_SESSION['semester']==4){echo "OOT";}
								if($_SESSION['semester']==5){echo "DBMS";}
								if($_SESSION['semester']==6){echo "Software Engineering & Project managements";}
								if($_SESSION['semester']==7){echo "Information Storage and Management ";}
								if($_SESSION['semester']==8){echo "Data Communication";}?></p>
					</div><!-- END COLUMN 3 -->
					<div class="col-sm-6 col-md-3 text-center service animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="600">
						<div class="service-icon">
							<a href="download.php?d=<?php echo $_SESSION['semester'];?>04"><img src="assets/img/oth.jpg" alt=""/> </a>
						</div>
						<h4 class="color-white"><?php echo $_SESSION['semester'];?>04</h4>
						<p><?php if($_SESSION['semester']==1){echo "Basic Electrical and electronic Engineerig";}
							if($_SESSION['semester']==2){echo "basic civil Engg and Mechanics";}
								if($_SESSION['semester']==3){echo "Electronic Device And Circuit";}
								if($_SESSION['semester']==4){echo "ADA";}
								if($_SESSION['semester']==5){echo "Computer Graphics And Multimedia";}
								if($_SESSION['semester']==6){echo " Computer Networking";}
								if($_SESSION['semester']==7){echo "Elective-I";}
								if($_SESSION['semester']==8){echo "Data Communication";}?></p>
					</div><!-- END COLUMN 3 -->
					<div class="col-sm-6 col-md-3 text-center service animated fadeInUp visible" data-animation="fadeInUp">
						<div class="service-icon"> 
                          <a href="download.php?d=<?php echo $_SESSION['semester'];?>05"><img src="assets/img/engg.jpg" alt=""/> </a>
						</div>
						<h4 class="color-white"><?php echo $_SESSION['semester'];?>05</h4>
						<p><?php if($_SESSION['semester']==1){echo "Engineerig Drawing";}
							if($_SESSION['semester']==2){echo "Basic Computer Engg";}
								if($_SESSION['semester']==3){echo "Data Structures";}
								if($_SESSION['semester']==4){echo "ADC";}
								if($_SESSION['semester']==5){echo "Theory of Computation";}
								if($_SESSION['semester']==6){echo "Advance Computer Architecture(ACA)";}
								if($_SESSION['semester']==7){echo "Data Communication";}
								if($_SESSION['semester']==8){echo "Data Communication";}?></p>
					</div><!-- END COLUMN 3 -->
					<div class="col-sm-6 col-md-3 text-center service animated fadeInUp visible" data-animation="fadeInUp">
						<div class="service-icon"> 
                          <a href="download.php?d=<?php echo $_SESSION['semester'];?>06"><img src="assets/img/engg.jpg" alt=""/> </a>
						</div>
						<h4 class="color-white"><?php echo $_SESSION['semester'];?>06</h4>
						<p>Description goes here</p>
					</div><!-- END COLUMN 3 -->
					<!--<div class="col-sm-6 col-md-3 text-center service animated fadeInUp visible" data-animation="fadeInUp">
						<div class="service-icon"> 
                          <a href="engineering.html"><img src="assets/img/engg.jpg" alt=""/> </a>
						</div>
						<h4 class="color-white">Semester 7</h4>
						<p>Description goes here</p>
					</div><!-- END COLUMN 3 
					<div class="col-sm-6 col-md-3 text-center service animated fadeInUp visible" data-animation="fadeInUp">
						<div class="service-icon"> 
                          <a href="engineering.html"><img src="assets/img/engg.jpg" alt=""/> </a>
						</div>
						<h4 class="color-white">Semester 8</h4>
						<p>Description goes here</p>
					</div><!-- END COLUMN 3 -->
				</div>       
      </div>
    </section>
   
    
   
                  </li>
                      
      </div>
      <div class="twitter text-center">
        <div class="animated hiding" data-animation="fadeIn">
          <i class="fa fa-twitter fa-3x"></i>
          <div id="feed"></div>
        </div>
      </div>
    </section> 
   
    
        </div>
      </div>
    </footer>
    <script src="assets/js/modernizr-latest.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.cslider.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
	<script src="assets/js/jquery.fancybox.pack.js"></script>  
	<script src="assets/js/jquery.fancybox-media.js"></script>  
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nav.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/twitterFetcher.min.js"></script>
    <script src="assets/js/script.js"></script> 
	<script type="text/javascript">
    $(document).ready(function () {
		$('#da-slider').cslider({
			autoplay: true,
			bgincrement: 0
		});
    });
    </script>
  </body>
</html>
