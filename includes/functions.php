<?php

include 'db-connect.php';

$author_id = 11;

// Get job (and id)
$job = '';
$id = '';
if (isset($_GET['job'])) {
    $job = $_GET['job'];
   if ($job     == 'get_admins'         ||
            $job == 'get_admin'         ||
            $job == 'add_admin'         ||
            $job == 'edit_admin'        ||
            $job == 'delete_admin'      ||
            $job == 'activate_admin'    ||
            $job == 'suspend_admin'     ||
            $job == 'view_posts'        ||
            $job == 'add_post'          ||
            $job == 'delete_post'       ||
            $job == 'view_quotes'       ||
            $job == 'get_quote'         ||
            $job == 'quote_authors'     ||
            $job == 'add_quote'         ||
            $job == 'edit_quote'        ||
            $job == 'delete_quote'      ||
            $job == 'add_author'        ||
            $job == 'view_story'        ||
            $job == 'delete_story'      ||
            $job == 'view_categories'   ||
            $job == 'add_category'      ||
            $job == 'edit_category'     ||
            $job == 'delete_category'   ||
            $job == 'get_category'      ||
            $job == 'get_categories'    ||
            $job == 'view_subscribers'  ||
            $job == 'view_titles'       ||
            $job == 'story_titles'      ||
            $job == 'get_title'         ||
            $job == 'add_title'         ||
            $job == 'edit_title'        ||
            $job == 'delete_title'      ||
            $job == 'dashboard_counts'   ) {
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
       

//post jobs
 elseif ($job == 'view_posts') {

$query = "SELECT * FROM post_view";
        $select_all_post = mysqli_query($con, $query);
        if (!$select_all_post) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_post)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_post edit_btn btn btn-primary btn-xs" style="margin: 5px; data-id="' . $row['id'] . '" data-name="' . $row['postTitle'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                $functions .= '<li class="function_delete_post delete_btn btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['postTitle'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                $functions .= '</ul></div>';
                $post = substr($row['post'], 0, 210). "...";
                $status = '';
                if($row['status'] == '1') {
                    $status = 'Published';
                } else {
                    $status = 'Draft';
                }

                $comments = '';
                if ($row['no_comments'] == 0 ) {
                    $comments = 'No comments';
                } elseif ($row['no_comments'] == 1) {
                    $comments = $row['no_comments'] .' comment';
                } else {
                    $comments = $row['no_comments'] .' comments';
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
                    "comments" => $comments,
                    "functions" => $functions
                );
            }
        }
    }
//delete post job
     elseif ($job == 'delete_post') {

        // Delete post
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "DELETE FROM `cozdb-post` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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

//////////////////////////////////////////working on post submit////////////////////////////////////////
     //add post job
    elseif ($job == 'add_post') {
            $title = $_POST['post_title'];
            $body = $_POST['post_body'];
            $category = $_POST['select_category'];
            $image = $_POST['postPix'];
            $status = $_POST['status'];
            $author = $author_id;
            $query = "INSERT INTO `cozdb-post` SET postTitle = '{$title}', post = '{$body}', category = '{$category}', img = '{$image}', status ='{$status}',  author_id = '{$author}'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }
//other post codes









//categories jobs
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
                $functions .= '<li class="function_edit_category btn btn-primary btn-xs" style="margin: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['Name'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                $functions .= '<li class="function_delete_category btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['Name'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                $functions .= '</ul></div>';

                $dpost = '';
                if($row['post_numbers'] == 0 ) {
                    $dpost ="No post";
                } elseif($row['post_numbers'] == 1) {
                    $dpost = $row['post_numbers']. " Post";
                } else {
                    $dpost = $row['post_numbers']. " Posts";
                }
                $mysql_data[] = array(
                    "id"      => $row['id'],
                    "category" => $row['Name'],
                    "post_number" => $dpost,
                    "functions" => $functions
                );
            }
        }
    }

     //add category job
    elseif ($job == 'add_category') {
            $name = $_GET['category'];
            $query = "INSERT INTO `cozdb-categories` SET Name = '{$name}'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }

    //delete category
     elseif ($job == 'delete_category') {

        // Delete post
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "DELETE FROM `cozdb-categories` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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

    elseif ($job == 'get_category') {

        // Get Category
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        }else {
            $query = "SELECT * FROM `post_number` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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
                    "category" => $row['Name']
                    );
                }
            }
        }
    }
     //edit title job
         elseif ($job == 'edit_category') {
        // Edit admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $category = $_GET['category'];
            $query = "UPDATE `cozdb-categories` SET Name = '{$category}'";
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


     elseif($job == 'get_categories') {
//--------------manage posts functions begins
        $query = "SELECT * FROM `cozdb-categories`";
        $query2 = "SELECT COUNT(id) as numbers FROM `cozdb-categories`";
        $title = mysqli_query($con, $query);
        $category_no = mysqli_query($con, $query2);
        $num = mysqli_fetch_assoc($category_no);
        $i = $num['numbers'];
        if (!$title) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($title)) {
                $mysql_data[] = array(
                    "id"      => $row['id'],
                    "name" => '<option value="'.$row['id'] . '">' .$row['Name'] .'</option>',
                    "i"    => $i
                );
            }
        }
    }
