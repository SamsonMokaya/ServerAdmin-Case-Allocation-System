<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" action="" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>Select File</td>
<td><input type="file" name="f1"></td>
</tr>
<tr>
<td><input type="submit" name="submit1" value="upload"></td>
<td><input type="submit" name="submit2" value="display"></td>
</tr>
</table>
</form>

<?php
$db = mysqli_connect('localhost', 'root', '', 'test_blob1');
if(isset($_POST["submit1"]))
{
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
$query = "INSERT INTO table1 (id, image1) 
           VALUES('','$image')";
mysqli_query($db, $query);
}


if(isset($_POST["submit2"]))
{
   $q= "SELECT * FROM table1";
   echo "<table>";
   echo "<tr>";
   $result = mysqli_query($db, $q);
   while ($row = mysqli_fetch_array($result)) {

   
   
   echo "<td>"; 
   echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image1'] ).'" height="200" width="200"/>';
   echo "<br>";
   ?><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php
   echo "</td>";
   
   
   
   }
   echo "</tr>";
   
   echo "</table>";
  

}





?>




</body>
</html>
