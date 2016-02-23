<?php include './admin_includes/admin_head.php';
      include './admin_includes/menu.php'; ?>



            <div style="padding-top:85px; padding-bottom: 60px;" id="dashboard">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 tile">

                            <div class="row">

                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-pencil"></span> Posts</h1>
                                    <h4>Total Posts ( <span id="dbpost_number"> 0 </span>)</h4>
                                </div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-book"></span> Categories</h1>
                                    <h4>Total Categories (<span id="dbcategories"> 0 </span>)</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-film"></span> Stories</h1>
                                    <h4>No of Titles (<span id="dbstory_titles"> </span>)</h4>
                                    <h4>No of Episodes (<span id="dbstory_episodes"> 0 </span>)</h4>

                                </div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-bookmark"></span> Subscribers</h1>	
                                    <h4>No of Subscribers ( <span id="dbsubscribers"> 0 </span>)</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-comment"></span> Quotes</h1> 
                                    <h4>No of Quotes ( <span id="dbquotes"> 0 </span>)</h4>
                                </div>

                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11 label label-info menu">
                                    <h1><span class="glyphicon glyphicon-user"></span> Admins</h1>
                                    <h4>No of Admins (<span id="dbAdmins"> 0 </span>)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

<?php include './admin_includes/admin_footer.php'; ?>