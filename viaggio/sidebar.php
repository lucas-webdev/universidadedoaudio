<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viaggio
 */

if ( ! is_active_sidebar( 'sidebar-deafult' ) ) { ?>
<aside id="secondary" class="widget-area widget-deafult">
	<section id="%1$s" class="widget %2$s">
		<?php get_search_form();?>
	</section>
	
</aside>
<?php return; } ?>

<aside id="secondary" class="widget-area widget-deafult">
	<?php dynamic_sidebar( 'sidebar-deafult' ); ?>
</aside><!-- #secondary -->
