<?php 
class viaggio_web_info extends WP_Widget{
    public function __construct(){
        parent::__construct("viaggio_web_info", esc_html__('Viaggio Website Info', 'viaggio'),array('description' => esc_html__('Author Details.' , 'viaggio')));
    }
    function widget($args, $instance){ 
        $viaggio_web_info_title = empty($instance['viaggio_web_info_title']) ? 'About Website': $instance['viaggio_web_info_title'];
        $viaggio_web_info_description = empty($instance['viaggio_web_info_description']) ? '': $instance['viaggio_web_info_description'];
        $viaggio_web_info_title = empty($instance['viaggio_web_info_title']) ? '': $instance['viaggio_web_info_title'];
        $viaggio_web_info_description = empty($instance['viaggio_web_info_description']) ? '': $instance['viaggio_web_info_description'];
        $viaggio_web_info_facebook = empty($instance['viaggio_web_info_facebook']) ? '': $instance['viaggio_web_info_facebook'];
        $viaggio_web_info_twitter = empty($instance['viaggio_web_info_twitter']) ? '': $instance['viaggio_web_info_twitter'];
        $viaggio_web_info_googleplus = empty($instance['viaggio_web_info_googleplus']) ? '': $instance['viaggio_web_info_googleplus'];
        $viaggio_web_info_digg = empty($instance['viaggio_web_info_digg']) ? '': $instance['viaggio_web_info_digg'];
        $viaggio_web_info_pinterest = empty($instance['viaggio_web_info_pinterest']) ? '': $instance['viaggio_web_info_pinterest'];
        echo $args['before_widget'];
        //echo $args['before_title']. $viaggio_web_info_title . $args['after_title'];?>
                    <div class="footer-widget">
                        <div class="about-plenary">
                            <div class="f-logo">
                                <?php if (cs_get_option( 'footer_logo' )): ?>
                                <a href="<?php echo esc_url(home_url('/'))?>">
                                    <img src="<?php echo wp_get_attachment_image_src( cs_get_option( 'footer_logo' ), 'full' )[0]?>" alt=""></a>
                                <?php else : ?>
                                     <a href="<?php echo esc_url(home_url('/'));?>"><h1><?php bloginfo('title');?></h1></a>
                                <?php endif;?>
                                     <div class='description_web'><?php echo esc_html($viaggio_web_info_description); ?></div>
                            </div>
                            <p><?php echo cs_get_option('footer_desc');?></p>
                            <div class="widget-social">
                                    <ul>

                                        <?php 
                                        if(!empty($viaggio_web_info_facebook)){
                                            echo '<li class="facebook-icon"><a href="'.esc_url($viaggio_web_info_facebook).'"><i class="fa fa-facebook"></i></a></li>';
                                        }
                                        if($viaggio_web_info_twitter){
                                            echo '<li class="twitter-icon"><a href="'.esc_url($viaggio_web_info_twitter).'"><i class="fa fa-twitter"></i></a></li>';
                                        }
                                        if($viaggio_web_info_digg){
                                            echo '<li class="digg-icon"><a href="'.esc_url($viaggio_web_info_digg).'"><i class="fa fa-digg"></i></a></li>';
                                        }
                                        if($viaggio_web_info_pinterest){
                                            echo '<li class="pinterest-icon"><a href="'.esc_url($viaggio_web_info_pinterest).'"><i class="fa fa-pinterest"></i></a></li>';
                                        }
                                        if($viaggio_web_info_googleplus){
                                            echo '<li class="googleplus-icon"><a href="'.esc_url($viaggio_web_info_googleplus).'"><i class="fa fa-google-plus"></i></a></li>';
                                        }

                                        ?>
                                    </ul>
                            </div>
                        </div>
                    </div>
        
<?php   echo $args['after_widget'];
    }
    function form($instance){
        $viaggio_web_info_title = empty($instance['viaggio_web_info_title']) ? 'About Website': $instance['viaggio_web_info_title'];
        $viaggio_web_info_description = empty($instance['viaggio_web_info_description']) ? '': $instance['viaggio_web_info_description'];
        $viaggio_web_info_facebook = empty($instance['viaggio_web_info_facebook']) ? '': $instance['viaggio_web_info_facebook'];
        $viaggio_web_info_twitter = empty($instance['viaggio_web_info_twitter']) ? '': $instance['viaggio_web_info_twitter'];
        $viaggio_web_info_googleplus = empty($instance['viaggio_web_info_googleplus']) ? '': $instance['viaggio_web_info_googleplus'];
        $viaggio_web_info_digg = empty($instance['viaggio_web_info_digg']) ? '': $instance['viaggio_web_info_digg'];
        $viaggio_web_info_pinterest = empty($instance['viaggio_web_info_pinterest']) ? '': $instance['viaggio_web_info_pinterest'];
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_web_info_title')?>"><?php esc_html_e('Title', 'viaggio')?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('viaggio_web_info_title')?>" name="<?php echo $this->get_field_name('viaggio_web_info_title')?>" type="text" value="<?php echo esc_attr($viaggio_web_info_title);?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_web_info_description')?>"><?php esc_html_e('Description', 'viaggio')?>:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('viaggio_web_info_description')?>" name="<?php echo $this->get_field_name('viaggio_web_info_description')?>"><?php echo esc_html( $viaggio_web_info_description );?></textarea>
        </p>
        <p>
            <b><?php esc_html_e('INPUT THE SOCIAL LINKS' , 'viaggio');?></b>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_web_info_facebook')?>"><?php esc_html_e('Facebook', 'viaggio')?>:</label>
            <input type='text' class="widefat" id="<?php echo $this->get_field_id('viaggio_web_info_facebook')?>" name="<?php echo $this->get_field_name('viaggio_web_info_facebook')?>" value="<?php echo esc_url($viaggio_web_info_facebook);?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_web_info_twitter')?>"><?php esc_html_e('Twitter', 'viaggio')?>:</label>
            <input type='text' class="widefat" id="<?php echo $this->get_field_id('viaggio_web_info_twitter')?>" name="<?php echo $this->get_field_name('viaggio_web_info_twitter')?>" value="<?php echo esc_url($viaggio_web_info_twitter);?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_web_info_googleplus')?>"><?php esc_html_e('Google +', 'viaggio')?>:</label>
            <input type='text' class="widefat" id="<?php echo $this->get_field_id('viaggio_web_info_googleplus')?>" name="<?php echo $this->get_field_name('viaggio_web_info_googleplus')?>" value="<?php echo esc_url($viaggio_web_info_googleplus);?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_web_info_digg')?>"><?php esc_html_e('DIGG', 'viaggio')?>:</label>
            <input type='text' class="widefat" id="<?php echo $this->get_field_id('viaggio_web_info_digg')?>" name="<?php echo $this->get_field_name('viaggio_web_info_digg')?>" value="<?php echo esc_url($viaggio_web_info_digg);?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_web_info_pinterest')?>"><?php esc_html_e('Pinterest', 'viaggio')?>:</label>
            <input type='text' class="widefat" id="<?php echo $this->get_field_id('viaggio_web_info_pinterest')?>" name="<?php echo $this->get_field_name('viaggio_web_info_pinterest')?>" value="<?php echo esc_url($viaggio_web_info_pinterest);?>">
        </p>

