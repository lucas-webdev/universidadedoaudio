<?php
/*
* THIS IS FOR THE SOCIAL ICONS EVERYWHERE
*/
require get_template_directory() . '/inc/widgets/newslatter.php';
require get_template_directory() . '/inc/widgets/popular-post.php';
require get_template_directory() . '/inc/widgets/social-links.php';
require get_template_directory() . '/inc/widgets/flickr.php';
require get_template_directory() . '/inc/widgets/about-me.php';
require get_template_directory() . '/inc/widgets/recent-post.php';
require get_template_directory() . '/inc/widgets/viaggio-about.php';

add_action( 'viaggio-post-views' , 'viaggio_post_views');
add_action( 'viaggio-related-post' , 'viaggio_related_posts');
add_action( 'viaggio-content-footer' , 'vaiggio_content_section_footer');

function viaggio_include_header(){
		if (cs_get_option( 'favicon_url' ) != '') {
			echo '<link rel="shortcut icon" type="image/x-icon" href="'.wp_get_attachment_image_src( cs_get_option( 'favicon_url' ), 'full' )[0].'" />';
		}else{
			echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/images/favicon.png" />';
		}
		if(cs_get_option('rtl')){
			echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/layouts/rtl-support.css" />';
		}
		echo '<!--This Header Tracking Code-->' . cs_get_option('tracking_1') . '<!--END Tracking Code-->';
	}
	add_action('wp_head', 'viaggio_include_header');

function viaggio_social_icons(){
	$output = '';
	if(cs_get_option('viaggio_socila_facebook')){
		$output .= '<li><a href="'.cs_get_option('viaggio_socila_facebook').'"><i class="fa fa-facebook"></i></a></li>';
	}
	if(cs_get_option('viaggio_socila_twitter')){
		$output .= '<li><a href="'.cs_get_option('viaggio_socila_twitter').'"><i class="fa fa-twitter"></i></a></li>';
	}
	if(cs_get_option('viaggio_socila_google-plus')){
		$output .= '<li><a href="'.cs_get_option('viaggio_socila_google-plus').'"><i class="fa fa-google-plus"></i></a></li>';
	}
	if(cs_get_option('viaggio_socila_digg')){
		$output .= '<li><a href="'.cs_get_option('viaggio_socila_digg').'"><i class="fa fa-digg"></i></a></li>';
	}
	if(cs_get_option('viaggio_socila_pinterest')){
		$output .= '<li><a href="'.cs_get_option('viaggio_socila_pinterest').'"><i class="fa fa-pinterest-p"></i></a></li>';
	}

	return $output;
}

//theme logo title fucntion
function viaggio_site_brand(){
	ob_start();
	if(cs_get_option('logo_url') != ''){
		$site_brand = '<a href="'.esc_url(home_url('/')).'"><img src="'.wp_get_attachment_image_src( cs_get_option( 'logo_url' ), 'full' )[0].'" alt="Logo"/></a>';
		echo $site_brand;
	}else{
		$site_brand = '<div class="brand_container"><h1 class="brand_name"><a href="'. esc_url(home_url('/')) .'">'.get_bloginfo('name').'</a></h1>';
		if(get_bloginfo('description')){
			$site_brand .= '<h2 class="brand_description">'.get_bloginfo('description').'</h2></div>';
		}
		echo $site_brand;
	}

}
// Theme Read More

function viaggio_read_more_text($limit = ''){
    $new_content = wp_filter_nohtml_kses(get_the_content());
	$the_post_content = explode(' ', $new_content);
	$limited = array_slice($the_post_content, 0, $limit);
	$show_content = implode(' ', $limited);
	echo esc_html($show_content);
}
// Theme Top bar function
function viaggio_top_bar(){
	if(cs_get_option('header_top_bar')){
		?>
			<div class="top_bar">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<?php if(cs_get_option('header_top_social')) : ?>
									<ul class="top_social">
										<?php echo viaggio_social_icons(); ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="col-md-6">
								<?php if(cs_get_option('header_top_search')) :?>
									<span class="search_top"><i class="fa fa-search"></i></span>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
		<?php
	}
}

