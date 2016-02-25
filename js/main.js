
jQuery(function($) {

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 15000
		});
                
               
	});
/////////////////////////////populate posts//////////////////////////////////////////////////
 var mypost = function() {
         var request = $.ajax({
            url: 'includes/functions.php?job=blog_view',
            cache: false,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            type: 'get'
        });
          
         request.done(function (output) {
            
        if (output.result === 'success') {
       var n = 3;
       for (var i=0; i<n; i++) {
       $('.blog').prepend(output.data[i].blog_view);
   }
   } else {
                console.log('failed');
            }

        });
}


/////////////////////////////////populate categories////////////////////////////////////////////
var categories = function() {
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
                $('.dCategories').append('<li><a href="' + output.data[i].category +'.php">'+ output.data[i].category +'</a></li>');
                }
            } else {
                show_message('Information request failed', 'error');
            }

        });
        request.fail(function (jqXHR, textStatus) {
            hide_loading_message();
            show_message('Information request failed: ' + textStatus, 'error');
        })
}

//////////////////////////////////////////////////////////populate quotes////////////////////////////////////////
var dQuote = function() {
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
            	var quotes = ' <div class="item"><div class="container"><div class="row"> <div class="col-sm-12">'
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
            
            var active = anyRan(0, n);
            $('.dslideshow').find('.item').eq(active).addClass('active'); 
        });
}
dQuote();
categories();
mypost();


$(document).on('click', '.new_author', function(e) {
	$('.form_author').slideDown().next('.form_quote').slideUp(function() {
		$('.dtitle').text('Add Author');
	});
});

$(document).on('click', '.cancle', function(e) {
	$('.form_quote').slideDown().prev('.form_author').slideUp(function() {
		$('.dtitle').text('Add Quote');
	});
});

$(document).on('click', '.closer', function(e) {
	$('.form_quote').slideDown().prev('.form_author').slideUp(function() {
		$('.dtitle').text('Add Quote');
	});
});

$(document).on('click', '.newAuthor', function(e) {
	$('.form_quote').slideDown().prev('.form_author').slideUp(function() {
		$('.dtitle').text('Add Quote');
	});
});

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

	//portfolio
	$(window).load(function(){
		$portfolio_selectors = $('.portfolio-filter >li>a');
		if($portfolio_selectors!='undefined'){
			$portfolio = $('.portfolio-items');
			$portfolio.isotope({
				itemSelector : 'li',
				layoutMode : 'fitRows'
			});
			$portfolio_selectors.on('click', function(){
				$portfolio_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$portfolio.isotope({ filter: selector });
				return false;
			});
		}
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
	
	 EasyEditor.prototype.image = function(){
        var _this = this;
        var settings = {
            buttonIdentifier: 'insert-image',
            buttonHtml: 'Insert image',
            clickHandler: function(){
                _this.openModal('#easyeditor-modal-1');
            }
        };

        _this.injectButton(settings);
    };
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


var anyRan = function(min, max) {
	var randomN = Math.floor(Math.random()* (max - min + 1) + min);
	return randomN;
}