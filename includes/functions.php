<?php
session_start();
if (isset($_SESSION['username'])) {
    $admin_level = $_SESSION['privilege'];
    $author_id = $_SESSION['id'];
}
include 'db-connect.php';

function formatDate($dbdate) {
    $date = explode("-", $dbdate);
    $year = $date[0];
    $month = $date[1];
    $day = $date[2];

    $fDate = $day . "-" . $month . "-" . $year;
    return $fDate;
}

function rand_string($length) {
    $string = '';
    $length;

    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(97, 132);
        if ($rand <= 122) {
            $string .= chr($rand);
        } else {
            $string .= (string) ($rand - 122);
        }
    }
    return $string;
}

function replaceSpace($text) {
    $Text = explode(" ", $text);
    $linkText = implode("-", $Text);
    return $linkText;
}

// Get job (and id)
$job = '';
$id = '';
if (isset($_GET['job'])) {
    $job = $_GET['job'];
    if ($job == 'get_admins' ||
            $job == 'get_admin' ||
            $job == 'add_admin' ||
            $job == 'edit_admin' ||
            $job == 'delete_admin' ||
            $job == 'activate_admin' ||
            $job == 'suspend_admin' ||
            $job == 'view_posts' ||
            $job == 'subscribe' ||
            $job == 'add_post' ||
            $job == 'add_story' ||
            $job == 'delete_post' ||
            $job == 'view_quotes' ||
            $job == 'get_quote' ||
            $job == 'get_post' ||
            $job == 'story_links' ||
            $job == 'get_author' ||
            $job == 'edit_story' ||
            $job == 'quote_authors' ||
            $job == 'add_quote' ||
            $job == 'edit_author' ||
            $job == 'edit_quote' ||
            $job == 'delete_quote' ||
            $job == 'delete_author' ||
            $job == 'front_title' ||
            $job == 'add_author' ||
            $job == 'latest_comment' ||
            $job == 'view_story' ||
            $job == 'blog_links' ||
            $job == 'view_authors' ||
            $job == 'view_story_single' ||
            $job == 'delete_story' ||
            $job == 'add_comment' ||
            $job == 'story_episodes' ||
            $job == 'view_categories' ||
            $job == 'add_category' ||
            $job == 'edit_category' ||
            $job == 'edit_post' ||
            $job == 'delete_category' ||
            $job == 'get_category' ||
            $job == 'get_story' ||
            $job == 'blog_view_bottom' ||
            $job == 'get_categories' ||
            $job == 'blog_view' ||
            $job == 'view_subscribers' ||
            $job == 'single_blog' ||
            $job == 'blog_comment' ||
            $job == 'blog_view_cat' ||
            $job == 'view_titles' ||
            $job == 'story_titles' ||
            $job == 'get_title' ||
            $job == 'add_title' ||
            $job == 'edit_title' ||
            $job == 'delete_title' ||
            $job == 'dashboard_counts') {
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
        $query = "SELECT * FROM cozdb_users WHERE `priviledges` != '00'";
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
                $functions .= '<li class="function_delete btn dbtn btn-danger btn-sm" style="margin-left: 5px;"><a data-id="' . $row['id'] . '" data-name="' . $row['username'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></a></li>';
                $functions .= '</ul></div>';
                $status = $row['status'];
                $func = '';
                $word = '';
                if ($status == 'pending') {
                    $word = 'activate';
                    $func = 'function_activate btn btn-success';
                } elseif ($status == 'suspended') {
                    $word = 'unblock';
                    $func = 'function_activate btn btn-success';
                } else {
                    $word = 'suspend';
                    $func = 'function_block btn btn-warning';
                }
                $privilege = "";
                if ($row['priviledges'] == "0") {
                    $privilege = "Super Admin";
                } elseif ($row['priviledges'] == "1") {
                    $privilege = "Blogger";
                } elseif ($row['priviledges'] == "2") {
                    $privilege = "Story Teller";
                }
                $function2 = '<div class="activate ' . $func . '" style="margin-left: 10px;" data-status="' . $row['status'] . '" data-id="' . $row['id'] . '" data-name="' . $row['username'] . '"><span style="color: #fff;">' . $word . '</span></li>';
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "username" => $row['username'],
                    "password" => $row['password'],
                    "first_name" => $row['fName'],
                    "last_name" => $row['lName'],
                    "email" => $row['email'],
                    "priviledge" => $privilege,
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
            $check = "update `cozdb-post` SET `author_id`= 1 WHERE `author_id` = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = "DELETE FROM cozdb_users WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";

            $trigger = mysqli_query($con, $check);
            if (!$trigger) {
                $result = 'error';
                $message = 'query error';
            } else {
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
    } elseif ($job == 'activate_admin') {
        // Activate admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $status = "active";
            $query1 = "UPDATE cozdb_users SET status = '$status'";
            $query1 .= "WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query1);
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

        if ($admin_level === 0) {
            $query = "SELECT * FROM post_view ORDER BY `id` DESC";
            $select_all_post = mysqli_query($con, $query);
            if (!$select_all_post) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
                while ($row = mysqli_fetch_assoc($select_all_post)) {
                    $functions = '<div class="function_buttons"><ul>';
                    $functions .= '<li class="function_edit_post edit_btn btn btn-primary btn-xs" style="margin: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['postTitle'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                    $functions .= '<li class="function_delete_post dbtn delete_btn btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['postTitle'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                    $functions .= '</ul></div>';
                    $post = substr($row['post'], 0, 210) . "...";
                    $status = '';
                    if ($row['status'] == '1') {
                        $status = 'Published';
                    } else {
                        $status = 'Draft';
                    }
                    $comments = '';
                    if ($row['no_comments'] == 0) {
                        $comments = 'No comments';
                    } elseif ($row['no_comments'] == 1) {
                        $comments = $row['no_comments'] . ' comment';
                    } else {
                        $comments = $row['no_comments'] . ' comments';
                    }
                    $mysql_data[] = array(
                        "id" => $row['id'],
                        "title" => $row['postTitle'],
                        "author" => $row['username'],
                        "category" => $row['Name'],
                        "post" => $post,
                        "img" => $row['img'],
                        "date" => $row['date'],
                        "status" => $status,
                        "tags" => $row['tags'],
                        "comments" => $comments,
                        "functions" => $functions
                    );
                }
            }
        } else {
            $query = "SELECT * FROM post_view WHERE `userID` =" . $author_id . " ORDER BY `id` DESC";
            $select_all_post = mysqli_query($con, $query);
            if (!$select_all_post) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
                while ($row = mysqli_fetch_assoc($select_all_post)) {
                    $functions = '<div class="function_buttons"><ul>';
                    $functions .= '<li class="function_edit_post edit_btn btn btn-primary btn-xs" style="margin: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['postTitle'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                    $functions .= '<li class="function_delete_post dbtn delete_btn btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['postTitle'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                    $functions .= '</ul></div>';
                    $post = substr($row['post'], 0, 210) . "...";
                    $status = '';
                    if ($row['status'] == '1') {
                        $status = 'Published';
                    } else {
                        $status = 'Draft';
                    }
                    $comments = '';
                    if ($row['no_comments'] == 0) {
                        $comments = 'No comments';
                    } elseif ($row['no_comments'] == 1) {
                        $comments = $row['no_comments'] . ' comment';
                    } else {
                        $comments = $row['no_comments'] . ' comments';
                    }
                    $mysql_data[] = array(
                        "id" => $row['id'],
                        "title" => $row['postTitle'],
                        "author" => $row['username'],
                        "category" => $row['Name'],
                        "post" => $post,
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


//////////////////////////////////////////add post //////////////////////////////////////////////////////////////////////
    elseif ($job == 'add_post') {
        $title = $_GET['post_title'];
        $body = $_GET['post_body'];
        $category = $_GET['select_category'];
        $image = $_GET['image'];
        $status = $_GET['status'];
        $date = $_GET['date'];
        $author = $author_id;

        $query1 = "INSERT INTO `cozdb-post` SET `postTitle` = '{$title}', `post` = '{$body}', `categoryID` = '{$category}', `img` = '{$image}', `status` ='{$status}', `date` ='{$date}', `author_id` = '{$author}'";
        $query = mysqli_query($con, $query1);
        if (!$query) {
            $result = 'error';
            $message = 'query error';
        } else {
            if ($status == '1') {
                $query = "SELECT `email` FROM cozdb_mailing WHERE `confirmed` = '1'";
                $select_subscribers = mysqli_query($con, $query);
                if (!$select_subscribers) {
                    $result = 'error';
                    $message = 'query error';
                } else {
                    $result = 'success';
                    $message = 'query success';
                    while ($row = mysqli_fetch_assoc($select_subscribers)) {
                        $linkName = replaceSpace($category);
                        $linkTitle = replaceSpace($title);
                        $to = $row['email'];
                        $subject = $title;
                        $post = substr($body, 0, 210) . "...";

                        $msg = '<html><head><title>' . $title . '</title>'
                                . '<body style= "padding: 0px">'
                                . '<header style="height: 100px; width:100%; text-align: center; color:white; background-color: rgb(224,12,104);">'
                                . '<a href="http://www.lillysparrows.com"><h1 style="font-size:3.5em; padding-top:10px">LillySparrows</h1></a></header>'
                                . '<h2 style="text-align:center; color: rgb(159,2,81);">' . $title . '</h2>'
                                . $post . '<p><a href="www.lillysparrows.com/#/' . $linkName . '/' . $linkTitle . ' style="color:blue;" ">Continue reading </a><br>'
                                . '<footer style="background-color: rgb(159,2,81);">'
                                . '<div class="col-sm-12" style="text-align:center;">'
                                . '<h3><a style="color:rgb(200,200,200);" href="http://www.lillysparrows.com">Lillysparrows</a></h3>'
                                . '<small style="color:white;">&copy; 2016 Webcontractorz. All Rights Reserved.</small></div>'
                                . '</footer></body></html>';


                        $header = "From:no-reply@lillysparrows.com \r\n";
                        $header .= "MIME-Version: 1.0\r\n";
                        $header .= "Content-type: text/html\r\n";

                        $retval = mail($to, $subject, $msg, $header);

                        if ($retval == true) {
                            $status = "sent";
                        } else {
                            $status = "not sent";
                        }
                        $mysql_data[] = array(
                            "email" => $to,
                            "status" => $status
                        );
                    }
                }
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }
    } elseif ($job == 'edit_post') {
        // Edit admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $title = $_GET['post_title'];
            $body = $_GET['post_body'];
            $category = $_GET['select_category'];
            $image = $_GET['image'];
            $status = $_GET['status'];
            $date = $_GET['date'];

            $query1 = "UPDATE `cozdb-post` SET `postTitle` = '{$title}', `post` = '{$body}', `categoryID` = '{$category}', `img` = '{$image}', `status` ='{$status}', `date` ='{$date}'";
            $query1 .= "WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query1);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {

                if ($status == '1') {
                    $query = "SELECT `email` FROM cozdb_mailing WHERE `confirmed` = '1'";
                    $select_subscribers = mysqli_query($con, $query);
                    if (!$select_subscribers) {
                        $result = 'error';
                        $message = 'query error';
                    } else {
                        $result = 'success';
                        $message = 'query success';
                        while ($row = mysqli_fetch_assoc($select_subscribers)) {
                            $linkName = replaceSpace($category);
                            $linkTitle = replaceSpace($title);
                            $to = $row['email'];
                            $subject = $title;
                            $post = substr($body, 0, 210) . "...";

                            $msg = '<html><head><title>' . $title . '</title>'
                                    . '<body style= "padding: 0px">'
                                    . '<header style="height: 100px; width:100%; text-align: center; color:white; background-color: rgb(224,12,104);">'
                                    . '<a href="http://www.lillysparrows.com"><h1 style="font-size:3.5em; padding-top:10px">LillySparrows</h1></a></header>'
                                    . '<h2 style="text-align:center; color: rgb(159,2,81);">' . $title . '</h2>'
                                    . $post . '<p><a href="www.lillysparrows.com/#/' . $linkName . '/' . $linkTitle . ' style="color:blue;" ">Continue reading </a><br>'
                                    . '<footer style="background-color: rgb(159,2,81);">'
                                    . '<div class="col-sm-12" style="text-align:center;">'
                                    . '<h3><a style="color:rgb(200,200,200);" href="http://www.lillysparrows.com">Lillysparrows</a></h3>'
                                    . '<small style="color:white;">&copy; 2016 Webcontractorz. All Rights Reserved.</small></div>'
                                    . '</footer></body></html>';


                            $header = "From:no-reply@lillysparrows.com \r\n";
                            $header .= "MIME-Version: 1.0\r\n";
                            $header .= "Content-type: text/html\r\n";

                            $retval = mail($to, $subject, $msg, $header);

                            if ($retval == true) {
                                $status = "sent";
                            } else {
                                $status = "not sent";
                            }
                            $mysql_data[] = array(
                                "email" => $to,
                                "status" => $status
                            );
                        }
                    }
                } else {
                    $result = 'success';
                    $message = 'query success';
                }
            }
        }
    }
//other post codes
//categories jobs
    elseif ($job == 'view_categories') {
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
                $functions .= '<li class="function_delete_category dbtn btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['Name'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                $functions .= '</ul></div>';
                $dpost = '';
                if ($row['post_numbers'] == 0) {
                    $dpost = "No post";
                } elseif ($row['post_numbers'] == 1) {
                    $dpost = $row['post_numbers'] . " Post";
                } else {
                    $dpost = $row['post_numbers'] . " Posts";
                }
                $mysql_data[] = array(
                    "id" => $row['id'],
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
            $check = "update `cozdb-post` set `categoryID` = 1 WHERE `categoryID` = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = "DELETE FROM `cozdb-categories` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";

            $trigger = mysqli_query($con, $check);
            if (!$trigger) {
                $result = 'error';
                $message = 'query error';
            } else {

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
    } elseif ($job == 'get_category') {
        // Get Category
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
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
    } elseif ($job == 'get_post') {
        // Get Category
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "SELECT * FROM `post_view` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
                while ($row = mysqli_fetch_array($query)) {
                    $mysql_data[] = array(
                        "postTitle" => $row['postTitle'],
                        "post" => $row['post'],
                        "image" => $row['img'],
                        "date" => $row['date'],
                        "tags" => $row['tags'],
                        "category" => $row['Name'],
                        "categoryID" => $row['catID'],
                    );
                }
            }
        }
    } elseif ($job == 'view_story_single') {
        // Get Category
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query1 = "SELECT * FROM `story_view` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query1);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
                while ($row = mysqli_fetch_array($query)) {
                    $id = $row['id'];
                    $storyTitle = $row['title'];
                    $episodeTitle = $row['episodeTitle'];
                    $titleID = $row['titleID'];
                    $titleImage = $row['image'];
                    $story = $row['story'];

                    $theEpisode = '<div class="blog-item" ><div class="blog-content"><h3>' . $storyTitle . '</h3>'
                            . '<img alt="' . $episodeTitle . '" class="img-responsive img-blog" src="' . $titleImage . '" width="100%" alt="" />'
                            . '<div class="entry-meta">'
                            . '<span>Episode: ' . $episodeTitle . '</span></div>'
                            . '<p>' . $story . '</p>'
                            . '</div></div>';

                    $query2 = "SELECT * FROM `cozdb-storyepisode` WHERE `titleID` = '" . $titleID . "' ORDER BY `id` ASC";

                    $episodes = mysqli_query($con, $query2);
                    if (!$episodes) {
                        $result = 'error';
                        $message = 'query error';
                    } else {
                        $result = 'success';
                        $message = 'query success';
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($episodes)) {
                            $id = $row['id'];
                            $title = $row['episodeTitle'];

                            if ($i % 20 == 0) {
                                $theEpisode .= '<li data-title="' . $titleID . '" class="btn btn-sm btn-primary singleEpisode" style="margin: 1px; width: 4.5%;"'
                                        . 'data-id="' . $id . '"> <a href="#/story/' . $storyTitle . '/' . $title . '">' . $i . '</a> </li></ul><ul class="tag-cloud">';
                            } else {

                                $theEpisode .= '<li data-title="' . $titleID . '" class="btn btn-sm btn-primary singleEpisode" style="margin: 1px; width: 4.5%;"'
                                        . 'data-id="' . $id . '"> <a href="#/story/' . $storyTitle . '/' . $title . '">' . $i . '</a> </li>';
                            }
                            $i = $i + 1;
                        }
                    }
                }
            }

            $mysql_data[] = array(
                "singleStory" => $theEpisode
            );
        }
    }

elseif ($job == 'get_story') {
        // Get Category
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query1 = "SELECT * FROM `story_view` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query1);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
                while ($row = mysqli_fetch_array($query)) {
                    $id = $row['id'];
                    $episodeTitle = $row['episodeTitle'];
                    $titleID = $row['titleID'];
                    $story = $row['story'];
                    
                    $mysql_data[] = array(
                        "id" => $id,
                        "titleID" => $titleID,
                        "episodeTitle" => $episodeTitle,
                        "story" => $story
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
            $query1 = "UPDATE `cozdb-categories` SET Name = '{$category}'";
            $query1 .= "WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $query = mysqli_query($con, $query1);
            if (!$query) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';
            }
        }
    } elseif ($job == 'get_categories') {
//--------------manage posts functions begins
        $query = "SELECT * FROM `cozdb-categories` ORDER BY `id` ASC";
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
                    "id" => $row['id'],
                    "name" => '<option value="' . $row['id'] . '">' . $row['Name'] . '</option>',
                    "category" => $row['Name'],
                    "i" => $i
                );
            }
        }
    }