function viaggio_post_thumbnail_default(){
	echo wp_get_attachment_image_src( cs_get_option( 'cover_image' ), 'full' )[0];
	//echo wp_get_attachment_image_src( cs_get_option( 'post_thumbnail_theme' ))[0];
}
//post view count
function viaggio_wpb_set_post_views($postID) {
    $count_key = 'viaggio_wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        if (is_single()) {
            $count++;
        }
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function viaggio_wpb_get_post_views($postID){
    $count_key = 'viaggio_wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
//add_action('the_content' , 'viaggio_post_views');
function viaggio_post_views(){
	if(is_single()){
		viaggio_wpb_set_post_views(get_the_ID());
		viaggio_wpb_get_post_views(get_the_ID());
	}
}


//Viaggio Media Content
function viaggio_media_content($type = array()){
$content = do_shortcode(apply_filters('the_content' , get_the_content()));
   $iframes = get_media_embedded_in_content( $content, $type );
   if($type == array('audio','iframe')){$embebed = str_replace("visual=true", "visual=false", $iframes[0]);
	$embebed = str_replace("height=true", "visual=false", $iframes[0]);
	}else{$embebed = $iframes[0];}
   return $embebed;
}
//custom search form
function viaggio_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform search-form" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_html__( 'Search for:' , 'viaggio' ) . '</label>
    <input class="search-field" type="text" placeholder="'.esc_html__('Search.......' , 'viaggio').'" value="' . get_search_query() . '" name="s" id="s" />
    <button class="search_submit"><i class="fa fa-search"></i></button>
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'viaggio_search_form' );

function viaggio_post_thumbnail_url(){
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
$thumb_url[0];
}
function viaggio_prev_next_post(){
			$prev_post = get_adjacent_post(false, '', true);
			if(!empty($prev_post)) {
				echo '<div class="col-md-6 next_prev_pagination">';
				echo "<span class='prev_next_intro'>".esc_html__('Previous Article' , 'viaggio')."</span>";
				echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . $prev_post->post_title . '</a>';
				echo '</div>';
			}
			$next_post = get_adjacent_post(false, '', false);
			if(!empty($next_post)) {
				echo '<div class="col-md-6 next_prev_pagination text-right pull-right">';
				echo "<span class='prev_next_intro'>".esc_html__('Previous Article' , 'viaggio')."</span>";
				echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a>';
				echo '</div>';
			}
}

function vaiggio_content_section_footer(){ ?>
	<div class="post_pagination">
		<?php viaggio_prev_next_post(); ?>
	</div>
	<?php if(cs_get_option('share_info')){?>
	<div class="single_share_area">
		<span class='single_share'>
			<?php echo esc_html__('Share' , 'viaggio');?>
		</span>
		<?php do_action('viggio-article-social-footer');?>
	</div>
	<?php } if(cs_get_option('related_post_info')){?>

	<?php do_action('viaggio-related-post');?>
	<?php } if(cs_get_option('author_info')){
		viaggio_author_details();
		}
 }

//Related Posts
function viaggio_related_posts() {
	echo '<div class="related_post clearfix">';
	$tag_arr = "";
    global $post;
    $tags = wp_get_post_tags( $post->ID );
    if($tags) {
    	echo '<h3 class="related-title">'.esc_html__('you might also like','viaggio').'</h3>';
        foreach( $tags as $tag ) {
            $tag_arr .= $tag->slug . ',';
        }
        $args = array(
            'tag' => $tag_arr,
            'numberposts' => 3, /* You can change this to show more */
            'post__not_in' => array($post->ID)
        );
        $related_posts = get_posts( $args );
        if($related_posts) {
             echo ' ';
            foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
                    	<div class="col-md-4">
                    		<div class="s-blog-post">
		                        <a href="<?php the_permalink();?>"><img src=" <?php if ( has_post_thumbnail() ) {the_post_thumbnail_url();}else{ echo wp_get_attachment_image_src( cs_get_option( 'cover_image' ), 'full' )[0]; } ?>" alt=""></a>
		                        <div class="s-blog-caption">
		                        	<div class="post_category"><?php the_category(' ');?></div>
		                            <h4><a href="<?php the_permalink();?>"><?php the_title()?></a></h4>
		                        </div>
		                    </div>
                    	</div>
            <?php endforeach; }
            }
    wp_reset_postdata();
    echo '</div>';
}

function viaggio_author_details(){
	global $post;
	$author_id=$post->post_author;

		echo'<div class="about-author">
                <div class="author-thumb alignleft">
	              	<a href="'.get_author_posts_url( get_the_author_meta( "ID" )).'">'.get_avatar($author_id).'</a>
                </div>
                <div class="author-details">
                    <h4>Sobre <a href="'.get_author_posts_url( get_the_author_meta( "ID" )).'">'.get_the_author_meta( 'nickname',  $author_id ).'</a></h4>
                    <p>'.get_the_author_meta( 'description',  $author_id ).'</p>
                    <ul class="author-social">';
                        if(get_the_author_meta('facebook',  $author_id )){
				        		echo '<li><a href="'.get_the_author_meta('facebook',  $author_id ).'"><i class="fa fa-facebook"></i></a></li>';
				        	}
				            if(get_the_author_meta('twitter',  $author_id )){
				        		echo '<li><a href="'.get_the_author_meta('twitter',  $author_id ).'"><i class="fa fa-twitter"></i></a></li>';
				        	}
				        	if(get_the_author_meta('google_plus',  $author_id )){
				        		echo '<li><a href="'.get_the_author_meta('google_plus',  $author_id ).'"><i class="fa fa-google-plus"></i></a></li>';
				        	}
				            if(get_the_author_meta('digg',  $author_id )){
				        		echo '<li><a href="'.get_the_author_meta('digg',  $author_id ).'"><i class="fa fa-digg"></i></a></li>';
				        	}
				            if(get_the_author_meta('pinterest',  $author_id )){
				        		echo '<li><a href="'.get_the_author_meta('pinterest',  $author_id ).'"><i class="fa fa-pinterest"></i></a></li>';
				        	}
                        echo '
                    </ul>

                </div>
             </div>';
	}

