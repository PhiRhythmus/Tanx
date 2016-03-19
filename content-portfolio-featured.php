<div class="post-header">
	<?php the_post_thumbnail(); ?>
	<div class="overlay">
		<div class="center">
			<a href="<?php the_permalink(); ?>" class="project-details">Project Details</a>
			<div class="categories">
				<?php //the_category(', '); ?>
			</div>
		</div>
	</div>
</div>
<?php if(!is_single()) { ?>
	<a href="<?php the_permalink(); ?>" class="post-title"><h2 class="heading"><?php the_title(); ?></h2></a>
	<span class="post-date">
		<?php the_category(', '); ?>
	</span>
<?php } ?>
<div class="post-content">
	<?php 
	$more_string = 'Continue reading';
	if(has_excerpt( $post->ID )) { ?>
	<p>
		<?php 
		echo get_the_excerpt();
		?> <a href="<?php the_permalink(); ?>" class="more-link"><?php echo $more_string; ?></a>
	</p> <?php
}
else 
if(shortcode_exists('[ssba_hide]')) {
	echo do_shortcode("[ssba_hide]");
}
?>
</div>