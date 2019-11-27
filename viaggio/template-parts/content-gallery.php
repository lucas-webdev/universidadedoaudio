<?php
/**
* Template part for displaying posts.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package viaggio
*/

if( !is_single( ) ) { 
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(array('article-block wow fadeInUp')); ?>>
		<div class="feature_block">
			<div class="s-thumb-carousel">
				<?php if ( get_post_gallery() ) :
				$gallery = get_post_gallery( get_the_ID(), false );
				?>
				<?php foreach($gallery['src'] as $image){

					echo '<div class="s-thumb-single gal">
					<a href="'.$image.'">
					<img src="'.$image.'" alt="'.get_the_title().'">
					</a>
					</div>';
				}?>
			<?php endif;?>
		</div>
	</div>

	<div class="content_info">
		<h3 class="article-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		<div class="blog_post_meta">
			<span>By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php the_author();?></a></span> <span>In <?php the_category( " " );?></span> <span><a href="<?php comments_link();?>"><?php comments_number();?></a></span>
		</div>
		<div class="divider"></div>
		<div class="content_excerpt">
			<?php viaggio_read_more_text(50)?>
		</div>
		<a href="<?php the_permalink();?>" class='read_more'><?php esc_html_e('Read More' , 'viaggio');?></a>
		<div class="divider"></div>
		<div class="article_footer">
			<?php the_tags( '<div class="tags_list"><span>', '</span><span>', '</span></div>' ); ?>
			<?php do_action('viggio-article-social-footer');?>
		</div>
	</div>
</article>
<?php }else{?>
<div class="single_cover" style='background: url(<?php if(has_post_thumbnail()) {echo wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true)[0];}else{ echo wp_get_attachment_image_src( cs_get_option( 'cover_image' ), 'full' )[0] ;}?>) center center no-repeat; '>
	<?php do_action('viaggio-post-views'); 
	?>
	<div class="post_intro">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post_heading">
						<div class="post_title">
							<h3 class='single_title'><?php the_title();?></h3>
							<div class="post_meta_box">
								<i class="fa fa-clock-o"></i> <span class="meta"><?php viaggio_posted_on();?></span>
								<i class="fa fa-user"></i> <span class='meta'><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?> "> <?php echo esc_html( get_the_author() );?></a></span>
								<i class="fa fa-tag"></i> <span class='meta'><?php the_category( "/" );?></span>
							</div>
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
			<div class="<?php if(cs_get_option('full_wide') == 'full') { echo 'col-md-12'; }else{ echo 'col-md-8 col-sm-8';}?>">
				<div class="the_content">
					<?php if(has_post_thumbnail()):
					echo "<img src=". wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true)[0] . " alt=''>";
					endif;
					?>
					<div class="single_content">
						<?php the_content();
						$args = array (
							'before'            => '<div class="page-links-post"><span class="page-link-text">' . esc_html__( ' ', 'viaggio' ) . '</span>',
							'after'             => '</div>',
							'link_before'       => '<span class="page-link">',
							'link_after'        => '</span>',
							'next_or_number'    => 'number',
							'separator'         => '',
							'nextpagelink'      => esc_html__( 'Next &raquo', 'viaggio' ),
							'previouspagelink'  => esc_html__( '&laquo Previous', 'viaggio' ),
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
			<?php if(cs_get_option('full_wide') != 'full') { ?>
			<div class="col-md-4">
				<?php if ( is_active_sidebar( 'sidebar-blog' ) ) {
					dynamic_sidebar( 'sidebar-blog' );
				}else{get_sidebar();}?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php }?>
