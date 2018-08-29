<form method="get" class="form__search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input class="input--header-search block--bordered" id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
	<button class="btn navbar__search__icon" id="searchsubmit" name="submit" type="submit"><i class="fa fa-search"></i></button>
</form>