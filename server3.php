 <?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost","root","mOkaya22s", "project",3306);



// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email)) {
    array_push($errors, "email is required");
    header('location:3.php');
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
    header('location:3.php');
  }

  if (count($errors) == 0) {

    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email'";
    
    $results = mysqli_query($db, $query);
    $res = mysqli_fetch_array($results);
    if($password === $res['password']){
       $_SESSION['email'] = $email;
       $_SESSION['username'] = $res['username']; 
        $_SESSION['userid'] = $res['userid']; 
       $_SESSION['usertype']=$res['usertype'];
      $_SESSION['success'] = "You are now logged in";
       echo('welcome to label.com, civilian'); 
       echo $_SESSION['email'];
       echo $_SESSION['usertype'];


       if(isset($_SESSION['email']))
{
    if($_SESSION['usertype'] == "admin")
    {
       header('location:admin.php');
    }
    else if($_SESSION['usertype'] == "lawyer")
    {
       header('location:lawyersdash.php');
    }
    else if($_SESSION['usertype'] == "civilian")

                  header("Refresh:2; url=civiliandash.php");
    }} else {
      array_push($errors, "Wrong username/password combination");
      echo"Wrong username/password combination";
      header('location:3.php');
    }
  
  }
}
      



?>
