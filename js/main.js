jQuery(function($){
var loadedCat = {};
 var storyLinks = {};
var loadedPosts = {};

categoryLinks();
    postLinks();
    storiesLinks();
$(window).on('hashchange', function(){ 
        
    var hashChange = window.location.hash;
    loadPage(hashChange);
    
    function loadPage(hashChange){
    
    var story = storyLinks;
    var cats = loadedCat;
    var dPosts = loadedPosts;
    function pagerNo(hash){
       var number = hash.slice(-1);
       return number;
    }
    
    var n = pagerNo(hashChange);
    var splitUrl = hashChange.split('/');
    var newLink = splitUrl[0]+'/'+splitUrl[1];
    
    if(cats[hashChange] !== undefined){
    var clicked = cats[hashChange];
    catPost(5,0,"",hashChange.substring(2),clicked);
    //paginationButtonInteract(".skipButton", 3, 'active', "categories");
    }else if(cats[newLink] !== undefined){
    var clicked = cats[newLink];
    catPost(5,(n-1)*3,"",newLink.substring(2),clicked);
    //paginationButtonInteract(".skipButton", 3, 'active', "categories");
    }
    else if(dPosts[hashChange] !== undefined) {
        var clicked = dPosts[hashChange];
        singlePost(clicked);
    }else if(story[hashChange] !== undefined) {
        var clicked = story[hashChange];
        storySingle(clicked);
    }else if(hashChange === "") {
        mypost(3,0,"", "home");
        //paginationButtonInteract(".skipButton", 3, 'active', "home");
    }else {
    switch (hashChange) {
        
        case '#/home/page'+n:
            mypost(3,(n-1)*3,"", "home");
            //paginationButtonInteract(".skipButton", 3, 'active', "home");
            break;
        case '#/stories/page'+ n:
            stories(3,(n-1)*3, "", "stories");
            liCheck();
            //paginationButtonInteract(".skipButton", 3, 'active', "stories");
            break;
        case '#/stories':
            stories(3,0, "", "stories");
            liCheck();
            //paginationButtonInteract(".skipButton", 3, 'active', "stories");
            break;
        default:
            mypost(3,0,"", "home");
            //paginationButtonInteract(".skipButton", 3, 'active', "home");
            break;
    }
}
}
    
}).trigger('hashchange');


function categoryLinks(){
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
                loadedCategories += '<li id="' + output.data[i].id + '" class="dbcat"><a href="#/'+ catLink +'">'+ output.data[i].category +'</a></li>';
                }
                $.each($(loadedCategories), function(){
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
                $.each($(loadedPost), function(){
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
                $.each($(loadedStory), function(){
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
$(document).on('click','.index', function(e){
    e.preventDefault();
    window.location.hash = $(this).find('a').attr('href');
});

 $(document).on('click', '.story', function(e) {
      e.preventDefault();
      window.location.hash = $(this).find('a').attr('href');
 });
 
 $(document).on('click', '.dbcat', function(e) {
    e.preventDefault();
    window.location.hash = $(this).find('a').attr('href');
});

$(document).on('click', '.postTitle', function(e) {
    e.preventDefault();
    window.location.hash = $(this).find('a').attr('href');
});
 
////////////////////////////////////////////story function engine///////////////////////////////////////////
function stories(p, off, active, diff) {
        var request = $.ajax({
            url: 'includes/functions.php?job=front_title&totalRecord='+p+'&offset='+off,
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });

        request.done(function (output) {

            if (output.result === 'success') {
       pagination(output, p, active, diff);
      
      $('.blog').empty();
       for (var i=0; i<p; i++) {
        var blogPosts = output.data[i].storyTitle;    
       $(".blog").append(blogPosts);
    }
        }else {
                console.log('failed');
            }
        });
} 

    function mypost(p,off,active,diff) {
         var request = $.ajax({
            url: 'includes/functions.php?job=blog_view&totalRecord='+p+'&offset='+off,
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
          
         request.done(function (output) {
            
        if (output.result === 'success') {
       
       pagination(output, p, active, diff);
      
      $('.blog').empty();
       for (var i=0; i<p; i++) {
        var blogPosts = output.data[i].blog_view;    
       $(".blog").append(blogPosts);
    }
    
        }else {
                console.log('failed');
            }
        });
    request.success(function(){
        liCheck();
    });
}     
   
//   function paginationButtonInteract(pages, p, clicker, diff){
//    $(document).off('click', pages).on('click', pages, function(){
//    
//    
//        if($(this).parent().hasClass("stories")) {
//   if($(this).hasClass('d_pages')){
//     clicker = parseInt($(this).data('page'));
//    }
//    else if($(this).hasClass('Forward')){
//       var selected = $('.stories').find('.active');
//       clicker = parseInt(selected.data('page'))+ 1;
//       
//    } else if($(this).hasClass('Back')){
//        var selected = $('.stories').find('.active');
//       clicker = parseInt(selected.data('page'))- 1;
//    }
//    var off = clicker * p;
//    stories(p, off, clicker, diff);
//    
//    } else if ($(this).parent().hasClass("home")) {
//    if($(this).hasClass('d_pages')){
//     clicker = parseInt($(this).data('page'));
//    }
//    else if($(this).hasClass('Forward')){
//       var selected = $(this).parent().find('.active');
//       clicker = parseInt(selected.data('page'))+ 1;
//       
//    } else if($(this).hasClass('Back')){
//        var selected = $(this).parent().find('.active');
//       clicker = parseInt(selected.data('page'))- 1;
//    }
//    var off = clicker * p;
//    mypost(p, off, clicker, diff);
//    } else if ($(this).parent().hasClass("categories")) {
//    if($(this).hasClass('d_pages')){
//     clicker = parseInt($(this).data('page'));
//    }
//    else if($(this).hasClass('Forward')){
//       var selected = $(this).parent().find('.active');
//       clicker = parseInt(selected.data('page'))+ 1;
//       
//    } else if($(this).hasClass('Back')){
//        var selected = $(this).parent().find('.active');
//       clicker = parseInt(selected.data('page'))- 1;
//    }
//    var off = clicker * p;
//    catPost(p, off, clicker, diff);
//    }
//    });
// }


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

            } else {
                console.log('failed');
            }

        });

    };

   //////////////////////////////////////navigate pagination//////////////////////////////////////////////////    
function pagination(output, p, active, diff) {
        var n = output.data[0].total;
        
        var page_no = "";
        var pages = 5;
        if (n/p < pages) {
            if (n%p > 0) {
                page_no = parseInt(n/p) + 1;
            } else {
                page_no = parseInt(n / p);
            }
        } else {
            page_no = parseInt(pages);
        }
        var liNo = 0;

        var pageLi = '<ul class="pagination pagination-lg '+diff+'">'
                + '<li class="Back skipButton"><a href="previousPage"><i class="icon-angle-left"></a></i></li>';

        for (liNo; liNo < page_no; liNo++) {
            pageLi += '<li data-page="' + liNo + '" class="d_pages skipButton"><a href="#/'+diff+'/page' + (liNo + 1) + '">' + (liNo + 1) + '</a></li>';
        }

        pageLi += '<li class="Forward skipButton"><a href="nextPage"><i class="icon-angle-right"></i></a></li></ul><!--/.pagination-->';

        $('.pageNo').html(pageLi);
        var page_lists = $('.d_pages');
     $('.d_pages').removeClass('disabled active');
    if(!active){
        $(page_lists[0]).addClass('disabled active');
        liCheck();
        }else{
        $(page_lists[active]).addClass('disabled active');
        liCheck();
     }
        
    }

////////////////////////////////////////////check .active position///////////////////////////////////
function liCheck(){
    if($('li.active').next().hasClass('fButton') && $('li.active').prev().hasClass('bButton')){
            $('ul.pagination').hide(); 
         }
        else if($('li.active').prev().hasClass('bButton')){
            $('li.fButton').removeClass('disabled');
            $('li.active').prev().addClass('disabled');
         }else if($('li.active').next().hasClass('fButton')){
            $('li.bButton').removeClass('disabled');
            $('li.active').next().addClass('disabled');
         }else{
            $('li.bButton').removeClass('disabled');
            $('li.fButton').removeClass('disabled');
         };
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
                $('.dCategories').append('<li id="' + output.data[i].id + '" class="dbcat"><a href="#/'+ catLink +'">'+ output.data[i].category +'</a></li>');
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

function catPost(p, off, active, diff, clicked) {
    
    var id = clicked;
    
    var request = $.ajax({
        url: 'includes/functions.php?job=blog_view_cat&totalRecord='+p+'&offset='+off,
        cache: false,
        data: 'id=' + id,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        type: 'get'
    });
          
    request.done(function (output) {
            
        if (output.result === 'success') {
            pagination(output, p, active, diff);
            
        $('.blog').empty();
        for (var i=0; i<p; i++) {
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
                        console.log('Faile');
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
                console.log('success');
            } else {
                ////////////////////Sweetalert Error////////////////////////////////////////
                show_message('Add request failed', 'error');
                console.log('Error');
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
                if(i > 1 && i%5 === 0) {
                  
                    $('.widget.categories .row').append('</ul></div><div class="col-sm-6"><ul class="arrow"><li><a href="#/'+catLink+'">'+ cat +'</a></li>');
                } else {
                    $('.widget.categories .arrow').append('<li><a href="#/'+catLink +'">'+ cat +'</a></li>');
                }
              
            } 
        }else {
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

        var curDate = d.getFullYear() + '-' + (month <10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

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
                        var count_update ="";
                        if(output2.data[0].new_count === "1"){
                            count_update = "1 comment";
                        } else {
                            count_update = output2.data[0].new_count +" comments";
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
$(document).on('click', '#share_button', function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
name: 'This is the content of the "name" field.',
link: 'http://www.lillsparrows.com/viewpost.php?id=55',
picture: 'http://www.groupstudy.in/img/logo3.jpeg',
caption: 'Top 3 reasons why you should care about your finance',
description: "What happens when you don't take care of your finances? Just look at our country -- you spend irresponsibly, get in debt up to your eyeballs, and stress about how you're going to make ends meet. The difference is that you don't have a glut of taxpayers…",
message: ""
});
});
///////////////////////////////////////end of facebook share post//////////////////////////////////////



$(document).on('click', '.add_btn', function(e) {
    $('.form_story').slideDown();
    $('.edit_btn').addClass('disabled');
    $('.delete_btn').addClass('disabled');
    $('.add_btn').addClass('disabled');
});

$(document).on('click', '.story_cancel', function(e) {
    $('.form_story').slideUp();
    $('.edit_btn').removeClass('disabled');
    $('.delete_btn').removeClass('disabled');
    $('.add_btn').removeClass('disabled');
});

$(document).on('click', '.function_edit_story', function(e) {
    $('.form_story').slideDown();
    $('.function_edit_story').addClass('disabled');
    $('.function_delete_story').addClass('disabled');
    $('#add_story').addClass('disabled');
});


$(".dropdown-menu > li > a.trigger").on("click",function(e){
        var current=$(this).next();
        var grandparent=$(this).parent().parent();
        if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
            $(this).toggleClass('right-caret left-caret');
        grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
        grandparent.find(".sub-menu:visible").not(current).hide();
        current.toggle();
        e.stopPropagation();
    });
    $(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
        var root=$(this).closest('.dropdown');
        root.find('.left-caret').toggleClass('right-caret left-caret');
        root.find('.sub-menu:visible').hide();
    });


    $( '.centered' ).each(function( e ) {
        $(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
    });

    $(window).resize(function(){
        $( '.centered' ).each(function( e ) {
            $(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
        });
    });

    
    $(".navbar-collapse").css({overflow:'visible',
    position: 'relative'});
    //contact form
    var form = $('.contact-form');
    form.submit(function () {
        $this = $(this);
        $.post($(this).attr('action'), function(data) {
            $this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
        },'json');
        return false;
    });

    //goto top
    $('.gototop').click(function(event) {
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
        $( window ).resize(function() {
            htmlbodyHeightUpdate();
        });
        $( window ).scroll(function() {
            height2 = $('.main').height();
            htmlbodyHeightUpdate();
        });              
                $('#admin_nav').hide();
                
    });


function htmlbodyHeightUpdate(){
        var height3 = $( window ).height();
        var height1 = $('.nav').height();
        height2 = $('.main').height();
        if(height2 > height3){
            $('html').height(Math.max(height1,height3,height2)+10);
            $('body').height(Math.max(height1,height3,height2)+10);
        }
        else
        {
            $('html').height(Math.max(height1,height3,height2));
            $('body').height(Math.max(height1,height3,height2));
        }
        
    };


function anyRan(min, max) {
    var randomN = Math.floor(Math.random()* (max - min + 1) + min);
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
                     quotes +=  '<p class="animation animated-item-2">' + output.data[i].quote + '</p>';
                     quotes += ' </div></div></div></div></div>';

                $('.dslideshow').append(quotes);
                
                }
            } else {
                show_message('Information request failed', 'error');
            }
            
            var active = anyRan(0, n-1);
            $('.dslideshow').find('.item').eq(active).addClass('active');
                var datas = $('#main-slider').find('.next');
                
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
       for (var i=0; i<n; i++) {
        var blogPosts = output.data[i].blog_view;

        $('.bottomPost').prepend(blogPosts);
   }
   } else {
                console.log('failed');
            }

        });
}

function replaceSpace(dtext){
    dtext = dtext.split(' ').join('-');
    return dtext;
}
