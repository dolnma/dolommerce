<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */
/**
 * Disable css styles from woocommerce
 */
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
 * Load JQUERY Script (CDN)
 */
function replace_jquery() {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js');
    wp_enqueue_script('jquery');
}
add_action('init', 'replace_jquery');
/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

add_action( 'widgets_init', 'overwrite_wc_widget', 15 );

/**
* Overwrite widget Product_Categories (footer)
*/
function overwrite_wc_widget() {
  if ( class_exists( 'WC_Widget_Product_Categories' ) ) {

    unregister_widget( 'WC_Widget_Product_Categories' );

    include_once ('woocommerce/includes/widgets/class-wc-widget-product-categories-custom.php');
    register_widget( 'WC_Widget_Product_Categories_Custom' );
  }
}

/**
* Overwrite single-product.js
*/
add_action('wp_enqueue_scripts', 'override_woo_frontend_scripts');
function override_woo_frontend_scripts() {
    wp_deregister_script('wc-single-product');
    wp_enqueue_script('wc-single-product', get_template_directory_uri() . '/js/single-product.js', array( 'jquery' ), null, true);
}

/**
* Woocommerce gallery enable/disable
*/
add_action( 'after_setup_theme', 'lavish_child_remove_woocommerce_support', 20 );
function lavish_child_remove_woocommerce_support() {
    // remove_theme_support( 'wc-product-gallery-zoom' );
    // remove_theme_support( 'wc-product-gallery-lightbox' );
    // remove_theme_support( 'wc-product-gallery-slider' );
}

/**
* Hide title on store page (homepage) woocommerce
*/


if ( is_front_page() && is_home() ) {
  // Default homepage
  add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
  } elseif ( is_front_page()){
  //Static homepage
  } elseif ( is_home()){
  
  //Blog page
  } else {
  
  //everything else
  }

  function woo_hide_page_title() {	
    return false;	
  } 

/**
* Remove number of results on the homepage
*/
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

add_filter('woocommerce_billing_fields', 'custom_woocommerce_billing_fields');

function custom_woocommerce_billing_fields($fields)
{

    $fields['billing_options'] = array(
        'label' => __('NIF', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Your NIF here....', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('my-css')    // add class name
    );

    return $fields;
}

add_filter( 'wc_add_to_cart_message_html', '__return_null' );