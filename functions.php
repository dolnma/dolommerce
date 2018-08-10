<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */
// vypnuti css stylu woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

add_action( 'widgets_init', 'overwrite_wc_widget', 15 );

function overwrite_wc_widget() {
  if ( class_exists( 'WC_Widget_Product_Categories' ) ) {

    unregister_widget( 'WC_Widget_Product_Categories' );

    include_once ('woocommerce/includes/widgets/class-wc-widget-product-categories-custom.php');
    register_widget( 'WC_Widget_Product_Categories_Custom' );
  }
}

// /**
// * @return remove woocommerce support for zooming effect
// */

// add_action( 'after_setup_theme', 'lavish_child_remove_woocommerce_support', 20 );
// function lavish_child_remove_woocommerce_support() {
//     remove_theme_support( 'wc-product-gallery-zoom' );
//     remove_theme_support( 'wc-product-gallery-lightbox' );
//     remove_theme_support( 'wc-product-gallery-slider' );
// }

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */



// add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles' );

// function child_manage_woocommerce_styles() {
// 	//remove generator meta tag
// 	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

// 	//first check that woo exists to prevent fatal errors
// 	if ( function_exists( 'is_woocommerce' ) ) {
// 		//dequeue scripts and styles
// 		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
// 			wp_dequeue_style( 'woocommerce_frontend_styles' );
// 			wp_dequeue_style( 'woocommerce_fancybox_styles' );
// 			wp_dequeue_style( 'woocommerce_chosen_styles' );
// 			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
// 			wp_dequeue_script( 'wc_price_slider' );
// 			wp_dequeue_script( 'wc-single-product' );
// 			wp_dequeue_script( 'wc-add-to-cart' );
// 			wp_dequeue_script( 'wc-cart-fragments' );
// 			wp_dequeue_script( 'wc-checkout' );
// 			wp_dequeue_script( 'wc-add-to-cart-variation' );
// 			wp_dequeue_script( 'wc-single-product' );
// 			wp_dequeue_script( 'wc-cart' );
// 			wp_dequeue_script( 'wc-chosen' );
// 			wp_dequeue_script( 'woocommerce' );
// 			wp_dequeue_script( 'prettyPhoto' );
// 			wp_dequeue_script( 'prettyPhoto-init' );
// 			wp_dequeue_script( 'jquery-blockui' );
// 			wp_dequeue_script( 'jquery-placeholder' );
// 			wp_dequeue_script( 'fancybox' );
// 			wp_dequeue_script( 'jqueryui' );
// 		}
// 	}

// }

// add_action('wp_enqueue_scripts', 'class-wc-frontend-scripts');

add_action('wp_enqueue_scripts', 'override_woo_frontend_scripts');
function override_woo_frontend_scripts() {
    wp_deregister_script('wc-single-product');
    wp_enqueue_script('wc-single-product', get_template_directory_uri() . '/js/single-product.js', array( 'jquery' ), null, true);
}