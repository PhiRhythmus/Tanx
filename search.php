<?php get_header(); ?>
<?php require_once(get_template_directory() . '/home-banner.php'); ?>

<section class="main-section">
<div class="container">
		<?php if(have_posts()) :
			while(have_posts()) : the_post(); ?>
				<div <?php post_class(); ?>>
					<?php get_template_part('content', get_post_format());  ?>
				</div>
			<?php endwhile;
		endif; ?>
</div>
</section>

<?php get_footer(); ?>
