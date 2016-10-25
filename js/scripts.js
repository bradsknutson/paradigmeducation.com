
(function($) {

	$(document).ready(function(){
        
        $('.pre-load').removeClass('pre-load');
        
	  $(".new-carousel").owlCarousel({
	  	navText:{},
	  	responsiveClass:true,
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        500:{
	            items:2,
	            nav:true
	        },
	        768:{
	            items:3,
	            nav:true
	        },
	        991:{
	            items:4,
	            nav:true
	        },
	        1200:{
	            items:5,
	            nav:true
	        }
	    }

	  });
	});


	$(document).ready(function(){
	  $(".blog-carousel").owlCarousel({
	  	navText:{},
	  	responsiveClass:true,
	    responsive:{
	        0:{
	            items:1,
	            autoplay:true,
				autoplayTimeout:7000,
	            nav:false
	        },
	        768:{
	        	items:1,
	        	autoplay:true,
				autoplayTimeout:7000,
	            nav:false
	        },
	        992:{
	            items:2,
	            autoplay:true,
				autoplayTimeout:7000,
	            nav:false
	        },
	        1200:{
	            items:3,
	            autoplay:true,
				autoplayTimeout:7000,
	            nav:false,
	            loop:false
	        }
	    }

	  });
	});

    $(document).on('click','.expandable-box',function() {
        $this = $(this).find('.hidden-content');
        $parent = $this.parent();
        $container = $parent.parent();
        // Add 50px to height because there are a combined 50px of borders added on to the element
        // and since box-sizing: border-box; we need to account for that.
        $height = $this.height() + 50;
        
        $(this).find('.fa').removeClass('fa-plus').addClass('fa-minus');
        $container.addClass('expandable-box-expanded');
        $parent.css('height',$height);
    });
    
    $(document).on('click','.expandable-box-expanded',function() {
        $(this).find('.fa').removeClass('fa-minus').addClass('fa-plus');
        $(this).removeClass('expandable-box-expanded');
        $(this).find('.expandable-box-content').css('height','0');
    })
    
    $searchform = '<div class="search-close"></div><div class="container"><div class="row"><form action="/" method="get"><label class="screen-reader-text" for="search">Search</label><input type="text" class="search-field" name="s" placeholder="Search" id="search" value="" autocomplete="off" /></form></div></div>';
    
    $(document).on('click', '#menu-item-32', function(e) {
        if( $(this).hasClass('search-expanded') ) {
            // Do nothing   
        } else {
            $(this).addClass('search-expanded');
            $('<div class="search-container"></div>').appendTo('header').hide().append($searchform).fadeIn();
            $('html').addClass('fixed');
            $('.search-field').focus();
        }
        e.preventDefault();
    });
    
    $(document).on('click', '.search-expanded, .search-close', function(e) {
        $('.search-container').fadeOut(300, function() {
            $(this).remove();
        });
        $('#menu-item-32').removeClass('search-expanded');
        $('html').removeClass('fixed');
        e.preventDefault();
    });
    
    $(document).on('click', '.btn-modal-trigger', function(e) {
        $('.hidden-form').fadeIn();
        $('html').addClass('fixed');
        
        e.preventDefault();
    });
    
    $(document).on('click', '.modal-close', function() {
        $(this).parent().fadeOut();
        $('html').removeClass('fixed');
    });
    
    $(document).on('click', '.btn-replace-trigger', function(e) {
        $form = $('.hidden-form').html();
        $(this).parent().parent().html($form);
        
        e.preventDefault();
    });
    
    $(document).on('submit', '.page-template-page-shop-online .page-content form', function(e) {
        $query = $('form .magento-search').val();
        $store = 'http://paradigm.emcp.com/catalogsearch/result/?';
        $params = { q:$query }
        window.open( $store + $.param($params), '_blank');

        e.preventDefault();
    });   
    
})( jQuery );