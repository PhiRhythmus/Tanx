<?php if(!is_single()) { ?>
	<a href="<?php the_permalink(); ?>" class="post-title"><h1 class="heading" style="margin-top:0"><?php the_title(); ?></h1></a>
	<span class="post-date">
		<?php the_date(); ?>
	</span>
<?php } ?>
<div class="post-content">
	<?php
		the_content();
		if(shortcode_exists('[ssba_hide]')) {
			echo do_shortcode("[ssba_hide]");
		}
	?>
</div>