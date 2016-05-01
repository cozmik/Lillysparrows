<?php
include './admin_includes/admin_head.php';
include './admin_includes/menu.php';
?>

<div id="page_container" style="padding-top: 120px">

    <h1>Lillysparrows Admins</h1>

    <table id="mytable" class="datatable table-bordered table-striped adminTable">

        <thead>
        <th>Full Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Privilege Level</th>
        <th>Status</th>
        <th>Functions</th>
        <th>change status</th>
        </thead>
        <tbody>
        </tbody>

    </table>  
</div>


<div class="container" style="z-index: 1000;">
    <div class="row">
        <div class="col-lg-11 tile">
            <div class="panel panel-info">
                <div class="panel-heading"><h5>Admins Level Info</h5></div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

            </div>
        </div>
    </div>
</div>

<div class="lightbox_bg" style="z-index: 8000;"></div>
<div class="lightbox_container  col-row-8" style="z-index: 8050; width: 60%; margin-left: 10%; margin-right: 10%; height: auto; padding-bottom: 50px;" >
    <div class="lightbox_close"></div>
    <div class="lightbox_content">

        <h2>Edit Admin</h2>
        <form class="form add" id="admin_form" data-id="" novalidate>
            <div class="input_container form-group">
                <label for="first_name">First name: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="text" step="1" min="0" class="text" name="first_name" id="first_name" value="" required placeholder="First name">
                </div>
            </div>
            <div class="input_container form-group">
                <label for="last_name">Last name: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="text" class="text" name="last_name" id="last_name" value="" required placeholder="Last name">
                </div>
             
            <div class="input_container form-group hidden">
                <label for="username">Username: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="text" class="text" name="username" id="username" value="" required placeholder="Username">
                </div>
            </div>    
             
            </div>
            <div class="input_container form-group">
                <label for="email">Email: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="email" class="text" name="email" id="email" value="" required placeholder="Email address">
                </div>
            </div>
            
            <div class="input_container form-group hidden">
                <label for="password" class="sr-only">Password: <span class="required">*</span></label>
                <div class="field_container">
                    <input type="password" class="text" name="password" id="password" value="" required placeholder="Password">
                </div>
            </div>
            <div class="input_container form-group">
                <label for="status">Status: <span class="required">*</span></label>
                <div class="field_container">
                    <select type="text" step="1" class="text form-control" name=status id="status">
                        <option value=""></option>
                        <option value="active">Activate</option>
                    </select>
                </div>
            </div>
            <div class="input_container form-group">
                <label for="privilege" >Privilege Level: <span class="required">*</span></label>
                <div class="field_container">
                    <select class="text form-control" name="privilege" id="privilege" required placeholder="privilege">
                        <option value="0">Super admin</option>
                        <option value="1">Blogger </option>
                        <option value="2">Story Teller </option>
                    </select>
                </div>
            </div>
            
            <div class="button_container form-group">
                <button type="submit">Edit admin</button>
            </div>
        </form>

    </div>
</div>
<noscript id="noscript_container">
<div id="noscript" class="error">
    <p>JavaScript support is needed to use this page.</p>
</div>
</noscript>

<div id="message_container">
    <div id="message" class="success">
        <p>This is a success message.</p>
    </div>
</div>

<div id="loading_container">
    <div id="loading_container2">
        <div id="loading_container3">
            <div id="loading_container4">
                Loading, please wait...
            </div>
        </div>
    </div>
</div>


<?php include './admin_includes/admin_footer.php'; ?>