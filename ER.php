 <?php
 ini_set('display_erroe', '1');
session_start();

// initializing variables
$username = "";
$usertype="";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');



// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email)) {
    array_push($errors, "email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {

    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' and usertype='$usertype'";
   $results = mysqli_query($db, $query);
   while ($row=mysqli_fetch_array($results)){
     if ( $row['password']==$password && $row['email']==$email && $row['usertype']='civilian') {
      echo('welcome to label.com, civilian');
    header("Refresh:5; url=index.html");
     }elseif ($row['password']==$password && $row['email']==$email && $row['usertype']='lawyer') {
       header("location: 2.html");
   }
   else{ array_push($errors, "Wrong username/password combination");
      echo"Wrong username/password combination";}
   }
}
      
}



?>