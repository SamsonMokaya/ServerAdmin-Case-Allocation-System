
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
 	INNER JOIN lawyer_biodata
 	ON users.userid=lawyer_biodata.userid
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
		$record = mysqli_query($db, "SELECT * FROM lawyer_biodata WHERE userid=$id");

		if (is_object($record) == 1 ) {
			$n = mysqli_fetch_array($record);
             $successfulcases = $n['successfulcases'];
			$failedcases = $n['failedcases'];
			$successfulcases = $n['successfulcases'];
			
		}
	}

	if (isset($_POST['update'])) {
    
	$pr=$_POST['successfulcases'];
	$cr=$_POST['failedcases'];

	$ss="UPDATE lawyer_biodata SET  successfulcases='$pr', failedcases='$cr' WHERE userid=$id ";


	
if (mysqli_query($db,$ss)) {
    echo "Record updated successfully";

    header('location: lawyerprofile.php');


} else {
    echo "Error updating record: " . mysqli_error($conn);
}

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
				<li><a href="lawyersdash.php">back</a></li>

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
				
			</div>

 <div class="col-md-6 col-sm-6">
		<table align="centre" border="4px" style="width: 1000px"; line-height:40px>
	<thead colspan="3"><h2> lawyer's record</h2>
		<tr>
			<th>userid</th>
			<th>Name</th>
			<th>email</th>
			<th>usertype</th>
			<th>successfulcases</th>
			<th>failedcases</th>
			<th>case type</th>
			<th>case category</th>
			<th>functions</th>
		</tr>
	</thead>

	
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>

		<tr>
			<td><p><?php echo $row['userid']; ?></td></p>
			<td><p><?php echo $row['username']; ?></td></p>
			<td><p><?php echo $row['email']; ?></td>/</p>
			<td><p><?php echo $row['usertype']; ?></td></p>
			<td><p><?php echo $row['successfulcases']; ?></td></p>
			<td><p><?php echo $row['failedcases']; ?></td></p>
			<td><p><?php echo $row['casetype']; ?></td></p>
			<td><p><?php echo $row['casecategory']; ?></td></p>
			<td>
				<p><a href="lawyerprofile.php?del=<?php echo $row['userid']; ?>" class="del_btn">Delete account</a></p>
			
				<p><a href="lawyerprofile.php?edit=<?php echo $row['userid']; ?>" class="edit_btn" >Edit</a>
					
					
			</td></p>
			
			</tr>

			


	
	<?php } ?>

</table>

<form action="lawyerprofile.php" method="post">
		<input type="hidden" name="userid" value="<?php echo $id; ?>">
		<input type="hidden" name="username" value="<?php echo $username; ?>"><br>
		<input type="hidden" name="email" value="<?php echo $email; ?>">
		<input type="hidden" name="usertype" value="<?php echo $usertype; ?>">
		<input type="hidden" name="nationalid" value="<?php echo $nationalid; ?>"><br>
		 <p><label>successfulcases</label><input type="text" name="successfulcases" value="<?php echo $successfulcases; ?>"><br></p>
	 	<p><label>failedcases</label><input type="text" name="failedcases" value="<?php echo $failedcases; ?>"></p>
		<input type="hidden" name="status" value="<?php echo $status; ?>"></div>
		
   <p><input type="submit" name="update" value="update"></p>



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