    <?php }


       public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
            $instance = array();
            $instance['viaggio_web_info_title'] = ( ! empty( $new_instance['newsletter_title'] ) ) ? strip_tags( $new_instance['newsletter_title'] ) : '';
            $instance['viaggio_web_info_description'] = ( ! empty( $new_instance['viaggio_web_info_description'] ) ) ? strip_tags( $new_instance['viaggio_web_info_description']) : '';
            $instance['viaggio_web_info_facebook'] = ( ! empty( $new_instance['viaggio_web_info_facebook'] ) ) ? strip_tags( esc_url($new_instance['viaggio_web_info_facebook'])) : '';
            $instance['viaggio_web_info_twitter'] = ( ! empty( $new_instance['viaggio_web_info_twitter'] ) ) ? strip_tags( esc_url($new_instance['viaggio_web_info_twitter'])) : '';
            $instance['viaggio_web_info_googleplus'] = ( ! empty( $new_instance['viaggio_web_info_googleplus'] ) ) ? strip_tags( esc_url($new_instance['viaggio_web_info_googleplus'])) : '';
            $instance['viaggio_web_info_digg'] = ( ! empty( $new_instance['viaggio_web_info_digg'] ) ) ? strip_tags( esc_url($new_instance['viaggio_web_info_digg'])) : '';
            $instance['viaggio_web_info_pinterest'] = ( ! empty( $new_instance['viaggio_web_info_pinterest'] ) ) ? strip_tags( esc_url($new_instance['viaggio_web_info_pinterest'])) : '';
            
        return $instance;
    }
}
function viaggio_web_info_register(){
    register_widget('viaggio_web_info');
}
add_action('widgets_init', 'viaggio_web_info_register');
?>