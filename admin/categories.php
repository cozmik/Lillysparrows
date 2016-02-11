<?php include './admin_includes/admin_head.php';
include './admin_includes/menu.php';
?>


<div id="page_container" style="padding-top: 120px">

    <h1>Categories</h1>

    <table id="category_table" class="datatable table-bordered table-striped" style="font-size: 0.90em;">

                                        <thead>
                                        <th>Index</th>    
                                        <th>Category</th>
                                        <th>Number of Post</th>                                                                                                       
                                        <th>Function</th>                                                 
                                        </thead>
                                        <tbody>
                                            <!--Story items -->
                                        </tbody>

                                    </table>
                                </div>
                            

                                <div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">Add Category</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label sr-only" for="category">Category Name: </label>
                                                    <input class="form-control col-lg-6" style="width: 100%;" id="category" type="text" placeholder="category name">
                                                </div>

                                            </div>

                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 
                                </div>


                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">Edit Category</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label sr-only" for="category">Category Name: </label>
                                                    <input class="form-control " id="category" style="width: 100%;" type="text" placeholder="category name">
                                                </div>

                                            </div>

                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content --> 
                                    </div>
                                    <!-- /.modal-dialog --> 
                                </div>


                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">Delete Category</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                                                <div><span>All Posts under deleted category will be move to 'Uncategorized' category</span></div>
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


                            </div>
                        </div>
                    </div>
                </div>
 <?php include './admin_includes/admin_footer.php'; ?>