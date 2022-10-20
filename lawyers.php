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
   echo "string";
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
   


  <script>
     function showcategory(){

              var type=document.getElementById('casetype');
              var userinput=type.options[type.selectedIndex].value;
              if(userinput =='crime'){
                document.getElementById('crime').style.visibility='visible'; 
                }else{document.getElementById('crime').style.visibility='hidden';}
             if(userinput =='civ'){
                                document.getElementById('civ').style.visibility='visible';}else{document.getElementById('civ').style.visibility='hidden';}

              if(userinput =='family'){ document.getElementById('family').style.visibility='visible';}else{document.getElementById('family').style.visibility='hidden';}

      return false;

     }





  </script>


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
        
        <li><?php echo $name," "; echo $id; ?></li>

        
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
        
        <h1>Please enter your details</h1>
      </div>
        <form action="lawyerbio.php" method="post" role="form">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-10 col-sm-10">
         
        
            <div class="col-md-6 col-sm-6">
              <p><label>successful cases</label> <input type="number" name="successfulcases"id="successfulcases" /></p><br/>      
            </div>



          
             
                <div class="col-md-6 col-sm-6">
                    <p> <label>failed cases</label><input type="number" name="failedcases" id="failedcases" /></p> <br/>            </div>
          <div class="col-md-6 col-sm-6">

           <p>   <label for="casetype">Choose a case type:</label> <select id="casetype" name="casetype" onchange="return showcategory();">
                  <p><option  value="">choose case category</option></p> 
                   <p><option  value="crime">criminal</option></p> 
                  <p>  <option value="civ">civil</option></p>
                   <p> <option value="family">family</option></p>
                    
                  </select><br/></p></div>
</div><div class="col-md-6 col-sm-6"  id="crime" style="visibility: hidden;">
                   <p>   <label for="casecategory
                    ">Choose a case category:</label> <select id= "crime" name="casecategory">
                   <p><option  value="misconduct">misconduct</option></p> 
                  <p>  <option value="fraud">fraud</option></p>
                   <p> <option value="robbery">robbery</option></p>
                    
                  </select><br/></p>
</div><div class="col-md-6 col-sm-6"  id="civ" style="visibility: hidden;">
                   <p>   <label for="casecategory">Choose a case category:</label> <select id="civ" name="casecategory">
                   <p><option  value="injuries">injuries</option></p> 
                  <p>  <option value="breach">breach of contract</option></p>
                   <p> <option value="complaint">complaint</option></p>
                   

                  </select><br/></p>
                  
</div><div class="col-md-6 col-sm-6"  id="family" style="visibility: hidden;">
                   <p>   <label for="casecategory">Choose a case category:</label> <select id="family" name="casecategory">
                   <p><option  value="Divorce">Divorce</option></p> 
                  <p>  <option value="Adoption">Adoption</option></p>
                   <p> <option value="Protection">Protection orders</option></p>
                    
                  </select><br/></p>
      
                              
</div>
          <div class="col-md-8 col-sm-8">
            <p>Thank you for Registering</p>
          </div>
          <div class="col-md-4 col-sm-4">
          <p>  <input name="submitt" type="submit" class="form-control" id="submit" value="submitt"/> </p><br/>        </div>
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