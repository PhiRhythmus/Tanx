<div class="post-header">
	<?php the_post_thumbnail(); ?>
	<?php if(!is_single()): ?>
	<div class="overlay">
		<div class="center">
			<div class="content">
				<a href="<?php the_permalink(); ?>" class="project-details"><?php the_title(); ?></a>
				<div class="categories" data-content="">
					<?php 
						$term_list = wp_get_post_terms($post->ID, 'portfolio_category', array("fields" => "all"));
						foreach($term_list as $term) {
							echo '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
<div class="post-content">
	<?php 
	if(is_single()) { ?>
	<p>
		<?php the_content(); ?>
	</p> <?php
}
else 
if(shortcode_exists('[ssba_hide]')) {
	echo do_shortcode("[ssba_hide]");
}
?>
</div>