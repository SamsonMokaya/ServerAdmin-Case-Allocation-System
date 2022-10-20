 <?php
 ini_set('display_erroe', '1');
session_start();

// initializing variables
$username = "";
$usertype="";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost","root","mOkaya22s", "project",3306);



// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $results = mysqli_query($db, $query);


  if (empty($email)) {
    array_push($errors, "email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

   if (mysqli_num_rows($results)>0) 
     {

   
    
           while ($row=mysqli_fetch_assoc($results))
           {

                 if ($row['usertype']='lawyer') 
                 {
                echo('welcome to label.com, civilian');
                  header("Refresh:5; url=index.html");
                }
                else
                 {
                         header("location: 2.html");
                 }

           }
    }
      
}



?>