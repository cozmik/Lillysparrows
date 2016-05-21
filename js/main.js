jQuery(function ($) {
    var loadedCat = {};
    var storyLinks = {};
    var loadedPosts = {};

    categoryLinks();
    postLinks();
    storiesLinks();
    $(window).on('hashchange', function () {

        var hashChange = window.location.hash;
        loadPage(hashChange);

        function loadPage(hashChange) {
            $('pageNo').show();
            var story = storyLinks;
            var cats = loadedCat;
            var dPosts = loadedPosts;

            var n = pagerNo(hashChange);
            var splitUrl = hashChange.split('/');
            var newLink = splitUrl[0] + '/' + splitUrl[1];

            if (cats[hashChange] !== undefined) {
                var clicked = cats[hashChange];
                catPost(3, 0, hashChange.substring(2), clicked);
                //paginationButtonInteract(".skipButton", 3, 'active', "categories");
            } else if (dPosts[hashChange] !== undefined) {
                var clicked = dPosts[hashChange];
                singlePost(clicked);
            } else if (story[hashChange] !== undefined) {
                var clicked = story[hashChange];
                storySingle(clicked);
            } else if (cats[newLink] !== undefined) {
                var clicked = cats[newLink];
                catPost(3, (n - 1) * 3, newLink.substring(2), clicked);
                //paginationButtonInteract(".skipButton", 3, 'active', "categories");
            } else if (hashChange === "") {
                mypost(3, 0, "home");
                //paginationButtonInteract(".skipButton",'active');
            } else {
                switch (hashChange) {

                    case '#/home/page' + n:
                        mypost(3, (n - 1) * 3, "home");
                        //paginationButtonInteract(".skipButton", 'active');
                        break;
                    case '#/stories/page' + n:
                        stories(3, (n - 1) * 3, "stories");
                        liCheck();
                        //paginationButtonInteract(".skipButton", 3, 'active', "stories");
                        break;
                    case '#/stories':
                        stories(3, 0, "stories");
                        liCheck();
                        //paginationButtonInteract(".skipButton", 3, 'active', "stories");
                        break;
                    default:
                        mypost(3, 0, "home");
                        //paginationButtonInteract(".skipButton", 3, 'active', "home");
                        break;
                }
                
            }
            
        }

    }).trigger('hashchange');

    $(function () {
        $('#main-slider .carousel').carousel({
            interval: 1000
        });
    });

    function pagerNo(hash) {
        var number = hash.slice(-1);
        return number;
    }

    function categoryLinks() {
        var request = $.ajax({
            url: 'includes/functions.php?job=get_categories',
            cache: false,
            async: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request.done(function (output) {
            var loadedCategories = "";
            if (output.result === 'success') {
                var n = output.data[0].i;
                for (var i = 0; i < n; i++) {
                    var catLink = replaceSpace(output.data[i].category);
                    loadedCategories += '<li id="' + output.data[i].id + '" class="dbcat"><a href="#/' + catLink + '">' + output.data[i].category + '</a></li>';
                }
                $.each($(loadedCategories), function () {
                    loadedCat[$(this).find('a').attr('href')] = $(this).attr('id');
                });
                return loadedCat;
            } else {
                show_message('Information request failed', 'error');
            }
        });
    }

    function postLinks() {
        var request2 = $.ajax({
            url: 'includes/functions.php?job=blog_links',
            cache: false,
            async: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request2.done(function (output) {
            var loadedPost = "";
            if (output.result === 'success') {
                var n = output.data.length;
                for (var i = 0; i < n; i++) {
                    loadedPost += output.data[i].blog_view;
                }
                $.each($(loadedPost), function () {
                    loadedPosts[$(this).find('a').attr('href')] = $(this).data('id');
                });
                return loadedPosts;
            } else {
                show_message('Information request failed', 'error');
            }
        });
    }


    function storiesLinks() {
        var request3 = $.ajax({
            url: 'includes/functions.php?job=story_links',
            cache: false,
            async: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request3.done(function (output) {
            var loadedStory = "";
            if (output.result === 'success') {
                var n = output.data.length;
                for (var i = 0; i < n; i++) {
                    loadedStory += output.data[i].storyTitle;
                }
                $.each($(loadedStory), function () {
                    storyLinks[$(this).find('a').attr('href')] = $(this).data('id');
                });
            } else {
                show_message('Information request failed', 'error');
            }
        });
    }
    //#main-slider

    categories();
    dQuote();
    wCategories();
    postBottom();

/////////////////////////////populate posts//////////////////////////////////////////////////

function hashCheck(hash){
    var url = window.location.href;
    if(url.match('about-us.php') !== null){
        console.log(url.match('about-us.php'));
      window.location.href = 'http://localhost/lillysparrow/lillysparrows/'+hash;  
    } else{
        window.location.hash = hash;
    };
}
    $(document).on('click', '.ajaxd', function (e) {
        e.preventDefault();
        var theHash = $(this).find('a').attr('href');
        hashCheck(theHash);
    });


////////////////////////////////////////////story function engine///////////////////////////////////////////
    function stories(p, off, diff) {
        var request = $.ajax({
            url: 'includes/functions.php?job=front_title&totalRecord=' + p + '&offset=' + off,
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request.done(function (output) {

            if (output.result === 'success') {
                pagination(output, p, diff);

                $('.blog').empty();
                for (var i = 0; i < p; i++) {
                    var blogPosts = output.data[i].storyTitle;
                    $(".blog").append(blogPosts);
                }
            } else {
                console.log('failed');
            }
        });
    }
    $(document).on('click', '.Forward', function (e) {
        e.preventDefault();
        var hashChange = window.location.hash;
        var pagNumber = pagerNo(window.location.hash);
        pagNumber = parseInt(pagNumber);
        var splitUrl = hashChange.split('/');
        var newLink = '/' + splitUrl[0] + '/' + splitUrl[1];

        if (hashChange === "") {
            console.log(newLink);
            window.location.hash = '/home/page2';
        } else if (!pagNumber) {
            window.location.hash = newLink.substring(2) + '/page2';
        } else {
            window.location.hash = newLink.substring(2) + '/page' + (pagNumber + 1);
        }
    });

    $(document).on('click', '.Back', function (e) {
        e.preventDefault();
        var hashChange = window.location.hash;
        var pagNumber = pagerNo(window.location.hash);
        pagNumber = parseInt(pagNumber);
        var splitUrl = hashChange.split('/');
        var newLink = '/' + splitUrl[0] + '/' + splitUrl[1];

        window.location.hash = newLink.substring(2) + '/page' + (pagNumber - 1);
    });

    function mypost(p, off, diff) {
        var request = $.ajax({
            url: 'includes/functions.php?job=blog_view&totalRecord=' + p + '&offset=' + off,
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request.done(function (output) {

            if (output.result === 'success') {

                pagination(output, p, diff);

                $('.blog').empty();
                for (var i = 0; i < p; i++) {
                    var blogPosts = output.data[i].blog_view;
                    $(".blog").append(blogPosts);
                }

            } else {
                console.log('failed');
            }
        });
        request.success(function () {
            liCheck();
        });
    }


    function storySingle(clicked) {
        var id = clicked;
        var request = $.ajax({
            url: 'includes/functions.php?job=view_story_single',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request.done(function (output) {

            if (output.result === 'success') {
                $('.blog').html(output.data[0].singleStory);
                $('.pageNo').empty();
                $('.blog').find('li[data-id='+id+']').addClass('disabled');
            } else {
                console.log('failed');
            }

        });

    }

    //////////////////////////////////////navigate pagination//////////////////////////////////////////////////    
    function pagination(output, p, diff) {
        var n = output.data[0].total;
        var pagNumber = pagerNo(window.location.hash);
        pagNumber = parseInt(pagNumber) - 1;
        var page_no = "";
        var pages = 5;
        if (n / p < pages) {
            if (n % p > 0) {
                page_no = parseInt(n / p) + 1;
            } else {
                page_no = parseInt(n / p);
            }
        } else {
            page_no = parseInt(pages);
        }
        var liNo = 0;

        var pageLi = '<ul class="pagination pagination-lg ' + diff + '">'
                + '<li class="Back skipButton"><a href="previousPage"><i class="icon-angle-left"></a></i></li>';

        for (liNo; liNo < page_no; liNo++) {
            pageLi += '<li data-page="' + liNo + '" class="d_pages skipButton"><a href="#/' + diff + '/page' + (liNo + 1) + '">' + (liNo + 1) + '</a></li>';
        }

        pageLi += '<li class="Forward skipButton"><a href="nextPage"><i class="icon-angle-right"></i></a></li></ul><!--/.pagination-->';

        $('.pageNo').html(pageLi);
        $('.d_pages').removeClass('disabled active');
        if (!pagNumber) {
            $('.skipButton[data-page=0]').addClass('disabled active');
            liCheck();
        } else if (pagNumber !== "") {
            $('.skipButton[data-page=' + pagNumber + ']').addClass('active disabled');
            liCheck();
        }

    }

////////////////////////////////////////////check .active position///////////////////////////////////
    function liCheck() {
        if ($('li.active').next().hasClass('Forward') && $('li.active').prev().hasClass('Back')) {
            $('ul.pagination').hide();
        } else if ($('li.active').prev().hasClass('Back')) {
            $('li.Forward').removeClass('disabled');
            $('li.active').prev().addClass('disabled');
        } else if ($('li.active').next().hasClass('Forward')) {
            $('li.Back').removeClass('disabled');
            $('li.active').next().addClass('disabled');
        } else {
            $('li.Back').removeClass('disabled');
            $('li.Forward').removeClass('disabled');
        }
        ;
    }

/////////////////////////////////populate categories////////////////////////////////////////////
    function categories() {
        var request = $.ajax({
            url: 'includes/functions.php?job=get_categories',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            $('#dCategories').empty();
            if (output.result === 'success') {
                var n = output.data[0].i;
                for (var i = 0; i < n; i++) {
                    var catLink = replaceSpace(output.data[i].category);
                    $('.dCategories').append('<li id="' + output.data[i].id + '" class="dbcat ajaxd"><a href="#/' + catLink + '">' + output.data[i].category + '</a></li>');
                }
            } else {
                show_message('Information request failed', 'error');
            }

        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        });
    }

    function catPost(p, off, diff, clicked) {

        var id = clicked;

        var request = $.ajax({
            url: 'includes/functions.php?job=blog_view_cat&totalRecord=' + p + '&offset=' + off,
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request.done(function (output) {

            if (output.result === 'success') {
                pagination(output, p, diff);

                $('.blog').empty();
                for (var i = 0; i < p; i++) {
                    var blogPosts = output.data[i].blog_view;
                    $(".blog").append(blogPosts);
                }
            }
        });
    }






////////////////////////////////////single post view////////////////////////////////////////////////
    function singlePost(clicked) {
        var id = clicked;
        var request = $.ajax({
            url: 'includes/functions.php?job=single_blog',
            cache: false,
            data: 'id=' + id,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                request.done(function (output) {
                    if (output.result === 'success') {
                        var single_blog = output.data[0].single_blog;
                        $('.blog').html(single_blog);
                        $('.pageNo').empty();
                    } else {
                        console.log('Failed');
                    }
                });
            }
        });
    }

////////////////////////////subscribe form////////////////////////////////////////////////////////////////
// Add author submit form
    $(document).on('submit', '#subscribe_form', function (e) {
        e.preventDefault();
        // Send title information to database
        var form_data = $('#subscribe_form').serialize();
        var request = $.ajax({
            url: 'includes/functions.php?job=subscribe',
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                // Use SweetAlert to alert the subscriber///////////////////////////////////
                
                $('.subForm').val('');
                sweetAlert({
                    title: "Thanks for Subscribing",
                    text: "A confirmation mail has been sent to your email address.",
                    type: "success"
                });
            } else {
                ////////////////////Sweetalert Error////////////////////////////////////////
                sweetAlert({
                    title: "Oops!",
                    text: "Something went wrong on the page!",
                    type: "error"
                });
            }
        });
        request.fail(function (jqXHR, textStatus) {

            console.log('Add request failed');
        });
    });

/////////////////////////////////////widget category///////////////////////////////////////////
    function wCategories() {
        var request = $.ajax({
            url: 'includes/functions.php?job=get_categories',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            $('#dCategories').empty();
            if (output.result === 'success') {
                var n = output.data[0].i;
                $('.widget.categories .row').append('<div class="col-sm-6"><ul class="arrow">');
                for (var i = 0; i < n; i++) {
                    var cat = output.data[i].category;
                    catLink = replaceSpace(cat);
                    var catLink = replaceSpace(cat);
                    if (i > 1 && i % 5 === 0) {

                        $('.widget.categories .row').append('</ul></div><div class="col-sm-6"><ul class="arrow"><li><a href="#/' + catLink + '">' + cat + '</a></li>');
                    } else {
                        $('.widget.categories .arrow').append('<li><a href="#/' + catLink + '">' + cat + '</a></li>');
                    }

                }
            } else {
                show_message('Information request failed', 'error');
            }


        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        });
    }

////////////////////////////////submit comment///////////////////////////////////


    $(document).on('submit', '#comment_form', function (e) {
        e.preventDefault();

        var d = new Date();

        var month = d.getMonth() + 1;

        var day = d.getDate();

        var curDate = d.getFullYear() + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

        var form_data = $('#comment_form').serialize() + '&date=' + curDate;
        var request = $.ajax({
            url: 'includes/functions.php?job=add_comment',
            cache: false,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
        request.done(function (output) {
            if (output.result === 'success') {
                var request2 = $.ajax({
                    url: 'includes/functions.php?job=latest_comment',
                    cache: false,
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    type: 'get'
                });
                request2.done(function (output2) {
                    if (output.result === 'success') {
                        var latest_comment = output2.data[0].comment_view;
                        var count_update = "";
                        if (output2.data[0].new_count === "1") {
                            count_update = "1 comment";
                        } else {
                            count_update = output2.data[0].new_count + " comments";
                        }
                        $("#comments-list h3").eq(0).text(count_update);
                        $(latest_comment).hide().insertBefore('#comment-form').fadeIn('slow');
                        $('.comment_author').val('');
                        $('.comment_text').val('');

                    }
                });

            } else {
                console.log('add request failed', 'error');
            }
        });

        request.fail(function (jqXHR, textStatus) {
            console.log('add request failed: ' + textStatus, 'error');
        });
    });

///////////////////////////facebook share post//////////////////////////////
    $(document).on('click', '#share_button', function (e) {
        e.preventDefault();
        var grandparent = $(this).parent().parent();
        var postTitle = grandparent.find('h3').text();
        var postImage = "http://www.lillysparrows.com/" + grandparent.find('img').attr('src');
        var description = $(this).parent().find('p').text();
        description = (description.substring(0, 100)) + '...';

        console.log("post title: " + postTitle + " post Image Link: " + postImage + " description: " + description);
        FB.ui(
                {
                    method: 'feed',
                    name: postTitle,
                    link: window.location.href,
                    description: description,
                    caption: '',
                    picture: postImage,
                    display: 'popup'
                },
                function (response, show_error) {
                    if (response && response.post_id) {
                        console.log('Post was published.');
                    } else {
                        console.log('Post was not published.');
                    }
                }
        );
    });
///////////////////////////////////////end of facebook share post//////////////////////////////////////



    $(document).on('click', '.add_btn', function (e) {
        $('.form_story').slideDown();
        $('.edit_btn').addClass('disabled');
        $('.delete_btn').addClass('disabled');
        $('.add_btn').addClass('disabled');
    });

    $(document).on('click', '.story_cancel', function (e) {
        $('.form_story').slideUp();
        $('.edit_btn').removeClass('disabled');
        $('.delete_btn').removeClass('disabled');
        $('.add_btn').removeClass('disabled');
    });

    $(document).on('click', '.function_edit_story', function (e) {
        $('.form_story').slideDown();
        $('.function_edit_story').addClass('disabled');
        $('.function_delete_story').addClass('disabled');
        $('#add_story').addClass('disabled');
    });


    $(".dropdown-menu > li > a.trigger").on("click", function (e) {
        var current = $(this).next();
        var grandparent = $(this).parent().parent();
        if ($(this).hasClass('left-caret') || $(this).hasClass('right-caret'))
            $(this).toggleClass('right-caret left-caret');
        grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
        grandparent.find(".sub-menu:visible").not(current).hide();
        current.toggle();
        e.stopPropagation();
    });
    $(".dropdown-menu > li > a:not(.trigger)").on("click", function () {
        var root = $(this).closest('.dropdown');
        root.find('.left-caret').toggleClass('right-caret left-caret');
        root.find('.sub-menu:visible').hide();
    });


    $('.centered').each(function (e) {
        $(this).css('margin-top', ($('#main-slider').height() - $(this).height()) / 2);
    });

    $(window).resize(function () {
        $('.centered').each(function (e) {
            $(this).css('margin-top', ($('#main-slider').height() - $(this).height()) / 2);
        });
    });


    $(".navbar-collapse").css({overflow: 'visible',
        position: 'relative'});
    //contact form
    var form = $('.contact-form');
    form.submit(function () {
        $this = $(this);
        $.post($(this).attr('action'), function (data) {
            $this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
        }, 'json');
        return false;
    });

    //goto top
    $('.gototop').click(function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 500);
    });

    //Pretty Photo
    $("a[rel^='prettyPhoto']").prettyPhoto({
        social_tools: false
    });
});


$(document).ready(function () {
    htmlbodyHeightUpdate();
    $(window).resize(function () {
        htmlbodyHeightUpdate();
    });
    $(window).scroll(function () {
        height2 = $('.main').height();
        htmlbodyHeightUpdate();
    });
    $('#admin_nav').hide();

});


function htmlbodyHeightUpdate() {
    var height3 = $(window).height();
    var height1 = $('.nav').height();
    height2 = $('.main').height();
    if (height2 > height3) {
        $('html').height(Math.max(height1, height3, height2) + 10);
        $('body').height(Math.max(height1, height3, height2) + 10);
    } else
    {
        $('html').height(Math.max(height1, height3, height2));
        $('body').height(Math.max(height1, height3, height2));
    }

}
;


function anyRan(min, max) {
    var randomN = Math.floor(Math.random() * (max - min + 1) + min);
    return randomN;
}


//////////////////////////////////////////////////////////populate quotes////////////////////////////////////////
function dQuote() {
    var request = $.ajax({
        url: 'includes/functions.php?job=view_quotes',
        cache: false,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        type: 'get'
    });
    request.done(function (output) {
        if (output.result === 'success') {
            var n = output.data[0].no_of_quotes;
            for (var i = 0; i < n; i++) {
                var quotes = ' <div class="item"><div class="container"><div class="row"> <div class="col-sm-12">';
                quotes += '<div class="carousel-content centered" style="padding: 10px;">';
                quotes += ' <h2 class="animation animated-item-1"> ';
                quotes += output.data[i].author + ' <small>(';
                quotes += output.data[i].year + ')</small></h2>';
                quotes += '<p class="animation animated-item-2">' + output.data[i].quote + '</p>';
                quotes += ' </div></div></div></div></div>';

                $('.dslideshow').append(quotes);

            }
        } else {
            show_message('Information request failed', 'error');
        }

        var active = anyRan(0, n - 1);
        $('.dslideshow').find('.item').eq(active).addClass('active');
    });
}


////////////////////////////////////////blog post bottom////////////////////////////////////////////

function postBottom() {
    var request = $.ajax({
        url: 'includes/functions.php?job=blog_view_bottom',
        cache: false,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        type: 'get'
    });

    request.done(function (output) {

        if (output.result === 'success') {
            var n = 10;
            for (var i = 0; i < n; i++) {
                var blogPosts = output.data[i].blog_view;

                $('.bottomPost').prepend(blogPosts);
            }
        } else {
            console.log('failed');
        }

    });
}

function replaceSpace(dtext) {
    dtext = dtext.split(' ').join('-');
    return dtext;
}
