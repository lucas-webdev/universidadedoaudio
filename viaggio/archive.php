<?php
/**
* The template for displaying archive pages.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package viaggio
*/

get_header(); ?>



<div id="primary" class="cotent-area">
	<div id="main" class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8">
				<section class="blog_section">
					<div class="archive_header">
						<?php
						the_archive_title( '<h1 class="archive-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</div>
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
					while ( have_posts() ) : the_post();

/*
* Include the Post-Format-specific template for the content.
* If you want to override this in a child theme, then include a file
* called content-___.php (where ___ is the Post Format name) and that will be used instead.
*/
get_template_part( 'template-parts/content', get_post_format() );

endwhile;

							the_posts_pagination( array(
							    'mid_size' => 2,
							    'prev_text' => '<i class="fa fa-angle-left"></i>',
							    'next_text' => '<i class="fa fa-angle-right"></i>',
							) );  


else :

	get_template_part( 'template-parts/content', 'none' );

endif; ?>
</section>
</div>
<div class="col-md-4 col-sm-4">
	<?php get_sidebar();?>					
</div>
</div>
</div>
</div>

<?php
get_footer();
