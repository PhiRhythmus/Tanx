<?php get_header(); 
/*
Template Name: Portfolio List
*/ 
?>
<?php require_once(get_template_directory() . '/home-banner.php'); ?>


<section class="main-section">
		<?php $contentpf = get_the_content();
			if($contentpf != null):
		?>
		<div class="page-content">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="container">
		<div class="portfolio-holder">
		<div id="portfolio-container">
			<?php
				$custom_posts = new WP_Query( array(
					'post_type' => 'portfolio',
					'order_by' => 'title',
					'order'    => 'asc',
					'nopaging' => 'true',
					'posts_per_page' => -1

				));
				global $query_string;
				query_posts( $query_string . '&posts_per_page=-1' );
				if ( $custom_posts->have_posts() ) :
					while ( $custom_posts->have_posts() ) : $custom_posts->the_post();
						?> 
						<div class="portfolio-item-holder wow fadeInUp col-sm-6">
							<div <?php post_class('post'); ?>> <?php
									get_template_part( 'content', 'portfolio' );
							?></div>
						</div> <?php 
					endwhile;
				endif;
			?>
		</div>
		</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>