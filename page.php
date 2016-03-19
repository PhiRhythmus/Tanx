<?php get_header(); ?>
<?php require_once(get_template_directory() . '/home-banner.php'); ?>

<section class="main-section">
	<div <?php post_class(); ?>>
		<div class="container">
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>