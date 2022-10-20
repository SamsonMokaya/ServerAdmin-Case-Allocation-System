 <?php
session_start();

// initializing variables
$username = "";
$email    = "";
$usertype = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost","root","mOkaya22s", "project",3306);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  @$usertype = mysqli_real_escape_string($db, $_POST['usertype']);
}

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($username)) { array_push($errors, "Username is required");echo "enter username . "; }
  if (empty($email)) { array_push($errors, "Email is required");echo "enter email . "; }
  if (empty($password_1)) { array_push($errors, "Password is required");echo "enter password"; }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");echo "confirm password that matches . ";
  }
if(!isset($_POST['usertype'])) { array_push($errors, "usertype is required");echo "enter usertype . "; }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");echo "Username already exists";
    }
 echo" . 

      ";
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");echo "email already exists";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password,usertype) 
  			  VALUES('$username', '$email', '$password','$usertype')";
  	mysqli_query($db, $query);
     $_SESSION['usertype'] = $usertype;

    

      $query = "SELECT * FROM users WHERE username='$username'";
    
      $results = mysqli_query($db, $query);
      $res = mysqli_fetch_array($results);
       $_SESSION['username']=$res['username'];
        $_SESSION['userid'] = $res['userid'];







   echo "login succesfull, welcome to label.com " ,$_SESSION['username'], $_SESSION['userid']  ;
 

       if(isset($_SESSION['username']))
{
    if($_SESSION['usertype'] == "admin")
    {
       header('location:admin.php');
    }
    else if($_SESSION['usertype'] == "lawyer")
    {
       header('location:lawyers.php');
    }
    else if($_SESSION['usertype'] == "civilian")

                  header("Refresh:5; url=civilian.php");
    }
  
  }


// ... 



?>