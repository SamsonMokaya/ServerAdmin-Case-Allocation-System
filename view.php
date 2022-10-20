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

<?php 
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM lawyer_biodata WHERE id=$id");

        if (count($record) == 1 ) {
      $n = mysqli_fetch_array($record);
       $name = $n['name'];
          $email = $n['email'];
          $successfulcases = $n['successfulcases'];
          $failedcases = $n['failedcases'];
           $casetype = $n['casetype'];
           $casecategory = $n['casecategory'];
        }
      }

      if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
          $successfulcases = $_POST['successfulcases'];
          $failedcases = $_POST['failedcases'];
           $casetype = $_POST['casetype'];
           $casecategory = $_POST['casecategory'];

  mysqli_query($db, "UPDATE lawyer_biodata SET name='$name', email='$email', email='$email', email='$email',  email='$email',  email='$email' WHERE id=$id");
  $_SESSION['message'] = "Address updated!"; 
  header('location: view.php');
}

if (isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($db, "DELETE FROM lawyer_biodata WHERE id=$id");
  $_SESSION['message'] = "Address deleted!"; 
  echo "deleted";
  header('Refresh;');
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
$results = mysqli_query($db, "SELECT * FROM lawyer_biodata"); ?>

  
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
         <li><a href="view.php">view lawyers</a></li>
        <li><a href="civilian.php">HOME</a></li>
        
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
        <h2>ADMINISTRATORS  LAWYER LOGS</h2>
      </div>
        <form action="civilian.php" method="post" role="form">
        <div class="col-md-1 col-sm-1"></div>
        <table>
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
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['successfulcases']; ?></td>
      <td><?php echo $row['failedcases']; ?></td>
      <td><?php echo $row['casetype']; ?></td>
      <td><?php echo $row['casecategory']; ?></td>
      <td>
        <a href="view.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
      </td>
      <td>
        <a href="view.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
      </td>
    </tr>
  <?php } ?>
</table>

        <div class="col-md-10 col-sm-10">
          <input name="" type="hidden" name="id" value="<?php echo $id; ?>">

          <div class="col-md-6 col-sm-6">
          <input placeholder="name" type="text" name="name" value="<?php echo $name; ?>">
            </div>
          <div class="col-md-6 col-sm-6">
            <input placeholder="email"type="text" name="email" value="<?php echo $email; ?>">
                <input placeholder="successfulcases"type="text" name="successfulcases" value="<?php echo $successfulcases; ?>">
            <input placeholder="failedcases"type="text" name="failedcases" value="<?php echo $failedcases; ?>">
            <input placeholder="casetype"type="text" name="casetype" value="<?php echo $casetype; ?>">
            <input placeholder="casecategory"type="text" name="casecategory" value="<?php echo $casetype; ?>">

            </div>
            <div class="col-md-6 col-sm-6">
          

          <div class="col-md-8 col-sm-8">
            <p>Thank you for Registering</p>
          </div>
          <div class="col-md-4 col-sm-4">
            <?php

   if ($update == true): ?>
  <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
  <button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
    </form>
    <li><a href="index.html">logout</a></li>
            <input name="submitt" type="submit" class="form-control" id="submit" value="submitt"/><br/>         </div>
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