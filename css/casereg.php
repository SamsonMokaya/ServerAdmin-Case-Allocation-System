<?php



session_start();

// initializing variables

$caseid="";
$casetype = "";
$casecategory    = "";
$casecategor    = "";
$date="";
$status="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');
   $name=$_SESSION['username'];
   $userid=$_SESSION['userid'];
   if(isset($_POST['case'])){

   $name = $_SESSION['username'];
    $id=$_SESSION['userid'];
   

        

        $casetype = mysqli_real_escape_string($db, $_POST['casetype']);
        $casecategory = mysqli_real_escape_string($db, $_POST['casecategory']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
       @ $status = mysqli_real_escape_string($db, $_POST['status']);



             if (empty($date)) { array_push($errors, "date is required");echo "enter date . "; }
        
        if (empty($casetype)) { array_push($errors, "casetype is required");echo "enter casetype"; }
        
      if(!isset($_POST['status'])) { array_push($errors, "status is required");echo "enter status . "; }
              
              if (count($errors) == 0) {
   
      
    // $que = "INSERT INTO civilian_biodata ( userid, nationalid, passportnumber, criminalrecord, status) VALUES ( '$userid', '$nationalid', '$passportnumber', '$criminalrecord', '$status')";
        $que =   " INSERT INTO `cases` ( `civilianid`, `casetype`, `casecategory`, `date`, `status`) VALUES ('$id', '$casetype', '$casecategory', '$date', '$status')";
    
    mysqli_query($db, $que);
   

   echo "details succesfully entered . " ,$name;

       header("Refresh:5; url=logs.php");
    

  

  
  
  }



   
}
  
?>