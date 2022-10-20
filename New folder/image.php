<!DOCTYPE html>
<html>
<head><link href="style2.css" rel="stylesheet" type="text/css"><style type="text/css">
  body{ 
    background-image:url(black.jpg);
    height: 100vh;
    background-size: cover;
    background-position: center;}
   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    color: white;
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{color: white;
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
   }
</style>
  <title></title>
</head>
<body><div class="nav-bar">
    <ul class="menu">
     
            <li><a href="index1.php">Dashboard </a></li>
            
  
    </ul>
  </div>

</body>
</html>

<?php session_start();
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  $q ='SELECT * FROM images WHERE uploader="'.$_SESSION['username'].'"';
  $result = mysqli_query($db, $q);


    while ($row = mysqli_fetch_array($result)) {

      echo "<div id='img_div'>";

 echo "<img src='images/".$row['image']."' >";
        echo "<p>".$row['image_text']."</p>";
        echo "<p>".$row['price']."</p>";?><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php echo "</div>";
    }

  ?>

