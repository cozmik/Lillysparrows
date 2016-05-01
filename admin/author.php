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
                       <h1 style="display: inline-block">Quote Authors</h1>
                        <div class="btn btn-primary pull-right" id="add_category" style="display: inline-block" data-toggle="modal" data-target="#addTitle">Add Author</div>
                        
                    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table id="author_table" class="datatable table-bordered table-striped" style="font-size: 0.90em;">

                                        <thead>
                                        <th>Index</th>
                                        <th>Author</th>
                                        <th>Year</th>
                                        <th>No of Quotes</th>                                                  
                                        <th>Function</th>                                                 
                                        </thead>
                                        <tbody>
                                            <!--quote items -->
                                        </tbody>

                                    </table>
                                </div>
                            
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
   
</div>



<div class="lightbox_bg" style="z-index: 8000;"></div>
<div class="lightbox_container  col-row-8" style="z-index: 8050; width: 60%; margin-left: 10%; margin-right: 10%; height: auto; padding-bottom: 50px;" >
    <div class="lightbox_close"></div>
    <div class="lightbox_content">

        <h2>Add Category</h2>
        <form class="form add" id="author_form" data-id="" novalidate>
            <div class="input_container form-group">
                <label for="author">Author Name: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="text" class="text" name="name" id="author" value="" required placeholder="Enter author name">
                </div>
            </div>

            <div class="input_container form-group">
                <label for="year">Year: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="text" class="text" name="year" id="year" value="" required placeholder="1989 - 2016">
                </div>
            </div>
            
            <div class="button_container form-group">
                <button type="submit">Add Author</button>
            </div>
        </form>

    </div>
</div>


<?php include './admin_includes/loader.php'; ?>

<?php include './admin_includes/admin_footer.php'; ?>