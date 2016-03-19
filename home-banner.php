<div class="home-logo">
	<a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php $logo=ot_get_option('website_logo'); echo $logo; ?>" alt="" /></a>
	<div class="website-description">
		<?php 
			$desc=ot_get_option('website_desc'); 
			echo $desc;
		?>
	</div>
	<?php if(is_page()) { ?> 
	<div class="container">
		<div class="page-info">
			<h2 class="page-title"><?php the_post(); the_title(); ?></h2>
			<p class="page-subtitle"><?php echo get_post_meta($post->ID, 'page_subtitle', true); ?></p>
		</div>
	</div> <?php
	} ?>

	<?php if (is_singular('portfolio')) {
		?>
		<div class="container">
			<div class="post-info">
				<h2 class="post-title"><?php the_post(); the_title(); ?></h2>
			</div>
		</div>
		<?php
	} ?>

	<?php if (is_singular('post')) {
		?>
		<div class="container">
			<div class="post-info">
				<h2 class="post-title"><?php the_post(); if(get_post_format() != "quote") {the_title();} ?></h2>
				<p class="post-subtitle"><?php echo get_post_meta($post->ID, 'post_subtitle', true); ?></p>
			</div>
		</div>
		<?php
	} ?>

	<?php if (is_tax('portfolio_category')) {
		?>
		<div class="post-info">
			<p class="post-subtitle">
				<?php 
					$term =	$wp_query->queried_object;
			      	echo __('Portfolio Category: ', 'tanx') .$term->name; 
				?>
			</p>
		</div>
		<?php
	} ?>

	<?php if (is_tax('portfolio_tag')) {
		?>
		<div class="post-info">
			<p class="post-subtitle">
				<?php 
					$term =	$wp_query->queried_object;
			      	echo __('Portfolio Tag: ', 'tanx') .$term->name; 
				?>
			</p>
		</div>
		<?php
	} ?>

	<?php if (is_archive() && !is_tax('portfolio_tag') && !is_tax('portfolio_category')) {
		?>
		<div class="post-info">
			<p class="post-subtitle">
				<?php 
					if(is_category()) {
						$output = __('Category archives for: ', 'tanx');
						echo  $output;
						?> <span class='current-query'> <?php single_cat_title(); ?> </span> <?php 
					} else if(is_tag()) {
						$output = __("Tag archives for: ", "tanx");
						echo  $output;
						?> <span class='current-query'> <?php single_tag_title(); ?> </span> <?php 
					} else if(is_author()) { the_post();
						$output =  __("Archives for: ", "tanx");
						echo $output;
						?> <span class='current-query'> <?php get_the_author(); ?> </span> <?php rewind_posts();
					} else if(is_day()) {
						$output = __("Archives for: ", "tanx");
						echo $output;
						?> <span class='current-query'> <?php the_time('F j, Y') ;?> </span> <?php 
					} else if(is_month()) {
						$output = __("Archives for: ", "tanx");
						echo $output;
						?> <span class='current-query'> <?php the_time('F, Y'); ?> </span> <?php
					} else if(is_year()) {
						$output = __("Archives for: ", "tanx");
						echo $output;
						?> <span class='current-query'> <?php the_time('Y'); ?> </span> <?php 
					} else {
						echo __("Archives", "tanx");
					}
				 ?>
			</p>
		</div>
		<?php 
	} ?>

	<?php if (is_search()) {
		?>
		<div class="post-info">
			<?php 
				global $wp_query;
				$total_results = $wp_query->found_posts;
				$search_output = __('Search results for:', 'tanx');
				if($total_results == 0)
					$search_output = __('No search results found for: ', 'tanx');
			?>
			<p class="post-subtitle"><?php echo $search_output; ?> <span class="current-query">'<?php echo get_search_query(); ?>'</span></p>
		</div>
		<?php
	} ?>

	<?php if (is_404()) {
		?>
		<div class="container">
			<div class="post-info">
				<h2 class="post-title"><?php echo _e('404', 'tanx'); ?></h2>
				<p class="post-subtitle no-margin"><?php echo _e('Keep calm and search again!', 'tanx'); ?></p>
			</div>
		</div>
		<?php 
	} ?>
	
</div>
</header>