//other categories codes
//title jobs
    elseif ($job == 'view_titles') {
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
                $functions .= '<li class="function_delete_title dbtn btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['title'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                $functions .= '</ul></div>';
                $episodes = '';
                if ($row['total_episode'] == 0) {
                    $episodes = "No episode";
                } elseif ($row['total_episode'] == 1) {
                    $episodes = $row['total_episode'] . " Episode";
                } else {
                    $episodes = $row['total_episode'] . " Episodes";
                }
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "title" => $row['title'],
                    "author" => $row['username'],
                    "total_episode" => $episodes,
                    "functions" => $functions
                );
            }
        }
    } elseif ($job == 'get_title') {
        // Get Admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
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
                        "image" => $row['image'],
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
        $image = $_GET['image'];
        $author = $author_id;
        $query = "INSERT INTO `cozdb-storytitle` SET title = '{$title}', image = '{$image}', author = '{$author}'";
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
            $image = $_GET['image'];
            $query = "UPDATE `cozdb-storytitle` SET title = '{$title}', image = '{$image}'";
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
    elseif ($job == 'view_authors') {
//--------------manage posts functions begins
        $query = "SELECT * FROM `quote_author_view`";
        $select_all_title = mysqli_query($con, $query);
        if (!$select_all_title) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_title)) {
                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_author btn btn-primary btn-xs" style="margin: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['author_name'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                $functions .= '<li class="function_delete_author btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['author_name'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                $functions .= '</ul></div>';
                $quotes = '';
                if ($row['total_quotes'] == 0) {
                    $quotes = "No quote";
                } elseif ($row['total_quotes'] == 1) {
                    $quotes = $row['total_quotes'] . " Quote";
                } else {
                    $quotes = $row['total_quotes'] . " Quotes";
                }
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "author" => $row['author_name'],
                    "year" => $row['year'],
                    "total_quotes" => $quotes,
                    "functions" => $functions
                );
            }
        }
    } elseif ($job == 'get_author') {
        // Get Admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "SELECT * FROM `quote_author` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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
                        "author" => $row['author_name'],
                        "year" => $row['year']
                    );
                }
            }
        }
    }

    //edit title job
    elseif ($job == 'edit_author') {
        // Edit admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $author = $_GET['name'];
            $year = $_GET['year'];
            $query = "UPDATE `quote_author` SET `author_name` = '{$author}', `year` = '{$year}'";
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
    elseif ($job == 'delete_author') {
        // Delete title
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "DELETE FROM `quote_author` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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



//story jobs
    elseif ($job == 'view_story') {
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

                $status = '';
                if ($row['status'] == '1') {
                    $status = 'Published';
                } else {
                    $status = 'Draft';
                };

                $functions = '<div class="function_buttons"><ul>';
                $functions .= '<li class="function_edit_story edit_btn btn btn-primary btn-xs" style="margin: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['episodeTitle'] . '"><span class="glyphicon glyphicon-pencil" style="color: #fff;"></span></li>';
                $functions .= '<li class="function_delete_story dbtn btn delete_btn btn-danger btn-xs" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['episodeTitle'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span></li>';
                $functions .= '</ul></div>';
                $story = substr($row['story'], 0, 210) . "...";
                $mysql_data[] = array(
                    "id" => $row['id'],
                    "titleID" => $row['titleID'],
                    "title" => $row['title'],
                    "episode" => $row['episodeTitle'],
                    "author" => $row['username'],
                    "story" => $story,
                    "status" => $status,
                    "functions" => $functions
                );
            }
        }
    } elseif ($job == 'story_titles') {
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
                    "id" => $row['id'],
                    "name" => '<option value="' . $row['id'] . '">' . $row['title'] . '</option>',
                    "i" => $i
                );
            }
        }
    }

