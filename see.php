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
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
    }else {
      array_push($errors, "Wrong email/password combination");
      echo"no entry";
    }
    
    $sql = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    if(mysql_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysql_fetch_array($sql);
        $_SESSION['email'] = $qry['email'];
        $_SESSION['password'] = $qry['password'];
        $_SESSION['usertype'] = $qry['usertype'];
        if($qry['usertype']=="Admin"){
            header("location:index.html");
        }else if($qry['usertype']=="user"){
            header("location:1.html");
        }
    }else{echo "okay out";
  }
        ?>
     
< <!DOCTYPE html>
      <html>
      <head>
        <title></title>
      </head>
      <body>
      <a href="index.html">logout</a>
      
      </body>
      </html>