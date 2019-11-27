<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viaggio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Header Section -->
	<?php do_action( 'viaggio-header' );?>	
	<!-- End Of Header Section -->
	<?php do_action( 'viaggio-top-search' )?>

	<div class="clearfix"></div>
	<?php if(cs_get_option('header_off_canvas_menu')) :?>
			<div id="offcanvas_menu_container">
				<div class="offcanvas_container">
					<span id='canvas_colse'><i class="fa fa-close"></i></span>
				<?php if(cs_get_option('menu_off_canvas')):?>
					<?php wp_nav_menu(array(
						'theme_location'	=> 'off_canvas_menu',
						'menu_id'	=> 'off-canvas-item'
					)); ?>
				<?php endif; if(cs_get_option('author_off_canvas_show')):?>
					<div class="off_canvas_author">
						<?php if(cs_get_option('off_canvas_author_image')) :?>
						<img src="<?php echo wp_get_attachment_image_src( cs_get_option( 'off_canvas_author_image' ), 'full' )[0]?>" alt="">						
						<?php endif;?>
						<div class="off_canvas_author_desc"><?php echo cs_get_option('off_canvas_author_desc');?></div>
						<?php if(cs_get_option('author_off_canvas_social')) :?>
							<div class="off_canvas_social">
								<ul><?php echo viaggio_social_icons()?></ul>							
							</div>
						<?php endif;?>
					</div>
				<?php endif;?>
				</div>
			</div>	
	<?php endif;?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'viaggio' ); ?></a>
<div id="content" class="site-content">
	
	