///////////////////////////////////add story job////////////////////////////////////////////////////////////////////// 
    elseif ($job == 'add_story') {

        $title = $_GET['story_title'];
        $episode_title = $_GET['episode_title'];
        $episode_body = $_GET['episode_body'];
        $status = $_GET['status'];

        $query = "INSERT INTO `cozdb-storyepisode` SET `titleID` = '{$title}', `story` = '{$episode_body}', `episodeTitle` = '{$episode_title}', `status` ='{$status}'";
        $query = mysqli_query($con, $query);
        if (!$query) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
        }
    }

/////////////////////////////////////////////edit story job/////////////////////////////////////////////////////////////
    elseif ($job == 'edit_story') {
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $title = $_GET['story_title'];
            $episode_title = $_GET['episode_title'];
            $episode_body = $_GET['episode_body'];
            $status = $_GET['status'];

            $query = "UPDATE `cozdb-storyepisode` SET `titleID` = '{$title}', `story` = '{$episode_body}', `episodeTitle` = '{$episode_title}', `status` ='{$status}'";
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

//////////////////////////////////delete story job////////////////////////////////////////////////////////////////////
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
    elseif ($job == 'view_quotes') {
//--------------manage quotes functions begins
        $query = "SELECT * FROM quote_view";
        $select_all_quotes = mysqli_query($con, $query);
        $quote2 = "SELECT COUNT(`quote`) as 'numbers' FROM quote_view";
        $quote_no = mysqli_query($con, $quote2);
        $num = mysqli_fetch_assoc($quote_no);
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
                    "no_of_quotes" => $num['numbers'],
                    "functions" => $functions
                );
            }
        }
    } elseif ($job == 'get_quote') {
        // Get Admin
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "SELECT * FROM `quote_view` WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
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
                        "author" => $row['author_id'],
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
    } elseif ($job == 'quote_authors') {
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
                    "id" => $row['id'],
                    "name" => '<option value="' . $row['id'] . '">' . $row['author_name'] . '</option>',
                    "year" => $row['year'],
                    "i" => $i
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

//add comment job
    elseif ($job == 'add_comment') {
        $post_id = $_GET['postID'];
        $author = $_GET['author'];
        $comment = $_GET['comment'];
        $date = $_GET['date'];
        $query = "INSERT INTO `cozdb-comments` SET `cozdb-post_id`  = '{$post_id}', `author` = '{$author}', `comment` = '{$comment}', `date` = '{$date}' ";
        $query = mysqli_query($con, $query);
        if (!$query) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
        }
    }
