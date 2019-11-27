<?php
/**
* Popular Post 
*/
class viaggio_newslatter extends WP_Widget
{
    function __construct()
    {
        parent::__construct("viaggio_newslatter", esc_html__('Viaggio Newslatter', 'viaggio'),array('description' => esc_html__('Newslatter Swdgets.' , 'viaggio')));
    }
    function widget($args, $instance){
        $news_title = empty($instance['newsletter_title']) ? 'Newslatter' : $instance['newsletter_title'];
        $news_url = empty($instance['newsletter_naked_link']) ? '' : $instance['newsletter_naked_link'];
        $news_description = empty($instance['newsletter_description']) ? '' : $instance['newsletter_description'];

        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($news_title) . $args['after_title'];
        echo '<div class="newsletter-entry">';
        echo '<p>'. esc_html($news_description).'</p>';
        echo '  <form action="'. esc_url($news_url).'" method="post">
                    <div class="email">
                        <input type="text" name="EMAIL" placeholder="'.esc_html__('Type your mail' , 'viaggio').'" id="mce-EMAIL">
                        <button class="submit" id="mc-embedded-subscribe"><i class="fa fa-paper-plane"></i></button>
                    </div>
                    
                </form>';

        echo '</div>';
        echo $args['after_widget'] ;
    }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
            $instance = array();
            $instance['newsletter_title'] = ( ! empty( $new_instance['newsletter_title'] ) ) ? strip_tags( $new_instance['newsletter_title'] ) : '';
            $instance['newsletter_naked_link'] = ( ! empty( $new_instance['newsletter_naked_link'] ) ) ? strip_tags( esc_url($new_instance['newsletter_naked_link'])) : '';
            $instance['newsletter_description'] = ( ! empty( $new_instance['newsletter_description'] ) ) ? strip_tags( $new_instance['newsletter_description'] ) : '';

        return $instance;
    }


    function form($instance){
        $news_title = empty($instance['newsletter_title']) ? '' : $instance['newsletter_title'];
        $news_url = empty($instance['newsletter_naked_link']) ? '' : $instance['newsletter_naked_link'];
        $news_description = empty($instance['newsletter_description']) ? '' : $instance['newsletter_description'];
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('newsletter_title');?>"><?php esc_html_e('Title', 'viaggio');?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('newsletter_title');?>" name="<?php echo $this->get_field_name('newsletter_title');?>" type="text" value="<?php echo esc_attr($news_title);?>">
        </p>
        <p><b>Insert the naked link mailchimp.</b></p>
        <p>
            <label for="<?php echo $this->get_field_id('newsletter_naked_link');?>"><?php esc_html_e('Mailchimp Naked Link', 'viaggio');?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('newsletter_naked_link');?>" name="<?php echo $this->get_field_name('newsletter_naked_link');?>" type="text" value="<?php echo esc_attr($news_url);?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('newsletter_description');?>"><?php esc_html_e('Mailchimp Description', 'viaggio');?>:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('newsletter_description');?>" name="<?php echo $this->get_field_name('newsletter_description');?>"><?php echo esc_html($news_description);?></textarea>
        </p>
    <?php }
}

function viaggio_register(){
    register_widget('viaggio_newslatter');
}
add_action('widgets_init', 'viaggio_register');