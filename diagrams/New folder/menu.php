


<html>

<head>
<h1><link href="stylesheet.css"rel="stylesheet" type="text/css">
This is our menu pricelist
</h1>
<h2>Just order</h2>
</head>
<p>
<table style="width:350px">
<tr>
  <th>chicken dish</th>
  <th>price</th> 
</tr>
<tr>
  <td>chicken barbecue</td>
  <td>550 ksh</td> 
  
</tr>
<tr>
<td>famous chicken dinner</td>
<td>750 ksh</td>
</tr>
<tr>
<td>chicken wings combo</td>
<td>950 ksh</td>
</tr>
</table>
<p>

</p>
<table style="width:350px">
<tr>
<th>duck dish</th>
<th>price</th>
</tr>
<tr>
<td>famous duck fry</td>
<td>650 ksh</td>
</tr>
<tr>
<td>barbecue duck</td>
<td>850 ksh</td>
</tr>
<tr>
<td>buddhas duck</td>
<td>1000 ksh</td>
</tr>
</table>
<p>
enter details and order selection below
</p>
<form  method="post" action="order.php">
fullname: <input type="text" name="fullname" id="fullname" value="fullname"><br>
phonenumber: <input type="text"name="phonenumber" id="phonenumber" value="phonenumber"><br>




<input type="checkbox" name="ee" value="ee">chicken barbecue<br>
<input type="checkbox"name="ee" value="ee">famous chicken dinner<br>
<input type="checkbox" name="ee" value="ee">chicken wings combo<br>
<input type="checkbox" name="ee" value="ee">famous duck fry<br>
<input type="checkbox" name="ee" value="ee">barbecue duck<br>
<input type="checkbox" name="ee" value="ee">buddhas duck<br>

<input type="submit" name="submit" value="submit">
</form>
</html>
<?php
   
   $con =mysqli_connect('localhost','root','');
   if(!$con)
   	{
   		echo 'Not connected';
       }
if (!mysqli_select_db($con,'web'))
{ 
	echo 'no database';
}

  $fullname = $_POST['fullname'];
  $phonenumber = $_POST['phonenumber'];
  $check = imlode (',',$_POST['ee']);

 $sql = "INSERT INTO food (fullname,phonenumber,ee) VALUES ('$fullname',' $phonenumber,'$check')";

 if (!mysqli_query($con, $sql)) 
 {
		echo "not registered";
	}
	else
	{
		echo "registered";
			}
			

 ?>
