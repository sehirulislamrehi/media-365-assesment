(function ($) {
	"use strict";

	// image background
	function bgImageActive($scope, $) {
		$("[data-background]").each(function () {
			$(this).css(
				"background-image",
				"url(" + $(this).attr("data-background") + ") "
			);
		});
	}

	// data-bg-color
	function bgColorActive($scope, $) {
		$("[data-bg-color]").each(function () {
			$(this).css("background-color", $(this).attr("data-bg-color"));
		});
	}

	// tx_hero_slider
	function tx_hero_slider($scope, $) {
		setTimeout(function () {
			if ($(".tz-hero-slider-area").length) {
				var tz_hero_slider_area = new Swiper(".tz-hero-slider-area", {
					loop: true,
					speed: 1000,
					effect: "fade",
					fadeEffect: {
						crossFade: true,
					},
					autoplay: {
						delay: 4000,
					},
					navigation: {
						prevEl: ".tz-hs-prev",
						nextEl: ".tz-hs-next",
					},
					pagination: {
						el: ".tz-hs-pagi",
						clickable: true,
						renderBullet: function (index, className) {
							return (
								'<span class="' +
								className +
								'">' +
								(index + 1) +
								"</span>"
							);
						},
					},
				});
			}

			if ($(".tz-slider-active2").length) {
				var tz_slider_active2 = new Swiper(".tz-slider-active2", {
					loop: true,
					speed: 1000,
					effect: "fade",
					fadeEffect: {
						crossFade: true,
					},
					autoplay: {
						delay: 4000,
					},
					navigation: {
						prevEl: ".tz-hs-prev2",
						nextEl: ".tz-hs-next2",
					},
				});
			}

			if ($(".tz-hero3-slider").length) {
				var tz_hero3_slider = new Swiper(".tz-hero3-slider", {
					loop: true,
					speed: 1000,
					effect: "fade",
					fadeEffect: {
						crossFade: true,
					},
					pagination: {
						el: ".tz-hero3-pagination",
						clickable: true,
					},
					autoplay: {
						delay: 4000,
					},
				});
			}

			if ($(".tz-hero4-active").length) {
				var tz_hero4_active = new Swiper(".tz-hero4-active", {
					loop: true,
					speed: 1000,
					effect: "fade",
					fadeEffect: {
						crossFade: true,
					},
					autoplay: {
						delay: 4000,
					},
					pagination: {
						el: ".tz-hs4-pagi",
						clickable: true,
						renderBullet: function (index, className) {
							return (
								'<span class="' +
								className +
								'">' +
								(index + 1) +
								"</span>"
							);
						},
					},
				});
			}

			if ($(".tz-hero5-slider").length) {
				var tz_hero5_slider = new Swiper(".tz-hero5-slider", {
					loop: true,
					speed: 1000,
					effect: "fade",
					fadeEffect: {
						crossFade: true,
					},
					autoplay: {
						delay: 4000,
					},
					navigation: {
						prevEl: ".tz-hs-prev5",
						nextEl: ".tz-hs-next5",
					},
				});
			}
		}, 700);
	}

	// tx_testimonial
	function tx_testimonial($scope, $) {
		if ($(".tz-testi-slide").length) {
			var tz_testi_slide = new Swiper(".tz-testi-slide", {
				loop: true,
				speed: 1000,
				effect: "fade",
				fadeEffect: {
					crossFade: true,
				},
				navigation: {
					nextEl: ".tz-tst-next",
					prevEl: ".tz-tst-prev",
				},
			});
		}

		if ($(".tz-testi3-slider").length) {
			var tz_testi3_slider = new Swiper(".tz-testi3-slider", {
				speed: 1000,
				loop: true,
				spaceBetween: 30,
				navigation: {
					nextEl: ".tz-testi3-next",
					prevEl: ".tz-testi3-prev",
				},
				breakpoints: {
					0: {
						slidesPerView: 1,
					},
					576: {
						slidesPerView: 1,
					},
					768: {
						slidesPerView: 2,
					},
					992: {
						slidesPerView: 2,
					},
					1200: {
						slidesPerView: 3,
					},
					1400: {
						slidesPerView: 3,
					},
					1600: {
						slidesPerView: 3,
					},
				},
			});
		}

		if ($(".tz-testi5-slider").length) {
			var tz_testi5_slider = new Swiper(".tz-testi5-slider", {
				speed: 1000,
				spaceBetween: 20,
				autoplay: {
					delay: 2000,
				},
				direction: "vertical",
				breakpoints: {
					0: {
						slidesPerView: 1,
						direction: "horizontal",
					},
					576: {
						slidesPerView: 1,
						direction: "horizontal",
					},
					767: {
						slidesPerView: 1,
						direction: "horizontal",
					},
					768: {
						slidesPerView: 2,
					},
					992: {
						slidesPerView: 2,
					},
					1200: {
						slidesPerView: 2,
					},
					1400: {
						slidesPerView: 2,
					},
					1600: {
						slidesPerView: 2,
					},
				},
			});
		}

		if ($(".tz-proj5-slider").length) {
			var tz_proj5_slider = new Swiper(".tz-proj5-slider", {
				loop: true,
				speed: 1000,
				spaceBetween: 30,
				effect: "fade",
				fadeEffect: {
					crossFade: true,
				},
				navigation: {
					nextEl: ".tz-proj5-next",
					prevEl: ".tz-proj5-prev",
				},
			});
		}
	}

	// tx_service_lists
	function tx_service_lists($scope, $) {
		if ($(".tz-pro2-slide").length) {
			var tz_pro2_slide = new Swiper(".tz-pro2-slide", {
				speed: 1000,
				loop: true,
				spaceBetween: 30,
				autoplay: {
					delay: 3000,
				},
				pagination: {
					el: ".agt-pro2-pagination-2",
					clickable: true,
				},
				navigation: {
					nextEl: ".agt-pro2-next",
					prevEl: ".agt-pro2-prev",
				},
				breakpoints: {
					0: {
						slidesPerView: 1,
					},
					576: {
						slidesPerView: 1,
					},
					768: {
						slidesPerView: 1,
					},
					992: {
						slidesPerView: 2,
					},
					1200: {
						slidesPerView: 3,
					},
					1400: {
						slidesPerView: 4,
					},
					1600: {
						slidesPerView: 4,
					},
				},
			});
		}
	}

	//tx_team_lists
	function tx_team_lists($scope, $) {
		if ($(".tz-team2-slide").length) {
			var tz_team2_slide = new Swiper(".tz-team2-slide", {
				speed: 1000,
				loop: true,
				spaceBetween: 30,
				navigation: {
					nextEl: ".tz-team2-next",
					prevEl: ".tz-team2-prev",
				},
				breakpoints: {
					0: {
						slidesPerView: 1,
					},
					576: {
						slidesPerView: 1,
					},
					768: {
						slidesPerView: 2,
					},
					992: {
						slidesPerView: 2,
					},
					1200: {
						slidesPerView: 2,
					},
					1400: {
						slidesPerView: 2,
					},
					1600: {
						slidesPerView: 2,
					},
				},
			});
		}

		if ($(".tz-team3-slide").length) {
			var tz_team3_slide = new Swiper(".tz-team3-slide", {
				speed: 1000,
				loop: true,
				spaceBetween: 50,
				centeredSlides: true,
				navigation: {
					nextEl: ".tz-team3-next",
					prevEl: ".tz-team3-prev",
				},
				breakpoints: {
					0: {
						slidesPerView: 1,
					},
					576: {
						slidesPerView: 1,
					},
					768: {
						slidesPerView: 2,
					},
					992: {
						slidesPerView: 2,
					},
					1200: {
						slidesPerView: 3,
					},
					1400: {
						slidesPerView: 3,
					},
					1600: {
						slidesPerView: 3,
					},
				},
			});
		}
	}

	// tx_service_section
	function tx_service_section($scope, $) {
		if ($(".tz-pro3-slide").length) {
			var tz_pro3_slide = new Swiper(".tz-pro3-slide", {
				speed: 1000,
				loop: true,
				spaceBetween: 30,
				centeredSlides: true,
				navigation: {
					nextEl: ".tz-pro3-next",
					prevEl: ".tz-pro3-prev",
				},
				breakpoints: {
					0: {
						slidesPerView: 1,
					},
					576: {
						slidesPerView: 1,
					},
					768: {
						slidesPerView: 2,
					},
					992: {
						slidesPerView: 2,
					},
					1200: {
						slidesPerView: 3,
					},
					1400: {
						slidesPerView: 3,
					},
					1600: {
						slidesPerView: 3,
					},
				},
			});
		}

		if ($(".tz-project4-slider").length > 0) {
			var tz_project4_slider = new Swiper(".tz-project4-slider", {
				slidesPerView: 5,
				loop: true,
				centeredSlides: true,
				autoplay: {
					enabled: true,
					delay: 2000,
				},
				speed: 1000,
				on: {
					slideChange: function () {
						var activeIndex = this.activeIndex;
						var realIndex = this.slides[activeIndex].getAttribute(
							"data-swiper-slide-index"
						);
						$(".swiper-slide").removeClass(
							"swiper-slide-nth-prev-2 swiper-slide-nth-next-2"
						);
						$(
							'.swiper-slide[data-swiper-slide-index="' +
								realIndex +
								'"]'
						)
							.prev()
							.prev()
							.addClass("swiper-slide-nth-prev-2");
						$(
							'.swiper-slide[data-swiper-slide-index="' +
								realIndex +
								'"]'
						)
							.next()
							.next()
							.addClass("swiper-slide-nth-next-2");
					},
				},
				breakpoints: {
					1600: {
						slidesPerView: 5,
					},
					1200: {
						slidesPerView: 4,
						spaceBetween: 40,
					},
					992: {
						slidesPerView: 3,
						spaceBetween: 20,
					},
					991: {
						slidesPerView: 2,
						centeredSlides: false,
					},
					768: {
						slidesPerView: 2,
						spaceBetween: 20,
						centeredSlides: false,
					},
					576: {
						slidesPerView: 1,
						spaceBetween: 20,
						centeredSlides: false,
					},
					0: {
						slidesPerView: 1,
						centeredSlides: false,
					},
				},
			});
		}

		if ($(".tz-ser5-slider").length) {
			var tz_ser5_slider = new Swiper(".tz-ser5-slider", {
				speed: 1000,
				loop: true,
				spaceBetween: 30,
				navigation: {
					nextEl: ".tz-ser5-next",
					prevEl: ".tz-ser5-prev",
				},
				breakpoints: {
					0: {
						slidesPerView: 1,
					},
					576: {
						slidesPerView: 1,
					},
					768: {
						slidesPerView: 2,
					},
					992: {
						slidesPerView: 2,
					},
					1200: {
						slidesPerView: 3,
					},
					1400: {
						slidesPerView: 3,
					},
					1600: {
						slidesPerView: 3,
					},
				},
			});
		}
	}

	$(window).on("elementor/frontend/init", function () {
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tx_hero_section.default",
			function ($scope, $) {
				bgImageActive($scope, $);
			}
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tx_hero_slider.default",
			function ($scope, $) {
				tx_hero_slider($scope, $);
				bgImageActive($scope, $);
			}
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tx_testimonial.default",
			function ($scope, $) {
				tx_testimonial($scope, $);
			}
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tx_service_lists.default",
			function ($scope, $) {
				tx_service_lists($scope, $);
			}
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tx_team_lists.default",
			function ($scope, $) {
				tx_team_lists($scope, $);
			}
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tx_count_box.default",
			function ($scope, $) {
				bgImageActive($scope, $);
			}
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tx_service_section.default",
			function ($scope, $) {
				tx_service_section($scope, $);
			}
		);
		elementorFrontend.hooks.addAction(
			"frontend/element_ready/tx_contact_info.default",
			function ($scope, $) {
				bgImageActive($scope, $);
			}
		);
	});
})(jQuery);
