<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<div class="main-head">
		<div class="main">
<div class="hdr1">
	            <div class="sidebar-head-1 span2">
	                <?php dynamic_sidebar( 'sidebar-head1' ); ?>
	            </div>
</div>
			<div class="hdr1">


				<div class="head">
				<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
				<h5 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h5>
				<h6 class="site-description"><?php bloginfo( 'description' ); ?></h6>

				</div>
				




				</div>


			</div>
	</div>

		</div>

<div class="main">
	<div class="content-main">