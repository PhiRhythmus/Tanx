<?php 
	function tanx_customize(){


		$font_primary = ot_get_option('primary_font', 'Open Sans');
		if(!isset($font_primary[0]['family'])){
			$font_primary = array(array('family'=>$font_primary));
			
		}
		$font_primary_name = str_replace(' ', '+',$font_primary[0]['family']);
		wp_enqueue_style('tanx_primary_google_font', 'http://fonts.googleapis.com/css?family=' . $font_primary_name . ':400,100,900italic,900,700,500italic,500,700italic,400italic,300italic,300,100italic');


		$font_secondary = ot_get_option('secondary_font' , 'Open Sans');
		if(!isset($font_secondary[0]['family'])){
	
			$font_secondary = array(array('family'=>$font_secondary));
		}
		$font_secondary_name = str_replace(' ', '+',$font_secondary[0]['family']);
		wp_enqueue_style('tanx_secondary_google_font', 'http://fonts.googleapis.com/css?family=' . $font_secondary_name . ':400,100,900italic,900,700,500italic,500,700italic,400italic,300italic,300,100italic');
		
		$custom_css = "
		<style>
			body {
				font-size: " . ot_get_option('base_font_size') . "px;
			}
			nav.top-nav.nav-fixed {
				background: " . ot_get_option('nav_background') . ";
			}
			h1, h2, h3, h4, h5, h6, .top-nav .menu li a, .type-post ul li .list-title, .type-page ul li .list-title, footer .copyright, a.back-to-top, .comment-form > p > label, .form-label, .wpcf7-form-control, ul#sidebar .widget ul li,ul#sidebar .widget ul li a, .portfolio-item-holder .overlay .project-details {
				font-family: '" . $font_primary['0']['family'] . "';
			}
			body, .home-logo .website-description {
				font-family: '" . $font_secondary['0']['family'] . "';
			}
			.sidebar.main-sidebar {
				background: " . ot_get_option('sidebar_background') . ";
			}
			 
			.sidebar::-webkit-scrollbar-thumb {
				border-radius: 2px
				-webkit-box-shadow:inset 0px 0px 0px 6px " . ot_get_option('sidebar_background') . ";
				box-shadow:inset 0px 0px 0px 6px " . ot_get_option('sidebar_background') . ";
				background: rgba(255,255,255,.1);
			}
			ul#sidebar .widget ul li,
			ul#sidebar .widget ul li a {
				color: " . ot_get_option('sidebar_link_color') . ";
			}
			.sidebar .social a {
				color: " . ot_get_option('sidebar_link_color') . ";
				border-color: " . ot_get_option('sidebar_link_color') . ";
			}
			ul#sidebar ul li a:hover,
			ul#sidebar .widget ul li a:hover {
				color: " . ot_get_option('sidebar_link_hover_color') . ";
			}
			.sidebar .social a:hover {
				color: " . ot_get_option('sidebar_link_hover_color') . ";
				border-color: " . ot_get_option('sidebar_link_hover_color') . ";
			}
			.sidebar,
			ul#sidebar .widget .widgettitle,
			ul#sidebar .widget ul li .comment-author-link {
				color: " . ot_get_option('sidebar_text_color') . ";
			}
			.sidebar .close-menu span {
				background: " . ot_get_option('sidebar_text_color') . ";
			}

			.top-nav .menu li.active a,
			.top-nav .menu li a:hover,
			.top-nav .search-toggle.active,
			.top-nav .searchform .close-search:hover,
			.format-gallery .post-header .navigation a:hover,
			footer .social a:hover,
			.social .ssba-wrap a:hover,
			nav .expand-top-menu.active,
			footer .social a:hover,
			.comment-respond .comment-reply-title #cancel-comment-reply-link {
				color: " . ot_get_option('site_accent_color') . ";
			}
			.underline_accent,
			.post .more-link,
			input:focus,
			.wpcf7-form-control:focus,
			.wpcf7-form-control[type='submit']:hover,
			.load-more-ajax,
			.type-post a:hover,
			.type-page a:hover,
			.comment .comment-content .edit-reply a:hover,
			.post-bottom .categories a:hover,
			.post-navigation .prev-post a:hover,
			.post-navigation .next-post a:hover,
			.comment-form-comment textarea#comment:focus,
			.form-submit input.submit:hover,
			#sidebar-404 ul li a:hover,
			#sidebar-404 .tagcloud > a:hover {
				border-color: " . ot_get_option('site_accent_color') . ";
			}
			.post.format-quote .author:before,
			.content-quote .quote-author:before,
			.sidebar-toggle:hover .sidebar-icon,
			.portfolio-item-holder .overlay .project-details:after {
				background: " . ot_get_option('site_accent_color') . ";
			}

			body,
			.current-query,
			.underline_accent,
			.post .more-link,
			.post .post-title,
			.type-post a:hover,
			.type-page a:hover,
			.post.format-quote .heading-quote,
			.post.format-quote .author,
			.content-quote .quote-content,
			.content-quote .quote-author,
			footer .copyright a,
			a.back-to-top,
			.comment-form > p > label,
			.wpcf7-form-control[type='submit'],
			.form-label,
			.comment .content p.text,
			.comment .comment-content .edit-reply a,
			.post-bottom .share-story,
			.post-navigation .prev-post a,
			.post-navigation .next-post a,
			.form-submit input.submit,
			.load-more-ajax,
			.load-more-ajax.done,
			.wpcf7-form-control,
			#sidebar-404 .widgettitle,
			#sidebar-404 ul li a:hover,
			#sidebar-404 .tagcloud > a:hover,
			.portfolio-item-holder .overlay .project-details,
			.comment-respond .comment-reply-title {
				color: " . ot_get_option('title_color') . ";
			}
			p,
			.dropdown_button,
			.top-nav .menu li a,
			.home-logo .website-description,
			.type-post p,
			.type-page p,
			.type-portfolio p
			.post-content ul li,
			.type-post a,
			.type-page a,
			.comment .comment-content .comment-meta,
			.comment .comment-content .comment-meta .date,
			#sidebar-404 ul li a,
			#sidebar-404 .tagcloud > a {
				color: " . ot_get_option('body_text_color') . ";
			}
			.light-text,
			nav .expand-top-menu,
			.top-nav .search-toggle,
			.top-nav .searchform .close-search,
			.page-info .page-subtitle,
			.post-info .post-subtitle,
			.post .post-date,
			.format-gallery .post-header .navigation a,
			footer .copyright p,
			footer .social a,
			.social .ssba-wrap a {
				color: " . ot_get_option('light_text_color') . ";
			}
			.sidebar-toggle .sidebar-icon {
				background: " . ot_get_option('light_text_color') . ";
			}
			p {
				font-weight: " . ot_get_option('paragraph_font_weight') . ";
			} 
			.bottom-overlay {
				background: -moz-linear-gradient(top, " . ot_get_option("overlay_primary_color") . " 0%, " . ot_get_option("overlay_secondary_color") . " 100%);
			    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%," . ot_get_option("overlay_primary_color") . "), color-stop(100%," . ot_get_option("overlay_secondary_color") . "));
			    background: -webkit-linear-gradient(top, " . ot_get_option("overlay_primary_color") . " 0%," . ot_get_option("overlay_secondary_color") . " 100%);
			    background: -o-linear-gradient(top, " . ot_get_option("overlay_primary_color") . " 0%," . ot_get_option("overlay_secondary_color") . " 100%);
			    background: -ms-linear-gradient(top, " . ot_get_option("overlay_primary_color") . " 0%," . ot_get_option("overlay_secondary_color") . " 100%);
			    background: linear-gradient(to bottom, " . ot_get_option("overlay_primary_color") . " 0%, " . ot_get_option("overlay_secondary_color") . " 100%);
			}
		</style>";
		wp_add_inline_style('main', $custom_css);
	}

	add_action('wp_head', 'tanx_customize');

	function fonthelp() {
		if (!(defined('DOING_AJAX') && DOING_AJAX)) {
		}
	}
	add_action('admin_init', 'fonthelp');
 ?>