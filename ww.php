
<?php


session_start();

// initializing variables
$name="";
$email="";
$successfulcases = "";
$failedcases    = "";
$casetype = "";
$casecategory =""; 
$criminalrecord="";
$passportnumber="";
$errors = array(); 

	$address = "";
	$id = 0;
	$update = false;

// connect to the database
$db = mysqli_connect("localhost","root","mOkaya22s", "project",3306);



$query = "SELECT * FROM users WHERE username='$name'";
    
   
    $id=$_SESSION['userid'];
     $name=$_SESSION['username'];
 


 $results = mysqli_query($db, "SELECT * 
 	FROM users
 	INNER JOIN civilian_biodata
 	ON users.userid=civilian_biodata.userid
 	WHERE username='$name'

 	");



if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM users WHERE userid=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.html');
}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM civilian_biodata WHERE userid=$id");

		if (is_object($record) == 1 ) {
			$n = mysqli_fetch_array($record);

			$passportnumber = $n['passportnumber'];
			$criminalrecord = $n['criminalrecord'];
		}
	}

	if (isset($_POST['update'])) {

	$id = $_GET['update'];
	$criminalrecord = $_POST['criminalrecord'];
	$passportnumber = $_POST['passportnumber'];
	$pr = $_GET['passportnumber'];
	$c = $_GET['criminalrecord'];


	mysqli_query($db, "UPDATE civilian_biodata SET criminalrecord='$c', passportnumber='$p' WHERE userid=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('Refresh;');
}


?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<title>Minimax HTML5 Free Template</title>
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
				<li><a href="civiliandash.php">back</a></li>

				<li><a href="index.html">HOME</a></li>
							
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
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>Login</h2>
			</div>

 <div class="col-md-6 col-sm-6">
		<table align="centre" border="4px" style="width: 1000px"; line-height:40px>
	<thead colspan="3"><h2> civilian record</h2>
		<tr>
			<th>userid</th>
			<th>Name</th>
			<th>email</th>
			<th>usertype</th>
			<th>nationalid</th>
			<th>passportnumber</th>
			<th>crime record</th>
			<th>status</th>
			<th>functions</th>
		</tr>
	</thead>

	
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>

		<tr>
			<td><p><?php echo $row['userid']; ?></td></p>
			<td><p><?php echo $row['username']; ?></td></p>
			<td><p><?php echo $row['email']; ?></td>/</p>
			<td><p><?php echo $row['usertype']; ?></td></p>
			<td><p><?php echo $row['nationalid']; ?></td></p>
			<td><p><?php echo $row['passportnumber']; ?></td></p>
			<td><p><?php echo $row['criminalrecord']; ?></td></p>
			<td><p><?php echo $row['status']; ?></td></p>
			<td>
				<p><a href="profile.php?del=<?php echo $row['userid']; ?>" class="del_btn">Delete account</a></p>
			
				<p><a href="profile.php?edit=<?php echo $row['userid']; ?>" class="edit_btn" >Edit</a>
			</td></p>
			
			</tr>

			


	
	<?php } ?>

</table>

<form>
		<input type="hidden" name="userid" value="<?php echo $id; ?>">
		<input type="hidden" name="username" value="<?php echo $username; ?>"><br>
		<input type="hidden" name="email" value="<?php echo $email; ?>">
		<input type="hidden" name="usertype" value="<?php echo $usertype; ?>">
		<input type="hidden" name="nationalid" value="<?php echo $nationalid; ?>"><br>
		 <p><label>passport number</label><input type="text" name="passportnumber" value="<?php echo $passportnumber; ?>"><br></p>
	 	<p><label>criminalrecord</label><input type="text" name="criminalrecord" value="<?php echo $criminalrecord; ?>"></p>
		<input type="hidden" name="status" value="<?php echo $status; ?>"></div>
		
	 <p><button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button></p>



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