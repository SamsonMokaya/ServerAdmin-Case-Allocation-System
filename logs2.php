<?php



session_start();

// initializing variables
$update = true;
$name="";
$email="";
$successfulcases = "";
$failedcases    = "";
$casetype = "";
$casecategory =""; 

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

$query = "SELECT * FROM users WHERE username='$name'";
    
   
    $id=$_SESSION['userid'];
     $name=$_SESSION['username'];
 


 $qwert =mysqli_query($db,  "SELECT * 
  FROM users
  INNER JOIN cases
  ON users.userid=cases.civilianid
  WHERE civilianid='$id'

  ");
while ($row = mysqli_fetch_array($qwert)) { echo $row['casecategory'];}





echo "welcome ";
$stored = $_SESSION['username'];

   

  echo $stored;


if (isset($_POST['submitt']))
{
  
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $successfulcases = mysqli_real_escape_string($db, $_POST['successfulcases']);
    $failedcases = mysqli_real_escape_string($db, $_POST['failedcases']);
    $casetype = mysqli_real_escape_string($db, $_POST['casetype']);
    $casecategory = mysqli_real_escape_string($db, $_POST['casecategory']);
if (empty($successfulcases)) { array_push($errors, "Username is required");echo "enter successfulcases . "; }
  if (empty($failedcases)) { array_push($errors, "failedcases is required");echo "enter failedcases . "; }
 
      $quer = "INSERT INTO lawyer_biodata ( name, email, successfulcases, failedcases, casetype, casecategory) VALUES ( '$name', '$email', '$successfulcases', '$failedcases', '$casetype', '$casecategory')";
    mysqli_query($db, $quer);
    $_SESSION['message'] = "info saved";
    echo $_SESSION['message'] ;
    header("Refresh:5;");
}  
?>




<?php 
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM lawyer_biodata WHERE id=$id");

    if (count($record) == 1 ) {
      $n = mysqli_fetch_array($record);
      $name = $n['name'];
      $email = $n['email'];
      $email = $n['successfulcases'];
      $email = $n['failedcases'];
       $email = $n['casetype'];
       $email = $n['casecategory'];
      

    }
  }
?>




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
      <?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>



<?php 
$results = mysqli_query($db, "SELECT * 
  FROM users
  INNER JOIN lawyer_biodata
  ON users.userid=lawyer_biodata.userid "); 
  //WHERE username='$name'

 ?>

  
<!-- navigation -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
        <span class="icon icon-bar"></span>
      </button>
      <a href="index.html" class="navbar-brand smoothScroll">Label</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.html">logout</a></li>
         <li><a href="civiliandash.php">Dashboard</a></li>
        <li><?php echo $id; echo $_POST['casecategory']; ?></li>
        
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
        <h2>LAWYER LOGS </h2>
      </div>
        <form action="civilian.php" method="post" role="form">
        <div class="col-md-1 col-sm-1"></div>
        
          <table align="centre" border="4px" style="width: 1000px"; line-height:40px>
  <thead>
    <tr>
      <th>Name</th>
      <th>email</th>
      <th>successful cases</th>
      <th>failed cases</th>
      <th>case type</th>
      <th>case category</th>
      <
      <th colspan="2">Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { 



    ?>
    <tr>
      <td><p><?php echo $row['username']; ?></td></p>
      <td><p><?php echo $row['email']; ?></td></p>
      <td><p><?php echo $row['successfulcases']; ?></td></p>
      <td><p><?php echo $row['failedcases']; ?></td></p>
      <td><p><?php echo $row['casetype']; ?></td></p>
      <td><p><?php echo $row['casecategory']; ?></td></p>
      <td>
        <a href="view.php?edit=<?php echo $row['userid']; ?>" class="edit_btn" >confirm</a>
      </td>
     
    </tr>
  <?php } ?>
</table>


    </form>
    
           
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