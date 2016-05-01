<?php
include './admin_includes/admin_head.php';
include './admin_includes/menu.php';
?>
<div id="page-container" class="container">
<div style="padding-top:120px;">
</div>
<div style="padding-bottom: 4px; margin-left: 5%;">
  
        <div class="row">
            <div class="col-lg-12 tile">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h1 style="display: inline-block">Quotes</h1>
                        <div class="btn btn-primary pull-right" id="add_quote" style="display: inline-block" data-toggle="modal" data-target="#addQuote">New Quote</div>
                        
                    </div>
                   
                    <style>
                        table td:nth-child(2) {
                            width: 60%;
                        }
                        table td:nth-child(3) {
                            width: 20%;
                        }
                        table td:nth-child(4) {
                            width: 15%;
                        }
                    </style>

                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table id="quote_table" class="datatable table-bordered table-striped" style="font-size: 0.90em;">

                                        <thead>
                                        <th>Index</th>
                                        <th>Quote</th>
                                        <th>Author</th>
                                        <th>Year</th>                                                                                                       
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



 <div class="lightbox_bg" style="z-index: 8000;" ></div>
<div class="lightbox_container  col-row-8" style="z-index: 8050; width: 60%; margin-left: 10%; margin-right: 10%; height: auto; padding-bottom: 50px;" >
    <div class="lightbox_close closer"></div>
    <div class="lightbox_content" style="padding-right: 0px; width: 90%;">

        <h2 class="dtitle">New Quote</h2>
        <div class="form_quote">
        <form class="form add" id="quote_form" data-id="" novalidate >

             <div class="input_container form-group">
                <label for="quote">Quote: <span class="required">*</span></label>
                <div class="field_container form-control" style="height: auto; padding: 5;">
                 <textarea class="form-group" id="quote" required name="quote" cols="4" style="width: 100%">
                                
                </textarea>
            </div>
            </div>
             <div class="input_container form-group">
                <label for="quote_author">By: <span class="required">*</span></label>
                 
                <div class="form-control" style="display: inline-block; width: 49%;">
                    <select type="text" name="quote_author" id="quote_author" value="" style="width: 100%;" required>
                    </select>
                </div>
            </div>
            <div class="pull-right submitbtn">
                <button type="submit" class="btn btn-success btn-lg">Add Quote</button>
            </div>
        </form>
        </div>
    </div>
</div>

<?php include './admin_includes/loader.php'; ?>

<?php include './admin_includes/admin_footer.php'; ?>