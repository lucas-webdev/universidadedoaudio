<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viaggio
 */

?>

	</div><!-- #content -->



	<footer id="colphon" class="site-footer">
		<div class="container">
			<div class="row">
				<?php if( is_active_sidebar( 'sidebar-footer' ) ) :?>
					<?php dynamic_sidebar('sidebar-footer');?>
				<?php endif;?>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
