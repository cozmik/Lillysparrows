<?php include 'modules/header.php' ?>

    <section id="main-slider" class="baby-pink no-margin">
        <div class="carousel slide">
                <div class="carousel-inner dslideshow">
                     
                
                </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="icon-angle-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="icon-angle-right"></i>
        </a>
    </section> 

    <section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">
                <?php include 'modules/widget-bar.php' ?>
            </aside>        
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <div class="blog-item">
                       

                            <p>&nbsp;</p>

                            <div class="author well">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="avatar img-thumbnail" src="images/blog/avatar.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <strong>John Doe</strong>
                                        </div>
                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
                                    </div>
                                </div>
                            </div><!--/.author-->

                            <div id="comments">
                                <div id="comments-list">
                                    <h3>3 Comments</h3>
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="avatar img-circle" src="images/blog/avatar1.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="well">
                                                <div class="media-heading">
                                                    <strong>John Doe</strong>&nbsp; <small>27 Aug 2013</small>
                                                    <a class="pull-right" href="#"><i class="icon-repeat"></i> Reply</a>
                                                </div>
                                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                            </div>
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="avatar img-circle" src="images/blog/avatar3.png" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="well">
                                                        <div class="media-heading">
                                                            <strong>John Doe</strong>&nbsp; <small>27 Aug 2013</small>
                                                            <a class="pull-right" href="#"><i class="icon-repeat"></i> Reply</a>
                                                        </div>
                                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
                                                    </div>
                                                </div>
                                            </div><!--/.media-->
                                        </div>
                                    </div><!--/.media-->
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="avatar img-circle" src="images/blog/avatar2.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="well">
                                                <div class="media-heading">
                                                    <strong>John Doe</strong>&nbsp; <small>27 Aug 2013</small>
                                                    <a class="pull-right" href="#"><i class="icon-repeat"></i> Reply</a>
                                                </div>
                                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                            </div>
                                        </div>
                                    </div><!--/.media-->
                                </div><!--/#comments-list-->  

                                <div id="comment-form">
                                    <h3>Leave a comment</h3>
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <textarea rows="8" class="form-control" placeholder="Comment"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-lg">Submit Comment</button>
                                    </form>
                                </div><!--/#comment-form-->
                            </div><!--/#comments-->
                        </div>
                    </div><!--/.blog-item-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->

   <?php include 'modules/footer.php' ?>