<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Viaggio
 * @since Viaggio 1.0
 */
get_header(); ?>

<?php while(have_posts()) : the_post();?>

<div class="single_cover" style='background: url(<?php if(has_post_thumbnail()) {echo wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true)[0];}else{ echo wp_get_attachment_image_src( cs_get_option( 'cover_image' ), 'full' )[0] ;}?>) center center no-repeat; '>
	<?php do_action('viaggio-post-views'); 	?>
	<div class="post_intro">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post_heading">
						<div class="post_title">
							<h3 class='single_title'><?php the_title();?></h3>
							<div class="contact_description"><?php echo cs_get_option('contact-description'); ?></div>
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
				<div class="col-md-12">
					<div class="the_content">
						<?php if( cs_get_option('contact-google-map')){
							echo cs_get_option('contact-google-map');							
						}else{?>
						<div class="map-canvas" data-lat='<?php echo cs_get_option('contact-google-lat');?>' data-lng='<?php echo cs_get_option('contact-google-lng');?>' data-icon='<?php if(cs_get_option('contact-google-icon')){ echo wp_get_attachment_image_src( cs_get_option( 'cover_image' ), 'full' )[0]; }else{  echo get_template_directory_uri() . '/assets/images/Placeholder.png'; }?>'>					
						</div>
						<?php }?>
						<div class="contact">

					<div class="col-md-6 col-sm-6">
					<h3 class='contact_meta_form'><?php esc_html_e('Send Us A Message' , 'viaggio')?></h3>
					<div id="respond">
					  <?php viaggio_cf_shortcode(); ?>
					</div>	

				</div>
					

				<div class="col-md-6 col-sm-6">
					<h3 class='contact_meta_form'><?php esc_html_e('Our contacts' , 'viaggio')?></h3>
					<p><?php the_content();?></p>
					<?php if(cs_get_option('contact-email')){
						echo '<p><i class="fa fa-envelope"></i> <strong>'.esc_html__('Email' , 'viaggio').'</strong> : ' . cs_get_option('contact-email').'</p>';
					} ?>
					<?php if(cs_get_option('contact-phone')){
						echo '<p><i class="fa fa-phone"></i> <strong>'.esc_html__('Phone' , 'viaggio').'</strong> : ' . cs_get_option('contact-phone').'</p>';
					} ?>
					<?php if(cs_get_option('contact-address')){
						echo '<p><i class="fa fa-map-marker"></i> <strong>'.esc_html__('Address' , 'viaggio').'</strong> : ' . cs_get_option('contact-address').'</p>';
					} ?>
				</div>

					</div>
				</div>
				</div>
				

				</div>
			</div>
		</div>
<?php endwhile; ?>
<?php get_footer(); ?>
