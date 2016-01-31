<?php include './admin_includes/admin_head.php'; ?>

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
                            <li ><a href="dashboard.php">Dashboard<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-dashboard"></span></a></li>
                            <li ><a href="admins.php">Admins<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                            <li><a href="createpost.php">Posts<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a></li>
                            <li><a href="categories.php">Categories<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span></a></li>
                            <li><a href="titles.php">Titles<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>
                            <li><a href="story.php">Stories<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-film"></span></a></li>
                            <li><a href="quotes.php">Quotes<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                            
                            <li><a href="subscribers.php">Subscribers<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-bookmark"></span></a></li>
                            <li><a href="subscribers.php">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
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

            <div style="background:black; color:#fff;  padding-top:85px; padding-bottom: 60px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 tile">

                            <div class="row">

                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-pencil"></span> Posts</h1>
                                    <h4>Total Posts ( <span id="white">45 </span>)</h4>
                                </div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-book"></span> Categories</h1>
                                    <h4>Total Categories (<span id="white"> 45 </span>)</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-film"></span> Stories</h1>
                                    <h4>No of Titles (<span id="white"> 45 </span>)</h4>
                                    <h4>No of Episodes (<span id="white"> 45 </span>)</h4>

                                </div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-bookmark"></span> Subscribers</h1>	
                                    <h4>No of Subscribers ( <span id="white">45 </span>)</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-user"></span> Admins</h1>
                                    <h4>No of Admins (<span id="white"> 45 </span>)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

<?php include './admin_includes/admin_footer.php'; ?>