///////////////////////////////get latest comment/////////////////////////////////////////////////
    elseif ($job == 'latest_comment') {
        $query = "SELECT * FROM `cozdb-comments` ORDER BY `id` DESC LIMIT 1";

        $latest_comment = mysqli_query($con, $query);
        if (!$latest_comment) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($latest_comment)) {
                $query2 = "SELECT COUNT(`id`) AS `new_count` FROM `cozdb-comments` WHERE `cozdb-post_id`=" . $row['cozdb-post_id'];
                $latest_count = mysqli_query($con, $query2);
                $row2 = mysqli_fetch_assoc($latest_count);
                $the_count = $row2['new_count'];

                $formatDate = formatDate($row['date']);

                $comment_view = '<div class="media"><div class="pull-left"><img class="avatar img-circle" src="images/blog/avatar3.png" alt=""></div>';
                $comment_view .= '<div class="media-body"><div class="well"><div class="media-heading">';
                $comment_view .= '<strong>' . $row['author'] . '</strong><span class="entry-meta" style="color=grey; font-size: 12px; padding-left: 5px;"><i class="icon-calendar"></i>' . $formatDate . '</span><p>' . $row['comment'] . '</p></div></div></div><!--/.media--></div>';
                $mysql_data[] = array(
                    "comment_view" => $comment_view,
                    "new_count" => $the_count
                );
            }
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
////////////////////////////subscribe submit//////////////////////////////////////////////////////////////////
    elseif ($job == 'subscribe') {

        $dater = date_create();
        $linkDate = date_timestamp_get($dater);
        $confirm = $linkDate . rand_string(10);
        $email = $_GET['subEmail'];
        $query1 = "INSERT INTO `cozdb_mailing` SET email = '{$email}', confirm_link = '{$confirm}'";
        $query = mysqli_query($con, $query1);
        if (!$query) {
            $result = 'error';
            $message = 'query error';
        } else {
            $to = $email;
            $subject = "Lillysparrows";

            $message = '<html><head><title>Mail Confirmation</title>'
                    . '<body style= "padding: 0px">'
                    . '<header style="height: 100px; width:100%; text-align: center; color:white; background-color: rgb(224,12,104);">'
                    . '<h1 style="font-size:3.5em; padding-top:10px">LillySparrows</h1></header>'
                    . '<div style="font-weight:800"><p>Hi there,</p><p>You are getting this mail because you subscribe to'
                    . '<a href="http://www.lillysparrows.com" style="color:blue; text-decoration:underline;">Lillysparrows.com</a>.Please click the button below to confirm'
                    . 'your subscription.</p>'
                    . '<form action="http://www.lillysparrows.com/confirm/email.php?confirm_link=' . $confirm . '"  style="text-align:center">'
                    . '<button class="btn btn-large btn-info" style="-webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  background: #3299d1;
  padding: 10px 20px 10px 20px;
  text-decoration: none;" type="submit">Confirm email</button></form>'
                    . '<p>Or copy the link below to your browser. <br>'
                    . '<a href="http://www.lillysparrows.com/confirm/email.php?confirm_link=' . $confirm . '" style="color:blue; text-decoration:underline;">http://www.lillysparrows.com/confirm/email.php?confirm_link=hjdshsddshcbdsb</a></p>'
                    . '<p>If you are did not subscribe to <a href="http://www.lillysparrows.com">Lillysparrows.com</a>, please ignore this message </p></div>'
                    . '<footer style="background-color: rgb(159,2,81);">'
                    . '<div class="col-sm-12" style="text-align:center;">'
                    . '<h3><a style="color:rgb(200,200,200);" href="http://www.lillysparrows.com">Lillysparrows</a></h3>'
                    . '<small style="color:white;">&copy; 2016 Webcontractorz. All Rights Reserved.</small></div>'
                    . '</footer></body></html>';


            $header = "From:no-reply@lillysparrows.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail($to, $subject, $message, $header);
            if ($retval == true) {
                $result = 'success';
                $message = 'query success';
            } else {
                $result = 'error';
                $message = 'could not send mail';
            }
        }
    }

