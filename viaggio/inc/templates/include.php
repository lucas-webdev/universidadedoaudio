<?php
/**
* viaggio functions includes.
*
* @package viaggio
*/
	
require get_template_directory() . '/inc/templates/header-template.php';
require get_template_directory() . '/inc/templates/slider/slider.php';

add_action('viaggio-header' , 'viaggio_header_select');
add_action( 'viaggio-top-search' , 'header_search');
add_action( 'viaggio-slider-section' , 'viaggio_slider_option');

function viaggio_include_post_social(){
		$output ='
			<ul class="footer_social">
            <li class="facebook_icon"><a href="'. esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink()).'"
                   onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;"
                   target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li class="twitter_icon"><a href="'.esc_url('https://twitter.com/share?url='.get_the_permalink()).'&text='.esc_url(get_the_title()).'"
                   onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;"
                   target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li class="googleplus_icon"><a href="'.esc_url('https://plus.google.com/share?url=').get_the_permalink().'"
                   onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480\');return false;"
                   target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <li class="pinterest_icon"><a href="'.esc_url('https://pinterest.com/pin/create/bookmarklet/?media=').get_the_post_thumbnail_url().'&url='.get_the_permalink().'&description='.esc_url(get_the_title()).'" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480\');return false;" target="_blank"><i class="fa fa-pinterest"></i></a></li>
        </ul>';
		echo $output;
	}
add_action( 'viggio-article-social-footer' , 'viaggio_include_post_social');

//off canvas
add_action( 'viaggio-off-canvas' , 'viaggio_canvas_option');
function viaggio_canvas_option(){
if(cs_get_option('header_off_canvas_menu')) :?>
                  <div id="offcanvas_menu_container">
                        
                        <div class="offcanvas_container">
                              <span id='canvas_colse'><i class="fa fa-close"></i></span>
                        <?php if(cs_get_option('menu_off_canvas')):?>
                              <?php wp_nav_menu(array(
                                    'theme_location'  => 'off_canvas_menu',
                                    'menu_id'   => 'off-canvas-item'
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
      <?php endif; }

?>