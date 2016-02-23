<?php include './admin_includes/admin_head.php';
include './admin_includes/menu.php';
?>


<div id="page_container" style="padding-top: 120px">

                        <h1 style="display: inline-block">Categories</h1>
                        <div class="btn btn-primary pull-right" id="add_category" style="display: inline-block" data-toggle="modal" data-target="#addTitle">Add Category</div>

    <table id="category_table" class="datatable table-bordered table-striped" style="font-size: 0.90em;">

                                        <thead>
                                        <th>Index</th>    
                                        <th>Category</th>
                                        <th>Number of Post</th>                                                                                                       
                                        <th>Function</th>                                                 
                                        </thead>
                                        <tbody>
                                            <!--Category items -->
                                        </tbody>

                                    </table>
                                </div>
                            

                                <div class="lightbox_bg" style="z-index: 8000;"></div>
<div class="lightbox_container  col-row-8" style="z-index: 8050; width: 60%; margin-left: 10%; margin-right: 10%; height: auto; padding-bottom: 50px;" >
    <div class="lightbox_close"></div>
    <div class="lightbox_content">

        <h2>Add Category</h2>
        <form class="form add" id="category_form" data-id="" novalidate>
            <div class="input_container form-group">
                <label for="category">Category: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="text" class="text" name="category" id="category" value="" required placeholder="Enter new category">
                </div>
            </div>
            
            <div class="button_container form-group">
                <button type="submit">Add category</button>
            </div>
        </form>

    </div>
</div>

<?php include './admin_includes/loader.php'; ?>

 <?php include './admin_includes/admin_footer.php'; ?>