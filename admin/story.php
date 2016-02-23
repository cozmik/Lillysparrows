<?php include './admin_includes/admin_head.php';
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
                        <h1 style="display: inline-block">Stories</h1>
                        <div class="btn btn-primary pull-right add_btn" id="add_story" style="display: inline-block">New Episode</div>
                        
                    </div>
                    <div class="form_story" style="padding: 10px 10px 30px 10px;" >
                       <form action="" id="story_form" class="story-form" name="post-form">
                                            <div class="form-group">
                                                <!-- Drop down of all Titles --> 
                                                <div class="" style="display:inline-block; font-size:15px; width:100%"> <label class="sr-only"><h4>Sort by:</h4></label>

                                                    <select class="form-control" id="select_title"> 
                                                       
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="title" class="control-label sr-only">Episode Title</label>
                                                <input type="text" id="story_title" class="form-control" placeholder="Enter Episode title...">
                                            </div>
                                            <div class="form-group">
                                                <label for="post" class="control-label sr-only">Story body</label>
                                                <textarea name="description" id="story_body" class="form-control storyPost" rows="10" placeholder="Enter story body..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="title" class="control-label sr-only">Episode Title</label>
                                                <input type="file" id="postPix" class="form-control" placeholder="upload picture...">
                                            </div>


                                            <button type="submit" class="btn btn-success storySub">publish story</button>
                                            <button type="button" class="btn btn-primary storydraft">save as draft</button>
                                            <button type="reset" class="btn btn-danger pull-right story_cancel">cancel</button>
                                        </form>

                    </div>
                         <style>
                        table td:nth-child(5) {
                            width: 50%;
                        }
                        table td:nth-child(4) {
                            width: 20%;
                        }
                        table td:nth-child(3) {
                            width: 20%;
                        }
                    </style>


                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table id="story_table" class="table table-bordred table-striped" style="font-size: 0.90em;">

                                        <thead>
                                        <th>Index</th>
                                        <th>Author</th>
                                        <th>Title</th>                                                                                                       
                                        <th>Episode</th>
                                        <th>Story</th>
                                        <th>Function</th>                                                 
                                        </thead>
                                        <tbody>
                                            <!--Story items -->
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
</div>
   
<?php include './admin_includes/loader.php'; ?>

<?php include './admin_includes/admin_footer.php'; ?>