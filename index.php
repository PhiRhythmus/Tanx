<?php get_header(); ?>
<?php require_once(get_template_directory() . '/home-banner.php'); ?>

<section class="main-section post-list">
<div class="container">
	
		<?php if(have_posts()) :
			while(have_posts()) : the_post(); ?>
				<div <?php post_class('post wow fadeInUp'); ?>>
					<?php get_template_part('content', get_post_format());  ?>
				</div>
			<?php endwhile;
		endif; ?>
 <div class="load-more text-center">
			<?php $posts_per_page = get_option('posts_per_page '); ?>
			<a href="#" data-current="<?php echo $posts_per_page; ?>" data-offset="<?php echo $posts_per_page; ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="load-more-ajax"><?php echo __('Load More Posts', 'tanx'); ?><!-- <i class="arrow_down arrow-icon"></i> --><i class="wait_icon"><?php echo _x("...", "loading", "tanx"); ?></i></a>
		</div>
</div>
</section>

<?php get_footer(); ?>