//subscribe jobs
    elseif ($job == 'view_subscribers') {
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
                $functions .= '<li class="function_delete_post dbtn btn btn-danger btn-sm" style="margin-left: 5px;" data-id="' . $row['id'] . '" data-name="' . $row['email'] . '"><span class="glyphicon glyphicon-trash" style="color: #fff;"></span> delete</li>';
                $functions .= '</ul></div>';
                $status = $row['confirmed'];
                $wstatus = '';
                if ($status == '1') {
                    $wstatus = 'confirmed';
                } else {
                    $wstatus = 'pending';
                }

                $mysql_data[] = array(
                    "id" => $row['id'],
                    "email" => $row['email'],
                    "status" => $wstatus,
                    "functions" => $functions
                );
            }
        }
    } elseif ($job == 'dashboard_counts') {
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
        if (!$nAdmin) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            $mysql_data[] = array(
                "nAdmin" => $nAdmin,
                "nCategories" => $nCategories,
                "nPosts" => $nPosts,
                "nSubscribers" => $nSubscribers,
                "nStories" => $nStories,
                "nQuotes" => $nQuotes,
                "nTitles" => $nTitles
            );
        }
    }
//post jobs
    elseif ($job == 'blog_view') {
        $totalRecord = $_GET['totalRecord'];
        $offset = $_GET['offset'];
        $query = "SELECT * FROM post_view WHERE status = 1  ORDER BY `id` ASC LIMIT " . $totalRecord . " OFFSET " . $offset;
        $count = "SELECT COUNT(`id`) AS `countPost` FROM `post_view` WHERE status = 1";

        $postCount = mysqli_query($con, $count);
        $row2 = mysqli_fetch_assoc($postCount);

        $select_all_post = mysqli_query($con, $query);
        if (!$select_all_post) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_post)) {
                $post = substr($row['post'], 0, 210) . "...";
                $comments = '';
                if ($row['no_comments'] == 0) {
                    $comments = 'No comments';
                } elseif ($row['no_comments'] == 1) {
                    $comments = $row['no_comments'] . ' comment';
                } else {
                    $comments = $row['no_comments'] . ' comments';
                }

                $formatDate = formatDate($row['date']);

                $linkName = replaceSpace($row['Name']);
                $linkTitle = replaceSpace($row['postTitle']);


                $cat_blog = '<div class="blog-item" >';
                $cat_blog .= '<div class="blog-content"><h3 class="postTitle" data-id=' . $row['id'] . '><a href="#/' . $linkName . '/' . $linkTitle . '">' . $row['postTitle'] . '</a></h3>';
                $cat_blog .= '<img class="img-responsive img-blog" src="' . $row['img'] . '" width="100%" alt="' . $row['postTitle'] . '" />';
                $cat_blog .= '<div class="entry-meta">';
                $cat_blog .= '<span><i class="icon-user"></i>' . $row['username'] . '</span>';
                $cat_blog .= '<span class="dbcat" id=' . $row['catID'] . '><i class="icon-folder-close"></i> <a href="#/' . $linkName . '">' . $row['Name'] . '</a></span>';
                $cat_blog .= '<span><i class="icon-calendar"></i> ' . $formatDate . '</span>';
                $cat_blog .= '<span><i class="icon-comment"></i>' . $comments . '</span></div>';
                $cat_blog .= '<p>' . $post . '</p>';
                $cat_blog .= '</p><span class="postTitle" data-id=' . $row['id'] . '><a href="#/' . $linkName . '/' . $linkTitle . '"> Read More <i class="icon-angle-right"></i></a></span>';
                $cat_blog .= '</div></div>';

                $mysql_data[] = array(
                    "blog_view" => $cat_blog,
                    "total" => $row2['countPost']
                );
            }
        }
    } elseif ($job == 'blog_links') {
        $query = "SELECT * FROM post_view WHERE status = 1  ORDER BY `id` ASC";

        $select_all_post = mysqli_query($con, $query);
        if (!$select_all_post) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_post)) {
                $linkName = replaceSpace($row['Name']);
                $linkTitle = replaceSpace($row['postTitle']);

                $cat_blog = '<h3 class="postTitle" data-id=' . $row['id'] . '><a href="#/' . $linkName . '/' . $linkTitle . '">' . $row['postTitle'] . '</a></h3>';

                $mysql_data[] = array(
                    "blog_view" => $cat_blog
                );
            }
        }
    }

