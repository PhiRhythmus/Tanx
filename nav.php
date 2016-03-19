<?php $nav_fixed = ot_get_option('nav_fixed'); ?>

<?php require_once get_template_directory() . '/includes/navwalker.php'; ?>

<nav class="top-nav <?php if($nav_fixed == 'on') {echo "nav-fixed"; } ?>">
	<div class="row">
		<?php if(ot_get_option("sidebar_position") == 'leftPos') { ?>
			<div class="col-xs-6 nav-leftPos">
				<a href="#" class="sidebar-toggle">
					<span class="sidebar-icon"></span>
					<span class="sidebar-icon"></span>
					<span class="sidebar-icon"></span>
				</a>	
				<?php include 'nav-searchform.php'; ?>
			</div>
		<?php } ?>
		<div class="col-xs-6 <?php if(ot_get_option("sidebar_position") == 'leftPos') { echo "text-right nav-leftPos"; } ?>">
			<a href="#" class="expand-top-menu"><i class="arrow_down"></i></a>
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header-menu-container', 'walker' => new wp_bootstrap_navwalker() ) ); ?>
		</div>
		<?php if(ot_get_option("sidebar_position") == 'rightPos') { ?>
			<div class="col-xs-6 text-right">
				<?php include 'nav-searchform.php'; ?>
				<a href="#" class="sidebar-toggle">
					<span class="sidebar-icon"></span>
					<span class="sidebar-icon"></span>
					<span class="sidebar-icon"></span>
				</a>
			</div>
		<?php } ?>
	</div>
</nav>

<?php if($nav_fixed == 'on') {?>
<div class="nav-spacer"></div>
<?php } ?>