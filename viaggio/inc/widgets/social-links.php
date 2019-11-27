<?php
/**
* Social Links WIDGET
*/
class viaggio_social extends WP_Widget
{
    
    function __construct()
    {
        parent::__construct("viaggio_social", esc_html__('Viaggio Social', 'viaggio'),array('description' => esc_html__('Your Social Connections.' , 'viaggio')));
    }
    function widget($args, $instance){
    	$social_title = empty($instance['widget_title_social']) ? 'Social Links' : $instance['widget_title_social'];
        $social_fb = empty($instance['widget_title_social_facebook']) ? '' : $instance['widget_title_social_facebook'];
        $social_twitter = empty($instance['widget_title_social_twitter']) ? '' : $instance['widget_title_social_twitter'];
        $social_gp = empty($instance['widget_title_social_googleplus']) ? '' : $instance['widget_title_social_googleplus'];
        $social_digg = empty($instance['widget_title_social_digg']) ? '' : $instance['widget_title_social_digg'];
        $social_pinterest = empty($instance['widget_title_social_pinterest']) ? '' : $instance['widget_title_social_pinterest'];
        echo $args['before_widget'];
        echo $args['before_title'] . esc_html( $social_title ) . $args['after_title'];
        echo '<div class="social-profile">';
        ?>
            <?php if(!empty($social_fb)){?><a class="facebook-icon" href="<?php echo esc_url($social_fb); ?>"><i class="fa fa-facebook"></i></a><?php }?>
            <?php if(!empty($social_twitter)){?><a class="twitter-icon" href="<?php echo esc_url($social_twitter); ?>"><i class="fa fa-twitter"></i></a><?php }?>
            <?php if(!empty($social_gp)){?><a class="googleplus-icon" href="<?php echo esc_url($social_gp); ?>"><i class="fa fa-google-plus"></i></a><?php }?>
            <?php if(!empty($social_digg)){?><a class="digg-icon" href="<?php echo esc_url($social_digg); ?>"><i class="fa fa-digg"></i></a><?php }?>
            <?php if(!empty($social_pinterest)){?><a class="pinterest-icon" href="<?php echo esc_url($social_pinterest); ?>"><i class="fa fa-pinterest"></i></a><?php }?>

        <?php 
        echo '</div>';
        echo $args['after_widget'] ;
    }
    function form($instance){
        $social_title = empty($instance['widget_title_social']) ? 'Social Links' : $instance['widget_title_social'];
        $social_fb = empty($instance['widget_title_social_facebook']) ? '' : $instance['widget_title_social_facebook'];
        $social_twitter = empty($instance['widget_title_social_twitter']) ? '' : $instance['widget_title_social_twitter'];
        $social_gp = empty($instance['widget_title_social_googleplus']) ? '' : $instance['widget_title_social_googleplus'];
        $social_digg = empty($instance['widget_title_social_digg']) ? '' : $instance['widget_title_social_digg'];
        $social_pinterest = empty($instance['widget_title_social_pinterest']) ? '' : $instance['widget_title_social_pinterest'];
        ?>

        <p><label for="<?php echo $this->get_field_id('widget_title_social');?>"><?php esc_html_e('Name' , 'viaggio');?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('widget_title_social');?>" name="<?php echo $this->get_field_name('widget_title_social');?>" type="text" value="<?php echo esc_attr($social_title);?>"></p>
        <p><b><?php esc_html_e('Select Used Social Networks.' , 'viaggio');?></b></p>
        <p><label for="<?php echo $this->get_field_id('widget_title_social_facebook');?>"><?php esc_html_e('Facebook', 'viaggio')?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('widget_title_social_facebook');?>" name="<?php echo $this->get_field_name('widget_title_social_facebook');?>" type="text" value="<?php echo esc_attr($social_fb);?>"></p>
        <p><label for="<?php echo $this->get_field_id('widget_title_social_twitter');?>"><?php esc_html_e('Twitter', 'viaggio')?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('widget_title_social_twitter');?>" name="<?php echo $this->get_field_name('widget_title_social_twitter');?>" type="text" value="<?php echo esc_attr($social_twitter);?>"></p>
		<p><label for="<?php echo $this->get_field_id('widget_title_social_googleplus');?>"><?php esc_html_e('G+', 'viaggio')?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('widget_title_social_googleplus');?>" name="<?php echo $this->get_field_name('widget_title_social_googleplus');?>" type="text" value="<?php echo esc_attr($social_gp);?>"></p>
    	<p><label for="<?php echo $this->get_field_id('widget_title_social_digg');?>"><?php esc_html_e('Digg', 'viaggio')?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('widget_title_social_digg');?>" name="<?php echo $this->get_field_name('widget_title_social_digg');?>" type="text" value="<?php echo esc_attr($social_digg);?>"></p>
        <p><label for="<?php echo $this->get_field_id('widget_title_social_pinterest');?>"><?php esc_html_e('Pinterest', 'viaggio')?>:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('widget_title_social_pinterest');?>" name="<?php echo $this->get_field_name('widget_title_social_pinterest');?>" type="text" value="<?php echo esc_attr($social_pinterest);?>"></p>
    <?php }

      public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
            $instance = array();
            $instance['widget_title_social'] = ( ! empty( $new_instance['widget_title_social'] ) ) ? strip_tags( $new_instance['widget_title_social'] ) : '';
            $instance['widget_title_social_facebook'] = ( ! empty( $new_instance['widget_title_social_facebook'] ) ) ? strip_tags( esc_url( $new_instance['widget_title_social_facebook'] ) ) : '';
            $instance['widget_title_social_twitter'] = ( ! empty( $new_instance['widget_title_social_twitter'] ) ) ? strip_tags( esc_url( $new_instance['widget_title_social_twitter'] ) ) : '';
            $instance['widget_title_social_googleplus'] = ( ! empty( $new_instance['widget_title_social_googleplus'] ) ) ? strip_tags( esc_url( $new_instance['widget_title_social_googleplus'] ) ) : '';
            $instance['widget_title_social_digg'] = ( ! empty( $new_instance['widget_title_social_digg'] ) ) ? strip_tags( esc_url( $new_instance['widget_title_social_digg'] ) ) : '';
            $instance['widget_title_social_pinterest'] = ( ! empty( $new_instance['widget_title_social_pinterest'] ) ) ? strip_tags( esc_url( $new_instance['widget_title_social_pinterest'] ) ) : '';

            return $instance;
    }

}

function viaggio_social_register(){
    register_widget('viaggio_social');
}
add_action('widgets_init', 'viaggio_social_register');