<?php

$conn = new muysqli("localhost","root","mOkaya22s", "project",3306);

if($conn -> connect_error)
{
    die("Not connected".$conn -> connect_error);
}

$sql = "CREATE DATABASE project";

$conn -> query($sql)

?>