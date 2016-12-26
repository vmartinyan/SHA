 //enigma  social tooltip js
 jQuery(function(){
		jQuery('li').tooltip();
		jQuery("[data-toggle='tooltip']").tooltip();
		jQuery("[data-toggle='popover']").popover();
		
		
		
    });

	/*----------------------------------------------------*/
/*	Scroll To Top Section
/*----------------------------------------------------*/
	jQuery(document).ready(function () {
	
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.enigma_scrollup').fadeIn();
			} else {
				jQuery('.enigma_scrollup').fadeOut();
			}
		});
        
        
	
		jQuery('.enigma_scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
        
        /*for menu top offset */
        jQuery(function(){
            var hgth = jQuery("#head_menu").prev("div").height();
            jQuery("#head_menu .navigation_menu").attr("data-offset-top", hgth);
            var hgthSec = jQuery(".header-sha").height()+40;
            jQuery(".header-sha").next("#enigma_nav_top").attr("data-offset-top", hgthSec)
        });
        
        //For Search
        jQuery("form.bop-nav-search div #s").addClass("form-control");
        jQuery("#searchsubmit").replaceWith("<button type=\"submit\" class=\"btn btn-primary\" id=\"searchsubmit\"><i class=\"glyphicon glyphicon-search\"></i></button>");
        jQuery("form.bop-nav-search").hover(function(){
            jQuery("form.bop-nav-search div #s").attr("placeholder", "Որոնել․․․").show().animate({width: "250px"}, 300);
        }, function(){
            if (jQuery("form.bop-nav-search div #s").is(":focus")){
            }
            else{
                jQuery("form.bop-nav-search div #s").animate({width: "0"}, 300, function(){jQuery(this).hide()});
            }
            
        })
		
		/* main height*/
		 var windowHeight = jQuery(window).height();
		 var headerHeight = jQuery(".header-sha").height();
		 var navHeight = jQuery(".navigation_menu").height();
		 var footerHeight = jQuery(".footer-sha").height();
		 var mainContHeight = windowHeight - headerHeight - navHeight - footerHeight - 101;
		 jQuery(".insideBackground").css("min-height", mainContHeight);

	});	

	
	jQuery.browser = {};
			(function () {
				jQuery.browser.msie = false;
				jQuery.browser.version = 0;
				if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
					jQuery.browser.msie = true;
					jQuery.browser.version = RegExp.$1;
				}
			})();
