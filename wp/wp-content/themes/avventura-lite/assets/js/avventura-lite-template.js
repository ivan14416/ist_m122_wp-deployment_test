/*
 * jQuery Avventura Lite theme functions file
 * https://www.themeinprogress.com
 *
 * Copyright 2019, ThemeinProgress
 * Licensed under MIT license
 * https://opensource.org/licenses/mit-license.php
 */

jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   Header cart
   ============================================= */

	$('div.header-cart').hover(

		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeIn(100);
		},
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeOut(400);
		}

	);

/* ===============================================
   Header fix
   =============================================== */

	function avventura_lite_header() {

		if( $('body').hasClass('sticky_header') ) {

			if ( $(window).width() > 992 ) {

				var menuHeight = $('#menu-wrapper').innerHeight();
				var headerHeight = $('#header').innerHeight() + $('#logo-wrapper').innerHeight();

				if( $(window).scrollTop() > headerHeight ) {
					$('#menu-wrapper').addClass('fixed');
					$('body').css({'padding-top': menuHeight});
				} else {
					$('#menu-wrapper').removeClass('fixed');
					$('body').css({'padding-top': 0});
				}

			} else {

				var adminBarHeight = $('#wpadminbar').innerHeight();
				var mobileHeaderHeight = $('#header').innerHeight();

				if( $(window).scrollTop() > mobileHeaderHeight ) {
					$('#header').addClass('fixed').css({'top': adminBarHeight});
					$('body').css({'padding-top': mobileHeaderHeight});
				} else {
					$('#header').removeClass('fixed').css({'top': 0});
					$('body').css({'padding-top': 0});
				}

			}

		}

	}

	$( document ).ready(avventura_lite_header);
	$( window ).scroll(avventura_lite_header);
	$( window ).resize(avventura_lite_header);

/* ===============================================
   Footer fix
   =============================================== */

	function avventura_lite_footer() {

		var footerHeight = $('#footer').innerHeight();
		$('#wrapper').css({'padding-bottom':footerHeight});

	}

	$( window ).load(avventura_lite_footer);
	$( document ).ready(avventura_lite_footer);
	$( window ).resize(avventura_lite_footer);

/* ===============================================
   Scroll sidebar
   =============================================== */

	function avventura_lite_scroll() {

		if ( $(window).width() < 992 ) {

			$("#scroll-sidebar").niceScroll(".wrap", {
				cursorwidth: "10px",
				cursorborder: "1px solid #fff",
				railpadding: {
					top: 0,
					left: 0,
					bottom: 0,
					right: 0
				}
			});

			$('nav#mobilemenu ul > li > a').click(function(){
				setTimeout(function(){
				  $("#scroll-sidebar").getNiceScroll().resize();
				}, 500);
			});

		} else {
			$("#scroll-sidebar").getNiceScroll().remove();
		}

	}

	$(document).ready(function(){
		avventura_lite_scroll();
	});

	$(window).resize(function(){
		avventura_lite_scroll();
	});

	$(window).load(function() {

		$("#header .mobile-navigation").click(function() {

			$('#overlay-body').fadeIn(600).addClass('visible');
			$('body').addClass('overlay-active').addClass('no-scrolling');
			$('#wrapper').addClass('open-sidebar');

			$('#sidebar-wrapper').css({
			  display: "block"
			});

			$('#scroll-sidebar').animate({
			  left: "0px"
			}, 400);

		    setTimeout(function(){
				$('#scroll-sidebar a.mobile-navigation').focus();
    		}, 100);

		});

		if ( $(window).width() < 992 ) {

			$("#overlay-body").swipe({

				swipeLeft:function() {
					$('#overlay-body').fadeOut(600);
					$('body').removeClass('overlay-active').removeClass('no-scrolling');
					$('#wrapper').removeClass('open-sidebar');
				},

				threshold:0

			});

			$("#sidebar-wrapper .mobile-navigation").click(function() {

				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active').removeClass('no-scrolling');
				$('#wrapper').removeClass('open-sidebar');

				$('#scroll-sidebar').animate({
				  left: "-300px"
				}, 200);

				setTimeout(function(){
					$('#sidebar-wrapper').css({
					  display: "none"
					});
				}, 200);

			});

		} else if ( $(window).width() > 992 ) {

			$("#sidebar-wrapper .mobile-navigation, #overlay-body").click(function() {
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active').removeClass('no-scrolling');
				$('#wrapper').removeClass('open-sidebar');
				
				$('#scroll-sidebar').animate({
				  left: "-300px"
				}, 200);

				setTimeout(function(){
					$('#sidebar-wrapper').css({
					  display: "none"
					});
				}, 200);

			});

		}

	});

