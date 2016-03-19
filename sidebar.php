<div class="sidebar main-sidebar sidebar-<?php echo ot_get_option("sidebar_position"); ?>">
	<div class="holder">
		<div class="row">
			<?php if(ot_get_option("sidebar_position") == 'rightPos') { ?>
				<div class="col-xs-4">
					<a href="#" class="close-menu">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
			<?php } ?>
			<div class="col-xs-8 social <?php if(ot_get_option("sidebar_position") == 'rightPos') {echo "text-right";} ?>">
				<?php
					$socials_sidebar = ot_get_option('sidebar_social');
					$socials = ot_get_option('sidebar_social');
					if(!empty($socials)) {
						foreach($socials as $social) {
							if($social['title'] != '') {
								echo "<a target='_blank' class='social-link' data-name='" . $social['name'] . "' href='" . $social['href'] . "' title='" . $social['title'] . "'></a>";
							}
						}
					}
				?>
			</div>
			<?php  if(ot_get_option("sidebar_position") == 'leftPos') { ?>
				<div class="col-xs-4 text-right">
					<a href="#" class="close-menu">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
			<?php } ?>
		</div>
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<ul id="sidebar">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</ul>
		<?php endif; ?>
	</div>
</div>