
///////////////////////////////		
// Mobile Detection
///////////////////////////////

function isMobile(){
    return (
        (navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/webOS/i)) ||
		(navigator.userAgent.match(/iPhone/i)) ||
		(navigator.userAgent.match(/iPod/i)) ||
		(navigator.userAgent.match(/iPad/i)) ||
		(navigator.userAgent.match(/BlackBerry/))
    );
}

///////////////////////////////
// Project Filtering 
///////////////////////////////
/*
function projectFilterInit() {
	jQuery('#filterNav a').click(function(){
		var selector = jQuery(this).attr('data-filter');	
		jQuery(this).css('outline','none');
		jQuery('ul#filter .current').removeClass('current');
		jQuery(this).parent().addClass('current');
		
		if(selector == 'all') {
			jQuery('#projects .thumbs .project.inactive .inside').fadeIn('slow').removeClass('inactive').addClass('active');
		} else {
			jQuery('#projects .thumbs .project').each(function() {
				if(!jQuery(this).hasClass(selector)) {
					jQuery(this).removeClass('active').addClass('inactive');
					jQuery(this).find('.inside').fadeOut('normal');
				} else {
					jQuery(this).addClass('active').removeClass('inactive');
					jQuery(this).find('.inside').fadeIn('slow');
				}
			});
		}		
	
		if ( !jQuery(this).hasClass('selected') ) {
			jQuery(this).parents('#filterNav').find('.selected').removeClass('selected');
			jQuery(this).addClass('selected');
		}
	
		return false;
	});		
}*/

///////////////////////////////
// Project thumbs 
///////////////////////////////
/*
function projectThumbInit() {
	
	if(!isMobile()) {		
	
		jQuery(".project.small .inside a").hover(
			function() {
				jQuery(this).find('img:last').stop().fadeTo("fast", .1);
				jQuery(this).find('img:last').attr('title','');	
			},
			function() {
				jQuery(this).find('img:last').stop().fadeTo("fast", 1);	
		});
			
		jQuery(".project.small .inside").hover(	
			function() {				
				jQuery(this).find('.title').stop().fadeTo("fast", 1);
				jQuery(this).find('img:last').attr('title','');				
			},
			function() {				
				jQuery(this).find('.title').stop().fadeTo("fast", 0);							
		});
		
	}
	
	jQuery(".project.small").css("opacity", "1");	
}*/

///////////////////////////////
// Parallax
///////////////////////////////

// Calcualte the home banner parallax scrolling
  function scrollBanner() {
    //Get the scoll position of the page
    scrollPos = jQuery(this).scrollTop();

    //Scroll and fade out the banner text
    jQuery('#bannerText.scrolling').css({
      'margin-top' : (scrollPos/3)+"px",
      'opacity' : 1-(scrollPos/300)
    });
	
    jQuery('#homeBanner').css({
      'background-position' : 'center ' + (-scrollPos/8)+"px"
    });    
     
  }


///////////////////////////////
// Initialize
///////////////////////////////	
	
jQuery.noConflict();
jQuery(document).ready(function(){

	
	jQuery(window).on('scroll', function () {
    if (jQuery(window).scrollTop() > 50) {
        jQuery('.site-header').addClass('fixed');
    } else {
        jQuery('.site-header').removeClass('fixed');
    }
}); 
	//jQuery('.fancybox').fancybox();
jQuery('.fancybox-media-project')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',
					aspectRatio:true,
					arrows : false,
					centerOnScroll: false,  
					autoSize : false,
					scrolling   : 'no',
					top : "100px",
					helpers : {
						media : {},
						buttons : {},
						overlay : {
            locked : false // try changing to true and scrolling around the page
        }
					},
					afterLoad : function() {
						var inner  = this.content.parent();	//fancybox-inner
						this.content.parents('.fancybox-skin').css('background','black');	//fancybox-inner
						if(this.element.next('.project-detail').length) {
							var text = jQuery('<div class="my-text" >' + this.element.next('.project-detail').html() + '</div>');
							inner.append(text);
						
						var iframe = inner.find('.fancybox-iframe');
						var timeout = function() {
							jQuery('.fancybox-iframe').css('height', function() {
								var inner  = jQuery(this).parent();
								clearTimeout(window.TO);
								return inner.height() - inner.find('.my-text').height() - 5;
							});
						};

						window.TO = setTimeout(timeout, 200);
						jQuery(window).resize(function() {
							window.TO = setTimeout(timeout, 500);
						});
						this.content.parents('.fancybox-skin').css('background','black');
						
						}
					}
				});
	if(!isMobile()) {
		jQuery(window).scroll(function() {	      
	       scrollBanner();	      
		});
	}
	jQuery('.toggle-mobile').on('click',function(){
		jQuery(this).next().toggleClass('active');
	});
	jQuery('.menu a[href="#contact-form"],.contact-trigger').on('click',function(){

		
		//console.log(total);
		var tem=jQuery(this).attr('href');
		var w= jQuery(window).height();
		var y = jQuery('.top-section').height() 
		var z = jQuery('.button-section').height();
		console.log(w);
		console.log(y);
		console.log(z);
			var total = w - y - z - 150;
			console.log(total);
		//if (w > 768 ) {
			jQuery('.your-message textarea').css('height',total);
		//}
		
		jQuery(tem).css( {'opacity': '1','visibility': 'visible' });
		return false;

	});
	jQuery('.close').on('click',function(e){
		e.stopPropagation();
		jQuery(this).parents('.contact-form').css( {'opacity': '0','visibility': 'hidden' });
		return false;
	});


	jQuery('.readmore1').on('click', function(e) {
					var $source = jQuery(e.target);
					var tem=jQuery(this).parents('.row');
					jQuery('.play-c').removeClass('active');
					jQuery(this).parents('.member').addClass('active');
					jQuery(this).parents('.list-member').addClass('clickable');
					var masklayer=jQuery(this).parents('.mask-layer').find('.content-post').html();
					
					jQuery('.mediaContainer').remove();
					tem.after('<div class="mediaContainer row"></div>');						
						jQuery('html, body').animate({
        						scrollTop: jQuery(".mediaContainer").offset().top -340
    					}, 2000);
						jQuery('.mediaContainer').append(masklayer);
						
				
					return false;
				});




	/*jQuery('.testimonials-slider').bxSlider({
				minSlides: 1,
				maxSlides: 1,
				slideMargin: 10,
				auto:  "true",
				pager: "true",				
				adaptiveHeight:true,
				controls: "true",
				autoControls: false,
				speed:"500",
				mode:'fade',
				randomStart: "false"
			  });*/
	/*projectThumbInit();	
	projectFilterInit();*/
	//jQuery(".videoContainer").fitVids();
	//jQuery("#homeBanner .op").fitText(1.7, { minFontSize: '24px', maxFontSize: '64px' });	
 jQuery('.radio-group input[value=BASIC]').attr('checked',true);
     jQuery('.your-package .column  h2').on('click',function(){
     	var thiz= jQuery(this).parent();
     	jQuery('.your-package .column').removeClass('active');
     	thiz.addClass('active');
     	var value= thiz.attr('data-value');
     	 jQuery('.radio-group input').each(function(i,index){
     	 	if(index.value==value) {
     	 		index.checked=true;
     	 	}
     	 });
     	
     });    
});