//     //story titles jobs
    elseif ($job == 'front_title') {
        $totalRecord = $_GET['totalRecord'];
        $offset = $_GET['offset'];

        $query1 = "SELECT COUNT(`id`) AS 'count' FROM `cozdb-storytitle`";
        $count = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_assoc($count);
        if (!$count) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';

            if ($row1['count'] < 1) {
                $frontTitle = '<h3> No Story yet... </h3>';

                $mysql_data[] = array(
                    "frontTitle" => $frontTitle,
                    "titleID" => "",
                    "image" => ""
                );
            } else {
                $query = "SELECT * FROM `cozdb-storytitle` GROUP BY `id` ORDER BY `id` DESC LIMIT " . $totalRecord . " OFFSET " . $offset;
                $story_title = mysqli_query($con, $query);

                if (!$story_title) {
                    $result = 'error';
                    $message = 'query error';
                } else {
                    $result = 'success';
                    $message = 'query success';
                    while ($row = mysqli_fetch_assoc($story_title)) {

                        $storytitle = $row['title'];
                        $titleID = $row['id'];
                        $image = $row['image'];

                        $frontTitle = '<div class="blog-item"><h3>' . $storytitle . '</h3>'
                                . '<img alt="' . $storytitle . '" class="class="img-responsive img-blog" src="' . $image . '" width="100%" alt="" />'
                                . '<div class="blog-content"><div class="entry-meta"><h4>Episodes</h4></div>'
                                . '<div class="well" style="padding-right: 10px; padding-left: 5px; width: 105%;">'
                                . '<ul class="tag-cloud episodeList">';

                        $quote2 = "SELECT COUNT(`id`) as 'numbers' FROM `cozdb-storyepisode` WHERE `titleID` = '" . $titleID . "'";
                        $post_count = mysqli_query($con, $quote2);
                        $num = mysqli_fetch_assoc($post_count);

                        if (!$post_count) {
                            $result = 'error';
                            $message = 'query error';
                        } else {
                            $result = 'success';
                            $message = 'query success';

                            $comments = '';
                            if ($num['numbers'] == 0) {
                                $frontTitle .= '<h4> No Episode For this title </h4>';

                                ///add it to front title//////////////////////
                            } else {
                                $query = "SELECT * FROM `cozdb-storyepisode` WHERE `titleID` = '" . $titleID . "' ORDER BY `id` ASC";

                                $episodes = mysqli_query($con, $query);
                                if (!$episodes) {
                                    $result = 'error';
                                    $message = 'query error';
                                } else {
                                    $result = 'success';
                                    $message = 'query success';
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($episodes)) {
                                        $id = $row['id'];
                                        $title = $row['episodeTitle'];

                                        $episode_link = replaceSpace($storytitle) . "/" . replaceSpace($title);
                                        if ($i % 20 == 0) {
                                            $frontTitle .= '<li data-title="' . $titleID . '" class="btn btn-sm btn-primary singleEpisode" style="margin: 1px; width: 4.5%;"'
                                                    . 'data-id="' . $id . '"> <a href="#/story/' . $episode_link . '">' . $i . '</a> </li></ul><ul class="tag-cloud">';
                                        } else {

                                            $frontTitle .= '<li data-title="' . $titleID . '" class="btn btn-sm btn-primary singleEpisode" style="margin: 1px; width: 4.5%;"'
                                                    . 'data-id="' . $id . '"> <a href="#/story/' . $episode_link . '">' . $i . '</a> </li>';
                                        }
                                        $i = $i + 1;
                                    }
                                }
                            }
                        }
                        $mysql_data[] = array(
                            'storyTitle' => $frontTitle,
                            'total' => $row1['count']
                        );
                    }
                }
            }
        }
    }



    //story titles jobs
    elseif ($job == 'story_episodes') {
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $quote2 = "SELECT COUNT(`id`) as 'numbers' FROM `cozdb-storyepisode` WHERE `titleID` = '" . mysqli_real_escape_string($con, $id) . "'";
            $post_count = mysqli_query($con, $quote2);
            $num = mysqli_fetch_assoc($post_count);

            if (!$post_count) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';

                $comments = '';
                if ($num['numbers'] == 0) {
                    $cat_blog = '<h4> No Episode For this title </h4>';

                    $mysql_data[] = array(
                        "id" => $cat_blog,
                        "episode_count" => $num['numbers']
                    );
                } else {
                    $query = "SELECT * FROM `cozdb-storyepisode` WHERE `titleID` = '" . mysqli_real_escape_string($con, $id) . "' ORDER BY `id` ASC";

                    $episodes = mysqli_query($con, $query);
                    if (!$episodes) {
                        $result = 'error';
                        $message = 'query error';
                    } else {
                        $result = 'success';
                        $message = 'query success';
                        while ($row = mysqli_fetch_assoc($episodes)) {
                            $id = $row['id'];
                            $title = $row['episodeTitle'];

                            $mysql_data[] = array(
                                "id" => $id,
                                "title" => $title,
                            );
                        }
                    }
                }
            }
        }
    } elseif ($job == 'story_links') {

        $query = "SELECT * FROM `cozdb-storytitle` GROUP BY `id` ORDER BY `id` DESC";
        $story_title = mysqli_query($con, $query);

        if (!$story_title) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($story_title)) {

                $storytitle = $row['title'];
                $titleID = $row['id'];

                $query = "SELECT * FROM `cozdb-storyepisode` WHERE `titleID` = '" . $titleID . "' ORDER BY `id` ASC";

                $episodes = mysqli_query($con, $query);
                if (!$episodes) {
                    $result = 'error';
                    $message = 'query error';
                } else {
                    $result = 'success';
                    $message = 'query success';

                    $frontTitle = "";
                    while ($row = mysqli_fetch_assoc($episodes)) {
                        $id = $row['id'];
                        $title = $row['episodeTitle'];

                        $episode_link = replaceSpace($storytitle) . "/" . replaceSpace($title);

                        $frontTitle .= '<li data-title="' . $titleID . '"data-id="' . $id . '"> <a href=#/story/' . $episode_link . '>' . 'EPISODE' . '</a> </li>';
                    }
                }
                $mysql_data[] = array(
                    'storyTitle' => $frontTitle
                );
            }
        }
    }


