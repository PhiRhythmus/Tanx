<?php get_header(); ?>
<?php require_once(get_template_directory() . '/home-banner.php'); ?>

<section class="main-section">
		<div id="portfolio-container" class="container">
			<?php 
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						$pfitem_class = "col-md-";
						?> 
						<div class="portfolio-item-holder wow fadeInUp <?php echo $pfitem_class ."6" ?>">
							<div <?php post_class('post'); ?>> <?php
									get_template_part( 'content', 'portfolio' );
							?></div>
						</div> <?php 
					endwhile;
				endif;
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
