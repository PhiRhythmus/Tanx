<div class="searchform-holder">
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" placeholder="<?php _e("Search...", "Tanx"); ?>" value="<?php echo get_search_query(); ?>" value="<?php get_search_query(); ?>" name="s" id="s" />
		<button><i class="icon_search"></i></button>
	</form>
</div>
