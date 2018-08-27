// Navbar navbar-toggle mobile menu
// molecules/navbar.scss
jQuery(document).ready(function ($) {

	$('.navbar-toggle').click(function () {

		$('.navbar ul').toggleClass('opening');
		$(this).toggleClass('open');

	})

});

jQuery(window).resize(function ($) {

	if (jQuery(window).width() > 768) {

		jQuery('.navbar ul').removeClass('opening');
		jQuery('.navbar-toggle').removeClass('open');
		console.log("v poradku");
	} else {

	}

});