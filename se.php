 <?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$usertype="";
// connect to the database
$db = mysqli_connect("localhost","root","mOkaya22s", "project",3306);


if (isset($_POST['login_user'])) 
{
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM users WHERE email='$email'  AND password='$password'";
        $result= mysqli_query($db,$query);

        if(mysqli_num_rows($result) > 0)
        {

            while ($row = mysqli_fetch_assoc($result)) 
            {
              if($row["usertype"] == "civilian")
              {
                  $_SESSION['email'] = $row["email"];
                  header('location: lawyers.php');

              }
              else
              {
                  $_SESSION['email'] = $row["email"];
                  header('location: index.html');

              }
              

             
             
            }

        }

         else
         { 

         }

}

?>
