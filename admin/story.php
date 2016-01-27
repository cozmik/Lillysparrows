<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Lillysparrows - Admins</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/prettyPhoto.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/easyeditor.css" rel="stylesheet" type="text/css"/>
        <link href="../css/easyeditor-modal.css" rel="stylesheet" type="text/css"/>

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
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="index.php">Admin</a> </div>
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
                            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="index.php"><img src="../images/logo.png" alt="logo"></a> </div>
                </div>
            </header>
            <!--/header-->

            <div style="background:white; padding-top:85px; padding-bottom: 4px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 tile">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading tablehead" ><h3 style="display: inline-block;">Posts</h3>
                                    <div class="" style="display:inline-block; margin-left: 20px; font-size:15px;"> <label><h4>Sort by:</h4>
                                        </label><div class="" style="display:inline-block; margin-left: 5px;">
                                            <select class="form-control" style="dispaly"> 

                                                <option value="Title">Titles</option>
                                                <option value="date">Date</option>
                                                <option value="published">Publish Status</option> 
                                            </select>
                                        </div>
                                    </div>

                                    <p data-placement="top" data-toggle="tooltip" title="Write-post" style="display: inline-block; float: right; padding-top:20px">
                                        <button class="btn btn-primary write-post" data-title="write-post" data-toggle="modal" data-target="#write-post" >
                                            New Story</button></p>

                                    <div class="post-formCase"style="width:100%;"> 
                                        <form action="" id="post-form" class="post-form" name="post-form">
                                            <div class="form-group">
                                                <!-- Drop down of all Titles --> 
                                                <div class="" style="display:inline-block; font-size:15px; width:100%"> <label class="sr-only"><h4>Sort by:</h4></label>

                                                    <select class="form-control"> 
                                                        <option class="disabled">Choose title</option>
                                                        <option value="Title">Categories</option>
                                                        <option value="date">Date</option>
                                                        <option value="published">Publish Status</option> 
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="title" class="control-label sr-only">Episode Title</label>
                                                <input type="text" id="title" class="form-control" placeholder="Enter Episode title...">
                                            </div>
                                            <div class="form-group">
                                                <label for="post" class="control-label sr-only">Story body</label>
                                                <textarea name="description" id="editor" class="form-control" rows="20" placeholder="Enter Story body..."></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-success postpublish">publish story</button>
                                            <button type="submit" class="btn btn-primary postdraft">save as draft</button>
                                            <button type="reset" class="btn btn-danger pull-right postcancel">cancel</button>
                                        </form>
                                    </div> 
                                </div>

                                <!-- Table -->
                                <div class="container">
                                    <div class="row">


                                        <div class="col-md-12">
                                            <div class="table-responsive">


                                                <table id="mytable" class="table table-bordred table-striped">

                                                    <thead>

                                                    <th><input type="checkbox" id="checkall" /></th>
                                                    <th>Episode</th>
                                                    <th>Story Title</th>
                                                    <th>Story</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td><input type="checkbox" class="checkthis" /></td>
                                                            <td>Episode 1</td>
                                                            <td>God's Love</td>
                                                            <td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....</p></td>
                                                            <td><span class="label label-success">Published</span></td>
                                                            <td>21th January, 2016</td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-link btn-xs editPost" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" class="checkthis" /></td>
                                                            <td>Episode 1</td>
                                                            <td>God's Love</td>
                                                            <td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....</p></td>
                                                            <td><span class="label label-primary">Draft</span></td>
                                                            <td>21th January, 2016</td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-link btn-xs editPost" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" class="checkthis" /></td>
                                                            <td>Episode 1</td>
                                                            <td>God's Love</td>
                                                            <td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....</p></td>
                                                            <td><span class="label label-success">Published</span></td>
                                                            <td>21th January, 2016</td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-link btn-xs editPost" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                                        </tr>


                                                        <tr>
                                                            <td><input type="checkbox" class="checkthis" /></td>
                                                            <td>Episode 1</td>
                                                            <td>God's Love</td>
                                                            <td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....</p></td>
                                                            <td><span class="label label-success">Published</span></td>
                                                            <td>21th January, 2016</td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-link btn-xs editPost" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                                        </tr>

                                                    </tbody>

                                                </table>

                                                <div class="clearfix"></div>

                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

                <footer id="footer" class="midnight-blue">


                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6"> &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Lillysparrows</a>. All Rights Reserved. </div>
                            <div class="col-sm-6">
                                <ul class="pull-right">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Faq</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li>
                                    <!--#gototop-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!--/#footer--> 

                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                            </div>
                            <div class="modal-body">

                                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                            </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </div>
                        </div>
                        <!-- /.modal-content --> 
                    </div>
                    <!-- /.modal-dialog --> 
                </div>

                <div class="easyeditor-modal is-hidden" id="easyeditor-modal-1">
                    <div class="easyeditor-modal-content">
                        <div class="easyeditor-modal-content-header">Upload image</div>
                        <div class="easyeditor-modal-content-body">
                            <div class="easyeditor-modal-content-body-loader"></div>
                            <button class="easyeditor-modal-close">x</button>

                            <form action="uploader_sdk/" method="post" enctype="multipart/form-data">
                                <input type="file" name="file" id="easyeditor-file">
                                <button type="submit" name="easyeditor-upload">Upload and insert</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
    </body>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/jquery.easyeditor.js" type="text/javascript"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.ajaxform.js" type="text/javascript"></script>
</body>
</html>