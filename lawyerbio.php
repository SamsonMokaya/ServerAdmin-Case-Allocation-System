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
$db = mysqli_connect('localhost', 'root', '', 'project');
   $name=$_SESSION['username'];
   $userid=$_SESSION['userid'];
   if(isset($_POST['submitt'])){

   $name = $_SESSION['username'];
    $id=$_SESSION['userid'];
   

        


        $successfulcases = mysqli_real_escape_string($db, $_POST['successfulcases']);
        $failedcases = mysqli_real_escape_string($db, $_POST['failedcases']);
        $casetype = mysqli_real_escape_string($db, $_POST['casetype']);
        $casecategory = mysqli_real_escape_string($db, $_POST['casecategory']);



            if (empty($successfulcases)) { array_push($errors, "successfulcases is required");echo "enter successfulcases . "; }
        
        if (empty($failedcases)) { array_push($errors, "failedcases is required");echo "enter failedcases"; }
 
  if (empty($casetype)) { array_push($errors, "casetype is required");echo "enter casetype"; }
  if (empty($casecategory)) { array_push($errors, "casecategory is required");echo "enter casecategory"; }
 
              
              if (count($errors) == 0) {
   
      
    // $que = "INSERT INTO civilian_biodata ( userid, nationalid, passportnumber, criminalrecord, status) VALUES ( '$userid', '$nationalid', '$passportnumber', '$criminalrecord', '$status')";
        $que =   " INSERT INTO `lawyer_biodata` ( `userid`, `successfulcases`, `failedcases`, `casetype`, `casecategory`) VALUES ('$id', '$successfulcases', '$failedcases', '$casetype', '$casecategory')";
    
    mysqli_query($db, $que);
   

   echo "details succesfull, welcome to label.com. " ,$name;
    

    header("Refresh:5; url=lawyersdash.php");

  
  
  }



   
}
  
?>