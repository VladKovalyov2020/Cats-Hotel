
;
(function ($) {



    // Scripts which runs after DOM load

    $(document).ready(function () {
    	$('#nav-icon2').click(function(){
    		$(this).toggleClass('open');
    		$('.top-bar').toggleClass('open');
    		$('.header').toggleClass('open-header');
        });

    	$('.open-submenu').on('click',function(e) {
    		e.preventDefault();
    		$(this).toggleClass('active').next('.submenu').slideToggle();
    		$(this).closest('li').find('> a').toggleClass('focused')
    	});

        // Scroll to ID

        $('a[href*="#"]:not(a[href*="/#"],a[href="#"])').on('click', function(e) {
        	e.preventDefault();
        	$('html, body').animate({
        		scrollTop: $($(this).attr('href')).offset().top,
        	}, 500,'linear')
        });



        $('a[href*="/#"]').on('click', function(e) {
        	var oldUrl = $(this).attr("href"); 
        	var string_url = oldUrl.split('#')[0];
        	var url = window.location.href;
        	var url_clear = url.split('#')[0];
        	str = oldUrl.split("#").pop();
        	if (url_clear == string_url) {
        		e.preventDefault();
        		$('html, body').animate({
        			scrollTop: $('#'+str).offset().top,
        		}, 500,'linear');
        	} 
        });

        // $('[data-fancybox]').fancybox({
        //     youtube : {
        //         showinfo : 0
        //     },
        //     vimeo : {
        //         color : 'f00'
        //     }
        // });



        $(window).scroll(function() {    
        	var scroll = $(window).scrollTop();

        	if (scroll >= 1) {
        		$(".header").addClass("active");
        	} else {
        		$(".header").removeClass("active");
        	}
        });
        if ($(window).scrollTop() > 1 ) {
        	$(".header").addClass("active");
        }

        



    });

    // Scripts which runs after all elements load

    $(window).on( 'load', function () {

        //jQuery code goes here
        $('.preloader').addClass('preloader--hidden');


    });

    // Scripts which runs at window resize

    $(window).resize(function () {

        //jQuery code goes here

    });

}(jQuery));
