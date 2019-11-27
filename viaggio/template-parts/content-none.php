<?php
/**
* Template part for displaying a message that posts cannot be found.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package viaggio
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('article-block wow fadeInUp')); ?>>
	<?php
	if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<div class="no_content">
		<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'viaggio' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	</div>
<?php elseif ( is_search() ) : ?>
	<div class="no_content">
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'viaggio' ); ?></p>

		<div class="search_404">
			<form action="<?php echo esc_url(home_url('/'));?>" method='post'>
				<input type="text" placeholder='<?php esc_html_e('Search' , 'viaggio');?>' name='s' value='<?php echo get_search_query();?>'>
				<button><i class="fa fa-search"></i></button>
			</form>
		</div>	
	</div>
<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'viaggio' ); ?></p>
	<div class="no_content">
		<div class="search_404">
			<form action="<?php echo esc_url(home_url('/'));?>" method='post'>
				<input type="text" placeholder='<?php esc_html_e('Search' , 'viaggio');?>' name='s' value='<?php echo get_search_query();?>'>
				<button><i class="fa fa-search"></i></button>
			</form>
		</div>	
	</div>

	<?php
	get_search_form();

	endif; ?>
</article>


