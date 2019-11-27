<?php
/**
* Template part for displaying page content in page.php.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package viaggio
*/

?>
<div class="single_cover" style='background: url(<?php if(has_post_thumbnail()) {echo wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true)[0];}else{ echo wp_get_attachment_image_src( cs_get_option( 'cover_image' ), 'full' )[0] ;}?>) center center no-repeat; '>
	<div class="post_intro">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post_heading">
						<div class="post_title">
							<h3 class='single_title'><?php the_title();?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="cotent-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="the_content">
					<?php if(has_post_thumbnail()):
					echo "<img src=". wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true)[0] . " alt='".get_the_title()."'>";
					endif;
					?>
					<div class="single_content">
						<?php the_content();
						$args = array (
							'before'            => '<div class="page-links-post"><span class="page-link-text">' . __( ' ', 'viaggio' ) . '</span>',
							'after'             => '</div>',
							'link_before'       => '<span class="page-link">',
							'link_after'        => '</span>',
							'next_or_number'    => 'number',
							'separator'         => '',
							'nextpagelink'      => __( 'Next &raquo', 'viaggio' ),
							'previouspagelink'  => __( '&laquo Previous', 'viaggio' ),
							);

						wp_link_pages( $args );
						?>

					</div>
					<?php do_action('viaggio-content-footer');?>

					<?php 
// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>


				</div>
			</div>
			<div class="col-md-4">
				<?php if ( is_active_sidebar( 'sidebar-blog' ) ) {
					dynamic_sidebar( 'sidebar-blog' );
				}else{get_sidebar();}?>
			</div>
		</div>
	</div>
</div>
