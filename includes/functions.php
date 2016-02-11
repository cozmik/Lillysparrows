<?php

include 'db-connect.php';

// Get job (and id)
$job = '';
$id = '';
if (isset($_GET['job'])) {
    $job = $_GET['job'];
    if ($job     == 'get_admins'        ||
            $job == 'get_admin'         ||
            $job == 'add_admin'         ||
            $job == 'edit_admin'        ||
            $job == 'delete_admin'      ||
            $job == 'activate_admin'    ||
            $job == 'suspend_admin'     ||
            $job == 'view_posts'        ||
            $job == 'view_quotes'       ||
            $job == 'view_story'        ||
            $job == 'view_categories'   ||
            $job == 'view_subscribers'  ||
            $job == 'view_titles'       ||
            $job == 'count_posts'       ||
            $job == 'count_category'    ||
            $job == 'count_story'       ||
            $job == 'count_episodes'    ||
            $job == 'count_admin'       ||
            $job == 'count_subscribers'   ) {
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
    
//Post jobs
elseif($job == 'view_posts') {
//--------------manage posts functions begins
        $query = "SELECT * FROM post_view";
        $select_all_posts = mysqli_query($con, $query);
        if (!$select_all_posts) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_posts)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_post btn btn-primary btn-xs" style="margin: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['postTitle'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></a></li>';
                $functions .= '<li class="function_delete_post btn btn-danger btn-xs" style="margin-left: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['postTitle'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></a></li>';
                $functions .= '</ul></div>';
                $post = substr($row['post'], 0, 210). "...";
                $status = '';
                if($row['status'] == '1') {
                    $status = 'Published';
                } else {
                    $status = 'Draft';
                }
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "title" => $row['postTitle'],
                    "author" => $row['username'],
                    "category" => $row['Name'],
                    "post"=> $post,
                    "img" => $row['img'],
                    "date" => $row['date'],
                    "status" => $status,
                    "tags" => $row['tags'],
                    "functions" => $functions
                );
            }
        }
    }elseif($job == 'count_posts') {
//--------------manage posts functions begins
        $query = "SELECT COUNT(post) AS post_number FROM post_view";
        $count_posts = mysqli_query($con, $query);
        if (!$count_posts) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            $post = mysqli_fetch_assoc($count_posts);
                $mysql_data[] = array(
                "post" => $post['post_number']
                );
            };
    } 
//Story jobs
elseif($job == 'view_story') {
//--------------manage posts functions begins
        $query = "SELECT * FROM story_view";
        $select_all_story = mysqli_query($con, $query);
        if (!$select_all_story) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_story)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_post btn btn-primary btn-xs" style="margin: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['episodeTitle'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></a></li>';
                $functions .= '<li class="function_delete_post btn btn-danger btn-xs" style="margin-left: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['episodeTitle'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></a></li>';
                $functions .= '</ul></div>';
                $story = substr($row['story'], 0, 210). "...";
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "titleID" => $row['titleID'],
                    "title" => $row['title'],
                    "episode" => $row['episodeTitle'],
                    "author" => $row['username'],
                    "story"=> $story,
                    "img" => $row['image'],
                    "functions" => $functions
                );
            }
        }
    }
    //Story jobs
elseif($job == 'view_titles') {
//--------------manage posts functions begins
        $query = "SELECT * FROM `title_episode_view`";
        $select_all_title = mysqli_query($con, $query);
        if (!$select_all_title) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_title)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_post btn btn-primary btn-xs" style="margin: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['username'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></a></li>';
                $functions .= '<li class="function_delete_post btn btn-danger btn-xs" style="margin-left: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['username'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></a></li>';
                $functions .= '</ul></div>';
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "title" => $row['title'],
                    "author" => $row['username'],
                    "total_episode" => $row['total_episode'],
                    "functions" => $functions
                );
            }
        }
    }
    //Quotes jobs
elseif($job == 'view_quotes') {
//--------------manage posts functions begins
        $query = "SELECT * FROM quote_view";
        $select_all_quotes = mysqli_query($con, $query);
        if (!$select_all_quotes) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_quotes)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_post btn btn-primary btn-xs" style="margin: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['author_name'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></a></li>';
                $functions .= '<li class="function_delete_post btn btn-danger btn-xs" style="margin-left: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['author_name'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></a></li>';
                $functions .= '</ul></div>';
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "quote" => $row['quote'],
                    "author" => $row['author_name'],
                    "year" => $row['year'],
                    "functions" => $functions
                );
            }
        }
    }
    
    elseif($job == 'view_categories') {
//--------------manage posts functions begins
        $query = "SELECT * FROM post_number";
        $select_category = mysqli_query($con, $query);
        if (!$select_category) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_category)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_post btn btn-primary btn-xs" style="margin: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['Name'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></a></li>';
                $functions .= '<li class="function_delete_post btn btn-danger btn-xs" style="margin-left: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['Name'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></a></li>';
                $functions .= '</ul></div>';
                $mysql_data[] = array(
                    "id"      => $row['id'],
                    "category" => $row['Name'],
                    "post_number" => $row['post_numbers'],
                    "functions" => $functions
                );
            }
        }
    }
    elseif($job == 'view_subscribers') {
//--------------manage posts functions begins
        $query = "SELECT * FROM cozdb_mailing";
        $select_subscribers = mysqli_query($con, $query);
        if (!$select_subscribers) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_subscribers)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_post btn btn-primary btn-xs" style="margin: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['email'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></a></li>';
                $functions .= '<li class="function_delete_post btn btn-danger btn-xs" style="margin-left: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['email'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></a></li>';
                $functions .= '</ul></div>';
                $status = $row['confirmed'];
                $wstatus = '';
                if($status == '1') {
                    $wstatus = 'confirmed';
                } else {
                    $wstatus = 'pending';
                }
                
                $mysql_data[] = array(
                    "id"      => $row['id'],
                    "email" => $row['email'],
                    "status" => $wstatus,
                    "functions" => $functions
                );
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
