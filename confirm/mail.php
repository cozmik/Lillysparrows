<?php
include '../includes/db-connect.php';
$con = mysqli_connect($host, $user, $pass, $database);
if (!($con)) {
    die('oops connection failed ' . mysql_error());
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lillysparrows | Confirm </title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->
    <body>
        <div class="container">
            <div class="row">
                <h1 style="text-align:center; color: rgb(224,12,104);">Lillysparrows.com</h1>
                <div class="col-md-3 col-lg-3"></div>
                    <div class="col-md-6 col-lg-6">

                        <?php
                        $link = $_GET['link'];

                        $query1 = "UPDATE `cozdb_mailing` SET confirm_link = '', `confirmed` = 0 WHERE `confirm_link` =" . $link;
                        $query = mysqli_query($con, $query1);
                        if (!$query) {
                            ?>
                            <div style="text-align:center; padding: 50px; margin-top: 50px; border: grey 2px solid; border-radius: 3px;"><h3 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> Sorry, something went wrong</h3>
                                
                                <p>click <a href="http://www.lillysparrows.com" style="color:blue">here</a> to continue.</p></div>
                        <?php } else {
                            ?>
                        <div style="text-align:center; padding: 50px; margin-top: 50px; border: grey 2px solid; border-radius: 3px;"><h3 class="text-success"><span class="glyphicon glyphicon-ok"></span> Mail confirmation success</h3>
                                    <p>click <a href="www.lillysparrows.com">here</a> to continue.</p></div>
                        <?php }
                        ?>
                </div>
            </div>
        </div>
    </body>