//other categories codes










//title jobs
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
                $functions .= '<li class="function_edit_title btn btn-primary btn-xs" style="margin: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['title'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                $functions .= '<li class="function_delete_title btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['title'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                $functions .= '</ul></div>';
                $episodes = '';
                if($row['total_episode'] == 0 ) {
                    $episodes ="No episode";
                } elseif($row['total_episode'] == 1) {
                    $episodes = $row['total_episode']. " Episode";
                } else {
                    $episodes = $row['total_episode']. " Episodes";
                }
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "title" => $row['title'],
                    "author" => $row['username'],
                    "total_episode" =>  $episodes,
                    "functions" => $functions
                );
            }
        }
    }

    elseif ($job == 'get_title') {

        // Get Admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        }else {
            $query = "SELECT * FROM `title_episode_view` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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
                    "title" => $row['title'],
                    "author" => $row['username']
                    );
                }
            }
        }
    }

    //add title job
    elseif ($job == 'add_title') {
            $title = $_GET['title'];
            $author = $author_id;
            $query = "INSERT INTO `cozdb-storytitle` SET title = '{$title}', author = '{$author}'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }

        //edit title job
         elseif ($job == 'edit_title') {
        // Edit admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $title = $_GET['title'];
            $query = "UPDATE `cozdb-storytitle` SET title = '{$title}'";
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

//delete title
         elseif ($job == 'delete_title') {
        // Delete title
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "DELETE FROM `cozdb-storytitle` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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
//other title codes








//story jobs
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
                $functions .= '<li class="function_edit_story edit_btn btn btn-primary btn-xs" style="margin: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['episodeTitle'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                $functions .= '<li class="function_delete_story btn delete_btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['episodeTitle'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
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

 elseif($job == 'story_titles') {
//--------------manage posts functions begins
        $query = "SELECT * FROM `cozdb-storytitle`";
        $query2 = "SELECT COUNT(id) as numbers FROM `cozdb-storytitle`";
        $title = mysqli_query($con, $query);
        $title_no = mysqli_query($con, $query2);
        $num = mysqli_fetch_assoc($title_no);
        $i = $num['numbers'];
        if (!$title) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($title)) {
                $mysql_data[] = array(
                    "id"      => $row['id'],
                    "name" => '<option value="'.$row['id'] . '">' .$row['title'] .'</option>',
                    "i"    => $i
                );
            }
        }
    }

//delete post job
     elseif ($job == 'delete_story') {

        // Delete post
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "DELETE FROM `cozdb-storyepisode` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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







 //Quotes jobs
elseif($job == 'view_quotes') {
//--------------manage quotes functions begins
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
                $functions .= '<li class="function_edit_quote btn btn-primary btn-xs" style="margin: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['author_name'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                $functions .= '<li class="function_delete_quote btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['author_name'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
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


        elseif ($job == 'get_quote') {

        // Get Admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        }else {
            $query = "SELECT * FROM `cozdb-quotes` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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
                    "quote" => $row['quote'],
                    "author" => $row['quote_author'],
                    );
                }
            }
        }
    }  

     //edit title job
         elseif ($job == 'edit_quote') {
        // Edit admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $quote = $_GET['quote'];
            $author = $_GET['quote_author'];
            $query = "UPDATE `cozdb-quotes` SET quote = '{$quote}', quote_author = '{$author}'";
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

 elseif($job == 'quote_authors') {
//--------------manage posts functions begins
        $query = "SELECT * FROM `quote_author`";
        $query2 = "SELECT COUNT(id) as numbers FROM `quote_author`";
        $select_authors = mysqli_query($con, $query);
        $no_author = mysqli_query($con, $query2);
        $num = mysqli_fetch_assoc($no_author);
        $i = $num['numbers'];
        if (!$select_authors) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_authors)) {
                $mysql_data[] = array(
                    "id"      => $row['id'],
                    "name" => '<option value="'.$row['id'] . '">' .$row['author_name'] .'</option>',
                    "year" => $row['year'],
                    "i"    => $i
                );
            }
        }
    }

