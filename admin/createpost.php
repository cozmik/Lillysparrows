<?php
include './admin_includes/admin_head.php';
include './admin_includes/menu.php';
?>
<div class="container">
<div style="padding-top:120px;">
</div>
<div style="padding-bottom: 4px; margin-left: 5%;">
  
        <div class="row">
            <div class="col-lg-12 tile">
                <div class="panel panel-default">
                   <div class="panel-heading">
                        <h1 style="display: inline-block">Posts</h1>
                        <div class="btn btn-primary pull-right add_btn" id="add_post" style="display: inline-block">New post</div>
                        
                    </div>
                    <div class="form_story" style="padding: 10px 10px 30px 10px;" >
                       <form action="" id="post_form" class="post-form" name="post-form">
                                            <div class="form-group">
                                                <!-- Drop down of all Titles --> 
                                                <div class="" style="display:inline-block; font-size:15px; width:100%"> <label class="sr-only"><h4>Sort by:</h4></label>

                                                    <select class="form-control" id="select_category" name="select_category" name="select_category"> 
                                                       
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="post_title" class="control-label sr-only">Episode Title: </label>
                                                <input type="text" id="post_title" name="post_title" class="post_title" class="form-control" placeholder="Enter post title...">
                                            </div>
                                            <div class="form-group">
                                                <label for="post_body" class="control-label sr-only">Post body: </label>
                                                <textarea name="post_body" id="post_body" class="form-control storyPost post_body" rows="10" placeholder="Enter post body..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="postPix" class="control-label sr-only">Post Picture: </label>
                                                <input type="file" id="postPix" class="form-control postPix" name="postPix" placeholder="upload picture...">
                                            </div>

                                            <button type="submit" class="btn btn-success post_submit">publish post</button>
                                            <button type="button" class="btn btn-primary post_draft">save as draft</button>
                                            <button type="reset" class="btn btn-danger pull-right story_cancel">cancel</button>
                                        </form>

                    </div>
                   
                    <style>
                        table td:nth-child(5) {
                            width: 60%;
                        }
                        table td:nth-child(4) {
                            width: 20%;
                        }
                    </style>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table id="post_table" class="table table-bordred table-striped" style="font-size: 0.90em;">

                                        <thead>
                                        <th>Date</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Post Title</th>                                                                                                       
                                        <th>Post</th>
                                        <th>comments</th>
                                        <th>Status</th>
                                        <th>Function</th>                                                 
                                        </thead>
                                        <tbody>
                                            <!--post items -->
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
   
</div>



<?php include './admin_includes/loader.php'; ?>

<?php include './admin_includes/admin_footer.php'; ?>