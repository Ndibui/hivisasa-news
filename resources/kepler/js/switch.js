jQuery(window).load(function() {
	/* demo */

	jQuery('body').append(
	"<div class='switcher'>"+
		"<div class='switcher-wrapper'>"+

			"<button class='switcher-show-hide'><i class='fa fa-cog'></i></button>"+
			"<div class='switcherContents'>"+
				"<header><h5>Style Switcher</h5></header>"+
				"<!--  Skins Colors -->"+
				"<div class='switcherContent skinsColor'>"+
					"<span class='title'>Skins Colors</span>"+
					"<ul class='demo-content demo-color'>"+
					
						"<li data-name='gnrl_color' data-value='green' data-value-2='39CA74' style='background-color: #39CA74;'></li>"+

						"<li data-name='gnrl_color' data-value='darkblue' data-value-2='2c3e50' style='background-color: #2c3e50;'></li>"+

						"<li data-name='gnrl_color' data-value='blue' data-value-2='2980b9' style='background-color: #2980b9;'></li>"+

						"<li data-name='gnrl_color' data-value='orange' data-value-2='FF5A00' style='background-color: #FF5A00;'></li>"+

						"<li data-name='gnrl_color' data-value='red' data-value-2='c0392b' style='background-color: #c0392b;'></li>"+

						"<li data-name='gnrl_color' data-value='yellow' data-value-2='FEC400' style='background-color: #FEC400;'></li>"+
						
					"</ul>"+
				"</div>"+
				"<!--  End Skins Colors -->"+

				"<!--  Patterns -->"+
				"<div class='switcherContent patterens'>"+
					"<span class='title'>Patterens</span>"+
					"<ul class='demo-content demo-pattern'>"+
					
						"<li data-name='gnrl_pattern' data-value='pattern1'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern1.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern2'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern2.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern3'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern3.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern4'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern4.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern5'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern5.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern6'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern6.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern7'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern7.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern8'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern8.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern9'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern9.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern10'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern10.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern11'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern11.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern12'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern12.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern13'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern13.png'></li>"+
						
						"<li data-name='gnrl_pattern' data-value='pattern14'><img alt='' src='http://hamzh.info/demo/html/riche/img/patterns/pattern14.png'></li>"+
					
					"</ul>"+
				"</div>"+
				"<!--  End Patterns -->"+
					


				"<!--  Images -->"+
				"<div class='switcherContent images-bg'>"+
					"<span class='title'>Images</span>"+
					"<ul class='demo-content demo-images-bg'>"+

						"<li data-name='gnrl_images' data-value='bg1'><img alt='' src='http://hamzh.info/demo/html/riche/img/images-bg/bg1.png'></li>"+
						
						"<li data-name='gnrl_images' data-value='bg2'><img alt='' src='http://hamzh.info/demo/html/riche/img/images-bg/bg2.png'></li>"+
						
						"<li data-name='gnrl_images' data-value='bg3'><img alt='' src='http://hamzh.info/demo/html/riche/img/images-bg/bg3.png'></li>"+
						
						"<li data-name='gnrl_images' data-value='bg4'><img alt='' src='http://hamzh.info/demo/html/riche/img/images-bg/bg4.png'></li>"+

						"<li data-name='gnrl_images' data-value='bg5'><img alt='' src='http://hamzh.info/demo/html/riche/img/images-bg/bg5.png'></li>"+

						"<li data-name='gnrl_images' data-value='bg6'><img alt='' src='http://hamzh.info/demo/html/riche/img/images-bg/bg6.png'></li>"+

						"<li data-name='gnrl_images' data-value='bg7'><img alt='' src='http://hamzh.info/demo/html/riche/img/images-bg/bg7.png'></li>"+
					
					"</ul>"+
				"</div>"+
				"<!--  End Images -->"+

			"</div>"+
		"</div>"+
	"</div>");


	//-- show and hide switcher --

	jQuery('.switcher-show-hide').click(function() {
		if ( jQuery('.switcher-show-hide').hasClass('switcher-toggle') )
			{
			jQuery('.switcher-show-hide').removeClass('switcher-toggle');
			jQuery('.switcher').removeClass('opened');
		}else
		{   
			jQuery('.switcher-show-hide').addClass('switcher-toggle');
			jQuery('.switcher').addClass('opened');
		}

	});

	jQuery('.switcher').click(function(e){
		e.stopPropagation();
	});

	jQuery('html').on( 'click', function ( _ev )
	{  
		jQuery('.switcher-show-hide').removeClass('switcher-toggle');
		jQuery('.switcher').removeClass('opened');
	});


   //-- controlling the position of switcher --
	var jQueryswitcherWrappper = jQuery('.switcher-wrapper');

	jQueryswitcherWrappper.resize(function(){
		jQuery('.switcher').css({ 'right' : - jQueryswitcherWrappper.width()});
	});
	jQueryswitcherWrappper.trigger('resize');
	var emerald_gnrl_color=false;
	

	// Pattern
	jQuery('li[data-name=gnrl_pattern]').click(function() {
		emerald_gnrl_gnrl_pattern = jQuery(this).attr("data-value");
		if(emerald_gnrl_gnrl_pattern!=false){
			pointer_pattern(emerald_gnrl_gnrl_pattern);
		}
	});
	
	// General Pattern
	function pointer_pattern(pattern_style){
		// if (jQuery(".active-layout").attr("data-value") == "" || jQuery(".active-layout").attr("data-value") == "") {
			jQuery("body").css("background","url(http://hamzh.info/demo/html/riche/img/patterns/"+pattern_style+".png) repeat");
		// }
	}
	
	// Images
	jQuery('li[data-name=gnrl_images]').click(function() {
		emerald_gnrl_gnrl_images = jQuery(this).attr("data-value");
		if(emerald_gnrl_gnrl_images!=false){
			pointer_images(emerald_gnrl_gnrl_images);
		}
	});
	
	// General Images
	function pointer_images(images_style){
		// if (jQuery(".active-layout").attr("data-value") == "" || jQuery(".active-layout").attr("data-value") == "") {
			jQuery("body").css("background","url(http://hamzh.info/demo/html/riche/img/images-bg/"+images_style+".png)  no-repeat fixed center center / cover");
		// }
	}

	
	// Color
	jQuery('li[data-name=gnrl_color]').click(function() {
		emerald_gnrl_color = jQuery(this).attr("data-value");
		emerald_gnrl_color_2 = jQuery(this).attr("data-value-2");
		if(emerald_gnrl_color!=false){
			pointer_color(emerald_gnrl_color,emerald_gnrl_color_2);
		}
	});
	
	// General Color
	function pointer_color(color_style,color_style_2){
		 // if (color_style != "skinsColor") {
		 // 	jQuery('head').append('<style type="text/css">.push_options{background:#'+color_style_2+'}</style>');
		 // 	// jQuery(".logo img").attr("src","http://hamzh.info/demo/html/riche/img/logos/logo-"+color_style+".png");
		 // }else if (color_style == "skinsColor") {
		 // 	jQuery('head').append('<style type="text/css">.push_options{background:#'+color_style_2+'}</style>');
	  //     	// jQuery(".logo img").attr("src","http://hamzh.info/demo/html/riche/img/logos/logo-blue.png");
		 // }
		jQuery('head').append('<link rel="stylesheet" href="css/skins/'+color_style+'.css">');
	}
	var base_url = window.location.origin;

	// Theme
	// Light Or Dark
	jQuery('li[data-name=gnrl_light]').click(function() {
		emerald_gnrl_light = jQuery(this).attr("data-value");
		if(emerald_gnrl_light!=false){
			pointer_light(emerald_gnrl_light);
		}
	});
	
	// General Light Or Dark
	function pointer_light(light_style){
		if (light_style == "dark") {
			jQuery('head').append('<link rel="stylesheet" class="light_style" href="'+base_url+'/demo/html/riche/img/css/lightordark/'+light_style+'.css">');
			jQuery("body").addClass("dark-s");
		}else {
			jQuery(".light_style").remove();
			jQuery("link[href='css/dark.css']").remove();
			jQuery("body").removeClass("dark-s");
		}
	}
});