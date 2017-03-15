$('[data-toggle="tooltip"]').tooltip();

new WOW().init();

$(document).ready(function () {

	// slick slider
	$('.slider-1').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		centerMode: false,
		dots: false,
		infinite: true,
		arrows: true,
		slidesToShow: 2,
		slidesToScroll: 1,
        prevArrow: '<button class="slick-prev"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-long-arrow-right"></i></button>',
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		  ]
	});
	// slick slider
	$('.slider-2').slick({
		autoplay: true,
		autoplaySpeed: 4000,
		centerMode: false,
		dots: false,
		infinite: true,
		arrows: true,
		slidesToShow: 2,
		slidesToScroll: 2,
        prevArrow: '<button class="slick-prev"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-long-arrow-right"></i></button>',
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		  ]
	});
	// slick slider
	$('.slider-3').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		centerMode: false,
		dots: false,
		infinite: true,
		arrows: true,
		slidesToShow: 2,
		slidesToScroll: 2,
        prevArrow: '<button class="slick-prev"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-long-arrow-right"></i></button>',
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		  ]
	});
	
	// slick slider
	$('.related-post-slider').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		centerMode: false,
		dots: false,
		infinite: true,
		arrows: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				},
			
				breakpoint: 500,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		  ]
	});
	
	// slick slider
	$('.category-slider').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		centerMode: false,
		dots: false,
		arrows: true,
		slidesToShow: 1,
		slidesToScroll: 1,
        prevArrow: '<button class="slick-prev"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-long-arrow-right"></i></button>',
	});

	//onclick
	$('.service-list-group a').click(function () {
		$('.service-list-group a').each(function () {
			$(this).removeClass("active");
		});
		$(this).addClass("active");
	});
});

$('.carousel').carousel()
	// testingTab
$('#myTabs a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
})
