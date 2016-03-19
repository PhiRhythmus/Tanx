<?php get_header(); ?>
<?php require_once(get_template_directory() . '/home-banner.php'); ?>

<section class="main-section post-list">
<div class="container">

	<div class="search-404">
		<div class="row"></div>
		<h4><?php echo __("Search", "tanx"); ?></h4>
		<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="text" value="<?php get_search_query(); ?>" placeholder="<?php echo __("I'm sure we can come up with something...", "tanx"); ?>" name="s" id="s" />
		</form>
	</div>

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<ul id="sidebar-404">
			<div class="row">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		</ul>
	<?php endif; ?>
</div>
</section>

<?php get_footer(); ?>