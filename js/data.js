$(document).ready(function () {

    // On page load: datatable
    var admin_table = $('#mytable').dataTable({
        "ajax": "../includes/functions.php?job=get_admins",
        "columns": [
            {"data": "first_name",
                "render": function (data, type, full, meta) {
                    return full.first_name + " " + full.last_name;
                }
            },
            {"data": "username"},
            {"data": "email"},
            {"data": "priviledge"},
            {"data": "status"},
            {"data": "functions"},
            {"data": "function2"}
        ],
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [-1]}
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "oLanguage": {
            "oPaginate": {
                "sFirst": " ",
                "sPrevious": " ",
                "sNext": " ",
                "sLast": " "
            },
            "sLengthMenu": "Records per page: _MENU_",
            "sInfo": "Total of _TOTAL_ records (showing _START_ to _END_)",
            "sInfoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    
   /* $.ajax({
        type: 'GET',
        url: "../includes/functions.php?job=count_posts",
        success: function(post_num) {
           
        
        }
        
    })*/
    
    
    //post view
    // On page load: datatable
    var post_table = $('#post_table').dataTable({
        "ajax": "../includes/functions.php?job=view_posts",
        "columns": [
            {"data": "date"},
            {"data": "author"},
            {"data": "category"},
            {"data": "title"},
            {"data": "post"},
            {"data": "status"},
            {"data": "functions"}
        ],
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [-1]}
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "oLanguage": {
            "oPaginate": {
                "sFirst": " ",
                "sPrevious": " ",
                "sNext": " ",
                "sLast": " "
            },
            "sLengthMenu": "Records per page: _MENU_",
            "sInfo": "Total of _TOTAL_ records (showing _START_ to _END_)",
            "sInfoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    
     //quote view
    // On page load: datatable
    var quote_table = $('#quote_table').dataTable({
        "ajax": "../includes/functions.php?job=view_quotes",
        "columns": [
            {"data": "id"},
            {"data": "quote"},
            {"data": "author"},
            {"data": "year"},
            {"data": "functions"}
        ],
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [-1]}
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "oLanguage": {
            "oPaginate": {
                "sFirst": " ",
                "sPrevious": " ",
                "sNext": " ",
                "sLast": " "
            },
            "sLengthMenu": "Records per page: _MENU_",
            "sInfo": "Total of _TOTAL_ records (showing _START_ to _END_)",
            "sInfoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    
    //Story view
    // On page load: datatable
    var story_table = $('#story_table').dataTable({
        "ajax": "../includes/functions.php?job=view_story",
        "columns": [
            {"data": "id"},
            {"data": "author" },
            {"data": "title" },
            {"data": "episode" },
            {"data": "story" },
            {"data": "functions"}
        ],
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [-1]}
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "oLanguage": {
            "oPaginate": {
                "sFirst": " ",
                "sPrevious": " ",
                "sNext": " ",
                "sLast": " "
            },
            "sLengthMenu": "Records per page: _MENU_",
            "sInfo": "Total of _TOTAL_ records (showing _START_ to _END_)",
            "sInfoFiltered": "(filtered from _MAX_ total records)"
        }
    });

//Story view
    // On page load: datatable
    var story_title_table = $('#title_table').dataTable({
        "ajax": "../includes/functions.php?job=view_titles",
        "columns": [
            {"data": "id"},
            {"data": "author" },
            {"data": "title" },
            {"data": "total_episode" },
            {"data": "functions"}
        ],
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [-1]}
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "oLanguage": {
            "oPaginate": {
                "sFirst": " ",
                "sPrevious": " ",
                "sNext": " ",
                "sLast": " "
            },
            "sLengthMenu": "Records per page: _MENU_",
            "sInfo": "Total of _TOTAL_ records (showing _START_ to _END_)",
            "sInfoFiltered": "(filtered from _MAX_ total records)"
        }
    });
 
    
    //Category view
    // On page load: datatable
    var category_table = $('#category_table').dataTable({
        "ajax": "../includes/functions.php?job=view_categories",
        "columns": [
            {"data": "id"},
            {"data": "category"},
            {"data": "post_number" },
            {"data": "functions"}
        ],
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [-1]}
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "oLanguage": {
            "oPaginate": {
                "sFirst": " ",
                "sPrevious": " ",
                "sNext": " ",
                "sLast": " "
            },
            "sLengthMenu": "Records per page: _MENU_",
            "sInfo": "Total of _TOTAL_ records (showing _START_ to _END_)",
            "sInfoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    
    //Category view
    // On page load: datatable
    var subscribers_table = $('#subscriber_table').dataTable({
        "ajax": "../includes/functions.php?job=view_subscribers",
        "columns": [
            {"data": "id"},
            {"data": "email" },
            {"data": "status" },
            {"data": "functions"}
        ],
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [-1]}
        ],
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "oLanguage": {
            "oPaginate": {
                "sFirst": " ",
                "sPrevious": " ",
                "sNext": " ",
                "sLast": " "
            },
            "sLengthMenu": "Records per page: _MENU_",
            "sInfo": "Total of _TOTAL_ records (showing _START_ to _END_)",
            "sInfoFiltered": "(filtered from _MAX_ total records)"
        }
    });
 
    
     // On page load: form validation

    // Show message
    function show_message(message_text, message_type) {
        $('#message').html('<p>' + message_text + '</p>').attr('class', message_type);
        $('#message_container').show();
        if (typeof timeout_message !== 'undefined') {
            window.clearTimeout(timeout_message);
        }
        timeout_message = setTimeout(function () {
            hide_message();
        }, 8000);
    }
    // Hide message
    function hide_message() {
        $('#message').html('').attr('class', '');
        $('#message_container').hide();
    }

    // Show loading message
    function show_loading_message() {
        $('#loading_container').show();
    }
    // Hide loading message
    function hide_loading_message() {
        $('#loading_container').hide();
    }

    // Show lightbox
    function show_lightbox() {
        $('.lightbox_bg').show();
        $('.lightbox_container').show();
    }
    // Hide lightbox
    function hide_lightbox() {
        $('.lightbox_bg').hide();
        $('.lightbox_container').hide();
    }
    // Lightbox background
    $(document).on('click', '.lightbox_bg', function () {
        hide_lightbox();
    });
    // Lightbox close button
    $(document).on('click', '.lightbox_close', function () {
        hide_lightbox();
    });
    // Escape keyboard key
    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            hide_lightbox();
        }
    });

    // Hide iPad keyboard
    function hide_ipad_keyboard() {
        document.activeElement.blur();
        $('input').blur();
    }

    // Edit company button
    $(document).on('click', '.function_edit a', function (e) {
        e.preventDefault();
        // Get company information from database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $(this).data('id');
        var request = $.ajax({
            url: '../includes/functions.php?job=get_admin',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                $('.lightbox_content h2').text('Update Admin');
                $('#admin_form button').text('update');
                $('#admin_form').attr('class', 'form edit');
                $('#admin_form').attr('data-id', id);
                $('#admin_form .field_container label.error').hide();
                $('#admin_form .field_container').removeClass('valid').removeClass('error');
                $('#admin_form #first_name').val(output.data[0].first_name);
                $('#admin_form #last_name').val(output.data[0].last_name);
                $('#admin_form #username').val(output.data[0].username);
                $('#admin_form #password').val(output.data[0].password);
                $('#admin_form #email').val(output.data[0].email);
                $('#admin_form #privilege').val(output.data[0].priviledge);
                if (output.data[0].status !== 'active') {
                    $('#admin_form #status option').first().val(output.data[0].status).text(output.data[0].status);
                    $('#admin_form #status option').last().val('active').text('activate');
                } else {
                    $('#admin_form #status option').first().val(output.data[0].status).text(output.data[0].status);
                    $('#admin_form #status option').last().val('suspended').text('suspend user');
                }
                hide_loading_message();
                show_lightbox();
                console.log(id);
            } else {
                hide_loading_message();
                show_message('Information request failed', 'error');
            }
        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        });

    });

    // Edit company submit form
    $(document).on('submit', '#admin_form.edit', function (e) {
        e.preventDefault();
        // Send company information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $('#admin_form').attr('data-id');
        var form_data = $('#admin_form').serialize() + '&username=' + $('#admin_form #username').val();
        var request = $.ajax({
            url: '../includes/functions.php?job=edit_admin&id=' + id,
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                // Reload datable
                admin_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var company_name = $('#username').val();
                    show_message("Company '" + company_name + "' edited successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Edit request failed', 'error');
            }
        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Edit request failed: ' + textStatus, 'error');
        });
    });

    //delete job
    $(document).on('click', '.function_delete a', function (e) {
        e.preventDefault();
        var username = $(this).data('name');
        if (confirm("Are you sure you want to delete '" + username + "'?")) {
            show_loading_message();
            var id = $(this).data('id');
            var request = $.ajax({
                url: '../includes/functions.php?job=delete_admin&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    admin_table.api().ajax.reload(function () {
                        hide_loading_message();
                        show_message("Admin '" + username + "' deleted successfully.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete failed: ' + textStatus, 'error');
            });
        }

    });

    // Activate Actmin
    $(document).on('click', '.function_activate', function (e) {
        e.preventDefault();
        var username = $(this).data('name');
        var status = $(this).data('status');
        if(status === 'pending' || status === 'suspended') {
            if (confirm("Are you sure you want to Activate '" + username + "'?")) {
            show_loading_message();
            var id = $(this).data('id');
            var request = $.ajax({
                url: '../includes/functions.php?job=activate_admin&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    admin_table.api().ajax.reload(function () {
                        $('this').removeClass('btn-success').addClass('btn-warning').find('span').text('suspend');
                        $('this').removeClass('function_activate').addClass('function_block');
                        hide_loading_message();
                        var username = $('#username').val();
                        show_message(username + "' is now an active admin.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete failed: ' + textStatus, 'error');
            });
        }
    }
    });
    
    
    //function block/unblock 
    $(document).on('click', '.function_block', function (e) {
        e.preventDefault();
        var username = $(this).data('name');
        var status = $(this).data('status');
        if(status === 'active' ) {
            if (confirm("Are you sure you want to Suspend '" + username + "'?")) {
            show_loading_message();
            var id = $(this).data('id');
            var request = $.ajax({
                url: '../includes/functions.php?job=suspend_admin&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    admin_table.api().ajax.reload(function () {
                        $(this).removeClass('btn-danger').addClass('btn-success').children('span').text('unblock');
                        $(this).removeClass('function_block').addClass('function_activate');
                        hide_loading_message();
                        var username = $('#username').val();
                        show_message(username + "' is now suspended.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete failed: ' + textStatus, 'error');
            });
        }
    }
    });
});