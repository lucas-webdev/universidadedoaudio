<?php
/**
* Popular Post 
*/
class viaggio_poplular_post extends WP_Widget
{
    
    function __construct()
    {
        parent::__construct("viaggio_poplular_post", esc_html__('Viaggio Popular Posts', 'viaggio'),array('description' => esc_html__('Show Your Blogs Popular Posts.' , 'viaggio')));
    }
    function widget($args, $instance){
        $title_popular = empty($instance['popular_post'])  ? 'Popular Posts' : $instance['popular_post'];
        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($title_popular) . $args['after_title'];
       
        $popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'viaggio_wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
        echo '<div class="post-entry popular_post">';
        while ( $popularpost->have_posts() ) : $popularpost->the_post();?>

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
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
            $instance = array();
            $instance['popular_post'] = ( ! empty( $new_instance['popular_post'] ) ) ? strip_tags( $new_instance['popular_post'] ) : '';

        return $instance;
    }


    function form($instance){
        $title_popular = empty($instance['popular_post'])  ? '' : $instance['popular_post']; ?>

        <p><label for="<?php echo $this->get_field_id('popular_post');?>">Name:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('popular_post');?>" name="<?php echo $this->get_field_name('popular_post');?>" type="text" value="<?php echo esc_attr($title_popular);?>"></p>
    <?php }
}

function deliver_popular(){
    register_widget('viaggio_poplular_post');
}
add_action('widgets_init', 'deliver_popular');