//post jobs
    elseif ($job == 'blog_view_cat') {
        $totalRecord = $_GET['totalRecord'];
        $offset = $_GET['offset'];
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $quote2 = "SELECT COUNT(`id`) as 'numbers' FROM `post_view` WHERE `status` = 1 AND catID = '" . mysqli_real_escape_string($con, $id) . "'";
            $post_count = mysqli_query($con, $quote2);
            $num = mysqli_fetch_assoc($post_count);

            if (!$post_count) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';

                $comments = '';
                if ($num['numbers'] == 0) {
                    $cat_blog = '<div class="blog-item" >';
                    $cat_blog .= '<div><h3> No Blog For this Catigory </h3></div></div>';

                    $mysql_data[] = array(
                        "blog_view" => $cat_blog,
                        "total" => $num['numbers']
                    );
                } else {

                    $query = "SELECT * FROM post_view WHERE status = 1 AND catID = '" . mysqli_real_escape_string($con, $id) . "' ORDER BY `id` DESC LIMIT " . $totalRecord . " OFFSET " . $offset;
                    $cat_post = mysqli_query($con, $query);
                    if (!$cat_post) {
                        $result = 'error';
                        $message = 'query error';
                    } else {
                        $result = 'success';
                        $message = 'query success';
                        while ($row = mysqli_fetch_assoc($cat_post)) {
                            $post = substr($row['post'], 0, 210) . "...";


                            $comments = '';
                            if ($row['no_comments'] == 0) {
                                $comments = 'No comments';
                            } elseif ($row['no_comments'] == 1) {
                                $comments = $row['no_comments'] . ' comment';
                            } else {
                                $comments = $row['no_comments'] . ' comments';
                            }

                            $formatDate = formatDate($row['date']);

                            $linkName = replaceSpace($row['Name']);
                            $linkTitle = replaceSpace($row['postTitle']);

                            $cat_blog = '<div class="blog-item" >';
                            $cat_blog .= '<div class="blog-content"><h3 class="postTitle" data-id=' . $row['id'] . '><a href="#/' . $linkName . '/' . $linkTitle . '">' . $row['postTitle'] . '</a></h3>';
                            $cat_blog .= '<img class="img-responsive img-blog" src="' . $row['img'] . '" width="100%" alt="' . $row['postTitle'] . '" />';
                            $cat_blog .= '<div class="entry-meta">';
                            $cat_blog .= '<span><i class="icon-user"></i>' . $row['username'] . '</span>';
                            $cat_blog .= '<span class="dbcat" id=' . $row['catID'] . '><i class="icon-folder-close"></i> <a href="#/' . $linkName . '">' . $row['Name'] . '</a></span>';
                            $cat_blog .= '<span><i class="icon-calendar"></i> ' . $formatDate . '</span>';
                            $cat_blog .= '<span><i class="icon-comment"></i>' . $comments . '</span></div>';
                            $cat_blog .= '<p>' . $post . '</p>';
                            $cat_blog .= '</p><div class="postTitle" data-id=' . $row['id'] . '><a href="#/' . $linkName . '/' . $linkTitle . '"> Read More <i class="icon-angle-right"></i></a></div>';
                            $cat_blog .= '</div></div>';

                            $mysql_data[] = array(
                                "blog_view" => $cat_blog,
                                "total" => $num['numbers']
                            );
                        }
                    }
                }
            }
        }
    }

