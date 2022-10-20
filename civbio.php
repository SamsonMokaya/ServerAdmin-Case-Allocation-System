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
   $name=$_SESSION['username'];
   $userid=$_SESSION['userid'];
   if(isset($_POST['biodata'])){
    $query = "SELECT * FROM users WHERE username='$name'";
   $name = $_SESSION['username'];
    $id=$_SESSION['userid'];
   

        


        $nationalid = mysqli_real_escape_string($db, $_POST['nationalid']);
        $passportnumber = mysqli_real_escape_string($db, $_POST['passportnumber']);
        $criminalrecord = mysqli_real_escape_string($db, $_POST['criminalrecord']);
       @ $status = mysqli_real_escape_string($db, $_POST['status']);



             if (empty($nationalid)) { array_push($errors, "nationalid is required");echo "enter nationalid . "; }
        
        if (empty($criminalrecord)) { array_push($errors, "Password is required");echo "enter criminalrecord"; }
        
      if(!isset($_POST['status'])) { array_push($errors, "status is required");echo "enter status . "; }
              
              if (count($errors) == 0) {
   
      
    // $que = "INSERT INTO civilian_biodata ( userid, nationalid, passportnumber, criminalrecord, status) VALUES ( '$userid', '$nationalid', '$passportnumber', '$criminalrecord', '$status')";
        $que =   " INSERT INTO `civilian_biodata` ( `userid`, `nationalid`, `passportnumber`, `criminalrecord`, `status`) VALUES ('$id', '$nationalid', '$passportnumber', '$criminalrecord', '$status')";
    
    mysqli_query($db, $que);
   

   echo "details succesfull, welcome to label.com. " ,$name;
    

    header("Refresh:5; url=civiliandash.php");

  
  
  }



   
}
  
?>