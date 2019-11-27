<?php
/**
* recent Post 
*/
class viaggio_recent extends WP_Widget
{
    
    function __construct()
    {
        parent::__construct("viaggio_recent", esc_html__('Viaggio Recent Posts', 'viaggio'),array('description' => esc_html__('Show Your Blogs recent Posts.','viaggio')));
    }
    function widget($args, $instance){
        $title_recent = empty($instance['recent_post'])  ? 'Recent Posts' : $instance['recent_post'];
        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title_recent) . $args['after_title'];
       
        $recentpost = new WP_Query( array( 'posts_per_page' => 3) );
       echo '<div class="post-entry popular_post">';
        while ( $recentpost->have_posts() ) : $recentpost->the_post();?>
                <div class="s-post">

                <div class="row">
                    <div class="col-md-4 padding-right">
                        <div class="sp-thumb">
                            <a href="<?php the_permalink();?>"><img src="<?php if(has_post_thumbnail()){the_post_thumbnail_url();}else{ echo wp_get_attachment_image_src( cs_get_option( 'cover_image' ), 'full' )[0]; }?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 nopadding-left">
                        <div class="sp-details">
                            <h3 class='post_title_popular'><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <span><?php the_time('F jS, Y');?></span>
                        </div>
                    </div>
                </div>


                

            </div>    
        <?php endwhile;
       wp_reset_postdata();
        echo '</div>';
        echo $args['after_widget'] ;
    }

    function form($instance){
        $title_recent = empty($instance['recent_post'])  ? 'Recent Posts' : $instance['recent_post']; ?>

        <p><label for="<?php echo $this->get_field_id('recent_post');?>">Name:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('recent_post');?>" name="<?php echo $this->get_field_name('recent_post');?>" type="text" value="<?php echo esc_attr($title_recent);?>"></p>
    <?php }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
            $instance = array();
            $instance['recent_post'] = ( ! empty( $new_instance['recent_post'] ) ) ? strip_tags( $new_instance['recent_post'] ) : '';

        return $instance;
    }

}

function viaggio_recent_register(){
    register_widget('viaggio_recent');
}
add_action('widgets_init', 'viaggio_recent_register');