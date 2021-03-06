<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

	<?php wc_print_notices(); ?>

	<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

	<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	<div class="u-columns col2-set row" id="customer_login">

		<div class="u-column1 col-md-6">

			<?php endif; ?>

			<h2>
				<?php esc_html_e( 'Login', 'understrap' ); ?>
			</h2>

			<form class="form woocommerce-form-login login" method="post">


				<?php do_action( 'woocommerce_login_form_start' ); ?>

				<ul class="form-outer">
					<li>
						<label for="username">
							<?php esc_html_e( 'Username or email address', 'understrap' ); ?>
							<span class="required">*</span>
						</label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username"
						    value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
						<?php // @codingStandardsIgnoreLine ?>
					</li>
					<li>
						<label for="password">
							<?php esc_html_e( 'Password', 'understrap' ); ?>
							<span class="required">*</span>
						</label>
						<input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password"
						/>
					</li>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<li>
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						<button type="submit" class="btn btn-outline-primary" name="login" value="<?php esc_attr_e( 'Login', 'understrap' ); ?>">
							<?php esc_html_e( 'Login', 'understrap' ); ?>
						</button>
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme"
							    value="forever" />
							<span>
								<?php esc_html_e( 'Remember me', 'understrap' ); ?>
							</span>
						</label>
					</li>
					<li>
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
							<?php esc_html_e( 'Lost your password?', 'understrap' ); ?>
						</a>
					</li>

					<?php do_action( 'woocommerce_login_form_end' ); ?>
				</ul>
			</form>

			<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

		</div>

		<div class="u-column2 col-md-6">

			<h2>
				<?php esc_html_e( 'Register', 'understrap' ); ?>
			</h2>

			<form method="post" class="form register">
				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<ul class="form-outer">
				<li>
					<label for="reg_username">
						<?php esc_html_e( 'Username', 'understrap' ); ?>
						<span class="required">*</span>
					</label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username"
					    value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
				</li>

				<?php endif; ?>

				<li>
					<label for="reg_email">
						<?php esc_html_e( 'Email address', 'understrap' ); ?>
						<span class="required">*</span>
					</label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email"
					    value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>" />
				</li>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<li>
					<label for="reg_password">
						<?php esc_html_e( 'Password', 'understrap' ); ?>
						<span class="required">*</span>
					</label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password"
					/>
				</li>

				<?php endif; ?>

				<?php do_action( 'woocommerce_register_form' ); ?>

				<li>
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<button type="submit" class="btn btn-outline-primary" name="register" value="<?php esc_attr_e( 'Register', 'understrap' ); ?>">
						<?php esc_html_e( 'Register', 'understrap' ); ?>
					</button>
				</li>

				<?php do_action( 'woocommerce_register_form_end' ); ?>
				</ul>
			</form>

		</div>

	</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_customer_login_form' ); ?>