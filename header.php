<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
    <!-- Awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">

    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="hfeed site" id="page">

        <!-- The Modal -->
        <div id="AddToCartModal" class="modal">

            <!-- Modal content -->
            <div class="modal__content">
                <span class="close"><i class="fas fa-times"></i></span>
                <table class="table table--modal">
                    <thead>
                        <tr>
                            <th>
                                <?php esc_attr_e( 'Product', 'understrap' ); ?>
                            </th>
                            <th>
                                <?php esc_attr_e( 'Quantity', 'understrap' ); ?>
                            </th>
                            <th>
                                <?php esc_attr_e( 'Total', 'understrap' ); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="AddToCartTable">
                    </tbody>
                </table>
                <div class="row modal__content__product">
                <?php esc_attr_e( 'Added to cart', 'understrap' ); ?>&nbsp;<div class="get_cart_name"></div>&nbsp;-&nbsp; 
                    <?php esc_attr_e( 'Price', 'understrap' ); ?>:&nbsp;<div class='get_cart_total text--primary'></div>&nbsp;<?php esc_attr_e( '$', 'understrap' ); ?>
                </div>
                <div class="row modal__content__checkout col-12">
                <div class="col-12 col-sm-12"><a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><button class="btn btn-secondary btn-secondary--shadow btn__fixed"><?php esc_attr_e( 'Return To Shop', 'understrap' ) ?></button></a></div>
                <div class="col-12 col-sm-12 modal__content__checkout__continue"><?php do_action( 'woocommerce_proceed_to_checkout' ); ?></div>               
            </div>
            </div>
        </div>

        <div class="header">

            <div class='get_cart_total'></div>

            <div class="header__wrap container">
                <div class="header__logo">
                    <!-- Your site title as branding in the menu -->
                    <?php if ( ! has_custom_logo() ) { ?>

                    <?php if ( is_front_page() && is_home() ) : ?>

                    <h1 class="navbar-brand mb-0">
                        <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                            itemprop="url">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </h1>

                    <?php else : ?>

                    <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                        itemprop="url">
                        <?php bloginfo( 'name' ); ?>
                    </a>

                    <?php endif; ?>


                    <?php } else { ?>
                    <div class="header__logo-img">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php } ?>
                    <!-- end custom logo -->

                </div>
                <div class="header__right">

                    <!-- The WordPress Menu goes here -->
                    <?php wp_nav_menu(
        array(
            'theme_location'  => 'primary',
            'container_class' => 'navbar',
            'container_id'    => '',
            'menu_class'      => '',
            'fallback_cb'     => '',
            'menu_id'         => 'main-menu',
            'walker'          => new understrap_WP_Bootstrap_Navwalker(),
        )
    );
    ?>
                    <div class="header__searchinput">
                        <?php 
                        get_search_form();
                        ?>
                    </div>


                    <div class="header__icon">
                        <div class="navbar__search">
                            <i class="header__icon--open icon-header__search fa fa-search"></i>
                            <div class="header__icon--close text--primary">&times;</div>
                        </div>

                        <div class="navbar-toggle">
                            <div class="navbar__icon"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- .header -->

        <a class="skip-link screen-reader-text sr-only" href="#content">
            <?php esc_html_e( 'Skip to content', 'understrap' ); ?>
        </a>

        <?php if ( 'container' == $container ) : ?>

        <div class="container">
            <?php endif; ?>

            <?php if ( 'container' == $container ) : ?>
        </div>
        <!-- .container -->
        <?php endif; ?>