function viaggio_html_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo '<input placeholder="'.esc_html__('Name *', 'viaggio').'" type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" />';
	echo '</p>';
	echo '<p>';
	echo '<input placeholder="'.esc_html__('Email *', 'viaggio').'" type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '"  />';
	echo '</p>';
	echo '<p>';
	echo '<textarea placeholder="'.esc_html__('Your Message', 'viaggio').'" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
	echo '</p>';
	echo '<p><input type="submit" name="cf-submitted" value="'.esc_html__('Send' , 'viaggio').'"></p>';
	echo '</form>';
}

function viaggio_deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$subject = sanitize_text_field( $_POST["cf-subject"] );
		$message = esc_textarea( $_POST["cf-message"] );

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>'.esc_html__('Thanks for contacting me, expect a response soon.' , 'viaggio').'</p>';
			echo '</div>';
		} else {
			echo esc_html__('An unexpected error occurred.' , 'viaggio');
		}
	}
}

function viaggio_cf_shortcode() {

	viaggio_html_form_code();
	viaggio_deliver_mail();

}

global $duplicate;
add_filter('get_archives_link', 'aviaggio_archive_count_inline');
function aviaggio_archive_count_inline($links) {
$links = str_replace('</a>&nbsp;(', ' <span class="post_count">', $links);
$links = str_replace(')', '</span></a>', $links);
return $links;
}
add_filter('wp_list_categories', 'viaggio_cat_count_span');
function viaggio_cat_count_span($links) {
  $links = str_replace('</a> (', '<span class="post_count">', $links);
  $links = str_replace(')', '</span></a>', $links);
  return $links;
}

function viaggio_import_files() {
    return array(
        array(
            'import_file_name'             => 'Demo Data',
            'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/plugins/demo-content/viaggio.demo.content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/plugins/demo-content/ocdi/widgets.json',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/plugins/demo-content/ocdi/customizer.dat',
            'import_preview_image_url'     => 'https://images.unsplash.com/photo-1468245856972-a0333f3f8293?dpr=1&auto=format&crop=entropy&fit=crop&w=1500&h=1000&q=80',
            'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'viaggio' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'viaggio_import_files' );
function viaggio_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'tools.php';
    $default_settings['page_title']  = esc_html__( 'Import Demo Data' , 'viaggio' );
    $default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'viaggio' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'pt-one-click-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'viaggio_plugin_page_setup' );

add_action( 'show_user_profile', 'viaggio_contactmethods' );
add_action( 'edit_user_profile', 'viaggio_contactmethods' );

function viaggio_contactmethods( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">



		<tr>
			<th><label for="facebook">Facebook</label></th>

			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php echo esc_html__('Please enter your facebook username.', 'viaggio')?></span>
			</td>
		</tr>

		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php echo esc_html__('Please enter your Twitter username.', 'viaggio')?></span>
			</td>
		</tr>

		<tr>
			<th><label for="google_plus">Google Plus</label></th>

			<td>
				<input type="text" name="google_plus" id="google_plus" value="<?php echo esc_attr( get_the_author_meta( 'google_plus', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php echo esc_html__('Please enter your Google Plus username.', 'viaggio')?></span>
			</td>
		</tr>


		<tr>
			<th><label for="digg">Digg</label></th>

			<td>
				<input type="text" name="digg" id="digg" value="<?php echo esc_attr( get_the_author_meta( 'digg', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php echo esc_html__('Please enter your Digg username.', 'viaggio')?></span>
			</td>
		</tr>

		<tr>
			<th><label for="pinterest">Pinterest</label></th>

			<td>
				<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php echo esc_html__('Please enter your pinterest username.', 'viaggio')?></span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'viaggio_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'viaggio_extra_profile_fields' );

function viaggio_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'google_plus', $_POST['google_plus'] );
	update_user_meta( $user_id, 'digg', $_POST['digg'] );
	update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
}