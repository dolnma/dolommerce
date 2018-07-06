<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li class="col-md-12 col-lg-4 content-product" <?php post_class(); ?>>

		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

<div class="content-product__top">
	<div class="content-product__top__title">
		<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
	</div>
	<div class="content-product__top__price">
		<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>	
	</div>
</div>
	<?php echo $product->get_short_description();

	?>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>


</li>
