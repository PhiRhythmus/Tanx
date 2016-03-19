	<div class="post-header">
		<?php  $gallery = get_post_gallery_images( $post->ID );	
				$image_list = '<div class="gallery-post-slider">';
				foreach( $gallery as $image ) {
					$image_list .= '<img class="item" src="' . $image . '">';
				}
				$image_list .= '</div>';
				echo $image_list;
		?>
		<div class="navigation">
			<a href="#" class="owl-next"><i class="icon arrow_right"></i></a>
			<a href="#" class="owl-prev"><i class="icon arrow_left"></i></a>
		</div>
	</div>
	<?php if(!is_single()) { ?>
		<a href="<?php the_permalink(); ?>" class="post-title"><h1 class="heading"><?php the_title(); ?></h1></a>
		<span class="post-date">
			<?php the_time('F j, Y'); ?>
		</span>
	<?php } ?>
	<div class="post-content">
		<?php 
		$more_string = __('Continue reading', 'tanx');
		if(has_excerpt( $post->ID )) { ?>
		<p>
			<?php 
			echo get_the_excerpt();
			?> <a href="<?php the_permalink(); ?>" class="more-link"><?php echo $more_string; ?></a>
		</p> <?php
	}
	else 
		the_content($more_string);
		if(shortcode_exists('[ssba_hide]')) {
			echo do_shortcode("[ssba_hide]");
		}
	?>
	</div>