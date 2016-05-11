<?php if(!is_single()) { ?>
    <a href="<?php the_permalink(); ?>" class="post-title"><h1 class="heading" style="margin-top:0"><?php the_title(); ?></h1></a>
    <span class="post-date">
		<?php the_date(); ?>
	</span>
<?php } ?>
<div class="post-content">
    <?php
    $more_string = __('Continue reading', 'tanx'); ?>
    <p>
        <?php
        echo get_the_excerpt();
        ?>
        <div class="clearfix"></div>
        <a class="more-link pull-right" href="<?php the_permalink(); ?>"><?php echo $more_string; ?></a>
    </p>
</div>