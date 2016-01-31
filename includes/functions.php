<?php
include 'db-connect.php';
session_start();

//Login function
$login_message = "";
if(isset($_REQUEST['login_btn'])){
        
    $username = mysql_real_escape_string(stripslashes($_REQUEST['username']));
    $password = mysql_real_escape_string(stripslashes($_REQUEST['password'])); 
    
    $query = "SELECT * FROM `cozdb_users` WHERE `username` = '".$username."' AND `password` = '".$password."'";
    $count_users = mysqli_query($con, $query);
    
    if(!(mysqli_num_rows($count_users)>0)){
     $login_message = "<div id='fade' class='alert alert-danger text-center data-dismiss='alert' style='padding:0px;'>";
     $login_message .= "Invalid username / password ! </div>";      
    }
    else 
        {
        $_SESSION['username'] = $username;
        echo "<script>";
        echo "location.href='dashboard.php'";
        echo "</script>";
    }

}
//Login function ends

//registration function
$registration_message = "";
if(isset($_POST['admin_registration_btn'])){      
    $username = mysql_real_escape_string(stripslashes($_POST['username']));
    $fname = mysql_real_escape_string(stripslashes($_POST['fname']));
    $lname = mysql_real_escape_string(stripslashes($_POST['lname']));
    $email = mysql_real_escape_string(stripslashes($_POST['email']));
    $password = mysql_real_escape_string(stripslashes($_POST['password']));
    $password_confirm = mysql_real_escape_string(stripslashes($_POST['password_confirm']));
    
    if($password !== $password_confirm){
         $registration_message = "<div id='fade' class='alert alert-danger text-center data-dismiss='alert' style='padding:0px;'>";
         $registration_message .= "Password mismatch! </div>";        
    }
    else  
    { 

        $query = "INSERT INTO cozdb_users(username,password,fName,lName,email) ";
        $query .= "VALUES('{$username}','{$password}','{$fname}','{$lname}','{$email}') ";
        
        $create_user_query = mysqli_query($con, $query);
        if($create_user_query){
         $registration_message = "<div id='fade' class='alert alert-success text-center data-dismiss='alert' style='padding:0px;'>";
         $registration_message .= "Request sent for Approval! </div>"; 
        }
        else {
         $registration_message = "<div id='' class='alert alert-danger text-center data-dismiss='alert' style='padding:0px;'>";
         $registration_message .= "Error! ".mysqli_error($con)." </div>"; 
        } 
    }

}
//registration function ends

//--------------manage admins functions begins

//--------admin delete codes
if(isset($_REQUEST['admin_delete_id'])){
    $id = $_REQUEST['admin_delete_id'];
    $query = "DELETE FROM cozdb_users WHERE id = '{$id}'";
    $delete_user_query = mysqli_query($con, $query);
        if($delete_user_query){
           echo "<script>";
           echo "location.href='admins.php'";
           echo "</script>"; 
        }   
}

//----------admin activate codes

       if(isset($_REQUEST['admin_activate_id'])){
         $admin_activate_id = $_REQUEST['admin_activate_id'];
         $activate_query = "UPDATE cozdb_users SET status = 'active' WHERE id = '{$admin_activate_id}'";
         $activate_status = mysqli_query($con, $activate_query);
         if($activate_status){
           echo "<script>";
           echo "location.href='admins.php'";
           echo "</script>";   
          } 
       }
       
//----------admin block codes

       if(isset($_REQUEST['admin_block_id'])){
         $admin_block_id = $_REQUEST['admin_block_id'];
               $block_query = "UPDATE cozdb_users SET status = 'blocked' WHERE id = '{$admin_block_id}'";
               $block_status = mysqli_query($con, $block_query);
               if($block_status){
                 echo "<script>";
                 echo "location.href='admins.php'";
                 echo "</script>";
               }        
        }

//----------admin block codes

       if(isset($_REQUEST['admin_unblock_id'])){
         $admin_unblock_id = $_REQUEST['admin_unblock_id'];
               $unblock_query = "UPDATE cozdb_users SET status = 'active' WHERE id = '{$admin_unblock_id}'";
               $unblock_status = mysqli_query($con, $unblock_query);
               if($unblock_status){
                 echo "<script>";
                 echo "location.href='admins.php'";
                 echo "</script>";
               }        
        }
        
        


//-------admin edit codes
   $admin_update_form = "none";
   
       if(isset($_REQUEST['admin_edit_id'])){
        $admin_edit_id = $_REQUEST['admin_edit_id'];
         $admin_update_form = "block";
      } 
      
      
       if(isset($_POST['update_admin_btn'])){
         $admin_update_id = $_REQUEST['admin_edit_id'];
         $firstname = $_POST['update_fname']; 
         $lasttname = $_POST['update_lname'];
         $username = $_POST['update_username'];
         $email = $_POST['update_email'];
         $priviledges = $_POST['update_admin-level'];
         
         $update_query = "UPDATE cozdb_users SET username = '{$username}',fName = '{$firstname}', lName = '{$lasttname}',email = '{$email}',priviledges = '{$priviledges}'";
         $update_query .= "WHERE id = '{$admin_update_id}'";
         $update_status = mysqli_query($con, $update_query);
         if($update_status){
           echo "<script>";
           $admin_update_form = "none";
           echo "location.href='admins.php'";
           echo "</script>";   
          } 
       }
//--------------manage admins functions ends
?>