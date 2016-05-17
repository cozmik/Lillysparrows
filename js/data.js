$(document).ready(function () {

    tinymce.init({
  selector: 'textarea.storyPost',
  browser_spellcheck: true,
  height: 400,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
});

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
    
    ///////////////////////////////Dashbard functions////////////////////////////////////////////////////////////////////////////
    var dbFunction = function() {
        var request = $.ajax({
            url: '../includes/functions.php?job=dashboard_counts',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
            if (output.result === 'success') {
                $('#dbpost_number').text(output.data[0].nPosts);
                $('#dbcategories').text(output.data[0].nCategories);
                $('#dbstory_episodes').text(output.data[0].nStories);
                $('#dbsubscribers').text(output.data[0].nSubscribers);
                $('#dbquotes').text(output.data[0].nQuotes);
                $('#dbAdmins').text(output.data[0].nAdmin);
                $('#dbstory_titles').text(output.data[0].nTitles);

            } else {
                show_message('Information request failed', 'error');
            }

        });
}

dbFunction();
    
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
            {"data": "comments"},
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


    //Quote author view
    // On page load: datatable
    var quote_author_table = $('#author_table').dataTable({
        "ajax": "../includes/functions.php?job=view_authors",
        "columns": [
            {"data": "id"},
            {"data": "author" },
            {"data": "year" },
            {"data": "total_quotes" },
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

    // Edit admin button
    $(document).on('click', '.function_edit a', function (e) {
        e.preventDefault();
        // Get sdmin information from database
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


    ///////////////////////populate category pages///////////////////////////////////////////////////////
 $(document).on('click', '.dcategory', function (e) {
        e.preventDefault();
        // Get blog category information from database
        var id = $(this).data('id');
        var request = $.ajax({
            url: '../includes/functions.php?job=blog_view_cat',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
               
                console.log(id);
            } else {
                
                console.log('Information request failed', 'error');
            }
        });
        request.fail(function (jqXHR, textStatus) {
            console.log('error');
        });

    });


    // Edit admin submit form
    $(document).on('submit', '#admin_form.edit', function (e) {
        e.preventDefault();
        // Send admin information to database
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
                    var admin = $('#username').val();
                    show_message("Admin '" + admin + "' edited successfully.", 'success');
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
    
////////////////////////////////////////Quotes functions////////////////////////////////////////////////////////////////////////
$(document).on('click', '#add_quote', function(e){
    e.preventDefault();

    var request = $.ajax({
            url: '../includes/functions.php?job=quote_authors',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
           $('#quote_form #quote_author').empty().append('<option></option>');
            if (output.result === 'success') {
                 var n = output.data[0].i;
            for (var i = 0; i < n; i++) {
                $('#quote_form #quote_author').append(output.data[i].name);
                }
            } else {
                show_message('Information request failed', 'error');
            }

        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        });
    $('.lightbox_content h2').text('Add Quote');
    $('#quote_form button[type = submit]').text('Add Quote');
    $('#quote_form').attr('class', 'form add');
    $('#quote_form').attr('data-id', '');
    $('#quote_form .field_container label.error').hide();
    $('#quote_form .field_container').removeClass('valid').removeClass('error');
    $('#quote_form #quote').val('');
    $('#quote_form #quote_author').val('');


    $('#new_author button[type = submit]').text('Add author');
    $('#new_author').attr('class', 'form add');
    $('#new_author').attr('data-id', '');
    $('#new_author .field_container label.error').hide();
    $('#new_author .field_container').removeClass('valid').removeClass('error');
    $('#new_author #name').val('');
    $('#new_author #year').val('');
    show_lightbox();
  });
    
        // Add quote submit form
    $(document).on('submit', '#quote_form.add', function (e) {
        e.preventDefault();
        // Send title information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var form_data = $('#quote_form').serialize();
        var request = $.ajax({
            url: '../includes/functions.php?job=add_quote',
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                // Reload datable
                quote_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var author = $("#quote_author option:selected").text();
                    show_message("Quote by " + author + " added successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Add request failed', 'error');
            }
        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Add request failed: ' + textStatus, 'error');
        });
    });


  // Add author submit form
    $(document).on('submit', '#author_form.add', function (e) {
        e.preventDefault();
        // Send title information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var form_data = $('#author_form').serialize();
        var request = $.ajax({
            url: '../includes/functions.php?job=add_author',
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                // Reload datable
                var author = $('#author').val();
                quote_author_table.api().ajax.reload(function () {
                    hide_loading_message();
                    show_message(author + " added successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Add request failed', 'error');
            }
        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Add request failed: ' + author, 'error');
        });
    });

 $(document).on('click', '.function_delete_author', function (e) {
        e.preventDefault();
        var author = $(this).data('name');
        if (confirm("Are you sure you want to delete '" + author + "'?")) {
            show_loading_message();
            var id = $(this).data('id');
            var request = $.ajax({
                url: '../includes/functions.php?job=delete_author&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    quote_author_table.api().ajax.reload(function () {
                        hide_loading_message();
                        show_message(author + " deleted successfully.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete: ' + textStatus, 'error');
            });
        }

    });

 $(document).on('click', '.function_edit_author', function (e) {
        e.preventDefault();
        // Get title information from database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $(this).data('id');
        var $pix = "";
        $('.postPix').prop('disabled', false);
        var request = $.ajax({
            url: '../includes/functions.php?job=get_author',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
            if (output.result === 'success') {
                $('.lightbox_content h2').text('Edit Quote Author');
                $('#author_form button').text('update');
                $('#author_form').attr('class', 'form edit');
                $('#author_form').attr('data-id', id);
                $('#author_form .field_container label.error').hide();
                $('#author_form .field_container').removeClass('valid').removeClass('error');
                $('#author_form #author').val(output.data[0].author);
                $('#author_form #year').val(output.data[0].year);

                hide_loading_message();
                show_lightbox();
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



  $(document).on('submit', '#author_form.edit', function (e) {
        e.preventDefault();
        // Send author information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $('#author_form').attr('data-id');
        var form_data = $('#author_form').serialize();
        var request = $.ajax({
            url: '../includes/functions.php?job=edit_author&id=' + id,
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request.done(function (output) {
            if (output.result === 'success') {
                // Reload datable
                quote_author_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var author = $('#author').val();
                    show_message("'" + author + "' edited successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Edit request1 failed', 'error');
            }
        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Edit request failed: ' + textStatus, 'error');
        });
    });



//delete quote
    $(document).on('click', '.function_delete_quote', function (e) {
        e.preventDefault();
        var title = $(this).data('name');
        if (confirm("Are you sure you want to delete a '" + title + "' quote?")) {
            show_loading_message();
            var id = $(this).data('id');
            console.log(id);
            var request = $.ajax({
                url: '../includes/functions.php?job=delete_quote&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    quote_table.api().ajax.reload(function () {
                        hide_loading_message();
                        show_message("A quote by " + title + " deleted successfully.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete: ' + textStatus, 'error');
            });
        }

    });

 // Edit quote button
    $(document).on('click', '.function_edit_quote', function (e) {
        e.preventDefault();
        // Get quote information from database

        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $(this).data('id');
        
        var request = $.ajax({
            url: '../includes/functions.php?job=quote_authors',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
           $('#quote_form #quote_author').empty().append('<option>Choose title</option>');
            if (output.result === 'success') {
            var request2 = $.ajax({
            url: '../includes/functions.php?job=get_quote',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
                 var n = output.data[0].i;
            for (var i = 0; i < n; i++) {
                $('#quote_form #quote_author').append(output.data[i].name);
                }
                request2.done(function (output2) {

                if (output2.result === 'success') {
                $('.lightbox_content h2').text('Edit quote');
                $('#quote_form button[type="submit"]').text('update');
                $('#quote_form button[type="button"]').addClass('disabled');
                $('#quote_form').attr('class', 'form edit');
                $('#quote_form').attr('data-id', id);
                $('#quote_form .field_container label.error').hide();
                $('#quote_form .field_container').removeClass('valid').removeClass('error');
                $('#quote_form #quote_author').val(output2.data[0].author);
                $('#quote_form #quote').val(output2.data[0].quote);
                
                hide_loading_message();
                show_lightbox();
            } else {
                hide_loading_message();
                show_message('Information request failed', 'error');
            }
        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        });

        } else {
                show_message('Information request failed', 'error');
            }

        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        });

    });

    // Edit quote submit form
    $(document).on('submit', '#quote_form.edit', function (e) {
        e.preventDefault();
        // Send quote information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $('#quote_form').attr('data-id');
        var form_data = $('#quote_form').serialize();
        var request = $.ajax({
            url: '../includes/functions.php?job=edit_quote&id=' + id,
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
           if (output.result === 'success') {
                // Reload datable
                quote_table.api().ajax.reload(function () {
                    hide_loading_message();
                    show_message("Quote edited successfully.", 'success');
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



////////////////////////////////////////////Title Functions/////////////////////////////////////////////////////////////////////
    // Add title button
  $(document).on('click', '#add_title', function(e){
    e.preventDefault();
    $('.lightbox_content h2').text('Add title');
    $('#title_form button').text('Add title');
    $('#title_form').attr('class', 'form add');
    $('#title_form').attr('data-id', '');
    $('#title_form .field_container label.error').hide();
    $('#title_form .field_container').removeClass('valid').removeClass('error');
    $('#title_form #title').val('');
    show_lightbox();
  });
    
        // Add title submit form
    $(document).on('submit', '#title_form.add', function (e) {
        e.preventDefault();
        // Send title information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();

        var form_data = new FormData($('#postPix')[0]);
        form_data.append('file', form_data);
        var request = $.ajax({
            url: '../includes/upload2.php',
            cache: false,
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post'
        });

        request.done(function (output) {

            if(output.result === "success") {
                
        var image = output.file_path;
        var form_data = $('#title_form').serialize();
            form_data += '&image=' + image;
        var request2 = $.ajax({
            url: '../includes/functions.php?job=add_title',
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request2.done(function (output2) {
            if (output2.result === 'success') {
                // Reload datable
                story_title_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var title = $('#title').val();
                    show_message(title + " added successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Edit request failed', 'error');
            }
        });
    } else if(output.result === "failed" && output.message === "No picture selected.") {
        var image = output.file_path;
        if (confirm(output.message + " Continue without uploading picture")){
                            
            var form_data = $('#title_form').serialize();
            form_data += '&image=' + image;
        var request2 = $.ajax({
            url: '../includes/functions.php?job=add_title',
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request2.done(function (output2) {
            if (output2.result === 'success') {
                // Reload datable
                story_title_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var title = $('#title').val();
                    show_message(title + " added successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Edit request failed', 'error');
                }
                    });
            } else {
                hide_loading_message();
                show_message('Title add cancelled', 'error');
        }
    }else {
                hide_loading_message();
                show_message('Add request failed: ' + output.message, 'error'); 
                    }
            });
                request.fail(function (jqXHR, textStatus) {
                    hide_loading_message();
                    show_message('Add request failed: ' + output.message, 'error');
                    
                });
            

        });

    
 /////////////////////////////////////////////////delete title////////////////////////////////////////////////////
    $(document).on('click', '.function_delete_title', function (e) {
        e.preventDefault();
        var title = $(this).data('name');
        if (confirm("Are you sure you want to delete '" + title + "'?")) {
            show_loading_message();
            var id = $(this).data('id');
            var request = $.ajax({
                url: '../includes/functions.php?job=delete_title&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    story_title_table.api().ajax.reload(function () {
                        hide_loading_message();
                        show_message(title + " deleted successfully.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete: ' + textStatus, 'error');
            });
        }

    });



    // Edit title button
     $(document).on('click', '.function_edit_title', function (e) {
        e.preventDefault();
        // Get title information from database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $(this).data('id');
        var $pix = "";
        $('.postPix').prop('disabled', false);
        var request = $.ajax({
            url: '../includes/functions.php?job=get_title',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
            if (output.result === 'success') {
                $('.lightbox_content h2').text('Edit story title');
                $('#title_form button').text('update');
                $('#title_form').attr('class', 'form edit');
                $pix = output.data[0].image;
                $('#title_form').attr('data-image', $pix);
                $('#title_form').attr('data-id', id);
                $('#title_form .field_container label.error').hide();
                $('#title_form .field_container').removeClass('valid').removeClass('error');
                $('#title_form #title').val(output.data[0].title);

                if(output.data[0].image != '') {
                $('.postPix').prop('disabled', true);
                }

                hide_loading_message();
                show_lightbox();
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

// Edit title submit form
    $(document).on('submit', '#title_form.edit', function (e) {
        e.preventDefault();
        // Send quote information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();

        var id = $(this).data('id');
        var $image = $(this).data('image');

        if($('.postPix').prop('disabled') == false) {

        var form_data = new FormData($('#postPix')[0]);
        form_data.append('file', form_data);
        var request = $.ajax({
            url: '../includes/upload2.php',
            cache: false,
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post'
        });

        request.done(function (output) {

            if(output.result === "success") {
                
        var image = output.file_path;
        var form_data = $('#title_form').serialize();
            form_data += '&image=' + image;
        var request2 = $.ajax({
            url: '../includes/functions.php?job=edit_title&id=' + id,
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request2.done(function (output2) {
            if (output2.result === 'success') {
                // Reload datable
                story_title_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var title = $('#title').val();
                    show_message("Story '"+title + "' edited successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Edit request failed', 'error');
            }
        });
    } else if(output.result === "failed" && output.message === "No picture selected.") {
        var image2 = output.file_path;
        if (confirm(output.message + " Continue without uploading picture")){
                            
            var form_data = $('#title_form').serialize();
            form_data += '&image=' + image2;
        var request2 = $.ajax({
            url: '../includes/functions.php?job=edit_title&id=' + id,
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request2.done(function (output2) {
            if (output2.result === 'success') {
                // Reload datable
                story_title_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var title = $('#title').val();
                    show_message("Story '" + title + "' edited successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Edit request failed', 'error');
                }
                    });
            } else {
                hide_loading_message();
                show_message('Title edit cancelled', 'error');
        }
    } else {
                hide_loading_message();
                show_message('Edit request failed: ' + output.message, 'error'); 
                    }
            });
                request.fail(function (jqXHR, textStatus) {
                    hide_loading_message();
                    show_message('Edit request failed: ' + output.message, 'error');
                    
                });
            
} else {

        var image = $image;
        var form_data = $('#title_form').serialize();
            form_data += '&image=' + image;
        var request2 = $.ajax({
            url: '../includes/functions.php?job=edit_title&id=' + id,
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request2.done(function (output2) {
            if (output2.result === 'success') {
                // Reload datable
                story_title_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var title = $('#title').val();
                    show_message("Story '" +title + "' edited successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Edit request failed', 'error');
            }
        });
    }
});

//////////////////////////////////////// End of Title Functions ///////////////////////////////////////////////





////////////////////////////////////////Other Story functions/////////////////////////////////////////////////////
$(document).on('click', '#add_story', function(e){
    e.preventDefault();

    var request = $.ajax({
            url: '../includes/functions.php?job=story_titles',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
           $('#story_form #select_title').empty().append('<option>Choose title</option>');
            if (output.result === 'success') {
                 var n = output.data[0].i;
            for (var i = 0; i < n; i++) {
                $('#story_form #select_title').append(output.data[i].name);
                }
            } else {
                show_message('Information request failed', 'error');
            }

        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        })
    $('#story_form button.storySub').text('Add story');
    $('#story_form').attr('class', 'form add');
    $('#story_form').attr('data-id', '');
    $('#story_form #story_title').val('');
    $('#story_form #story_body').val('');
  });


var value = null;

$('button#submit').click(function(){
    if($(this).hasClass('submit')) {
        value = 1;
    } else if($(this).hasClass('draft')) {
        value = 0;
    };
});
//////////////////////////////////////////////////////edit story////////////////////////////////////////////////

$(document).on('click', '.function_edit_story', function(e){
    e.preventDefault();

        // Get title information from database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $(this).data('id');

    var request = $.ajax({
            url: '../includes/functions.php?job=story_titles',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
           $('#story_form #select_title').empty().append('<option>Choose title</option>');
            if (output.result === 'success') {

            var request2 = $.ajax({
            url: '../includes/functions.php?job=get_story',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

                 var n = output.data[0].i;
            for (var i = 0; i < n; i++) {
                $('#story_form #select_title').append(output.data[i].name);
                }

                request2.done(function(output2) {
                if(output2.result === 'success') {
                    if($admin_level === '2') {
                        $('#story_form button.storySub').text('publish story').attr('disabled', 'disabled');
                    }
                $('#story_form').attr('class', 'form edit');
                $('#story_form').attr('data-id', id); 
                $('#story_form #select_title').val(output2.data[0].titleID);
                $('#story_form #episode_title').val(output2.data[0].episodeTitle);
                tinyMCE.activeEditor.setContent(output2.data[0].story);

                $('.form_story').slideDown();
                $('.function_edit_post').addClass('disabled');
                $('.function_delete_post').addClass('disabled');
                $('#add_post').addClass('disabled');

                    hide_loading_message();
                 } else {
                    hide_loading_message();
                    console.log('Edit request failed');
                    show_message('Edit error: ' + textStatus, 'error');
                 }
            
            });

            } else {
                show_message('Information request failed', 'error');
            }

        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');

        });
    
  });
////////////////////////////////////////////////story edit submit///////////////////////////////////////////////
$(document).on('submit', '#story_form.edit', function (event) {

        event.preventDefault();
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();

        var id = $(this).data('id');
        var status = value;

            var form_data = $('#story_form').serialize();
                form_data += '&status=' + status;
                var request = $.ajax({
                url: '../includes/functions.php?job=edit_story&id=' + id,
                 cache: false,
                 data: form_data,
                 dataType: 'json',
                 contentType: 'application/json; charset=utf-8',
                 type: 'GET'
             });

                    request.done(function (output) {
                        if (output.result === 'success') {
                          //Reload datable
                          story_table.api().ajax.reload(function () {
                                hide_loading_message();
                                show_message("Story edited successfully.", 'success');

                                $('.form_story').slideUp();
                                $('.edit_btn').removeClass('disabled');
                                $('.delete_btn').removeClass('disabled');
                                $('.add_btn').removeClass('disabled');

                                $('#post_form').attr('data-id', '');
                                $('#post_form #post_title').val('');
                                $('#post_form #post_body').val('');
                                $('#post_form #postPix').val('');
                         }, true);
                    } else{
                        hide_loading_message();
                        show_message("Error editing story", 'error');
                    }

                });
            
        });


/////////////////////////////////////////////////////submit story///////////////////////////////////////////////
$(document).on('submit', '#story_form.add', function (event) {

            event.preventDefault();
                hide_ipad_keyboard();
                hide_lightbox();
                show_loading_message();

                var status = value;

                    var form_data = $('#story_form').serialize();
                        form_data += '&status=' + status;
                        var request = $.ajax({
                        url: '../includes/functions.php?job=add_story',
                        cache: false,
                        data: form_data,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        type: 'GET'
                    });

                    request.done(function (output) {
                        if (output.result === 'success') {
                         // Reload datable
                          story_table.api().ajax.reload(function () {
                                hide_loading_message();
                                show_message("Story added successfully.", 'success');

                                $('#story_form').slideUp();
                               $('.edit_btn').removeClass('disabled');
                               $('.delete_btn').removeClass('disabled');
                                $('.add_btn').removeClass('disabled');

                                $('#story_form').attr('data-id', '');
                                $('#story_form #story_title').val('');
                                $('#story_form #story_body').val('');
                         }, true);
                    } else{
                        hide_loading_message();
                        show_message("Error adding post ", 'error');
                    }

                })
        })

//////////////////////////////////////////////delete story//////////////////////////////////////////////////
    $(document).on('click', '.function_delete_story', function (e) {
        e.preventDefault();
        var title = $(this).data('name');
        if (confirm("Are you sure you want to delete '" + title + "'?")) {
            show_loading_message();
            var id = $(this).data('id');
            var request = $.ajax({
                url: '../includes/functions.php?job=delete_story&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    story_table.api().ajax.reload(function () {
                        hide_loading_message();
                        show_message("Episode " + title + " deleted successfully.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete: ' + textStatus, 'error');
            });
        }

    });
////////////////////////////////////////End of story functions////////////////////////////////////////////////////







/////////////////////////////////////////Other post functions/////////////////////////////////////////////////////
$(document).on('click', '#add_post', function(e){
    e.preventDefault();

    var request = $.ajax({
            url: '../includes/functions.php?job=get_categories',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
           $('#post_form #select_category').empty().append('<option>Choose Category</option>');
            if (output.result === 'success') {
                 var n = output.data[0].i;
            for (var i = 0; i < n; i++) {
                $('#post_form #select_category').append(output.data[i].name);
                }
            } else {
                show_message('Information request failed', 'error');
            }

        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        });
    $('#post_form button.storySub').text('publish story');
    $('#post_form').attr('class', 'form add');
    $('#post_form').attr('data-id', '');
    $('#post_form #post_title').val('');
    $('#post_form #post_body').val('');
    tinyMCE.activeEditor.setContent('');
    $('#post_form #postPix').val('');
  });

////////////////////////////////upload pix plus post//////////////////////////////////////////////////////////////////////
///


$(document).on('submit', '#post_form.add', function (event) {

        event.preventDefault();

        var curDate = mDate();

        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();

        var form_data = new FormData($('#postPix')[0]);
        form_data.append('file', form_data);
        var request = $.ajax({
            url: '../includes/upload.php',
            cache: false,
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post'
        });

        request.done(function (output) {

                if(output.result === "success") {
                     var image = output.file_path;
                     var status = value;

                    var form_data = $('#post_form').serialize();
                        form_data += '&date=' +curDate + '&status=' + status + '&image=' + image;
                        var request2 = $.ajax({
                        url: '../includes/functions.php?job=add_post',
                        cache: false,
                        data: form_data,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        type: 'GET'
                    });

                    request2.done(function (output2) {
                        if (output2.result === 'success') {
                         // Reload datable
                          post_table.api().ajax.reload(function () {
                                hide_loading_message();

                                $('.form_story').slideUp();
                                $('.edit_btn').removeClass('disabled');
                                $('.delete_btn').removeClass('disabled');
                                $('.add_btn').removeClass('disabled');

                                $('#post_form').attr('data-id', '');
                                $('#post_form #post_title').val('');
                                $('#post_form #post_body').val('');
                                tinyMCE.activeEditor.setContent('');
                                $('#post_form #postPix').val('');
                                show_message("New post added successfully.", 'success');
                         }, true);
                    } else{
                        hide_loading_message();
                        show_message("Error adding post " + output2.result, 'error');
                    }

                })

                    } else if(output.result === "failed" && output.message === "No picture selected.") {
                        var image = output.file_path;
                        var status = value;
                        if (confirm(output.message + " Continue without uploading picture")){
                            
                        var form_data = $('#post_form').serialize();
                        form_data += '&date=' +curDate + '&status=' + status + '&image=' + image;
                        var request2 = $.ajax({
                        url: '../includes/functions.php?job=add_post',
                        cache: false,
                        data: form_data,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        type: 'GET'
                    });

                    request2.done(function (output2) {
                        if (output2.result === 'success') {
                         // Reload datable
                         post_table.api().ajax.reload(function () {
                               hide_loading_message();

                               $('.form_story').slideUp();
                               $('.edit_btn').removeClass('disabled');
                               $('.delete_btn').removeClass('disabled');
                               $('.add_btn').removeClass('disabled');

                                $('#post_form').attr('data-id', '');
                                $('#post_form #post_title').val('');
                                $('#post_form #post_body').val('');
                                $('#post_form #postPix').val('');
                                tinyMCE.activeEditor.setContent('');

                                show_message("Post added successfully.", 'success');
                         }, true);
                    }
        
                    else{
                        hide_loading_message();
                        show_message("Error adding post " + output2.result, 'error');
                    }

                        })

                        } else {

                            hide_loading_message();
                            show_message("Post upload cancelled", 'error');
                       }
                    } else {
                        hide_loading_message();
                        show_message('Add request failed: ' + output.message, 'error'); 
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    hide_loading_message();
                    show_message('Add request failed: ' + output.message, 'error');
                    
                });
            

        });

//////////////////////////////////delete post//////////////////////////////////////////////////////////////////////
    $(document).on('click', '.function_delete_post', function (e) {
        e.preventDefault();
        var title = $(this).data('name');
        if (confirm("Are you sure you want to delete '" + title + "'?")) {
            show_loading_message();
            var id = $(this).data('id');
            var request = $.ajax({
                url: '../includes/functions.php?job=delete_post&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    post_table.api().ajax.reload(function () {
                        hide_loading_message();
                        show_message("Post " + title + " deleted successfully.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete: ' + textStatus, 'error');
            });
        }

    });
/////////////////////////////////////////////Edit Post/////////////////////////////////////////////////////////////
$(document).on('click', '.function_edit_post', function(e){
    e.preventDefault();

        // Get title information from database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $(this).data('id');
        var $pix = " ";
        $('.postPix').prop('disabled', false);

    var request = $.ajax({
            url: '../includes/functions.php?job=get_categories',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
           $('#post_form #select_category').empty().append('<option>Choose Category</option>');
            if (output.result === 'success') {

            var request2 = $.ajax({
            url: '../includes/functions.php?job=get_post',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
                 var n = output.data[0].i;
            for (var i = 0; i < n; i++) {
                $('#post_form #select_category').append(output.data[i].name);
                }

                request2.done(function(output2) {
                if(output2.result === 'success') {
                $('#post_form button.storySub').text('publish story');
                $('#post_form').attr('class', 'form edit');
                $('#post_form').attr('data-id', id);
                $pix = output2.data[0].image;
                $('#post_form').attr('data-image', $pix); 
                $('#post_form #select_category').val(output2.data[0].categoryID);
                $('#post_form #post_title').val(output2.data[0].postTitle);
                tinyMCE.activeEditor.setContent(output2.data[0].post);
                 

                if(output2.data[0].image != ' ') {
                $('.postPix').prop('disabled', true);
                }


                $('.form_story').slideDown();
                $('.function_edit_post').addClass('disabled');
                $('.function_delete_post').addClass('disabled');
                $('#add_post').addClass('disabled');

                    hide_loading_message();
                 } else {
                    hide_loading_message();
                    console.log('Edit request failed');
                    show_message('Edit error: ' + textStatus, 'error');
                 }
            
            });

            } else {
                show_message('Information request failed', 'error');
            }

        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');

        })
    
  });

///////////////////////////////////////////////edit post form///////////////////////////////////////////////////
$(document).on('submit', '#post_form.edit', function (event) {

        event.preventDefault();

        var d = new Date();

        var month = d.getMonth() + 1;

        var day = d.getDate();

        var curDate = d.getFullYear() + '-' + (month <10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();

        var id = $(this).data('id');
        var $image = $(this).data('image');

        if($('.postPix').prop('disabled') == false) {

        var form_data = new FormData($('#postPix')[0]);
        form_data.append('file', form_data);
        var request = $.ajax({
            url: '../includes/upload.php',
            cache: false,
            data: form_data,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post'
        });

        request.done(function (output) {

                if(output.result === "success") {
                     var image = output.file_path;
                     var status = value;

                    var form_data = $('#post_form').serialize();
                        form_data += '&date=' +curDate + '&status=' + status + '&image=' + image;
                        var request2 = $.ajax({
                        url: '../includes/functions.php?job=edit_post&id=' + id,
                        cache: false,
                        data: form_data,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        type: 'GET'
                    });

                    request2.done(function (output2) {
                        if (output2.result === 'success') {
                         // Reload datable
                          post_table.api().ajax.reload(function () {
                                hide_loading_message();

                                $('.form_story').slideUp();
                                $('.edit_btn').removeClass('disabled');
                                $('.delete_btn').removeClass('disabled');
                                $('.add_btn').removeClass('disabled');

                                $('#post_form').attr('data-id', '');
                                $('#post_form #post_title').val('');
                                $('#post_form #post_body').val('');
                                tinyMCE.activeEditor.setContent('');
                                $('#post_form #postPix').val('');
                                show_message("Post edited successfully.", 'success');
                         }, true);
                    } else{
                        hide_loading_message();
                        show_message("Error adding post " + output2.result, 'error');
                    }

                });

                    } else if(output.result === "failed" && output.message === "No picture selected.") {
                        var image = output.file_path;
                        var status = value;
                        if (confirm(output.message + " Continue without uploading picture")){
                            
                        var form_data = $('#post_form').serialize();
                        form_data += '&date=' +curDate + '&status=' + status + '&image=' + image;
                        var request2 = $.ajax({
                        url: '../includes/functions.php?job=edit_post&id=' + id,
                        cache: false,
                        data: form_data,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        type: 'GET'
                    });

                    request2.done(function (output2) {
                        if (output2.result === 'success') {
                         // Reload datable
                         post_table.api().ajax.reload(function () {
                               hide_loading_message();

                               $('.form_story').slideUp();
                                $('.edit_btn').removeClass('disabled');
                                $('.delete_btn').removeClass('disabled');
                                $('.add_btn').removeClass('disabled');

                                $('#post_form').attr('data-id', '');
                                $('#post_form #post_title').val('');
                                $('#post_form #post_body').val('');
                                tinyMCE.activeEditor.setContent('');
                                $('#post_form #postPix').val('');

                                show_message("Post edited successfully.", 'success');
                         }, true);
                    }
        
                    else{
                        hide_loading_message();
                        show_message("Error adding post " + output2.result, 'error');
                    }

                        });

                        } else {

                            hide_loading_message();
                            show_message("Post upload cancelled", 'error');
                       }
                    } else {
                        hide_loading_message();
                        show_message('Edit request failed: ' + output.message, 'error'); 
                    }
                });
                request.fail(function (jqXHR, textStatus) {
                    hide_loading_message();
                    show_message('Edit request failed: ' + output.message, 'error');
                    
                });

            } else {
                     var image = $image;
                     var status = value;

                    var form_data = $('#post_form').serialize();
                        form_data += '&date=' +curDate + '&status=' + status + '&image=' + image;
                        var request2 = $.ajax({
                        url: '../includes/functions.php?job=edit_post&id=' + id,
                        cache: false,
                        data: form_data,
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        type: 'GET'
                    });

                    request2.done(function (output2) {
                        if (output2.result === 'success') {
                         // Reload datable
                          post_table.api().ajax.reload(function () {
                                hide_loading_message();
                                show_message("Post edited successfully.", 'success');

                                $('.form_story').slideUp();
                                $('.edit_btn').removeClass('disabled');
                                $('.delete_btn').removeClass('disabled');
                                $('.add_btn').removeClass('disabled');

                                $('#post_form').attr('data-id', '');
                                $('#post_form #post_title').val('');
                                $('#post_form #post_body').val('');
                                tinyMCE.activeEditor.setContent('');
                                $('#post_form #postPix').val('');
                         }, true);
                    } else{
                        hide_loading_message();
                        show_message("Error edited post " + output2.result, 'error');
                    }

                })
            } 
        });


//////////////////////////////////////////Other Category functions////////////////////////////////////////////////
//Add category button click
$(document).on('click', '#add_category', function(e){
    e.preventDefault();
    $('.lightbox_content h2').text('Add category');
    $('#category_form button').text('Add category');
    $('#category_form').attr('class', 'form add');
    $('#category_form input').val('');
    $('#category_form').attr('data-id', '');
    $('#category_form .field_container label.error').hide();
    $('#category_form .field_container').removeClass('valid').removeClass('error');
    $('#category_form #title').val('');
    show_lightbox();
  });
    
        // Add category submit form
    $(document).on('submit', '#category_form.add', function (e) {
        e.preventDefault();
        // Send title information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var form_data = $('#category_form').serialize();
        var request = $.ajax({
            url: '../includes/functions.php?job=add_category',
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                // Reload datable
                category_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var title = $('#category').val();
                    show_message(title + " added successfully.", 'success');
                }, true);
            } else {
                hide_loading_message();
                show_message('Add request failed', 'error');
            }
        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Add request failed: ' + textStatus, 'error');
        });
    });


 // Edit category button
     $(document).on('click', '.function_edit_category', function (e) {
        e.preventDefault();
        // Get title information from database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $(this).data('id');
        var request = $.ajax({
            url: '../includes/functions.php?job=get_category',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
         request.done(function (output) {
            if (output.result === 'success') {
                $('.lightbox_content h2').text('Edit category name');
                $('#category_form button').text('update');
                $('#category_form').attr('class', 'form edit');
                $('#category_form').attr('data-id', id);
                $('#category_form .field_container label.error').hide();
                $('#category_form .field_container').removeClass('valid').removeClass('error');
                $('#category_form #category').val(output.data[0].category);
                hide_loading_message();
                show_lightbox();
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

// Edit category submit form
    $(document).on('submit', '#category_form.edit', function (e) {
        e.preventDefault();
        // Send category information to database
        hide_ipad_keyboard();
        hide_lightbox();
        show_loading_message();
        var id = $('#category_form').attr('data-id');
        var form_data = $('#category_form').serialize();
        var request = $.ajax({
            url: '../includes/functions.php?job=edit_category&id=' + id,
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                // Reload datable
                category_table.api().ajax.reload(function () {
                    hide_loading_message();
                    var category_name= $('#category').val();
                    show_message("Category name '" + category_name + "' edited successfully.", 'success');
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




  //delete category
    $(document).on('click', '.function_delete_category', function (e) {
        e.preventDefault();
        var title = $(this).data('name');
        if (confirm("Are you sure you want to delete '" + title + "'?")) {
            show_loading_message();
            var id = $(this).data('id');
            console.log(id);
            var request = $.ajax({
                url: '../includes/functions.php?job=delete_category&id=' + id,
                cache: false,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                type: 'get'
            });
            request.done(function (output) {
                if (output.result === 'success') {
                    // Reload datable
                    category_table.api().ajax.reload(function () {
                        hide_loading_message();
                        show_message(title + "' deleted successfully.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Delete request failed', 'error');
                }
            });
            request.fail(function (jqXHR, textStatus) {
                hide_loading_message();
                show_message('Delete: ' + textStatus, 'error');
            });
        }

    }); 
/////////////////////////////////////////////////End of Category functions//////////////////////////////////////////////





/////////////////////////////////////////////////Other Admin functions///////////////////////////////////////////////////

    //delete admin
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

    // Activate Admin
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
                        show_message(username + " is now an active admin.", 'success');
                    }, true);
                } else {
                    hide_loading_message();
                    show_message('Activation request failed', 'error');
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
                        show_message(username + " is now suspended.", 'success');
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


    var mDate = function() {

                var d = new Date();

                var month = d.getMonth() + 1;

                var day = d.getDate();

                var curDate = d.getFullYear() + '-' + (month <10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

                return curDate;
            };


// $(document).on('focus', '.tag_input', function(){

//     $(this).keyup(function(event){
//          var key = String.fromCharCode(event.which);
//          var inputs = $('.post_tags').text();
//          if(key === " "){
//             var theText = $('.tag_input').html();
//             if(!$('.tag_input').has('span')) {
//             $(this).html('<div style="display:inline-block" class="label label-info">'+theText+'</div>'+'<span>'+" "+'</span>');
//             placeCaretEnd($('.tag_input').get(0));
//             console.log($(this).find('span'));
            
//         } else {
//             var newtext = theText.split("<span>");
//             $(newtext.last).wrap('<div style="display:inline-block" class="label label-info">');
//             console.log(newtext.last);
//         }
            

//          };
     
//     })
// })

// function placeCaretEnd(el){
//     el.focus();
//     if(typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
//         var range = document.createRange();
//         range.selectNodeContents(el);
//         range.collapse(false);
//         var sel = window.getSelection();
//         sel.removeAllRanges();
//         sel.addRange(range);
//     } else if(typeof document.body.createTextRange != "undefined") {
//         var textRange = document.body.createTextRange();
//         textRange.moveToElementText(el);
//         textRange.collapse(false);
//         textRange.select();
//     }
//}

});