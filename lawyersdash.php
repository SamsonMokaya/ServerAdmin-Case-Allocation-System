<?php



session_start();

// initializing variables
$name="";
$email="";
$successfulcases = "";
$failedcases    = "";
$casetype = "";
$casecategory =""; 

















$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost","root","mOkaya22s", "project",3306);


$query = "SELECT * FROM users WHERE username='$name'";
    
   
    $id=$_SESSION['userid'];
     $name=$_SESSION['username'];
  
?>



<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">


	<title>Minimax HTML5 Free Template
	</title>

<!--

Template 2080 Minimax

http://www.tooplate.com/view/2080-minimax

-->
	<!-- stylesheet css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- google web font css -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600,700' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-target=".navbar-collapse">
	





<!-- navigation -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#home" class="navbar-brand smoothScroll">Label</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.html">logout</a></li>
				<p><li><?php echo $name; ?></li></p>


				






		    </div>

				
			</ul>
		</div>
	</div>
</div>		




	

<!-- divider section -->
<div class="container">
	<div class="row">
		<div class="col-md-1 col-sm-1"></div>
		<div class="col-md-10 col-sm-10">
			<hr>
		</div>
		<div class="col-md-1 col-sm-1"></div>
	</div>
</div>

<!-- pricing section -->


<!-- divider section -->
<div class="container">
	<div class="row">
		<div class="col-md-1 col-sm-1"></div>
		<div class="col-md-10 col-sm-10">
			<hr>
		</div>
		<div class="col-md-1 col-sm-1"></div>
	</div>
</div>

<!-- contact section -->
<div id="contact">
	<div class="container">
		<div class="row"><p>









			<div class="col-md-12 col-sm-12"><p>


				<h2>lawyers Dashboard</h2></p>
			</div></p>
			
				
					<div class="col-md-4 col-sm-4">
					<form action="button.php" method="post" role="form">
						<input name="lawyerprofile" type="submit" class="form-control" id="lawyerprofile" value="profile">
						<input name="recommended" type="submit" class="form-control" id="recommended" value="view recommended cases">
						<input name="registered" type="submit" class="form-control" id="registered" value="taken cases">
					</form>
					</div>
				</div>
				<div class="col-md-1 col-sm-1"></div>
			</form>
		</div>
	</div>
</div>

<!-- divider section -->
<div class="container">
	<div class="row">
		<div class="col-md-1 col-sm-1"></div>
		<div class="col-md-10 col-sm-10">
			<hr>
		</div>
		<div class="col-md-1 col-sm-1"></div>
	</div>
</div>

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<h2>Our Office</h2>
				<p>101 Clean Street, CBD NAIROBI, CA 10110</p>
				<p>Email: <span>label@company.com</span></p>
				<p>Phone: <span>0700-020-034</span></p>
			</div>
			<div class="col-md-6 col-sm-6">
				<h2>Social Us</h2>
				<ul class="social-icons">
					<li><a href="#" class="fa fa-facebook"></a></li>
					<li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-google-plus"></a></li>
					<li><a href="#" class="fa fa-dribbble"></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<!-- divider section -->
<div class="container">
	<div class="row">
		<div class="col-md-1 col-sm-1"></div>
		<div class="col-md-10 col-sm-10">
			<hr>
		</div>
		<div class="col-md-1 col-sm-1"></div>
	</div>
</div>

<!-- copyright section -->
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Copyright &copy; 2016 Minimax Digital Firm 
                
                - Design: tooplate</p>
			</div>
		</div>
	</div>
</div>

<!-- scrolltop section -->
<a href="#top" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- javascript js -->	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/isotope.js"></script>
<script src="js/imagesloaded.min.js"></script>
<script src="js/custom.js"></script>




</body>
</html>

