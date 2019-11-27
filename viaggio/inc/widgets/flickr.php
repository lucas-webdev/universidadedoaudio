<?php
/**
* Popular Post 
*/
class viaggio_flickr extends WP_Widget
{
    
    function __construct()
    {
        parent::__construct("viaggio_flickr", esc_html__('Viaggio Flickr Widget', 'viaggio'),array('description' => esc_html__('Flickr Widget.' , 'viaggio')));
    }
    function widget($args, $instance){
        $viaggio_flickr_title = empty($instance['viaggio_flickr']) ? 'Flickr Stream' : $instance['viaggio_flickr_title'];
        $viaggio_flickr_id = empty($instance['viaggio_flickr_id']) ? '' : $instance['viaggio_flickr_id'];

        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($viaggio_flickr_title) . $args['after_title'];
        echo '<div class="instagram-entry" data-flickr="'.esc_attr($viaggio_flickr_id).'">
            <ul>             
            </ul></div>';

        echo $args['after_widget'] ;
    }



    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
            $instance = array();
            $instance['viaggio_flickr_title'] = ( ! empty( $new_instance['viaggio_flickr_title'] ) ) ? strip_tags( $new_instance['viaggio_flickr_title'] ) : '';
            $instance['viaggio_flickr_id'] = ( ! empty( $new_instance['viaggio_flickr_id'] ) ) ? strip_tags( $new_instance['viaggio_flickr_id'] ) : '';
            
            return $instance;
    }

    function form($instance){
        $viaggio_flickr_title = empty($instance['viaggio_flickr_title']) ? 'Flickr Stream' : $instance['viaggio_flickr_title'];
        $viaggio_flickr_id = empty($instance['viaggio_flickr_id']) ? '' : $instance['viaggio_flickr_id'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_flickr_title');?>"><?php esc_html_e('Title' , 'viaggio')?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('viaggio_flickr_title');?>" name="<?php echo $this->get_field_name('viaggio_flickr_title');?>" type="text" value="<?php echo esc_attr($viaggio_flickr_title);?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('viaggio_flickr_id');?>"><?php esc_html_e('Flickr ID' , 'viaggio')?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('viaggio_flickr_id');?>" name="<?php echo $this->get_field_name('viaggio_flickr_id');?>" type="text" value="<?php echo esc_attr($viaggio_flickr_id);?>">
        </p>
    <?php }
}

function viaggio_flickr_register(){
    register_widget('viaggio_flickr');
}
add_action('widgets_init', 'viaggio_flickr_register');