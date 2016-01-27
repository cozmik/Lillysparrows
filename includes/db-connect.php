<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cozdb-lillysparrows";

if(!mysql_connect($servername, $username, $password))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db($dbname))
{
     die('oops database selection problem ! --> '.mysql_error());
}

