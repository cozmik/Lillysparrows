<?php
session_start();
$admin_level = $_SESSION['privilege'];
$author_id = $_SESSION['id'];
$admin = $_SESSION['username'];
print '<script> var $admin_level ="' .$admin_level.  '";</script>';
 if (!isset($_SESSION['username'])) {
	header("location:index.php");
        
} 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