//post jobs
    elseif ($job == 'blog_view_bottom') {
        $query = "SELECT * FROM post_view WHERE status = 1  ORDER BY `id` ASC LIMIT 3";
        $select_all_post = mysqli_query($con, $query);
        if (!$select_all_post) {
            $result = 'error';
            $message = 'query error';
        } else {
            $result = 'success';
            $message = 'query success';
            while ($row = mysqli_fetch_assoc($select_all_post)) {
                $post = substr($row['post'], 0, 210) . "...";
                $status = '';
                if ($row['status'] == '1') {
                    $status = 'Published';
                } else {
                    $status = 'Draft';
                }
                $comments = '';
                if ($row['no_comments'] == 0) {
                    $comments = 'No comments';
                } elseif ($row['no_comments'] == 1) {
                    $comments = $row['no_comments'] . ' comment';
                } else {
                    $comments = $row['no_comments'] . ' comments';
                }
                $formatDate = formatDate($row['date']);

                $linkName = replaceSpace($row['Name']);
                $linkTitle = replaceSpace($row['postTitle']);

                $latest_blog = '<div class="media"><div class="pull-left">';
                $latest_blog .= '<img src="' . $row['img'] . '" alt="' . $row['postTitle'] . '" height=64></div>';

                $latest_blog .= '<div class="media-body"><span class="media-heading postTitle ajaxd" data-id=' . $row['id'] . '><a href="#/' . $linkName . '/' . $linkTitle . '">' . $row['postTitle'] . '</a></span>';

                $latest_blog .= '<small class="muted">Posted ' . $formatDate . '</small></div></div>';

                $mysql_data[] = array(
                    "blog_view" => $latest_blog
                );
            }
        }
    } elseif ($job == 'single_blog') {
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {
            $query = "SELECT * FROM post_view WHERE id = '" . mysqli_real_escape_string($con, $id) . "'";
            $single_post = mysqli_query($con, $query);
            if (!$single_post) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';

                $blog_frontpage = "";
                $comment_form = '<div id="comment-form"><h3>Leave a comment</h3>'
                        . '<form class="form-horizontal" id="comment_form" role="form"><div class="form-group">'
                        . '<input type="text" class="hidden" name="postID" value="' . $id . '" />'
                        . '<div class="col-sm-10"><input type="text" name="author" class="form-control comment_author" placeholder="Full Name" /></div></div>'
                        . '<div class="form-group"><div class="col-sm-12"><textarea rows="8" class="form-control comment_text" name="comment" placeholder="Comment"></textarea></div></div>'
                        . '<button type="submit" class="btn btn-danger btn-lg">Submit Comment</button></form></div><!--/#comment-form-->';

                while ($row = mysqli_fetch_assoc($single_post)) {
                    $post = $row['post'];
                    $comments = '';
                    if ($row['no_comments'] == 0) {
                        $comments = 'No comments';
                    } elseif ($row['no_comments'] == 1) {
                        $comments = $row['no_comments'] . ' comment';
                    } else {
                        $comments = $row['no_comments'] . ' comments';
                    }

                    $formatDate = formatDate($row['date']);

                    $blog_frontpage .= '<div class="blog-item" >';
                    $blog_frontpage .= '<div class="blog-content"><h3>' . $row['postTitle'] . '</h3>';
                    $blog_frontpage .= '<img class="img-responsive img-blog" src="' . $row['img'] . '" width="100%" alt="' . $row['postTitle'] . '" />';
                    $blog_frontpage .= '<div class="entry-meta">';
                    $blog_frontpage .= '<span><i class="icon-user"></i>' . $row['username'] . '</span>';
                    $blog_frontpage .= '<span><i class="icon-folder-close"></i>' . $row['Name'] . '</span><span id ="share_button"><i class="icon-share"></i> <a href="#">share</a></span>';
                    $blog_frontpage .= '<span><i class="icon-calendar"></i> ' . $formatDate . '</span>';
                    $blog_frontpage .= '<p>' . $post . '</p>';
                    $blog_frontpage .= '</div></div>';

                    //////comments/////////////////////////////////////////////////////////////////////
                    $quote2 = "SELECT COUNT(`comment`) as 'numbers' FROM `cozdb-comments` WHERE `cozdb-post_id` = '" . mysqli_real_escape_string($con, $row['id']) . "'";
                    $comment_no = mysqli_query($con, $quote2);
                    $num = mysqli_fetch_assoc($comment_no);

                    if ($num['numbers'] == 0) {
                        $comments = 'No comments';
                        $comment_heading = '<div id="comments"><div id="comments-list">'
                                . '<h3>' . $comments . ' </h3></div></div>';
                        $blog_frontpage .= $comment_heading . $comment_form;

                        $mysql_data[] = array(
                            "single_blog" => $blog_frontpage
                        );
                    } else {

                        if ($num['numbers'] == 1) {
                            $comments = $num['numbers'] . ' comment';
                        } else {
                            $comments = $num['numbers'] . ' comments';
                        }

                        $comment_heading = '<div id="comments"><div id="comments-list">'
                                . '<h3>' . $comments . ' </h3>';

                        $blog_frontpage .= $comment_heading;

                        $query = "SELECT * FROM `cozdb-comments` WHERE `cozdb-post_id` = '" . mysqli_real_escape_string($con, $row['id']) . "'";
                        $comment_post = mysqli_query($con, $query);

                        if (!$comment_post) {
                            $result = 'error';
                            $message = 'query error';
                        } else {
                            $result = 'success';
                            $message = 'query success';
                            while ($row = mysqli_fetch_assoc($comment_post)) {

                                $formatDate2 = formatDate($row['date']);
                                $comment_view = '<div class="media"><div class="pull-left"><img class="avatar img-circle" src="images/blog/avatar3.png" alt=""></div>';
                                $comment_view .= '<div class="media-body"><div class="well"><div class="media-heading">';
                                $comment_view .= '<strong>' . $row['author'] . '</strong> <span class="entry-meta" style="color=grey; font-size: 12px; padding-left: 5px;"><i class="icon-calendar"></i>' . $formatDate2 . '</span><p>' . $row['comment'] . '</p></div></div></div><!--/.media--></div>';
                                $blog_frontpage .= $comment_view;
                            }
                        }
                    }
                }
                $blog_frontpage .= $comment_form;
                $mysql_data[] = array(
                    "single_blog" => $blog_frontpage
                );
            }
        }
    } elseif ($job == 'blog_comment') {
        if ($id == '') {
            $result = 'error';
            $message = 'id missing';
        } else {

            $quote2 = "SELECT COUNT(`comment`) as 'numbers' FROM `cozdb-comments` WHERE `cozdb-post_id` = '" . mysqli_real_escape_string($con, $id) . "'";
            $comment_no = mysqli_query($con, $quote2);
            $num = mysqli_fetch_assoc($comment_no);

            if (!$comment_no) {
                $result = 'error';
                $message = 'query error';
            } else {
                $result = 'success';
                $message = 'query success';

                $comments = '';
                if ($num['numbers'] == 0) {
                    $comments = 'No comments';
                    $comment_heading = '<div id="comments"><div id="comments-list">';
                    $comment_heading .= '<h3>' . $comments . ' </h3></div></div>';

                    $mysql_data[] = array(
                        "comment_no" => $num['numbers'],
                        "comment_heading" => $comment_heading,
                        "comment_view" => ""
                    );
                } else {
                    $query = "SELECT * FROM `cozdb-comments` WHERE `cozdb-post_id` = '" . mysqli_real_escape_string($con, $id) . "'";
                    $single_post = mysqli_query($con, $query);

                    if (!$single_post) {
                        $result = 'error';
                        $message = 'query error';
                    } else {
                        $result = 'success';
                        $message = 'query success';
                        while ($row = mysqli_fetch_assoc($single_post)) {
                            if ($num['numbers'] == 1) {
                                $comments = $num['numbers'] . ' comment';
                            } else {
                                $comments = $num['numbers'] . ' comments';
                            }

                            $formatDate = formatDate($row['date']);

                            $comment_heading = '<div id="comments"><div id="comments-list">';
                            $comment_heading .= '<h3>' . $comments . ' </h3>';
                            $comment_view = '<div class="media"><div class="pull-left"><img class="avatar img-circle" src="images/blog/avatar3.png" alt=""></div>';
                            $comment_view .= '<div class="media-body"><div class="well"><div class="media-heading">';
                            $comment_view .= '<strong>' . $row['author'] . '</strong> <span class="entry-meta" style="color=grey; font-size: 12px; padding-left: 5px;"><i class="icon-calendar"></i>' . $formatDate . '</span><p>' . $row['comment'] . '</p></div></div></div><!--/.media--></div>';
                            $mysql_data[] = array(
                                "comment_no" => $num['numbers'],
                                "comment_heading" => $comment_heading,
                                "comment_view" => $comment_view
                            );
                        }
                    }
                }
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
