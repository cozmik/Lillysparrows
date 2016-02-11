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
                        <h1>Posts</h1>
                        
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
                                        <th>Post author</th>
                                        <th>Post Category</th>
                                        <th>Post Title</th>                                                                                                       
                                        <th>Post</th>
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

<?php include './admin_includes/admin_footer.php'; ?>