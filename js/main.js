
jQuery(function($) {

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
                
                $('#fade').hide();
                alert("hello");
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


    jQuery(document).ready(function($) {
        

        
        var easyEditor = new EasyEditor('#editor', {
            buttons: ['bold', 'italic', 'link', 'h2', 'h3', 'h4', 'alignleft', 'aligncenter', 'alignright', 'quote', 'image', 'list', 'x']
        });

        // form uploader starts
        $loader = $('.easyeditor-modal-content-body-loader');
        $('.easyeditor-modal-content-body').find('form').ajaxForm({
            beforeSend: function() {
                $loader.css('width', '0%');
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $loader.css('width', percentComplete + '%');
            },
            success: function() {
                $loader.css('width', '100%');
            },
            complete: function(get) {
                if(get.responseText != 'null') {
                    easyEditor.insertHtml('<figure><img src="uploader_sdk/images/'+ get.responseText +'" alt=""></figure>');
                    easyEditor.closeModal('#easyeditor-modal-1');
                }
            }
        });
        // form uploader ends


        // sticky toolbar
        var $cache = $('.easyeditor-toolbar');
        var width = $cache.width();
        var vTop = $cache.offset().top - parseFloat($cache.css('marginTop').replace(/auto/, 0));
        $(window).scroll(function (event) {
            var y = $(this).scrollTop();

            if (y >= vTop) {
                $cache.addClass('is-fixed').css('width', width + 'px');
            } else {
                $cache.removeClass('is-fixed').css('width', 'auto');
            }
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
                
                alert("hi");
                
                $('#admin_nav').hide();
                
	});

$('.post-formCase').hide();
$('.write-post').click(function(){
    $('.post-formCase').slideDown(500, function(){
        $('.write-post').addClass('disabled');
        $('.postcancel').text('Cancel');
        $('.editPost').addClass('disabled');
    });
});

$('.editPost').click(function(){
    $('.post-formCase').slideDown(500, function(){
        $('.write-post').addClass('disabled');
        $('.postcancel').text('Cancel edit');
        $('.editPost').addClass('disabled');
    });
});

$('.postcancel').click(function(){
    $('.post-formCase').slideUp(500, function(){
        $('.write-post').removeClass('disabled');
        $('.editPost').removeClass('disabled');
    });
});
	
	
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
        
        