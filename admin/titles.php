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
                        <h1 style="display: inline-block">Stories</h1>
                        <div class="btn btn-primary pull-right" id="add_title" style="display: inline-block" data-toggle="modal" data-target="#addTitle">New story</div>
                        
                    </div>
                   
                    <style>
                        table td:nth-child(3) {
                            width: 40%;
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


<div class="lightbox_bg" style="z-index: 8000;"></div>
<div class="lightbox_container  col-row-8" style="z-index: 8050; width: 60%; margin-left: 10%; margin-right: 10%; height: auto; padding-bottom: 50px;" >
    <div class="lightbox_close"></div>
    <div class="lightbox_content">

        <h2>Add title</h2>
        <form class="form add" id="title_form" data-id="" novalidate>
            <div class="input_container form-group">
                <label for="first_name">Title: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="text" class="text" name="title" id="title" value="" required placeholder="Enter story title">
                </div>
            </div>
            
            <div class="button_container form-group">
                <button type="submit">Add title</button>
            </div>
        </form>

    </div>
</div>

<?php include './admin_includes/loader.php'; ?>
  
<?php include './admin_includes/admin_footer.php'; ?>