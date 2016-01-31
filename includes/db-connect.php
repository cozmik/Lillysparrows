<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "cozdb-lillysparrows";
$con = mysqli_connect($host, $user, $pass, $database);

if(!($con))
{
     die('oops connection failed '.mysql_error());
}



