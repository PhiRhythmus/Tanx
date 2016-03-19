<div class="searchform-holder">
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'label' ); ?></label>
			<input type="text" placeholder="<?php _e("Search...", "Tanx"); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off" value="<?php get_search_query(); ?>" name="s" id="s" />
			<a href="#" class="close-search"><i class="icon_close"></i></a>
	</form>
	<a href="#" class="search-toggle"><i class="icon_search"></i></a>
</div>
