<?php

include 'db-connect.php';
session_start();

$con = mysqli_connect($host, $user, $pass, $database);
if (!($con)) {
    die('oops connection failed ' . mysql_error());
}

//Login function
$login_message = "";
if (isset($_REQUEST['login_btn'])) {

    $username = mysql_real_escape_string(stripslashes($_REQUEST['username']));
    $password = mysql_real_escape_string(stripslashes($_REQUEST['password']));

    $query = "SELECT * FROM `cozdb_users` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";
    $count_users = mysqli_query($con, $query);
    $login = mysqli_fetch_assoc($count_users);
    $status = $login['status'];
    $privilege = $login['priviledges'];
    $adminID = $login['id'];

    if (!(mysqli_num_rows($count_users) > 0)) {
        $login_message = "<div id='fade' class='alert alert-danger text-center data-dismiss='alert' style='padding:0px;'>";
        $login_message .= "Invalid username / password ! </div>";
    } elseif($status == 'suspended'){
        $login_message = "<div id='fade' class='alert alert-warning text-center data-dismiss='alert' style='padding:0px;'>";
        $login_message .= "This account has been suspended! <br> Please contact Lillysparrows. </div>";
    }elseif($status == 'active'){
       $_SESSION['username'] = $username;
       $_SESSION['privilege'] = $privilege;
       $_SESSION['id']= $adminID;
        echo "<script>";
        echo "location.href='dashboard.php'";
        echo "</script>";
    }
}
//Login function ends
//registration function
$registration_message = "";
if (isset($_POST['admin_registration_btn'])) {
    $username = mysql_real_escape_string(stripslashes($_POST['username']));
    $fname = mysql_real_escape_string(stripslashes($_POST['fname']));
    $lname = mysql_real_escape_string(stripslashes($_POST['lname']));
    $email = mysql_real_escape_string(stripslashes($_POST['email']));
    $password = mysql_real_escape_string(stripslashes($_POST['password']));
    $password_confirm = mysql_real_escape_string(stripslashes($_POST['password_confirm']));

    if ($password !== $password_confirm) {
        $registration_message = "<div id='fade' class='alert alert-danger text-center data-dismiss='alert' style='padding:0px;'>";
        $registration_message .= "Password mismatch! </div>";
    } else {

        $query = "INSERT INTO cozdb_users(username,password,fName,lName,email) ";
        $query .= "VALUES('{$username}','{$password}','{$fname}','{$lname}','{$email}') ";

        $create_user_query = mysqli_query($con, $query);
        if ($create_user_query) {
            $registration_message = "<div id='fade' class='alert alert-success text-center data-dismiss='alert' style='padding:0px;'>";
            $registration_message .= "Request sent for Approval! </div>";
        } else {
            $registration_message = "<div id='' class='alert alert-danger text-center data-dismiss='alert' style='padding:0px;'>";
            $registration_message .= "Error! " . mysqli_error($con) . " </div>";
        }
    }
}
//registration function ends