//add quote job
    elseif ($job == 'add_quote') {
            $quote = $_GET['quote'];
            $author = $_GET['quote_author'];
            $query = "INSERT INTO `cozdb-quotes` SET quote = '{$quote}', quote_author = '{$author}'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }

//add quote author job
    elseif ($job == 'add_author') {
            $name = $_GET['name'];
            $year = $_GET['year'];
            $query = "INSERT INTO `quote_author` SET author_name = '{$name}', year = '{$year}'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }

//delete quote
         elseif ($job == 'delete_quote') {
        // Delete quote
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "DELETE FROM `cozdb-quotes` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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




//subscribe jobs
 elseif($job == 'view_subscribers') {
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
                $functions .= '<li class="function_delete_post btn btn-danger btn-sm" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['email'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span> delete</li>';
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

     elseif($job == 'dashboard_counts') {
//--------------manage posts functions begins
        $query1 = "SELECT COUNT(id) as admin_count FROM `cozdb_users`";
        $query2 = "SELECT COUNT(id) as category_count FROM `cozdb-categories`";
        $query3 = "SELECT COUNT(id) as post_count FROM `cozdb-post`";
        $query4 = "SELECT COUNT(id) as subscriber_count FROM `cozdb_mailing`";
        $query5 = "SELECT COUNT(id) as story_count FROM `cozdb-storyepisode`";
        $query6 = "SELECT COUNT(id) as quote_count FROM `cozdb-quotes`";
        $query7 = "SELECT COUNT(id) as quote_count FROM `cozdb-storytitle`";

        $count_admins = mysqli_query($con, $query1);
        $count_categories = mysqli_query($con, $query2);
        $count_posts = mysqli_query($con, $query3);
        $count_subscribers = mysqli_query($con, $query4);
        $count_stories = mysqli_query($con, $query5);
        $count_quotes = mysqli_query($con, $query6);
        $count_titles = mysqli_query($con, $query7);


        $admins = mysqli_fetch_assoc($count_admins);
        $categories = mysqli_fetch_assoc($count_categories);
        $posts = mysqli_fetch_assoc($count_posts);
        $subscribers = mysqli_fetch_assoc($count_subscribers);
        $stories = mysqli_fetch_assoc($count_stories);
        $quotes = mysqli_fetch_assoc($count_quotes);
        $titles = mysqli_fetch_assoc($count_titles);

        $nAdmin = $admins['admin_count'];
        $nCategories = $categories['category_count'];
        $nPosts = $posts['post_count'];
        $nSubscribers = $subscribers['subscriber_count'];
        $nStories = $stories['story_count'];
        $nQuotes = $quotes['quote_count'];
        $nTitles = $titles['quote_count'];

        if (!$nAdmin || !$nCategories || !$nPosts || !$nSubscribers || !$nStories || !$nQuotes || !$nTitles) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';

                $mysql_data[] = array(
                    "nAdmin"        => $nAdmin,
                    "nCategories"   => $nCategories,
                    "nPosts"        => $nPosts,
                    "nSubscribers"  => $nSubscribers,
                    "nStories"      => $nStories,
                    "nQuotes"       => $nQuotes,
                    "nTitles"       => $nTitles
                );
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