/* ===============================================
   Mobile menu
   =============================================== */

	$('nav#mobilemenu ul > li').each(function(){
		if( $('ul', this).length > 0 ) {
			$(this).children('a').append('<span class="sf-sub-indicator"><i class="fa fa-caret-down"></i></span>');
		}
	});

	$('nav#mobilemenu ul > li .sf-sub-indicator, nav#mobilemenu ul > li > ul > li .sf-sub-indicator ').click(function(e){
		e.preventDefault();
		if($(this).closest('a').next('ul.sub-menu').css('display') === 'none' ) {
			$(this).html('<i class="fa fa-caret-up"></i>');
		} else {
			$(this).html('<i class="fa fa-caret-down"></i>');
		}
		$(this).closest('a').next('ul.sub-menu').stop(true,false).slideToggle('slow');
	});

/* ===============================================
   Open header search
   =============================================== */

	function avventura_lite_open_search_form() {

		$('.header-search .search-form').addClass('is-open');
		$('body').addClass('no-scrolling');
		setTimeout(function(){
		   $('.search-form  #header-searchform input#header-s').filter(':visible').focus();
		}, 100);

		return false;
	}

	$( ".header-search a.open-search-form").on("click", avventura_lite_open_search_form);

/* ===============================================
   Close header search
   =============================================== */

	function avventura_lite_close_search_form() {
		$('.header-search .search-form').removeClass('is-open');
		$('body').removeClass('no-scrolling');
	}

	$( ".header-search a.close-search-form").on("click", avventura_lite_close_search_form);

/* ===============================================
   TRAP TAB FOCUS ON MODAL SEARCH
   ============================================= */

	$('.search-form  #header-searchform :input').on('keydown', function (e) {
	    if ($("this:focus") && (e.which === 9)) {
	        e.preventDefault();
	        $(this).blur();
	        $('.search-form a.close-search-form').focus();

	    }
	});

	$('.search-form  a.close-search-form').on('keydown', function (e) {
	    if ($("this:focus") && (e.which === 9)) {
	        e.preventDefault();
	        $(this).blur();
	        $('.search-form  #header-searchform :input').focus();

	    }
	});

/* ===============================================
   TRAP TAB FOCUS ON MODAL SIDEBAR
   ============================================= */

	var focusableElements = [
	  'button',
	  '[href]',
	  'input',
	  'select',
	  'textarea',
	  'textarea',
	  '[tabindex]:not([tabindex="-1"])',
	];

	$.each(focusableElements, function(index, value) {

		var elements = $('#scroll-sidebar').find(value);

		var firstEl = elements[0];
		var lastEl = elements[ elements.length - 1 ];

		$(document).on('keydown', function (event) {

			var tabKey = event.keyCode === 9;
			var shiftKey = event.shiftKey;
			var activeEl = document.activeElement;

			if ( ! shiftKey && tabKey && lastEl === activeEl ) {
				event.preventDefault();
				firstEl.focus();
			}

			if ( shiftKey && tabKey && firstEl === activeEl ) {
				event.preventDefault();
				lastEl.focus();
			}

		});

	});


/* ===============================================
   Scroll to top Plugin
   =============================================== */

	$(window).scroll(function() {

		if( $(window).scrollTop() > 400 ) {
			$('#back-to-top').fadeIn(500);
		} else {
			$('#back-to-top').fadeOut(500);
		}

	});

	$('#back-to-top').click(function(){
		$("html, body").animate({scrollTop: 0}, 700);
		return false;
	});

