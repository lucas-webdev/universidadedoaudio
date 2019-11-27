<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package viaggio
*/

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="cotent-area">
				<div class="the_content">
					<div class="page-content error-404 not-found">
						<h4><?php echo cs_get_option('404_title');?></h4>
						<p class="error_description"><?php echo cs_get_option('404-description'); ?></p>
						<div class="search_404">
							<form action="<?php echo esc_url(home_url('/'));?>">
								<input type="text" placeholder='<?php esc_html_e( 'Search', 'viaggio' );?>' name='s' value='<?php echo get_search_query();?>'>
								<button><i class="fa fa-search"></i></button>
							</form>
						</div>

						<p class='lost'><?php echo cs_get_option('404-lost-text'); ?></p>

						<div class="home_link">
							<a href="<?php echo esc_url(home_url('/'));?>">
								<span class="home_icon"><i class="fa fa-home"></i></span>
								<span><?php esc_html_e( 'Take me home.', 'viaggio' );?></span>
							</a>
						</div>
					</div><!-- .page-content -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
