<?php

     $con =mysqli_connect('localhost','root','');
    mysql_select_db("loginpage");

    $result = mysql_query("select * from people where username = '$username' and password ='$password'")
      or die("Failed to query database ") ;
    $row = mysql_fetch_array($result);
    if ($row['username']==$username && $row['password'] == $password){
       echo "login success!!! welcome "$row['username'];
} 
else
{ 
  echo "Failed to login";
}
?>