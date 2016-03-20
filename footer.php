<?php get_sidebar(); ?>

<footer>
	<div class="container">
			<div class="col-md-4 copyright">
				<?php
					$copyright = ot_get_option('footer_copyright_text');
					echo $copyright;
				?>
			</div>
			<div class="col-md-4 social">
				<?php
					$socials = ot_get_option('footer_social');
					if(isset($socials[0])) {
					 foreach($socials as $social) {
						if($social['title'] != '') {
							echo "<a target='_blank' class='social-link' data-name='" . $social['name'] . "' href='" . $social['href'] . "' title='" . $social['title'] . "'></a>";
						}
					 }
					}
				?>
			</div>
	</div>
</footer>

<a href="#" class="back-to-top"><?php _e('Back to top', 'Tanx'); ?></a>
<?php wp_footer(); ?>

</div>

</body>
</html>