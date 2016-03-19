<?php get_header(); ?>
<?php require_once(get_template_directory() . '/home-banner.php'); ?>

<section class="main-section post-content">
	<div class="container">
		<div <?php post_class(); ?>>
			<?php get_template_part('content', 'portfolio');  ?>
			<div class="post-bottom">
				<div class="row social">
					<div class="col-sm-6 text-left-mobile">
						<p class="share-story"><?php _e('Share This Project', 'tanx'); ?></p>
					</div>
					<div class="col-sm-6 text-left-mobile">
						<?php
							if (shortcode_exists("ssba")) {
								echo do_shortcode("[ssba]"); 
							}
						?>
					</div>
				</div>
				<div class="row post-details">
					<div class="col-sm-6 text-left-mobile">
						<h6 class="heading"><?php _e('Category', 'tanx'); ?></h6>
						<div class="categories">
							<?php $post_categories = $cats = array();
								$term_list = wp_get_post_terms($post->ID, 'portfolio_category', array("fields" => "all"));
								foreach($term_list as $term) {
									echo '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
								}
							?>
						</div>
					</div>
					<div class="col-sm-6 text-left-mobile">
						<h6 class="heading"><?php _e('Tags', 'tanx'); ?></h6>
						<div class="categories">
							<?php $post_categories = $cats = array();
								$term_list = wp_get_post_terms($post->ID, 'portfolio_tag', array("fields" => "all"));
								foreach($term_list as $term) {
									echo '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
								}
							?>
						</div>
					</div>
				</div>
			</div> <!-- post-bottom-end -->
			<div class="post-navigation">
				<div class="row">
					<div class="col-xs-6 prev-post">
						<?php
							$prev_post = get_previous_post();
							if (!empty( $prev_post )): ?>
								<h6 class="muted light heading"><?php _e("Previous Project", 'tanx'); ?></h6>
						  		<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo truncateString($prev_post->post_title, 20); ?></a>
						<?php endif; ?>
					</div>
					<div class="col-xs-6 next-post text-right">
						<?php
							$next_post = get_next_post();
							if (!empty( $next_post )): ?>
								<h6 class="muted light heading"><?php _e("Next Project", 'tanx'); ?></h6>
						  		<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo truncateString($next_post->post_title, 25); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div> <!-- post-navigation-end -->
		</div>
		<?php comments_template(); ?>
	</div>
</section>

<?php get_footer(); ?>