<?php

include 'db-connect.php';

// Get job (and id)
$job = '';
$id = '';
if (isset($_GET['job'])) {
    $job = $_GET['job'];
    if ($job     == 'get_admins'     ||
            $job == 'get_admin'      ||
            $job == 'add_admin'      ||
            $job == 'edit_admin'     ||
            $job == 'delete_admin'   ||
            $job == 'activate_admin' ||
            $job == 'suspend_admin') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (!is_numeric($id)) {
                $id = '';
            }
        }
    } else {
        $job = '';
    }
}

// Prepare array
$mysql_data = array();

// Valid job found
if ($job != '') {
    $con = mysqli_connect($host, $user, $pass, $database);

    if (!($con)) {
        die('oops connection failed ' . mysql_error());
    }

// Execute job
    if ($job == 'get_admins') {
//--------------manage admins functions begins
        $query = "SELECT * FROM cozdb_users";
        $select_all_admins = mysqli_query($con, $query);
        if (!$select_all_admins) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_admins)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit btn btn-primary btn-sm" style="margin-left: 10px;"><a data-id="' . $row['id'] . '" data-name="' . $row['username'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></a></li>';
                $functions .= '<li class="function_delete btn btn-danger btn-sm" style="margin-left: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['username'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></a></li>';
                $functions .= '</ul></div>';
                $status = $row['status'];
                $func = '';
                $word = '';
                if($status == 'pending') {
                    $word = 'activate';
                    $func = 'function_activate btn btn-success';
                } elseif ($status == 'suspended') {
                    $word = 'unblock';
                    $func = 'function_activate btn btn-success';
                } else {
                    $word = 'suspend';
                    $func = 'function_block btn btn-warning';
                }
                $function2 = '<div class="activate '. $func .'" style="margin-left: 10px;" data-status="' . $row['status'] . '" data-id="' . $row['id'] . '" data-name="' . $row['username'] . '"><span style="color: #fff;">'. $word .'</span></li>';
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "username" => $row['username'],
                    "password" => $row['password'],
                    "first_name" => $row['fName'],
                    "last_name" => $row['lName'],
                    "email" => $row['email'],
                    "priviledge" => $row['priviledges'],
                    "status" => $row['status'],
                    "functions" => $functions,
                    "function2" => $function2
                );
            }
        }
    } elseif ($job == 'get_admin') {

        // Get Admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "SELECT * FROM cozdb_users WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
                while ($row = mysqli_fetch_array($query)) {
                    $mysql_data[] = array(
                        "id" => $row['id'],
                        "username" => $row['username'],
                        "password" => $row['password'],
                        "first_name" => $row['fName'],
                        "last_name" => $row['lName'],
                        "email" => $row['email'],
                        "priviledge" => $row['priviledges'],
                        "status" => $row['status']
                    );
                }
            }
        }
    } elseif ($job == 'edit_admin') {
        // Edit admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $firstname = $_GET['first_name'];
            $lasttname = $_GET['last_name'];
            $username = $_GET['username'];
            $password = $_GET['password'];
            $email = $_GET['email'];
            $status = $_GET['status'];
            $priviledges = $_GET['privilege'];

            $query = "UPDATE cozdb_users SET username = '{$username}',fName = '{$firstname}', lName = '{$lasttname}', email = '{$email}',status = '{$status}',priviledges = '{$priviledges}',password = '{$password}'";
            $query .= "WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";

            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }
    } elseif ($job == 'delete_admin') {

        // Delete company
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "DELETE FROM cozdb_users WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }
    } elseif ($job == 'activate_admin') {
        // Activate admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $status = "active";
            $query = "UPDATE cozdb_users SET status = '$status'";
            $query .= "WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }
    } elseif ($job == 'suspend_admin') {
        // Activate admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $status = "suspended";
            $query = "UPDATE cozdb_users SET status = '$status'";
            $query .= "WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }
    }
// Close database connection
    mysqli_close($con);
}
$data = array(
    "result" => $result,
    "message" => $message,
    "data" => $mysql_data
);

// Convert PHP array to JSON array
$json_data = json_encode($data);
print $json_data;
