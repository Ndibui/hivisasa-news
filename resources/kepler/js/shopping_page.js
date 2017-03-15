/* ----------------- Start JS Document ----------------- */
var $ = jQuery.noConflict();
$(function($) {
'use strict';


// top_rated_products_slider
$(window).load(function () {
    $(".top_rated_products_slider").show();
});
$(document).ready(function() {
 
  $(".top_rated_products_slider").owlCarousel({
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    stopOnHover : true,
    items : 4,
    navigation : true, // Show next and prev buttons
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [979,3],
    responsive : true
  });
});

// brand_clients_slider
$(window).load(function () {
    $(".brand_clients_slider").show();
});
$(document).ready(function() {
  $(".brand_clients_slider").owlCarousel({
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    stopOnHover : true,
    items : 6,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [979,3],
    responsive : true
  });
});

// product_preview_slider
$(window).load(function () {
    $(".product_preview_slider").show();
});
$(document).ready(function() {
  $(".product_preview_slider").owlCarousel({
    autoPlay: 5000, //Set AutoPlay to 3 seconds
    stopOnHover : true,
    items : 1,
    navigation : true, // Show next and prev buttons
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [979,3],
    responsive : true
  });
});

// item_colors
$(document).ready(function() {
    $('.item_colors a').click(function (e) {
        e.preventDefault();
        $(this).closest('a').addClass('active').siblings().removeClass('active');
    });
});

// product_gallery
$(window).load(function(){
$( function() {
  // init Isotope
  var $grid = $('.product_gallery').isotope({
    itemSelector: '.product_item',
    masonry: {
      gutter: 20
    }
  });
  // filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };
  // bind filter button click
  $('.filters-button-group').on( 'click', 'li', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $grid.isotope({ filter: filterValue });
  });
  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'li', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });
});
});


});