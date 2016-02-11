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
                        <h1>Story Titles</h1>
                        
                    </div>
                   
                    <style>
                        table td:nth-child(3) {
                            width: 60%;
                        }
                        table td:nth-child(2) {
                            width: 20%;
                        }
                    </style>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table id="title_table" class="table table-bordred table-striped" style="font-size: 0.90em;">

                                        <thead>
                                        <th>Index</th>
                                        <th>Author</th>
                                        <th>Story Title</th>                                                                                                       
                                        <th>No of Episodes</th>
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


<div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add Title</h4>
      </div>
          <div class="modal-body">
         
        <div class="form-group">
        <label class="col-xs-3 control-label sr-only" for="title">Title: </label>
        <input class="form-control col-lg-6" style="width: 100%;" id="title" type="text" placeholder="Title">
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
        <h4 class="modal-title custom_align" id="Heading">Edit Title</h4>
      </div>
          <div class="modal-body">
         
        <div class="form-group">
        <label class="col-xs-3 control-label sr-only" for="title">Title: </label>
        <input class="form-control " id="title" style="width: 100%;" type="text" placeholder="Title">
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
       <div><span>All Episodes under this title will be deleted!</span></div>
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
        <div class="container">
      <div class="row">
        <div class="col-lg-11 tile">
          <div class="panel panel-info">
              <div class="panel-heading"><h5>Admins Level Info</h5></div>
              <p style="padding: 10px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
              </p>
           </div>
        </div>
      </div>
   </div>
  
<?php include './admin_includes/admin_footer.php'; ?>