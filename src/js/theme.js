var SiteUrl = "https://esvitilna.cz"
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
		} else {}

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
		} else {}
		$('.navbar').toggleClass('disable');

		$('.icon-header__search').toggleClass('disable');
		$('.navbar-toggle').toggleClass('disable');

		$('.header__icon').toggleClass('active');

		$('.header__icon--close').addClass('disable');
		$('.header__icon--close').removeClass('active');

	})

	// $.ajax({
	//     url: "http://esvitilna.test:3000/wp-content/themes/dolommerce/woocommerce/loop/add-to-cart_update.php",
	//     data : {action : 'custom_checkout_jquery_script'},
	//     success: function( data ) {
	//         alert( 'The code says ' + data);
	//     }
	// })

	// $('.get_cart_total').load("http://esvitilna.test:3000/wp-content/themes/dolommerce/woocommerce/loop/add-to-cart_update.php");

	// $(".get_cart_total").load("http://esvitilna.test/wp-content/themes/dolommerce/woocommerce/loop/add-to-cart_update.php", function(response, status, xhr) {
	// 	if (status == "error") {
	// 		// alert(msg + xhr.status + " " + xhr.statusText);
	// 		console.log(msg + xhr.status + " " + xhr.statusText);
	// 	}
	//   });

	$.ajax({
		type: 'GET',
		url: SiteUrl+'/wp-json/wc/v2/cart/',
		dataType: 'json',
		success: function (data) {
			$.each(data, function (i, item) {

				var totalTaxes = 0;

				$.each(data, function () {
					totalTaxes += this.line_total;
				})
				$('.get_cart_total').html(totalTaxes);
				// console.log(itemcount);
				console.log(totalTaxes);
			});
		}
	});

	var modal = $('#AddToCartModal');

	// Get the button that opens the modal
	// var btn = $('.add_to_cart_button')[0];
	var btn = $('.added');

	// Get the <span> element that closes the modal
	var span = $('.close')[0];

	$(document).on("click", ".add_to_cart_button", function () {
		modal.css("display", "block");
		console.log("modal opened");

			$.ajax({
				type: 'GET',
				url: SiteUrl+'/wp-json/wc/v2/cart/',
				dataType: 'json',
				success: function (data) {
					$.each(data, function (i, item) {

						var total_taxes = "";
						var product_name = "";

						$.each(data, function () {
							total_taxes = item.line_total;
							product_name = item.product_name;
						})
						$('.get_cart_total').html(total_taxes);
						$('.get_cart_name').html(product_name);
						// console.log(itemcount);
						console.log(total_taxes);
					});
				}
			});

			$.ajax({
				type: 'GET',
				url: SiteUrl+'/wp-json/wc/v2/cart/',
				dataType: 'json',
				success: function (data) {
					$.each(data, function (i, item) {

						var total_taxes = "";
						var product_name = "";

						$.each(data, function () {
							total_taxes = item.line_total;
							product_name = item.product_name;
						})
						$('.get_cart_total').html(total_taxes);
						$('.get_cart_name').html(product_name);
						// console.log(itemcount);
						console.log(total_taxes);
					});
				}
			});

		// $.ajax({
		// 	type: 'GET',
		// 	url: 'http://esvitilna.test:3000/wp-json/wc/v2/cart/',
		// 	dataType: 'json',
		// 	success: function (data) {
		// 		$.each(data, function (i, item) {
		// 			var totalTaxes = 0;

		// 			$.each(data, function () {
		// 				totalTaxes += this.line_total;
		// 			})
		// 			$('.get_cart_total').html(totalTaxes);
		// 			$('.get_cart_name').html(item.product_name);
		// 			// console.log(itemcount);
		// 			console.log(totalTaxes);
		// 		});
		// 	}
		// });

		$(document).ready(function () {
			// Using the JSON format from your question

			$.ajax({
				type: 'GET',
				url: SiteUrl+'/wp-json/wc/v2/cart/',
				dataType: 'json',
				success: function (response) {
					var trHTML = '';
					$.each(response, function (key, value) {
						trHTML +=
							'<tr></td><td>' + value.product_name +
							'</td><td>' + value.quantity +
							'</td><td>' + value.line_total +
							'</td></tr>';
					});

					$('#AddToCartTable').html(trHTML);
				}
			});
		});
	});

	// When the user clicks on <span> (x), close the modal
	span.onclick = function () {
		modal.css("display", "none");
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function (event) {
		if (event.target == modal) {
			modal.css("display", "none");
		}
	}

	$('.slider__home').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		adaptiveHeight: true
      });

});

jQuery(window).resize(function ($) {

	if (jQuery(window).width() > 768) {

		jQuery('.navbar ul').removeClass('active');
		jQuery('.navbar-toggle').removeClass('active');
		console.log("v poradku");
	} else {

	}

});