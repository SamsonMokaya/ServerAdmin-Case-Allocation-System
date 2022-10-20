<?php



session_start();

// initializing variables
$successcases = "";
$failedcases    = "";
$totalcases = "";
$availability = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost","root","mOkaya22s", "project",3306);


echo "welcome ";
$stored = $_SESSION['username'];
echo $stored;

if (isset($_POST['submitt']))
{
  



 
   $successfulcases  = $_POST["successfulcases"];
   $failedcases  = $_POST["failedcases"];
     echo "string";
}  
$query = "INSERT INTO lawyer_biodata (successfulcases, failedcases) VALUES('$successcases', '$failedcases')";
          echo "re";



?>