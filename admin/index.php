<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Lillysparrows - Admin</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/prettyPhoto.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
            <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <!--/head-->
    <body style="padding-top:0px;">
        <div>
            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144716315690681";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>


            <nav class="navbar navbar-inverse sidebar" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Admin</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="../index.html" target="_blank">Visit Site<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                            <li ><a href="admins.php">Admins<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                            <li><a href="createpost.php">Posts<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                            <li><a href="categories.php">Categories<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a></li>
                            <li><a href="titles.php">Titles<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>
                            <li><a href="story.php">Stories<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-film"></span></a></li>
                            <li><a href="quotes.php">Quotes<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                            
                            <li><a href="subscribers.php">Subscribers<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bookmark"></span></a></li>
                            <li class="dropdown"> <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Settings <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                                <ul class="dropdown-menu forAnimate" role="menu">
                                    <li><a href="#">Manage Admins</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--/header--> 
            <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="../images/logo.png" alt="logo"></a>
                    </div>

                </div>
            </header><!--/header-->

            <div style="background:white; padding-top:85px; padding-bottom: 4px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 tile">

                            <div class="row">

                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-pencil"></span> Posts</h1>
                                    <h4>Total Posts ( <span>45 </span>)</h4>
                                </div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-book"></span> Categories</h1>
                                    <h4>Total Categories (<span> 45 </span>)</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-film"></span> Stories</h1>
                                    <h4>No of Titles (<span> 45 </span>)</h4>
                                    <h4>No of Episodes (<span> 45 </span>)</h4>

                                </div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-bookmark"></span> Subscribers</h1>	
                                    <h4>No of Subscribers ( <span>45 </span>)</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-user"></span> Admins</h1>
                                    <h4>No of Admins (<span> 45 </span>)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 


            <footer id="footer" class="midnight-blue">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Lillysparrows</a>. All Rights Reserved.
                        </div>
                        <div class="col-sm-6">
                            <ul class="pull-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!--/#footer-->
        </div>
    </body>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>