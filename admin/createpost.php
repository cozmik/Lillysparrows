<?php include './admin_includes/admin_head.php';
      include './admin_includes/menu.php'; ?>


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
                                            New Post</button></p>

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
                                                <label for="post" class="control-label sr-only">Post body</label>
                                                <textarea name="description" id="editor" class="form-control" rows="20" placeholder="Enter post body..."></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-success postpublish">publish post</button>
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
                                                    <th>Post Title</th>
                                                    <th>Post Category</th>
                                                    <th>Post</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td><input type="checkbox" class="checkthis" /></td>
                                                            <td>God's Love</td>
                                                            <td>At His Feet</td>
                                                            <td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....</p></td>
                                                            <td><span class="label label-success">Published</span></td>
                                                            <td>21th January, 2016</td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-link btn-xs editPost" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" class="checkthis" /></td>
                                                            <td>God's Love</td>
                                                            <td>At His Feet</td>
                                                            <td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....</p></td>
                                                            <td><span class="label label-success">Published</span></td>
                                                            <td>21th January, 2016</td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-link btn-xs editPost" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" class="checkthis" /></td>
                                                            <td>God's Love</td>
                                                            <td>At His Feet</td>
                                                            <td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute....</p></td>
                                                            <td><span class="label label-success">Published</span></td>
                                                            <td>21th January, 2016</td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-link btn-xs editPost" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                                        </tr>


                                                        <tr>
                                                            <td><input type="checkbox" class="checkthis" /></td>
                                                            <td>God's Love</td>
                                                            <td>At His Feet</td>
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
           
   <?php include './admin_includes/admin_footer.php'; ?>