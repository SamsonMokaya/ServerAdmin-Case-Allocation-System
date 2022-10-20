
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



$query = "SELECT * FROM users WHERE userid='$id'";
    
   
    $id=$_SESSION['userid'];
     $name=$_SESSION['username'];
 


 $results = mysqli_query($db, "SELECT * 
  FROM users
  INNER JOIN cases
  ON users.userid=cases.civilianid
  WHERE civilianid='$id'

  ");
$caseid=$_SESSION['caseid'];


if (isset($_GET['del'])) {
  $caseid = $_GET['del'];
  mysqli_query($db, "DELETE FROM cases WHERE caseid= $caseid;");
  $_SESSION['message'] = "case deleted!"; 
  header('location: registeredcasess.php');
}




?>



<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title></title>
</head>
<body data-target=".navbar-collapse" data-spy="scroll">










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
  <link rel="stylesheet" href="registeredcasess_files/bootstrap.css">
  <link rel="stylesheet" href="registeredcasess_files/font-awesome.css">
  <link rel="stylesheet" href="registeredcasess_files/nivo-lightbox.css">
  <link rel="stylesheet" href="registeredcasess_files/default.css">
  <link rel="stylesheet" href="registeredcasess_files/style.css">
  <!-- google web font css -->
  <link href="registeredcasess_files/css.css" rel="stylesheet" type="text/css">



  
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
        <li><a href="http://localhost/civiliandash.php">back</a></li>
        <?php echo $id; ?>
        <li><a href="http://localhost/index.html">HOME</a></li>
              
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
    <h2> civilian's case record</h2><p></p><p></p><p></p><p></p><table align="centre" border="4px" style="width: 1000px"; line-height:40px>
  <thead colspan="3">
    <tr>
      <th>caseid</th>
      <th>civilianid</th>
      <th>casetype</th>
      <th>casecategory</th>
      <th>status</th>
      <th>date</th>
      <th>functions</th>

    </tr>
  </thead>
  <?php while ($row = mysqli_fetch_array($results)) { ?>

    <tr>
      <td><p><?php echo $row['caseid']; ?></td></p>
      <td><p><?php echo $row['civilianid']; ?></td></p>
      <td><p><?php echo $row['casetype']; ?></td>/</p>
      <td><p><?php echo $row['casecategory']; ?></td></p>
      <td><p><?php echo $row['status']; ?></td></p>
      <td><p><?php echo $row['date']; ?></td></p>
      <td>
        <p><a href="registeredcasess.php?del=<?php echo $row['caseid']; ?>" class="del_btn">Delete case</a></p>
      
     
      </td>
      
      </tr>

      


  
  <?php } ?>

</table>

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
        <p>Copyright © 2016 Minimax Digital Firm 
                
                - Design: tooplate</p>
      </div>
    </div>
  </div>
</div>

<!-- scrolltop section -->
<a href="#top" class="go-top" style="display: none;"><i class="fa fa-angle-up"></i></a>


<!-- javascript js -->  
<script src="registeredcasess_files/jquery_002.js"></script>
<script src="registeredcasess_files/bootstrap.js"></script> 
<script src="registeredcasess_files/nivo-lightbox.js"></script>
<script src="registeredcasess_files/smoothscroll.js"></script>
<script src="registeredcasess_files/jquery.js"></script>
<script src="registeredcasess_files/isotope.js"></script>
<script src="registeredcasess_files/imagesloaded.js"></script>
<script src="registeredcasess_files/custom.js"></script>


</div></body></html>