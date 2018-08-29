// Navbar navbar-toggle mobile menu
// molecules/navbar.scss
jQuery(document).ready(function ($) {

	$('.navbar-toggle').click(function () {

		$('.navbar ul').toggleClass('active');
		$(this).toggleClass('active');

	})

	$('.header__icon--open').click(function () {

		$('.header__searchinput').toggleClass('active');
		if (jQuery(window).width() < 600) {
			$('.header__logo').toggleClass('disable');
		} else {
		}

		$('.navbar').toggleClass('disable');
		$(".header__searchinput").find('input[type="text"]').focus();

		$('.header__icon').toggleClass('active');
		$('.navbar-toggle').toggleClass('disable');

		$('.icon-header__search').toggleClass('disable');
		$('.header__icon--close').addClass('active');
		$('.header__icon--close').removeClass('disable');

	})

	$('.header__icon--close').click(function () {

		$('.header__searchinput').toggleClass('active');
		if (jQuery(window).width() < 600) {
			$('.header__logo').toggleClass('disable');
		} else {
		}
		$('.navbar').toggleClass('disable');

		$('.icon-header__search').toggleClass('disable');
		$('.navbar-toggle').toggleClass('disable');

		$('.header__icon').toggleClass('active');

		$('.header__icon--close').addClass('disable');
		$('.header__icon--close').removeClass('active');

	})

});

jQuery(window).resize(function ($) {

	if (jQuery(window).width() > 768) {

		jQuery('.navbar ul').removeClass('active');
		jQuery('.navbar-toggle').removeClass('active');
		console.log("v poradku");
	} else {

	}

});