/* ===============================================
   Masonry
   =============================================== */

	function avventura_lite_masonry() {

		$('.masonry').imagesLoaded(function () {

			$('.masonry').masonry({
				itemSelector: '.masonry-item',
				isAnimated: true
			});

		});

	}

	$(document).ready(function(){
		avventura_lite_masonry();
	});

	$(window).resize(function(){
		avventura_lite_masonry();
	});

/* ===============================================
   Prettyphoto
   =============================================== */

	function avventura_lite_lightbox() {

		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'fast',
			slideshow:5000,
			theme:'pp_default',
			show_title:false,
			overlay_gallery: false,
			deeplinking: false,
			social_tools: false
		});

	}

	if( $().prettyPhoto ) {
		avventura_lite_lightbox();
	}

/* ===============================================
   Slick slider
   ============================================= */

	$('.slick-slideshow').each(function(){

		var mobilecolums = 1;
		var colums = parseInt($(this).attr('data-columns'));
		if ( colums >= 3 ) { mobilecolums = 2 ;}

		$(this).children('.slick-slides').slick({

			centerMode: true,
			slidesToShow: colums,
			prevArrow: '<div class="prev-arrow"><span class="dashicons dashicons-arrow-left-alt"></span></div>',
			nextArrow: '<div class="next-arrow"><span class="dashicons dashicons-arrow-right-alt"></span></div>',
			responsive: [
				{
					breakpoint: 480,
					settings: {
						centerMode: false,
						slidesToShow: 1,
						arrows: false
					}
				},
				{
					breakpoint: 600,
					settings: {
						centerMode: false,
						slidesToShow: 2,
						arrows: true
					}
				},
				{
					breakpoint: 992,
					settings: {
						centerMode: false,
						slidesToShow: mobilecolums,
						arrows: true
					}
				}

			]

		});

	});

	function slickActiveItem() {

		$('.slick-slideshow').each(function(){

			var items = $(this).find('.slick-slide').length;
			var colums = parseInt($(this).attr('data-columns'));
			$(this).find('.slick-slide').removeClass('slick-visible-item');

			if ( $('body').width() > 992 ) {

				if ( items <= colums ) {

					$(this).find('.slick-slide').addClass('slick-visible-item');

				} else {

					if ( colums%2 === 0 ) {

						$(this).find('.slick-active').prev().addClass('slick-visible-item');

					} else {

						$(this).find('.slick-active').addClass('slick-visible-item');

					}
				}

			} else {

				$(this).find('.slick-active').addClass('slick-visible-item');

			}

		});

	}

	$(document).ready(function(){

		slickActiveItem();
		$(".slick-slideshow .slick-slides").on('afterChange', function(){
			slickActiveItem();
		});

	});

/* ===============================================
   Slick Overlay fix
   =============================================== */

	function avventura_lite_slick_overlay() {

		$('.slick-slide').find('.slider-overlay').css({'height': 'auto', 'margin-top': 0 });

		$('.slick-slide').each(function(){

			var overlayHight ;
			var contentHeight = $(this).find('.slider-overlay-content').innerHeight();

			if ( $('body').width() < 992 ) {

				overlayHight = contentHeight+50;

			} else {

				overlayHight = contentHeight+150;

			}

			$(this).find('.slider-overlay').css({'height': overlayHight, 'margin-top': -overlayHight/2});

		});

	}

	$(document).ready(function(){
		avventura_lite_slick_overlay();
	});

	$(window).resize(function(){
		avventura_lite_slick_overlay();
	});

	/* ===============================================
	fitVids
	=============================================== */

	function avventura_lite_embed() {

		$('#wrapper').imagesLoaded(function () {
			$('.embed-container, .video-container, .maps-container').fitVids();
			avventura_lite_masonry();
		});

	}

	$(window).load(avventura_lite_embed);
	$(document).ready(avventura_lite_embed);

});
