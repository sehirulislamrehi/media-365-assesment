/*
	Author: themexriver
	Version: 1.0
*/

(function ($) {
	"use strict";

	// tochspin for product count
	if ($("input.product-count").length) {
		$("input.product-count").TouchSpin({
			min: 1,
			max: 1000,
			step: 1,
			buttondown_class: "btn btn-link",
			buttonup_class: "btn btn-link",
		});
	}


	gsap.config({
		nullTargetWarn: false,
	});


	// lenis-smooth-scroll
	const lenis = new Lenis({
		duration: .8,
		easing: (t) => 1 - Math.pow(1 - t, 4),
		direction: 'vertical',
		smooth: true,
		smoothTouch: false,
	});

	function raf(time) {
		lenis.raf(time);
		requestAnimationFrame(raf);
	}
	requestAnimationFrame(raf);


	function TXTheaderSticky() {
		var $window = $(window);
		var lastScrollTop = 0;
		var $header = $('.txa_sticky_header');
		var headerHeight = $header.outerHeight() + 30;

		$window.scroll(function () {
			var windowTop = $window.scrollTop();

			if (windowTop >= headerHeight) {
				$header.addClass('txa_sticky');
			} else {
				$header.removeClass('txa_sticky');
				$header.removeClass('txa_sticky_show');
			}

			if ($header.hasClass('txa_sticky')) {
				if (windowTop < lastScrollTop) {
					$header.addClass('txa_sticky_show');
				} else {
					$header.removeClass('txa_sticky_show');
				}
			}

			lastScrollTop = windowTop;
		});
	}
	TXTheaderSticky();
	jQuery(window).on('scroll', function() {
		if (jQuery(window).scrollTop() > 250) {
			jQuery('.ag-header-section.header_style_three, .ag-header-section.header_style_four').addClass('sticky-on')
		} else {
			jQuery('.ag-header-section.header_style_three, .ag-header-section.header_style_four').removeClass('sticky-on')
		}
	});
	$('.open_mobile_menu, #m-main-nav .navbar-nav li a').on("click", function() {
		$('.mobile_menu_wrap').toggleClass("mobile_menu_on");
	});
	$('.open_mobile_menu, #m-main-nav .navbar-nav li a').on('click', function () {
		$('body').toggleClass('mobile_menu_overlay_on');
	});
	jQuery(".mobile-main-navigation li.dropdown").append('<span class="dropdown-btn"><i class="fas fa-angle-down"></i></span>'),
	jQuery(".mobile-main-navigation li .dropdown-btn").on("click", function () {
		jQuery(this).hasClass("active")
		? (jQuery(this).closest("ul").find(".dropdown-btn.active").toggleClass("active"), jQuery(this).closest("ul").find(".dropdown-menu.active").toggleClass("active").slideToggle())
		: (jQuery(this).closest("ul").find(".dropdown-btn.active").toggleClass("active"),
			jQuery(this).closest("ul").find(".dropdown-menu.active").toggleClass("active").slideToggle(),
			jQuery(this).toggleClass("active"),
			jQuery(this).parent().find("> .dropdown-menu").toggleClass("active"),
			jQuery(this).parent().find("> .dropdown-menu").slideToggle());
	});
	jQuery(document).ready(function (o) {
		0 < o(".navSidebar-button").length &&
		o(".navSidebar-button").on("click", function (e) {
			e.preventDefault(), e.stopPropagation(), o(".info-group").addClass("isActive");
		}),
		0 < o(".close-side-widget").length &&
		o(".close-side-widget").on("click", function (e) {
			e.preventDefault(), o(".info-group").removeClass("isActive");
		}),
		o(".xs-sidebar-widget").on("click", function (e) {
			e.stopPropagation();
		})
	});
	$('.zoom-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300,
			opener: function(element) {
				return element.find('img');
			}
		}
	});

	$('.tz-one-page .navbar-nav  li a').on("click", function(){
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top -0
				}, 1000);
				return false;
			}
		}
	});
	// Background Image
	$('[data-background]').each(function() {
		$(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
	});
	gsap.registerPlugin(ScrollTrigger);

	// Animation
	if($('.wow').length){
		var wow = new WOW(
		{
			boxClass:     'wow',
			animateClass: 'animated',
			offset:       0,
			mobile:       true,
			live:         true
		}
		);
		wow.init();
	};
	jQuery('.video_box').magnificPopup({
		disableOn: 200,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false,
	});
	if($('.tz-split-1').length) {
		var txtSplit = $('.tz-split-1');
		if(txtSplit.length == 0) return; gsap.registerPlugin(SplitText); txtSplit.each(function(index, el) {
			el.split = new SplitText(el, {
				type: "words",
				wordsClass: "split-line"
			});
		});
	}
	if($('.tz-split-2').length) {
		var txtSplit = $('.tz-split-2');
		if(txtSplit.length == 0) return; gsap.registerPlugin(SplitText); txtSplit.each(function(index, el) {
			el.split = new SplitText(el, {
				type: "lines",
				linesClass: "split-line"
			});
		});
	}
	$(window).on("scroll", function() {
		if ($(this).scrollTop() > 200) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});
	$('.scrollup').on("click", function()  {
		$("html, body").animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	// windows-loaded-before-functions
	document.addEventListener("DOMContentLoaded", function () {
		window.addEventListener('load', function(){

			CustomEase.create("ease1", ".645,.045,.355,1");

			let preloader = document.querySelector("#tx_preloader");
			if (preloader) {
				preloader.classList.add("preloaded");
				setTimeout(function () {
					preloader.remove();
				}, 1000 ) ;

			}
			setTimeout(function() {

				var TZHeroCategory = gsap.timeline({
					scrollTrigger: {
						trigger: ".tz-hero3-cate-content",
						start: "top 90%",
						toggleActions: "play reverse play reverse",
						markers: false  ,
					},
					defaults: { duration: 1,
						ease: "bounce.out",
					}
				});
				TZHeroCategory.from(".tz-hero3-category ul li" , { yPercent: -100, opacity: 0, stagger: .25 })

			}, 700);
		})
	});
		// Animation 1
	if($('.tz-itm-title').length) {
		var txtheading = $(".tz-itm-title");

		if(txtheading.length == 0) return; gsap.registerPlugin(SplitText); txtheading.each(function(index, el) {

			el.split = new SplitText(el, {
				type: "lines,words,chars",
				linesClass: "split-line"
			});

			if( $(el).hasClass('tz-itm-anim') ){
				gsap.set(el.split.chars, {
					opacity: .3,
					x: "-7",
				});
			}
			el.anim = gsap.to(el.split.chars, {
				scrollTrigger: {
					trigger: el,
					start: "top 92%",
					end: "top 60%",
					markers: false,
					scrub: 1,
				},

				x: "0",
				y: "0",
				opacity: 1,
				duration: .7,
				stagger: 0.2,
			});

		});
	}
	if($('.tz-sub-tilte').length) {
		var agtsub = $(".tz-sub-tilte");

		if(agtsub.length == 0) return; gsap.registerPlugin(SplitText); agtsub.each(function(index, el) {

			el.split = new SplitText(el, {
				type: "lines,words,chars",
				linesClass: "split-line"
			});

			if( $(el).hasClass('tz-sub-anim') ){
				gsap.set(el.split.chars, {
					opacity: 0,
					x: "7",
				});
			}

			el.anim = gsap.to(el.split.chars, {
				scrollTrigger: {
					trigger: el,
					start: "top 90%",
					end: "top 60%",
					markers: false,
					scrub: 1,
				},

				x: "0",
				y: "0",
				opacity: 1,
				duration: .7,
				stagger: 0.2,
			});

		});
	}
	if($(".tz-sub-head").length) {
		var tzSplit = $(".tz-sub-head");
		if(tzSplit.length == 0) return; gsap.registerPlugin(SplitText); tzSplit.each(function(index, el) {

			el.split = new SplitText(el, {
				type: "lines,words,chars",
				linesClass: "split-line",
			});

			let delayValue = $(el).attr("data-split-delay") || "0s";
			delayValue = parseFloat(delayValue) || 0;

			if( $(el).hasClass('tz-sub-head') ){
				gsap.set(el.split.chars, {
					yPercent: 100 ,
				});
			}

			el.anim = gsap.to(el.split.chars, {
				scrollTrigger: {
					trigger: el,
					start: "top 86%",
					toggleActions: 'play none none reverse',
				},
				opacity: 1,
				yPercent: 0,
				xPercent: 0,
				duration: .8,
				ease: "back.out(2)",
				stagger: {
					amount: .7,
					from: "random",
				},
				delay: delayValue,
			});

		});
	}
// Circle Animation
	if ($('.tz-circle-anim').length > 0 ) {
		const path = document.getElementById('line_path');
		const plane = document.getElementById('paper-plane');
		const pathLength = path.getTotalLength();
		let progress = 0.5;
		let speed = 0.0012;
		function animatePlane() {
			const point = path.getPointAtLength(progress * pathLength);
			plane.setAttribute('transform', `translate(${point.x}, ${point.y})`);
			const tangent = path.getPointAtLength((progress + 0.01) * pathLength);
			const angle = Math.atan2(tangent.y - point.y, tangent.x - point.x);
			plane.setAttribute('transform', `translate(${point.x}, ${point.y}) rotate(${angle * 180 / Math.PI})`);
			progress += speed;
			if (progress > 1) {
				progress = 0;
			}
			requestAnimationFrame(animatePlane);
		}
		animatePlane();
	};
// Marquee Active
	$('.marquee-left').marquee({
		gap: 0,
		speed: 100,
		delayBeforeStart: 0,
		direction: 'left',
		duplicated: true,
		pauseOnHover: true,
		startVisible:true,
	});
	$('.marquee-right').marquee({
		gap: 0,
		speed: 100,
		delayBeforeStart: 0,
		direction: 'right',
		duplicated: true,
		pauseOnHover: true,
		startVisible:true,
	});
// counter-activation
	$('.counter').counterUp({
		delay: 10,
		time: 5000
	});
// Testimonial Slider




	if ($(".progress-bar").length) {
		var $progress_bar = $('.progress-bar');
		$progress_bar.appear();
		$(document.body).on('appear', '.progress-bar', function() {
			var current_item = $(this);
			if (!current_item.hasClass('appeared')) {
				var percent = current_item.data('percent');
				current_item.css('width', percent + '%').addClass('appeared').parent().append('<span>' + percent + '%' + '</span>');
			}

		});
	};
	$('#workp5tab .nav-link').hover(function() {
		$(this).tab('show');
	});

	// Animation
	gsap.utils.toArray(' .left_view').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top 30%",
				start: "top 100%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: 1, xPercent: "-100"}, {opacity: 1, xPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .left_view_5').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top 20%",
				start: "top 80%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: 1, xPercent: "100"}, {opacity: 1, xPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .top_view').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top 40%",
				start: "top 100%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: 1, yPercent: "50"}, {opacity: 1, yPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .top_view_3').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top 40%",
				start: "top 100%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: 1, yPercent: "50"}, {opacity: 1, yPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .left_move').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1,
				end: "top 40%",
				start: "top 100%",
				ease: "Back.easeOut",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: .8, xPercent: "100"}, {opacity: 1, scale: 1, xPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .right_move').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1,
				end: "top 40%",
				start: "top 100%",
				ease: "Back.easeOut",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: .8, xPercent: "-100"}, {opacity: 1, scale: 1, xPercent: 0, duration: 1, immediateRender: false})
	});
	const TopView = document.querySelectorAll('.top_view_2');

	TopView.forEach((box) => {
		ScrollTrigger.create({
			trigger: box,
			toggleActions: 'play reverse play reverse',
			onEnter: () => box.classList.add('in-view'),
			onLeaveBack: () => box.classList.remove('in-view'),
			markers: false,
		});
	});
	var TzTeam = gsap.timeline({
		scrollTrigger: {
			trigger: ".tz-team-sec",
			start: "top 70%",
			toggleActions: "play reverse play reverse",
			markers: false,
		},
	})
	TzTeam
	.from(".tz-team-item", {
		yPercent: 100,
		opacity: 0,
		ease: "back.out(1.5)",
		duration: 1,
		stagger: -.3,
	})
	var TzProcess = gsap.timeline({
		scrollTrigger: {
			trigger: ".tz-wrkp-content",
			start: "top 70%",
			toggleActions: "play reverse play reverse",
			markers: false,
		},
	})
	TzProcess
	.from(".tz-wrkp-item", {
		yPercent: 100,
		opacity: 0,
		ease: "back.out(1.5)",
		duration: 1,
		stagger: -.3,
	})
	gsap.utils.toArray(' .slide_view_1').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top -80%",
				start: "top 0%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'top'})
		.from(el, { opacity: 1, scale: 1,  y: "-=300"}, {opacity: 1, y: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .slide_view_2').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top -40%",
				start: "top 100%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'bottom bottom'})
		.from(el, { opacity: 1, scale: 1, y: "+=300"}, {opacity: 1, y: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .side_view_1').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: ".tz-project-sec",
				scrub: 1.5,
				end: "top -40%",
				start: "top 100%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'bottom bottom'})
		.from(el, { opacity: 1, scale: 1,  xPercent: -100}, {opacity: 1, xPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .side_view_2').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: ".tz-project-sec",
				scrub: 2,
				end: "top -50%",
				start: "top 90%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'bottom bottom'})
		.from(el, { opacity: 1, scale: 1, xPercent: -100}, {opacity: 1, xPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray('.zoom_view').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: ".tz-testimonial-sec",
				scrub: 2,
				end: "top -10%",
				start: "top 90%",
				ease: "back.out(1.5)",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: .5, }, {opacity: 1, scale: 1, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .zoom_view_3').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: ".tz-contact3-sec",
				scrub: 2,
				end: "top -10%",
				start: "top 50%",
				ease: "back.out(1.5)",
				toggleActions: "play none none reverse",
				markers: false,
			}
		})

		tlcta
		.set(el, {transformOrigin: 'bottom bottom'})
		.from(el, { opacity: 1, yPercent: -100, }, {opacity: 1, yPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .zoom_view_4').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: ".tz-team5-sec",
				scrub: 2,
				end: "top -10%",
				start: "top 50%",
				ease: "back.out(1.5)",
				toggleActions: "play none none reverse",
				markers: false,
			}
		})

		tlcta
		.set(el, {transformOrigin: 'bottom bottom'})
		.from(el, { opacity: 1, yPercent: 100, }, {opacity: 1, yPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .zoom_view_4').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: ".tz-team3-sec",
				scrub: 2,
				end: "top -50%",
				start: "top 50%",
				ease: "back.out(1.5)",
				toggleActions: "play none none reverse",
				markers: false,
			}
		})

		tlcta
		.set(el, {transformOrigin: 'top top'})
		.from(el, { opacity: 1, yPercent: 100, }, {opacity: 1, yPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .zoom_view_5').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: ".tz-pro3-sec",
				scrub: 2,
				end: "top -50%",
				start: "top 50%",
				ease: "back.out(1.5)",
				toggleActions: "play none none reverse",
				markers: false,
			}
		})

		tlcta
		.set(el, {transformOrigin: 'top top'})
		.from(el, { opacity: 1, yPercent: 100, }, {opacity: 1, yPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .up_down').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: ".tz-contact3-sec",
				scrub: 2,
				end: "top -10%",
				start: "top 50%",
				ease: "back.out(1.5)",
				toggleActions: "play none none reverse",
				markers: false,
			}
		})

		tlcta
		.set(el, {transformOrigin: 'top top'})
		.from(el, { opacity: 1, scaleY: 0, }, {opacity: 1, scaleY: 1, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .tz-ab3-circle').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 3,
				start: "top 0%",
				end: "top -100%",
				toggleActions: "play reverse none reverse",
				markers: false,
			}
		})

		tlcta
		.set(el, {transformOrigin: 'top top'})
		.fromTo(el, { y: -300}, { y: 300, duration: 1})
	});
	gsap.utils.toArray(' .tz-ab3-circle').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 3,
				start: "top 0%",
				end: "top -100%",
				toggleActions: "play reverse none reverse",
				markers: false,
			}
		})

		tlcta
		.set(el, {transformOrigin: 'top top'})
		.fromTo(el, { y: -300}, { y: 300, duration: 1})
	});
	gsap.utils.toArray(".tz-img-anim").forEach(element => {
		const animTime = parseFloat(element.getAttribute("tz-anim-time")) || 1;
		gsap.fromTo(
			element,
			{ clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)" },
			{
				clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
				ease: "ease1",
				duration: animTime,
				scrollTrigger: {
					trigger: element,
					start: "top 50%",
					toggleActions: "play none none reverse",
					markers: false,
				},
			}
			);
	});
	gsap.utils.toArray(".tz-img-anim-2").forEach(element => {
		const animTime = parseFloat(element.getAttribute("tz-anim-time")) || 1;
		gsap.fromTo(
			element,
			{ clipPath: "polygon(0 0, 0 0, 0 100%, 0% 100%)" },
			{
				clipPath: "polygon(0 0, 100% 0, 100% 100%, 0 100%)",
				ease: "ease1",
				duration: animTime,
				scrollTrigger: {
					trigger: element,
					start: "top 50%",
					toggleActions: "play none none reverse",
					markers: false,
				},
			}
			);
	});
	//Animation

	if(window.innerWidth> 991){
		let proSroll = gsap.timeline();
		let otherSections_2 = document.querySelectorAll('.tz_sticky_item')
		otherSections_2.forEach((section, index) => {
			gsap.set(otherSections_2, {
				scale: 1
			});
			proSroll.to(section, {
				scale: index === otherSections_2.length - 1 ? 1 : 0.9,
				scrollTrigger: {
					trigger: section,
					pin: section,
					scrub: 1,
					start: 'top 0%',
					end: "bottom 60%",
					ease: "none",
					endTrigger: '.tz-project-content',
					pinSpacing: false,
					markers: false,
				},
			})
		});
	};
	gsap.utils.toArray(".img-parallax").forEach(function(container) {
		let image = container.querySelector("img");

		let tl = gsap.timeline({
			scrollTrigger: {
				trigger: container,
				scrub: true,
				pin: false,
			},
		});
		tl.from(image, {
			yPercent: -30,
			ease: "none",
		}).to(image, {
			yPercent: 30,
			ease: "none",
		});
	});
	gsap.utils.toArray(' .left_view').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top 30%",
				start: "top 100%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: .5, x: "200"}, {opacity: 1, x: 0, duration: 1, immediateRender: false})
	});

	gsap.utils.toArray(' .right_view').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top 30%",
				start: "top 100%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: .5,  xPercent: "-100"}, {opacity: 1, xPercent: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(' .right_view_2').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 1.5,
				end: "top 30%",
				start: "top 100%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 1, scale: .5,  x: "200"}, {opacity: 1, x: 0, duration: 1, immediateRender: false})
	});

	gsap.utils.toArray(' .top_view').forEach((el, index) => {
		let tlcta = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				scrub: 2,
				start: "top 80%",
				end: "top 90%",
				toggleActions: "play none none reverse",
				markers: false
			}
		})

		tlcta
		.set(el, {transformOrigin: 'center center'})
		.from(el, { opacity: 0,  y: "=70"}, {opacity: 1, y: 0, duration: 1, immediateRender: false})
	});
	gsap.utils.toArray(".img-zoom").forEach(function (container) {
		let image = container.querySelector("img");
		let tl = gsap.timeline({
			scrollTrigger: {
				trigger: container,
				scrub: true,
				pin: false,
			},
		});
		tl.from(image, {
			scale: 1.5,
			filter: "grayscale(1)",
			ease: "none",
		}).to(image, {
			scale: 1,
			filter: "grayscale(0)",
			ease: "none",
		});
	});


})(jQuery);
